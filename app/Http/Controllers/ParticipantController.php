<?php

namespace App\Http\Controllers;

use App\ParticipantModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Yajra\Datatables\Facades\Datatables;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lists.participant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.participant.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $participant = $request->except('_token');
            ParticipantModel::create(
                ['name' => $participant['name'],
                'email' => $participant['email'],
                'phone' => $participant['phone']
                ]);
        }
        catch(\Exception $e) {
            return view('exceptions.msg')->with('msg', ' Учасника не збережено');
        }

        return redirect('/lists.participant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($participant = ParticipantModel::all());
        return view('lists.participant.create_edit', compact('participant'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 
     */
    public function search(Request $request)
    {
//        dd($request->q);
        return '[{"id":2131,"text":"LOL"},{"id":5427176,"text":"WORLD"}]';
    }

    public function data()
    {
        $participant = ParticipantModel::select(
            'id',
            'name',
            'email',
            'phone'
        )->get();
        return Datatables::of($participant)
            ->add_column('actions',
                '<a href="{{ URL::to(\'services/\' . $id . \'/edit\' ) }}" class="btn btn-success btn-sm " >
                <span class="glyphicon glyphicon-pencil"></span>   </a>')
            ->remove_column('id')
            ->make();
    }
}
