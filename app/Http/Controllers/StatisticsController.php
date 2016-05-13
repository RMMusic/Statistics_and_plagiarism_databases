<?php

namespace App\Http\Controllers;

use App\WorkModel;
use App\WorkStatusModel;
use App\WorkTypeModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;

class StatisticsController extends Controller
{
    public function index()
    {
//        $work = WorkModel::all()->first();
//        dd(WorkModel::get()->first()->getWorkType->name);
        return view('lists.statistics.index');
    }

    public function create()
    {
        $workType = WorkTypeModel::all();
        $workStatus = WorkStatusModel::all();
        return view('lists.statistics.create_edit', compact('workType','workStatus'));
    }

    public function data()
    {
        $statisticsList = WorkModel::where('job_type_id', '=', WorkModel::STATISTICS_ID)->select(
            'id', 
            'participant_id',
            'work_them',
            'job_type_id',
            'start_date',
            'work_type_id',
            'work_status_id',
            'end_date',
            'comment'
        )->get();
        return Datatables::of($statisticsList)
            ->edit_column('participant_id', function($name){
                return $name->getParticipant->name;
            })
            ->edit_column('work_type_id', function($workType){
                return $workType->getWorkType->name;
            })
            ->edit_column('work_status_id', function($workStatus){
                return $workStatus->getWorkStatus->name;
            })
//            ->add_column(get()->first()->getParticipant->phone)

//            ->add_column('actions', '<a href="{{ URL::to(\'services/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm " ><span class="glyphicon glyphicon-pencil"></span>   </a>
//                    <a href="{{{ URL::to(\'services/\' . $id . \'/destroy\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> </a>')
            ->remove_column('id')
            ->remove_column('job_type_id')
            ->make();
    }
}
