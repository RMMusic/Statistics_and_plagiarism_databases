<?php

namespace App\Http\Controllers;

use App\WorkModel;
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
//            ->edit_column('plagiarism_percent', function($plagiarism){
//                return $plagiarism->plagiarism_percent . '%';
//            })
//            ->edit_column('errors_percent', function($errors){
//                return $errors->errors_percent . '%';
//            })
//            ->add_column(get()->first()->getParticipant->phone)

//            ->add_column('actions', '<a href="{{ URL::to(\'services/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm " ><span class="glyphicon glyphicon-pencil"></span>   </a>
//                    <a href="{{{ URL::to(\'services/\' . $id . \'/destroy\' ) }}}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> </a>')
            ->remove_column('id')
            ->remove_column('job_type_id')
            ->make();
    }
}
