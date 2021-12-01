<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function db_data(){
        $obj = new UserModel();
        $db_user = $obj -> get_db_data();
        return view('index',[ 'user' => $db_user ]);
    }
    
    
    public function insert_data(Request $request)
    {
        // rules for all the input types

        $validator = $request->validate([
            'username' => 'required|string|min:3|max:255',
			'useremail' => 'required|email|min:3|max:255',
            'useraddress' => 'required|string|min:3|max:255',
			'userphone' => 'required|string|digits:11|max:255'
        ]);

        //To check the value of the submit button is save or update
        // echo $request -> submit;
        // exit;


        //  return $request->input();
        if($validator)
        {
            $obj = new UserModel();
            $insert = $obj->db_insert($request);

            if(!$insert){
                return redirect()->back()->with('fail', 'Error Occured while insertion'); 
            }else{
                return redirect()->back()->with('success', 'Data Added Successfully in database'); 
            }
        }
        else
        {

        }
    }


    public function delete_Data($id){
        $obj = new UserModel();
        $delete = $obj->db_delete($id);
        if($delete == true ){
            return redirect()->back()->with('success', 'Data Delete Successfully'); 
        }else{
            return redirect()->back()->with('fail', 'Error While Deletion');
        }
    }

    public function get_student($id){
        //To the chek the id of the student to check
        // echo $id;
        // exit;
        $obj = new UserModel();
        $get_user = $obj->get_student_data($id);
        
        echo json_encode($get_user);

    }
}
