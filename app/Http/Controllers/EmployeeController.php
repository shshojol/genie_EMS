<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function index(){
        return view('admin.employee.addEmployee');
    }

    public function show_user(){
        $user = user::where('is_admin', 0)->get();
        $id = auth()->user()->id;
        $today_date = date('Y-m-d');
        //$report = Report::find($id)->where('date', '=', $today_date)->get();
        $report = DB::table('reports')
                        ->where('user', '=', $id)
                        ->where('date', '=', $today_date)->count();

        return view('dashboard', ['user'=>$user, 'report'=>$report]);
    }

    public function store(Request $req){

        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
        ]);

        $employee = new user();
        $employee->name = $req->name;
        $employee->email = $req->email;
        $employee->is_admin = 0;
        $employee->password = Hash::make($req->password);
        $employee->save();
        return back()->with('status', 'add succesfully');
    }

    public function report(){
        //$date = DB::table('reports')->pluck('date')->distinct();
        $date = DB::table('reports')->distinct()->pluck('date');
        return view('admin.employee.report', ['date'=>$date]);
    }

    public function getdata(Request $request)
    {
         $date = $request->post('date');
         $report = DB::table('reports')->where('date', '=', $date)->select('user', 'date', 'time', 'status')->get();

         $html="<table border='1'>
         <tr>
             <th>User</th>
             <th>date</th>
             <th>time</th>
             <th>status</th>
         </tr>
     ";
         foreach($report as $value){
             $html .= "<tr>
                <td>".$value->user."</td>
                <td>".$value->date."</td>
                <td>".$value->time."</td>
                <td>".$value->status."</td>
             </tr>";
         }
         $html .= "</table>";
         //echo $html;

         return response()->json($html);


    }



}
