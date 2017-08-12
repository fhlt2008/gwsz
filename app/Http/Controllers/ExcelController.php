<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
class ExcelController extends Controller
{
    //Excel文件导出功能 By Laravel学院
    public function export(){
        //设置页面
        setPageSetup();
        //设置页边距
        setPageMargins();
        //设置页脚页眉
        setHeaderFooter();
        //设置单元格格式


            //设置字体
        setStyleFont();
            //设置填充
        setStyleFill();
            //设置边框
        setStyleBorders();
            //设置对齐
        setStyleAlignment();
            //设置数据格式
        setStyleNumberFormat();
            //设置保护
        setStyleProtection();
    }
    /*
     * @导入Excel文件
     *
     */
    public function import(){
        $filePath = '1.xlsx';
        echo $filePath;
        Excel::load('z9.xlsx', function($reader) {

            // Getting all results
            $results = $reader->get();

            // ->all() is a wrapper for ->get() and will work the same
            $results = $reader->all();
            echo "<pre>";
            print_r($results);
            echo "</pre>";

        });
    }
    private function setPages($obj,$page,$margin){


    }

}