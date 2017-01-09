<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentApplyController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function prepareForm()
    {
        $categories = DB::select('SELECT * FROM category');

        $hkDistricts = DB::select('SELECT * FROM district WHERE region = "HK"');
        $knDistricts = DB::select('SELECT * FROM district WHERE region = "KN"');
        $ntDistricts = DB::select('SELECT * FROM district WHERE region = "NT"');

        return view('studentApply' ,
            [
                'categories' => $categories,
                'hkDistricts' => $hkDistricts,
                'knDistricts' => $knDistricts,
                'ntDistricts' => $ntDistricts
            ]);
    }
    
    public function store(Request $request){
//        echo "Store Function Output:\n";
//        echo $request."\n";
//        $category ="";
//        if(!empty($request->input('category'))){
//            foreach($_POST['category'] as $selected){
//                DB::table('coachAvailableSubject')->insert(
//                    array()
//                
//                );
//                if($category==="")?$category=selected:$category = $category+" "+$selected;
//            }
//        }
//       $address = $request->input('address')." ".$request->input('area');
        
        
        DB::table('coach')->insert(
            array('username'=>$request->input('username'),
                  'password'=>$request->input('loginPassword'),
                  'email'=>$request->input('loginEmail'),
                  'chin_name'=>$request->input('chinName'),
                  'eng_name'=>$request->input('engName'),
                  'idcard_no'=>$request->input('HKID'),
                  'address'=> $request->input('address') , //?
                  'sex'=>$request->input('gender'),
                  'birth_year'=>$request->input('birthday'),
                  'offer_venue'=>$request->input('classroomAddress'),
                  'offer_group'=>$request->input('groupClass'),
                  'facebook'=>$request->input('coachFacebook'),
                  'instagram'=>$request->input('coachInstagram'),
                  'self_intro'=>$request->input('coachIntroduction'),
                  'year_of_teaching'=>$request->input('experienceSelection'),
                  'profession'=>$request->input('occupationSelection'),
                  'min_pay'=>$request->input('minHourlyWage'),
                  'well_pay'=>$request->input('idealHourlyWage'),
//                  'profile_pic'=>$request->input('loginEmail'),
                  'activated'=>0,
                  'activation_key'=>'random_key'
                 )
        );
//        return view('coachApply' ,
//            [
//                'cat'=>$$cat
//            ]);;
    }
}