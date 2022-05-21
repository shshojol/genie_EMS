<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Report;

class ReportController extends Controller
{
    public function checkin(Request $req){

        $date = Carbon::now();
        $time = date("h:i a", strtotime($date));
        $report = new Report();
        $report->user = $req->user;
        $report->date = $req->date;
        $report->time = $time;
        $report->status = $req->status;

        $report->save();

        return back()->with('status', 'check in succesfully');
    }

    public function checkout(Request $req){
        $date = Carbon::now();
        $time = date("h:i a", strtotime($date));
        $report = new Report();
        $report->user = $req->user;
        $report->date = $req->date;
        $report->time = $time;
        $report->status = $req->status;

        $report->save();

        return back()->with('status', 'check out succesfully');
    }
}
