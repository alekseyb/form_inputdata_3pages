<?php /* Smarty version Smarty-3.1.11, created on 2012-10-23 15:53:12
         compiled from ".\templates\form_tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1563650868528bea482-04720153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abb0fa6b954a8948d232a4aabfdca75b116b39b1' => 
    array (
      0 => '.\\templates\\form_tpl.tpl',
      1 => 1350992966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1563650868528bea482-04720153',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50868528c516a5_71104033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50868528c516a5_71104033')) {function content_50868528c516a5_71104033($_smarty_tpl) {?>﻿<html>
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