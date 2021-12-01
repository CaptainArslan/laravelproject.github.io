<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class UserModel extends Model
{
    use HasFactory;

    function get_db_data()
    {
        $users = DB::select('select * from tbl_userdata');
        if( count($users) > 0){
            return $users;
        }
    }
    function get_student_data($id){
        $get_users = DB::select("select * from tbl_userdata where id = '$id' ");
            return $get_users;
        
    }

    function db_insert($request){
        $insert = DB::table('tbl_userdata')->insert([
            'user_firstname' => $request->username,
            'user_email' => $request->useremail,
            'user_address' => $request->useraddress,
            'user_phone' => $request->userphone,
        ]);
        if($insert){
            return true;
        }
        else{
            return false;
        }
    }

    function db_delete($id){
        $delete = DB::delete("DELETE FROM `tbl_userdata` WHERE `id` = '$id' ");
        if($delete){
            return true;
        }
        else{
            return false;
        }
    }
}
