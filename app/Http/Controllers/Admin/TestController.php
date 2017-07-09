<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Model\User;

class TestController extends Controller
{
    public function test(){

//        return view('try');
//        $data=DB::select('select * from user where age= ?',[2]);
//        $data=DB::table('user')->pluck('name');
//        $data=User::get();
//        var_dump($data);

        $a='yohoho';
        $a=encrypt($a);
        $a=decrypt($a);
        dd($a);
    }
    public function post(){
        $data=Input::all();
        $validator=Validator::make($data,['user'=>'required','pwd'=>'required'],['user.required'=>'用户名不能为空','pwd.required'=>'密码不能为空']);
        if($validator->fails()){
            return redirect('test\test')->withErrors($validator);
        }
    }
    public function chaxun(){
        $data=DB::select('select * from user where age = ?',[2]);
        var_dump($data);
    }
}
