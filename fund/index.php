<?php
/**
 * @name index
 * @desc 入口文件
 * @author mumingv@163.com
 */
$objApplication = Bd_Init::init();
$objResponse = $objApplication->bootstrap()->run();
