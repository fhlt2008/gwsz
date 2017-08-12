<?php

/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-7-10
 * Time: 上午9:04
 */

use App\Http\Models\school;
use App\Http\Models\info;
use App\Http\models\admin;
use Illuminate\Support\Facades\DB;

class Department
{



    private static $对象;
    private $全体,$管理,$普岗,$工勤,$异动出,$异动入,$享受,$双肩挑,$待岗,$未聘,$特聘,$乡村,$函数列表;

    private $单位代码;
    private $单位名称;
    private $核准职数;
    private $聘用情况;


    public static function getInstance($id){
        if(null==static::$对象){
            static::$对象 = new \Department($id);
        }
        return static::$对象;

    }

    //设置岗位
    /*
     * 设置岗位
     * @param $data赋值数组
     *
     * @return 失败0,成功则返回数组。
     */


    public function setPost($data){
        /*foreach ($data as $item =>$value){
            if(array_key_exists($item,$this->post) && $this->post["$item"]!=$value){
                $requert = school::where('id',$this->code)->update(["$item"=>"$value"]);
            }
        }*/

        if(is_array($data)){
            $requert = school::where('id',$this->单位代码)->update($data);
        }
        if ($requert){

            return true;
        }
        else{
            return false;
        }
    }




    //查询岗位数据
    public function getPost($query,$type="所有",$level=null){

        $tmp ="";
        switch ($type){
            case "管理":
                $tmp .= "g";
                break;
            case "双肩挑":
                $tmp .= "s";
                break;
            case "普岗":
                $tmp = "p";
                break;
            case "特聘":
                $tmp = "t";
                break;
            case "乡村":
                $tmp = "x";
                break;
            case "工勤":
                $tmp = "j";
                break;
            case "专技":
                $tmp ="[ptx]";
                break;
            default:
                $tmp ="\w";
        }

        if (is_array($level)){
            $tmp .="(";
            foreach($level as $value){
                $tmp.=$value."|";
            }
            $tmp = rtrim($tmp,"|");
            $tmp.=")";
        }else{
            if($level == 0){
                $tmp .="\d*";
            }else{
                $tmp .=$level;
            }
        }
        $data = array();
        foreach ($this->$query as $item =>$value){
            if(preg_match("/".$tmp."/",$item)){
                $data["$item"]=is_array($value)?count($value):$value;
            }
        }
        return $data;

    }


    /*
     * 获取单位人员信息
     * @param
     *
     * @return 人员信息ID
     *
     */
    public function getData($type="所有",$level=null){

        $tmp ="";
        switch ($type){
            case "管理":
                $tmp .= "g";
                break;
            case "双肩挑":
                $tmp .= "s";
                break;
            case "普岗":
                $tmp = "p";
                break;
            case "特聘":
                $tmp = "t";
                break;
            case "乡村":
                $tmp = "x";
                break;
            case "工勤":
                $tmp = "j";
                break;
            case "专技":
                $tmp ="[ptx]";
                break;
            default:
                $tmp ="\w";
        }

        if (is_array($level)){
            $tmp .="(";
            foreach($level as $value){
                $tmp.=$value.'|';
            }
            $tmp = rtrim($tmp,'|');
            $tmp.=")";
        }else{
            if($level == 0){
                $tmp .="\d*";
            }else{
                $tmp .=$level;
            }
        }
        $data = array();
        foreach ($this->聘用情况 as $item =>$value){
            if(preg_match("/".$tmp."/",$item)){
                $data = array_merge($data,$value);
            }
        }
        return $data;

    }






    private function __construct($id)
    {
        $this->单位代码 =$id;
        $this->初始化();
    }

    private function 初始化(){

        $data = school::where('id',$this->单位代码)->first();
        $diff = array('id'=>0,'name'=>0,'pid'=>0,'sm'=>0);
        $this->核准职数 = array_diff_key($data->toArray(),$diff);
        $num=array("g6","g7","g8","g9","s5","s6","s7","s8","s9","s10","s11","s12","p4","p5","t5","x5","p6","t6","x6","p7","t7","x7","p8","t8","x8","p9","t9","x9","p10","t10","x10","p11","p12","p13","j2","j3","j4","j5","j6");
        $arr = array();
        foreach($num as $item){
            $type = preg_replace("/\d*/","",$item);
            $level = preg_replace("/[a-z]/","",$item);
            switch ($type){
                case "g":
                    $tmp = $this->管理查询($level);
                    break;
                case "s":
                    $tmp = $this->双肩挑查询($level);
                    break;
                case "p":
                    $tmp = $this->普岗查询($level);
                    break;
                case "t":
                    $tmp = $this->特聘查询($level);
                    break;
                case "x":
                    $tmp = $this->乡村查询($level);
                    break;
                default:
                    $tmp = $this->工勤查询($level);
                    break;
            }
            $arr["$item"] = $tmp;
        }
        $this->聘用情况=$arr;
          $this->单位名称=$data['name'];
    }

