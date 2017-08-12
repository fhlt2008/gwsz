<?php
/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-7-12
 * Time: 下午1:00
 */
namespace App\Http\Controllers;
require_once 'resources/org/Department.class.php';

Class IndexController extends Controller{
    public function index(){
        $data=array();
        $name = session('data')['name'];
        $data['title'] = ['title'=>'控制台'];
        $data['navbar'] = [
            'title'=>'岗位设置管理系统',//导航栏标题
            'name'=>"$name",//管理员姓名
            'task'=>['职数信息'=>100,'人员信息'=>80,'管理员信息'=>50],//任务信息：名称->完成率
            'notify'=>['异动办理'=>1,'上交材料'=>2],//通知：内容->条数
            'message'=>['管理员'=>'欢迎大家使用!']//消息:发送者->内容
        ];
        try {
            $obj = \Department::getInstance((array)59);
            $data["hgl"] = $obj->getPost("核准职数","管理");
            $data["hzj0"] = $obj->getPost("核准职数","专技",[4]);
            $data["hzj1"] = $obj->getPost("核准职数","专技",[5,6,7]);
            $data["hzj2"] = $obj->getPost("核准职数","专技",[8,9,10]);
            $data["hzj3"] = $obj->getPost("核准职数","专技",[11,12]);
            $data["hgq"] = $obj->getPost("核准职数","工勤");
            $data["pgl"] = $obj->getPost("聘用情况","管理");
            $data["psjt"] = $obj->getPost("聘用情况","双肩挑");
            $data["pzj0"] = $obj->getPost("聘用情况","专技",[4]);
            $data["pzj1"] = $obj->getPost("聘用情况","专技",[5,6,7]);
            $data["pzj2"] = $obj->getPost("聘用情况","专技",[8,9,10]);
            $data["pzj3"] = $obj->getPost("聘用情况","专技",[11,12,13]);
            $data["pgq"] = $obj->getPost("聘用情况","工勤");
            return view('index',$data);
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }

    }

}
