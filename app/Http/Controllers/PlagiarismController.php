<?php

namespace App\Http\Controllers;

use App\WorkModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlagiarismController extends Controller
{
    public function index()
    {
        $options = WorkModel::get();
        dd($options);
    }
}
