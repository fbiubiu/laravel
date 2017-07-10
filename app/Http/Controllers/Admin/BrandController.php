<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\BrandModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Input;

class BrandController extends Controller
{
    //
    public function brandList(){
        return view('admin.brandList');
    }
    public function ajaxList(){
        $start=Input::get('start');
        $length=Input::get('length');
        $draw=Input::get('draw');
        $data=BrandModel::get();
        return [
          'data'=>$data,
            'draw'=>$draw
        ];
    }

    // 添加品牌的方法
    public function brandAdd(Request $request){
        if($request->isMethod('get')){
            return view('admin.brandAdd');
        }else{   // 接受logo之外的所有数据
            $data = $request->only(['brand_name','site_url','description']);
            /*******提交数据时,验证是否合法*******/
            //实现图片的上传
            // 验证图片上传是否成功
            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                // 保存图片,括号内是文件路径，相对storage文件而言
                $path = $request->logo->store('images');
            }
            // 构造向数据库中插入的数组
            $data['logo']=$path;
            // 将数据插入到数据库
            BrandModel::insert($data);
            // 返回js操作弹窗、关闭
            echo "<script type='text/javascript'>alert('添加成功');var index = parent.layer.getFrameIndex(window.name);parent.window.location.href=parent.window.location.href;parent.layer.close(index);</script>";
        }

    }
}
