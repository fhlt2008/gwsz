<?php
/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-7-10
 * Time: 上午9:37
 */
namespace App\Http\Controllers;
require_once 'resources/org/Department.class.php';

class DepartmentController extends Controller{

    /*
     * 岗位查询
     * @id 单位ID
     * @query 查询类别：核准职数/聘用情况
     * @type 岗位类别:工勤/专技/管理
     * @level 岗位级别
     */
    function index($id,$query,$type="全体",$level=null){
        try {
            $obj = \Department::getInstance((array)$id);
            dd($obj->getPost($query,"$type",$level));
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function query($id,$type="所有",$level=null,$categray=null){
        $obj = \Department::getInstance((array)$id);
        $data =$obj->getPost($type,$level,$categray);
        echo array_sum($data);
        dd($data);
    }

}