    /*
     *
     * 根据岗位类别进行查询
     * @param $type [管理、专技、工勤]
     */
    private function 管理查询($level=null){
        /*
         *
         *
         *
         */
        if (!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('聘任岗位',"管理")->where("聘任等级",$level)->get();
            return $this->obj_arr($info);
        }//如果查询岗位级别则构建新查询

        if(!is_null($this->管理)){
            return $this->管理;
        }//如果已经存在所需查询，则直接返回

        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('聘任岗位',"管理")->get();
        $this->管理=$this->obj_arr($info);
        return $this->管理;
    }
    private function 工勤查询($level=null){
        /*
         *
         *
         *
         */
        if (!is_null($level)){
            if($level<6){
                $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('聘任岗位',"工勤")->where("聘任等级",$level)->get();
            }
            else{
                $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('聘任岗位',"工勤")->where("聘任等级","like",'%普%')->get();
            }
            return $this->obj_arr($info);
        }//如果查询岗位级别则构建新查询

        if(!is_null($this->工勤)){
            return $this->工勤;
        }//如果已经存在所需查询，则直接返回

        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('聘任岗位',"工勤")->get();
        $this->工勤=$this->obj_arr($info);
        return $this->工勤;
    }

    private function 特聘查询($level=null){
        if (!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where("聘任等级",$level)->where('编号','like','%特%')->get();
            return $this->obj_arr($info);
        }
        if(!is_null($this->特聘)){
            return $this->特聘;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('编号','like','%特%')->get();
        $this->特聘=$this->obj_arr($info);
        return $this->特聘;
    }

    private function 乡村查询($level=null){
        if (!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where("聘任等级",$level)->where('编号','like','%乡%')->get();
            return $this->obj_arr($info);
        }
        if(!is_null($this->乡村)){
            return $this->乡村;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('编号','like','%乡%')->get();
        $this->乡村= $this->obj_arr($info);
        return $this->乡村;
    }

    private function 普岗查询($level=null){
        if (!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where("聘任等级",$level)->where("聘任岗位",'专技')->where('编号','>',0)->get();
            return $this->obj_arr($info);
        }
        if(!is_null($this->普岗)){
            return $this->普岗;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('编号','>',0)->where("聘任岗位",'专技')->get();
        $this->普岗= $this->obj_arr($info);
        return $this->普岗;
    }

    //以上函数已更新级别查询

    private function 异动出查询($level=null){
        if(!is_null($this->异动出)){
            return $this->异动出;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where(function($query){
            $query->where('其他需要补充说明的事项','like','%退休%')->orWhere('其他需要补充说明的事项','like','%往%')->orWhere('其他需要补充说明的事项','like','%出%')->orWhere('其他需要补充说明的事项','like','%除%')->orWhere('其他需要补充说明的事项','like','%辞%');
        })->get();
        $this->异动出=$this->obj_arr($info);
        return $this->异动出;
    }

    private function 异动入查询(){
        if(!is_null($this->异动入)){
            return $this->异动入;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('其他需要补充说明的事项','like','%入%')->get();
        $this->异动入=$this->obj_arr($info);
        return $this->异动入;

    }

    private function 双肩挑查询($level=null){
        if (!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('是否双肩挑','like','%是%')->where('已享专技待遇',$level)->get();
            return $this->obj_arr($info);
        }

        if(!is_null($this->双肩挑)){
            return $this->双肩挑;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('是否双肩挑','like','%是%')->get();
        if ($level){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('是否双肩挑','like','%是%')->get();
            return $this->obj_arr($info);
        }
        $this->双肩挑 = $this->obj_arr($info);
        return  $this->双肩挑;

    }

    private function 待岗查询($level=null){
        if(!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%待%')->where("聘任等级",$level)->get();
            return $this->obj_arr($info);
        }
        if(!is_null($this->待岗)){
            return $this->待岗;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%待%')->get();
        $this->待岗=$this->obj_arr($info);
        return $this->待岗;
    }

    private function 未聘查询($level=null){

        if(!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%未%')->where("聘任等级",$level)->get();
            return $this->obj_arr($info);
        }

        if(!is_null($this->未聘)){
            return $this->未聘;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%未%')->get();
        $this->未聘= $this->obj_arr($info);
        return $this->未聘;
    }

    private function 享受查询($level=null){
        if(!is_null($level)){
            $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%享%')->where("聘任等级",$level)->get();
            return $this->obj_arr($info);
        }

        if(!is_null($this->享受)){
            return $this->双肩挑;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%享%')->get();
        return $this->obj_arr($info);
    }

    private function 全体查询(){
        if(!is_null($this->全体)){
            return $this->全体;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->get();
        return $this->obj_arr($info);
    }

    private function obj_arr($obj){
        $data = array();
        foreach($obj as $value){
            foreach($value as $j){
                $data[] = $j;
            }
        }
        // dump($data);
        return $data;
    }




}