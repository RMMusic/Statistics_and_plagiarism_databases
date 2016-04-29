<?php

namespace App\Models\Dashboard;

use App\Client;
use App\ClientsToTickets;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GeneralModel extends Model{

    protected $options = ['addDays'=>7];

    /**
     * Конструктор для ініціалізації параметрів
     * @param array $options
     */
    public function __construct($options = []){
        $this->options = array_merge($this->options,$options);
    }

    /**
     * Витягає абонементи які будуть просрочені через 'addDays'=>7
     * @return mixed
     */
    public function getEndOfDateTickets($client=false){
        $this->findOutstandingTickets();
        $clients = ClientsToTickets::where('dateFromReserve','<=',Carbon::now()->addDays($this->options['addDays']))
            ->where('statusTicket_id','<',3)
            ->where('numTicket','!=','')
            ->where('dateFromReserve','!=','0000-00-00');
        if ($client) $clients->where('client_id',$client);
        $clients = $clients->get();
        return $clients;
    }

    /**
     * Автоматична перевірка для прострочених абонементів
     * @return mixed
     */
    public function findOutstandingTickets(){
        return ClientsToTickets::where('dateFromReserve','<',Carbon::now())
            ->where('dateFromReserve','!=','0000-00-00')
            ->where('statusTicket_id','<',3)
            ->update(['statusTicket_id'=>4]);
    }

    public function getBirthDayClient(){
        $daysForNextBirthdays = Cache::get('next_birthdays');
        return DB::select(DB::raw("SELECT id,name,birthday FROM ( SELECT id,name,birthday,MONTH(birthday) AS m, DAY(birthday) As d FROM client_info) AS tmp ORDER BY (m,d) < ( MONTH(CURDATE()), DAY(CURDATE()) ), m , d LIMIT ".$daysForNextBirthdays));
    }

}
