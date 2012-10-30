<?php /* Smarty version Smarty-3.1.11, created on 2012-10-30 10:04:53
         compiled from ".\templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2084450892be8e32216-93653097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325c040ac3eb2e57c3cb2db39552570ef3cca8a8' => 
    array (
      0 => '.\\templates\\main.tpl',
      1 => 1350996566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2084450892be8e32216-93653097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50892be931e4b3_03468109',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50892be931e4b3_03468109')) {function content_50892be931e4b3_03468109($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Меню с выбором варианта</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Выбор варианта</h1>
<form action="index.php" method="get">
 <p><input type="submit" name="page" value="Заполнить форму" /></p>
 <p><input type="submit" name="page" value="Список сообщений" /></p>
</form>
</body>
</html><?php }} ?>