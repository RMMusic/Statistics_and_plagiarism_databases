<?php

namespace App\Http\Controllers;

use App\WorkModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;

class StatisticsController extends Controller
{
    public function index()
    {
        $work = WorkModel::all()->first();
//        dd(WorkModel::get()->first()->getParticipant->names);
        return view('lists.statistics.index');
//        dd($options);
    }

    public function data()
    {
        $statisticsList = WorkModel::select(
            'id', 
            'participant_id',
            'job_type_id',
            'start_date',
            'work_type_id',
            'work_status_id',
            'end_date',
            'comments'
        )->get();
        return Datatables::of($statisticsList)
            ->edit_column('participant_id', function($n){
                return $n->getParticipant->names;
            })

//            ->add_column('actions', '<a href="{{ URL::to(\'services/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm " ><span class="glyphicon glyphicon-pencil"></span>   </a>
//                    <a href="{{{ URL::to(\'services/\' . $id . \'/destroy\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> </a>')
            ->remove_column('id')
            ->remove_column('job_type_id')
            ->make();
    }
}
