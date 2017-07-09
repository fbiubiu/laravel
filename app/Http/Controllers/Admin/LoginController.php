<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\UserModel;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
//            dd($data);die;
            $vali=[
                'name'=>'required',
                'password'=>'required',
                'captcha'=>'required|captcha'
                ];
            $message=[
                'name.required'=>'请输入用户名',
                'password.required'=>'请输入密码',
                'captcha.required'=>'请输入验证码',
                'captcha.captcha'=>'验证码输入错误'
            ];
            $validator=Validator::make($data,$vali,$message);
            if($validator->fails()){
                return back()->withErrors($validator);
            }else{


            }
        }
        return view('admin.login');
    }
}
