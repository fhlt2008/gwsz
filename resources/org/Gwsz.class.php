<?php

/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-6-25
 * Time: 下午4:34
 */

use Illuminate\Support\Facades\DB;


class Gwsz
{
    private static $对象;
    private $全体,$管理,$专技,$工勤,$异动出,$异动入,$享受,$双肩挑,$待岗,$未聘,$特聘,$乡村,$函数列表;

    private $单位代码;
    private $单位名称;
    private $核准职数;
    /*
     * 构造函数
     * @param $id  类型array
     * 功能： 初始化岗位类
     */
    private function __construct($id) {
        $this->单位代码 =$id;
        $this->初始化();
    }

    /*
     * 调用接口
     * @param $id 类型array
     *
     *
     */
    static public function getInstance($id){
        if(null==static::$对象){
            static::$对象 = new \Gwsz($id);
        }
        return static::$对象;
    }

    /*
     * 查询相应类别人员ID
     * @param $type 类型：字符串
     * @return 成功返回对应类别人员的id数组
     *
     */
    public function getID($type){
        $func = $type."查询";
        if(method_exists(static::$对象,$type."查询"))//如果存在对应类别的查询函数，则直接返回函数查询结果
            return $this->$func();
        if(in_array($type,$this->函数列表)){//如果请求的为岗位类别，则返回岗位类别查询结果
            return $this->类别查询($type);
        }

        return null;
    }

    private function 初始化(){
        $school = DB::table('school')->where('id',$this->单位代码)->first();
        $this->单位名称=$school;
        $diff = array('id'=>0,'name'=>0,'pid'=>0,'zs'=>0);
        $this->核准职数 = array_diff_key((array)$school,$diff);//返回$diff不存在的键值
        $this->函数列表 = array('管理','工勤','专技');
    }

    private function 类别查询($type,$num = 'all'){
        if(!is_null($this->$type)){
            return $this->$type;
        }

        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('聘任岗位',$type)->get();
        return $this->obj_arr($info);
    }

    private function 特聘查询(){
        if(!is_null($this->特聘)){
            return $this->特聘;
        }

        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where(function($query){
            $query->orWhere('编号','like','%特%')->orWhere('本等级聘任时间','like','%特%');
        })->get();
        return $this->obj_arr($info);
    }

    private function 乡村查询(){
        if(!is_null($this->乡村)){
            return $this->乡村;
        }

        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where(function($query){
            $query->orWhere('编号','like','%特%')->orWhere('本等级聘任时间','like','%特%');
        })->get();
        return $this->obj_arr($info);
    }

    private function 异动出查询(){
        if(!is_null($this->异动出)){
            return $this->异动出;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where(function($query){
            $query->where('其他需要补充说明的事项','like','%退休%')->orWhere('其他需要补充说明的事项','like','%往%')->orWhere('其他需要补充说明的事项','like','%出%')->orWhere('其他需要补充说明的事项','like','%除%')->orWhere('其他需要补充说明的事项','like','%辞%');
        })->get();
        return $this->obj_arr($info);

    }

    private function 异动入查询(){
        if(!is_null($this->异动入)){
            return $this->异动入;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('其他需要补充说明的事项','like','%入%')->get();
        return $this->obj_arr($info);

    }

    private function 双肩挑查询(){
        if(!is_null($this->双肩挑)){
            return $this->双肩挑;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('是否双肩挑','like','%是%')->get();
        return $this->obj_arr($info);

    }

    private function 待岗查询(){
        if(!is_null($this->待岗)){
            return $this->待岗;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%待%')->get();
        return $this->obj_arr($info);
    }

    private function 未聘查询(){
        if(!is_null($this->未聘)){
            return $this->未聘;
        }
        $info = DB::table('info')->select('id')->whereIn('编制所在单位全称',$this->单位代码)->where('本等级聘任时间','like','%未聘%')->get();
        return $this->obj_arr($info);
    }

    private function 享受查询(){
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

    public function getZS(){
        return $this->核准职数;
    }









}