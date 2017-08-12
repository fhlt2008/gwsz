<?php
/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-7-11
 * Time: 下午1:09
 */
namespace App\Http\Controllers;

use App\Http\Models\info;
require_once 'resources/org/Personnel.class.php';

class PersonnelController extends Controller{


    /*
     * 根据条件获取人员信息
     * @id 单位代码
     * @type 岗位类别
     * $level 岗位级别
     *
     */
    public function index($id,$type,$level=0)
    {
        if(stripos($level,",")) {
            $level = explode(",", $level);
        }
        $obj = \Department::getInstance((array)$id);
        $sid = $obj->getData($type,$level);
        $data = info::all()->whereIn('id', $sid);
        $data=$data->toArray();
        $json=array();
        foreach ($data as $key =>$value){
            array_push($json,$value);
        }
        return (json_encode($json));
    }

    public function setInfo($id,$data){
        $obj =\Personnel::getInstance($id);
        return $obj->setInfo($data);

    }
}