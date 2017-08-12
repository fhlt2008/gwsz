<?php

/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-7-10
 * Time: 上午8:58
 * 人员类
 * 属性
 */
use App\Http\Models\info;

class Personnel
{
    private static $obj;
    private $id;

    private function __construct($id)
    {
        $this->id=$id;
    }

    /*
     * 全局静态方法，获取对象实例
     *
     * @param $id为对象ID
     *
     **/
    static public function getInstance($id){
        if(static::$obj==null){
            static::$obj=new \Personnel($id);
        }
        return static::$obj;
    }

    public function  getInfo(){
        $data = info::where("id",$this->id)->first();
        return $data->toArray();
    }


    public function setInfo($data){
        $request = info::where('id',$this->id)->update($data);
        if($request){
            return true;
        }
        else{
            return false;
        }




    }

}