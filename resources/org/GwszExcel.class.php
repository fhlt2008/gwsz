<?php
class GwszExcel extends \PHPExcel_IOFactory {
    private $excelObj;
    public $workBook;
    public $workSheet;
    private $highestColumn;
    private $highestRow;
    private $activeCell;
    function __construct($filename)
    {

        try {
            $this->excelObj = static::createReaderForFile($filename);
            $this->workBook = $this->excelObj->load("$filename");
        }catch(\Exception $e){
            echo $e->getMessage();
            dd( "模板文件不可读，请检查文件名及路径是否正确！");
            return 0;
        }
        return 1;
    }

    function setWorkSheet(int $index=0){
        $this->workSheet = $this->workBook->getSheet($index);
        $this->highestColumn = $this->workSheet->getHighestColumn();
        $this->highestRow = $this->workSheet->getHighestRow();
        $this->activeCell =$this->workSheet->getActiveCell();
    }

    /*
     * 设置单元格对齐
     * @horizontal 水平对齐方式：left center right
     * @vertical 垂直对齐方式：top center bottom
     * @cell 单元格 "a1" "a1:c1"
     *
     */
    function setAlignment(string $horizontal='general',string $vertical='bottom',string $cell=null){

       $this->activeCell=$this->workSheet->setSelectedCells($cell);

       $tmp =  $this->workSheet->getStyle($cell)->getAlignment();

       $tmp->setHorizontal($horizontal);
       $tmp->setVertical($vertical);
    }

    /*
     * 设置单元格边框
     * @线型 \PHPExcel_Style_Borders
     * @位置 上下左右所有
     * @单元格  "a1" "a1:a2"
     */
    function 设置边框(string $线型,string $位置,string $单元格){
        if($单元格=='所有'){
            $cell = 'A1:'.$this->highestColumn.$this->highestRow;
        }else{
            $cell = $单元格;
        }
        $this->activeCell = $this->workSheet->getCell($cell);
        $tmp =  $this->activeCell->getStyle()->getBorders();
        switch ($位置){
            case '上':
                $tmp->getTop()->setBorderStyle("$线型");
                break;
            case '下':
                $tmp->getBottom()->setBorderStyle("$线型");
                break;
            case '左':
                $tmp->getLeft()->setBorderStyle("$线型");
                break;
            case '右':
                $tmp->getRight()->setBorderStyle("$线型");
                break;
            default:
                $tmp->getAllBorders()->setBorderStyle("$线型");

        }

    }
    /*
     * 设置行高
     * @行号
     * @数值
     */
    function 设置行高(int $行号,int $数值){
        $this->workSheet->getRowDimension($行号)->setRowHeight($数值);
    }

    /*
 * 设置列宽
 * @列号
 * @数值
 */
    function 设置列宽(string $列标,int $数值){
        $this->workSheet->getColumnDimension($列标)->setWidth($数值);
    }
    /*
     * 合并单元格
     * @单元格
     *
     */
    function 合并单元格($cell){
        $this->workSheet->mergeCells($cell);
    }

    /*
     * 页面设置
     * @纸张方向

     *
     */
    function 页面设置($纸张方向){
        $this->workSheet->getPageSetup()->setOrientation('纸张方向');


    }

    /*
     * 页面设置
     * @位置
     * @边距

     *
     */
    function 设置页边距($位置,$边距){
        $tmp =$this->workSheet->getPageMargins();
        switch ($位置){
            case '上':
                $tmp->getTop($边距);
                break;
            case '下':
                $tmp->getBottom($边距);
                break;
            case '左':
                $tmp->getLeft($边距);
                break;
            case '右':
                $tmp->getRight($边距);
                break;
            default:


        }



    }
    /*
     * 修改单位格数据
     * @cell 单元格
     * @value 值
     *
     */
    function 修改单元格数据($cell,$value){
        $this->workSheet->setCellValue($cell,$value);

    }





}