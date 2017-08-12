<?php
/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-8-10
 * Time: 下午4:50
 */

namespace App\Http\Controllers;


use function MongoDB\BSON\toJSON;

class TableController
{
    /*
     * 返回表格表头数据 json
     * @type 表格类型
     */
    function getHead($type){
        $field1 =['name','g6','g7','g8','g9','gSum'];
        $title1 =['','六级','七级','八级','九级','合计','其中双肩挑'];
        $row1=[3,3,3,3,3,3];
        $col1=[6=>6];
        $field2=[];
        $title2=['高级','一级','二级','小计'];
        $row2=[0,0,0,2];
        $col2=[3,3,2];
        $field3=['s5','s6','s7','s8','s9','s10','s11','s12'];
        $title3=['五级','六级','七级','八级','九级','十级','十一级','十二级'];
        $row3=[0,0,0,2];
        $col3=[3,3,2];
        $i = 0;
        $cols=array();
        $arr=array();
        foreach($title1 as $value){
            $tmp ="{title:'$value'";
            if(isset($field1[$i])){
                $tmp.= ",field:'$field1[$i]'";
            }
            if(isset($row1[$i])){
                $tmp.= ",rowspan:$row1[$i]";
            }
            if(isset($col1[$i])){
                $tmp.= ",colspan:$col1[$i]";
            }
            $arr[]=$tmp."}";
            $i++;
        }
        $cols[]=$arr;
        $i = 0;
        $arr=array();
        foreach($title2 as $value){
            $tmp ="{title:'$value'";
            if(isset($field2[$i])){
                $tmp.= ",field:'$field2[$i]'";
            }
            if(isset($row2[$i])){
                $tmp.= ",rowspan:$row2[$i]";
            }
            if(isset($col2[$i])){
                $tmp.= ",colspan:$col2[$i]";
            }
            $arr[]=$tmp."}";
            $i++;
        }
        $cols[]=$arr;
        $i = 0;
        $arr=array();
        foreach($title3 as $value){
            $tmp ="{title:'$value'";
            if(isset($field3[$i])){
                $tmp.= ",field:'$field3[$i]'";
            }
            if(isset($row3[$i])){
                $tmp.= ",rowspan:$row3[$i]";
            }
            if(isset($col3[$i])){
                $tmp.= ",colspan:$col3[$i]";
            }
            $arr[]=$tmp."}";
            $i++;
        }
        $cols[]=$arr;

        return($cols);



    }

}