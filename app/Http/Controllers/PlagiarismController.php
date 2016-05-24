<?php

namespace App\Http\Controllers;

use App\ParticipantModel;
use App\WorkModel;
use App\WorkTypeModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;

class PlagiarismController extends Controller
{
    public function index()
    {
//        $options = WorkModel::get();
//        dd(WorkModel::get()->first());
        return view('lists.plagiarism.index');
    }

    public function create()
    {
        $jobTypeId = WorkModel::PLAGIARISM_ID;
        $workType = WorkTypeModel::all();
        return view('lists.plagiarism.create_edit', compact('workType', 'jobTypeId'));
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
        $jobTypeId = WorkModel::PLAGIARISM_ID;
        $thisWork = WorkModel::find($work);
        $workType = WorkTypeModel::all();
        return view('lists.plagiarism.create_edit', compact('thisWork', 'workType', 'jobTypeId', 'participant'));
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
            $plagiarism = WorkModel::find($id);
            $plagiarism->update($request->toArray());
        }
        catch(\Exception $e) {
            return view('exceptions.msg')->with('msg', ' Зміни не збережено');
        }

        return redirect('/lists/plagiarism');

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
        return redirect('/lists/plagiarism');
    }

    public function data()
    {
        $plagiarismList = WorkModel::where('job_type_id', '=', WorkModel::PLAGIARISM_ID)->select(
            'id',
            'participant_id',
            'work_them',
            'job_type_id',
            'start_date',
            'plagiarism_percent',
            'errors_percent',
            'end_date',
            'comment'
        )->get();
        return Datatables::of($plagiarismList)
            ->edit_column('participant_id', function($name){
                return $name->getParticipant->name;
            })

            ->add_column('actions', '<a href="{{ URL::to(\'lists/plagiarism/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm " ><span class="glyphicon glyphicon-pencil"></span>   </a>
                    <a href="{{{ URL::to(\'lists/plagiarism/\' . $id . \'/destroy\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> </a>')
            ->remove_column('id')
            ->remove_column('job_type_id')
            ->make();
    }
}
