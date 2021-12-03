<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class UserModel extends Model
{
    use HasFactory;

    function get_db_data()
    {
        $users = DB::select('SELECT * FROM `tbl_userdata`');
        if( count($users) > 0)
        {
            return $users;
        }
    }



    function db_update ($request)
    {
        $duplicate = DB::select("SELECT user_email FROM `tbl_userdata` WHERE `user_email` = '$request->useremail' AND   `id` != '$request->id' ");
        if(count($duplicate) > 0)
        {
            return 1;
        }
        else
        {
            $update = DB::table('tbl_userdata') ->where('id', $request->id)
            ->limit(1)
            ->update([
                'user_firstname' => $request->username,
                'user_email' => $request->useremail,
                'user_address' => $request->useraddress,
                'user_phone' => $request->userphone,
            ]);
                if($update)
                {
                    return 0;
                }
                else
                {
                    return 2;
                }
        }
        // var_dump($request->id);
        // exit;
    }

    function db_insert($request)
    {
        $duplicate = DB::select("SELECT user_email FROM `tbl_userdata` WHERE `user_email` = '$request->useremail' ");
        $count = count($duplicate);
            if($count > 0)
            {
                return 1;
            }
            else
            {
                $insert = DB::table('tbl_userdata')->insert([
                    'user_firstname' => $request->username,
                    'user_email' => $request->useremail,
                    'user_address' => $request->useraddress,
                    'user_phone' => $request->userphone,
                ]);
                if($insert)
                {
                    return 0;
                }
                else{
                    return 2;
                }
            }

    }

    function db_delete($id){
        $delete = DB::delete("DELETE FROM `tbl_userdata` WHERE `id` = '$id' ");
        if($delete)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    


    //Ajax Functions
    function get_student_data($id){
        $get_users = DB::select("SELECT * FROM `tbl_userdata` WHERE id = '$id' ");
            return $get_users;
    }

    function get_email($email){
        $get_email = DB::select("SELECT * FROM `tbl_userdata` WHERE user_email = '$email' ");
        if (count($get_email) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}
