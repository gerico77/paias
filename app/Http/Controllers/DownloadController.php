<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class DownloadController extends Controller
{
    public function downfunc(){
        $downloads=DB::table('download')->get();
        return view('download.viewfile',compact('downloads'));
    }
}
