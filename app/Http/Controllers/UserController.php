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
    
    
    public function db_insert_update_data(Request $request)
    {
        // rules for all the input types

        $validator = $request->validate([
            'userimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'username' => 'required|string|min:3|max:255',
			'useremail' => 'required|email|min:3|max:255',
            'useraddress' => 'required|string|min:3|max:255',
			'userphone' => 'required|string|digits:11|max:255'
        ]);
        
        
        // echo $imageName;
        // exit;

        //To check the value of the submit button is save or update on the basis of input submit "name='submit'"
        // echo $request -> submit;
        // exit;
        // return $request->input();

        if($validator)
        {
            if($request -> submit == "Save")
            {
                $userimage = $request->userimage;
                if($userimage != ""){
                    $imageName = time().'.'.$request->userimage->extension(); 
                    $request->userimage->move(public_path('images'), $imageName);
                }else{
                    $imageName = " ";
                }
                 
                $request->userimage = $imageName;
                
                $obj = new UserModel();
                $insert = $obj->db_insert($request);
                if($insert == 1)
                {
                    return redirect()->back()->with('fail', '* Email Already Exist'); 
                }else if($insert == 2 )
                {
                    return redirect()->back()->with('fail', '* Error Occured while data insertion!');
                }
                else 
                {
                    return redirect()->back()->with('success', '* Data Inserted Successfully in database'); 
                }
            }
            else
            {
                $userimage = $request->userimage;
                if($userimage != ""){
                    $imageName = time().'.'.$request->userimage->extension(); 
                    $request->userimage->move(public_path('images'), $imageName);
                }else{
                    $imageName = " ";
                }
                 
                $request->userimage = $imageName;
                $obj = new UserModel();
                $update = $obj->db_update($request);
                if($update == 1)
                {
                    return redirect()->back()->with('fail', '* Email Already Exist in database !');
                }
                else if($update == 2 )
                {
                    return redirect()->back()->with('success', '* Data Updated Successfully !');
                }
                else
                {
                    return redirect()->back()->with('success', '* Data Updated Successfully in database !');
                }
            }
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
        //To the check the id of the student to check
        // echo $id;
        // exit;
        $obj = new UserModel();
        $get_user = $obj->get_student_data($id); 
        echo json_encode($get_user);
    }


    public function get_email($email){
       $obj = new UserModel();
       $get_email = $obj -> get_email($email);
       if($get_email)
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }

    function get_delete_ids(Request $request){
        //To check that what values are posting in the form
        // return $request->input();
        $ids = $request->options;
        $obj = new UserModel();
        $delete_multiple =  $obj-> db_delete_multiple($ids);
        if($delete_multiple == true)
        {
            return redirect()->back()->with('success', '* Data Deleted Successfully from database');
        }
        else
        {
            return redirect()->back()->with('fail', 'Error While Deletion from database');
        }
    }

}
