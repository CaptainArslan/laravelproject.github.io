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
        return $users;
    }

    function db_insert($request){
        $data = array();
        $insert = DB::table('tbl_userdata')->insert([
            'user_firstname' => $request->username,
            'user_email' => $request->useremail,
            'user_address' => $request->useraddress,
            'user_phone' => $request->userphone,
        ]);
    }

}
