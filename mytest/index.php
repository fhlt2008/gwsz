<?php
/**
 * Created by PhpStorm.
 * User: otb
 * Date: 17-6-5
 * Time: 下午1:34
 */
include_once './Code.class.php';

$vc = new Code();
$vc->doimg();
echo $vc->getCode();