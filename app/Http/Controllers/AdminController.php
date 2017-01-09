<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function list_student()
    {
	$students = DB::select('select * from student');

        return view('list_student',['students'=>$students]);
    }

    public function list_coach()
    {
	$coachs = DB::select('select * from coach');

        return view('list_coach',['coachs'=>$coachs]);
    }
    
    public function view_student($id)
    {
	$student = DB::table('student')->where('student.student_id','=',$id)->first();
	$district = DB::table('district')->where('district.district_id','=',$student->district_id)->first();
        return view('view_student',['student'=>$student, 'district'=>$district]);
    }


	public function view_coach($id)
    {
	$coach = DB::table('coach')->where('coach.coach_id','=',$id)->first();

	$all_districts = DB::table('district')->get();

	return view('view_coach',['coach'=>$coach,'all_districts'=>$all_districts]);
    }


	public function enable_student($id)
	{
		$student = DB::table('student')->where('student.student_id','=',$id)->update(array('activated' => 1));
		
	}

	public function disable_student($id)
	{
		$student = DB::table('student')->where('student.student_id','=',$id)->update(array('activated' => 0));
		
	}		
}