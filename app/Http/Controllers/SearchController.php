<?php

namespace App\Http\Controllers;

use App\Models\Search;
use App\ParticipantModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function participantSearch(Request $request)
    {
        $result = json_decode(ParticipantModel::where('name', 'like', '%' . $request->q . '%')->select('id', 'name')->get());
        return $result;
    }
    
}
