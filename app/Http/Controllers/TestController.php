<?php

namespace App\Http\Controllers;


use App\Http\Models\info;
use Illuminate\Support\Facades\Schema;
use Excel;
use function MongoDB\BSON\toJSON;

require_once 'resources/org/Department.class.php';
require_once 'resources/org/GwszExcel.class.php';

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function index($code){
        //$i = $code;

        $tmp = new \GwszExcel('change.xlsx');
        $tmp->setWorkSheet();
        $tmp->修改单元格数据('a1',"编号：29");

/*        $tmp->setAlignment('center','center','a1:j17');


        $row = [1=>30,2=>13.5,3=>22.5,16=>81,17=>52.5];
        $row1=[4,5,6,7,8,9,10,11,12,13,14,15];

        foreach ($row as $key =>$value){
            $tmp->设置行高($key,$value);
        }

        foreach ($row1 as $key){
            $tmp->设置行高($key,24);
        }

       $col = [5.1,13,5.1,20,16,13.38,12.13,20,12.75,16];

       $key = 65;

       foreach ($col as $value){
           $tmp->设置列宽(chr($key++),$value);
       }

       $merger=["a1:i1","a2:j2","a3:b3","c3:d3","a4:a5","b4:b5","c4:c5","d4:d5","e4:e5","f4:g4","h4:h5","i4:i5","j4:j5","a16:c16","d16:e16","f16:g16","h16:j16","a17:b17","c17:j17"];
       foreach ($merger as $value){
           $tmp->合并单元格($value);
       }*/
        dump($tmp->workSheet);

       $writer = $tmp::createWriter($tmp->workBook,'Excel2007');
       $writer->save('test2.xlsx');















   }



    private function readSheetChange($vc){


        $book = $vc->load($_SERVER['DOCUMENT_ROOT'].'/change.xlsx');
        $sheet0 = $book->getSheet(0);

        $all = $sheet0->getStyle('a1:j17');

        $allAlignment=$all->getAlignment();
        $allAlignment->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $allAlignment->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $row = [1=>30,2=>13.5,3=>22.5,16=>81,17=>52.5];
        $col = [5.1,13,5.1,20,16,13.38,12.13,20,12.75,16];
        $row1=[4,5,6,7,8,9,10,11,12,13,14,15];
        $merger=["a1:i1","a2:j2","a3:b3","c3:d3","a4:a5","b4:b5","c4:c5","d4:d5","e4:e5","f4:g4","h4:h5","i4:i5","j4:j5","a16:c16","d16:e16","f16:g16","h16:j16","a17:b17","c17:j17"];
        foreach($row1 as $value){
            $sheet0->getRowDimension($value)->setRowHeight(24);
        }
        foreach($row as $key=>$value){
            $sheet0->getRowDimension($key)->setRowHeight($value);
        }
        $asc =65;
        foreach($col as $value){
            $sheet0->getColumnDimension(chr($asc++))->setWidth($value);
        }
        foreach ($merger as $value){
            $sheet0->mergeCells("$value");
        }
        $sheet1 = $book->getSheet(1);

        $col1=[4,8,4,19,11,14,18,5,7,5,8,16];
        $merger1=["a1:k1","a2:l2","a3:c3","h3:i3","j3:k3","a16:c16","d16:f16","g16:h16","i16:l16","a17:b17","c17:l17"];


        $margin = 1.5 / 2.54;   //phpexcel 中是按英寸来计算的,所以这里换算了一下

        //$sheet0->getPageMargins()->setTop($margin);       //上边距
        //$sheet0->getPageMargins()->setBottom($margin); //下
        $sheet0->getPageMargins()->setLeft($margin);      //左
        $sheet0->getPageMargins()->setRight($margin);    //右

        $sheet0->setTitle("otb7");
        $sheet0->getPageSetup()->setOrientation(\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        $sheet0->getStyle("a1")->getFont()->setSize(20);
        $sheet0->getStyle("a4:j16")->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);
        $sheet0->getStyle('c17')->getAlignment()->setWrapText(true);
        $sheet0->getStyle('c17')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $sheet0->getStyle('j1')->getFont()->setBold(true);






        $txt = rtrim($sheet0->getCell('j1')->getValue()).'  59  ';
        $sheet0->setCellValue('j1',$txt);
        $sheet0->getStyle('j1')->getFont()->setUnderLine(true);
        echo "<pre>";
       dump($txt);
        echo "</pre>";


        //dd(get_class_methods($sheet0->getStyle("a1")-->getFont()->setSize(12)));
        //dd(get_class_methods($book));
        $objWriter = \PHPExcel_IOFactory::createWriter($book, 'Excel2007');
        $filename = 'z20.xlsx';
        $objWriter->save($filename);



    }

    private function readSheet1($vc,$code){
        $arrNumber = array(0,6,7,8,9,10,11,12,13,14,15,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,35,36,37,38,39,40,41,42,43,44,45,46,47);
        $book = $vc->load($_SERVER['DOCUMENT_ROOT'].'/excel/'.$code.'.xlsx');
        $sheet=$book->getSheet(1);
        $row = $sheet->getHighestDataRow();
        $data = array();
        for ($i = 6;$i<=$row;$i++)
        {
            $t = $sheet->getCellByColumnAndRow(12,$i);
            if(!null==$t->getValue()){

                $value = array();
                foreach($arrNumber as $j){
                    $tmp = $sheet->getCellByColumnAndRow($j,$i);
                    $value[$j] = $tmp->isFormula()?$tmp->getCalculatedValue():$tmp->getValue();
                }
                $data[$i-1]= $value;

            }
        }
        return $data;
    }

    private function readSheet0($vc,$code){
        $arrNumber = array(2,3,4,15,16,17,18,20,21,22,24,25,26,29,30,31,33,34,35,37,38,39,42,43,49,50,51,52,53,55);
        $book = $vc->load($_SERVER['DOCUMENT_ROOT'].'/excel/'.$code.'.xlsx');
        $sheet=$book->getSheet(0);
        $row = array(7,8,9);
        $data = array();
        foreach ($row as $i)
        {
            $t = $sheet->getCellByColumnAndRow(0,3);
            if(!null==$t->getValue()){

                $value = array();
                foreach($arrNumber as $j){
                    $tmp = $sheet->getCellByColumnAndRow($j,$i);
                    try{
                        $value[$j] = $tmp->isFormula()?$tmp->getCalculatedValue():$tmp->getValue();
                        //dd($value);
                    }
                    catch(\Exception $e){
                        $value[$j] = $e->getMessage();
                    }

                }
                $data[$i-1]= $value;

            }
        }
        return $data;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dbTable($id,$name,$level=0)
    {
        if(stripos($level,",")) {
            $level = explode(",", $level);
        }
        $obj = \Department::getInstance((array)$id);
        $sid = $obj->getData($name,$level);
        $data = info::all()->whereIn('id', $sid);
        $data=$data->toArray();
        $json=array();
        foreach ($data as $key =>$value){
            array_push($json,$value);
        }
        return (json_encode($json));
    }

    public function show($type)
    {
        /*try{
            $type=(array)$type;
            $code = \Gwsz::getInstance($type);
           echo count($code->getID('全体'))."名册总数<br>";
            echo count($code->getID('管理'))."管理岗<br>";
            echo count($code->getID('双肩挑'))."其中双肩挑<br>";
            echo count($code->getID('专技'))."专技<br>";
            echo count($code->getID('工勤'))."工勤<br>";
            echo count($code->getID('异动出'))."不在编<br>";
            dump($code->getZS());

        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }*/
    }
    public function datainfo(){
        dd($_POST[row]);
    }



}
