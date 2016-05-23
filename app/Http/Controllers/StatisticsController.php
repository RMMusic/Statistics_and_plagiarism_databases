<?php

namespace App\Http\Controllers;

use App\ParticipantModel;
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
        return view('lists.statistics.index');
    }

    public function create()
    {
        $jobTypeId = WorkModel::STATISTICS_ID;
        $workType = WorkTypeModel::all();
        $workStatus = WorkStatusModel::all();
        return view('lists.statistics.create_edit', compact('workType','workStatus', 'jobTypeId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $work
     * @return \Illuminate\Http\Response
     */
    public function edit($work)
    {
        $participant = ParticipantModel::where('id', WorkModel::where('id', $work)->select('participant_id')
            ->get()->first()->participant_id)->select('name')->get()->first()->name;
        $jobTypeId = WorkModel::STATISTICS_ID;
        $thisWork = WorkModel::find($work);
        $workType = WorkTypeModel::all();
        $workStatus = WorkStatusModel::all();
        return view('lists.statistics.create_edit', compact('thisWork', 'workType', 'workStatus', 'jobTypeId', 'participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try
        {
            $statistics = WorkModel::find($id);
            $statistics->update($request->toArray());
        }
        catch(\Exception $e) {
            return view('exceptions.msg')->with('msg', ' Зміни не збережено');
        }

        return redirect('/lists/statistics');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkModel $id)
    {
        $id->delete();
        return redirect('/lists/statistics');
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

            ->add_column('actions', '<a href="{{ URL::to(\'lists/statistics/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm " ><span class="glyphicon glyphicon-pencil"></span>   </a>
                    <a href="{{{ URL::to(\'lists/statistics/\' . $id . \'/destroy\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> </a>')
            ->remove_column('id')
            ->remove_column('job_type_id')
            ->make();
    }
}
