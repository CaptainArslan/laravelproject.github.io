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
			'useremail' => 'required|email',
            'useraddress' => 'required|string|min:3|max:255',
			'userphone' => 'required|string|digits:11|max:255'
        ]);

        //  return $request->input();
        if($validator)
        {
            $obj = new UserModel();
            $insert = $obj->db_insert($request);
            if($insert){
                $db_user = $obj->get_db_data();
                return view('index',[ 'user' => $db_user ]);
            }
        }
        
    }
}
