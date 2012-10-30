<?php /* Smarty version Smarty-3.1.11, created on 2012-10-23 15:54:16
         compiled from ".\templates\data_tpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:161525086856820d3a7-21418201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daae75c83ae0270be345a97d2c3c207506c7568b' => 
    array (
      0 => '.\\templates\\data_tpl.tpl',
      1 => 1350993076,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161525086856820d3a7-21418201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'key' => 0,
    'mail' => 0,
    'telephone' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_508685682f1ec0_28075137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508685682f1ec0_28075137')) {function content_508685682f1ec0_28075137($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Просмотр данных</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Просмотр данных</h1>
<table>
   <tr align="center" bgcolor="#AAAAAACC">
    <td colspan="3" style="font-size: 100%; font-family: sans-serif">Имя</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">E-mail</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">Телефон</td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif">Комментарии</td>
   </tr>
   <tr>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['name']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
    <?php } ?></td>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
	<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
	<?php } ?></td>
    <td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['telephone']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
<?php } ?></td>
	<td colspan="3" style="font-size: 100%; font-family: sans-serif"><?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value){
$_smarty_tpl->tpl_vars['key']->_loop = true;
?>
<p><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</p>
<?php } ?></td>
   </tr>
   
  </table>

</body>
</html>
<?php }} ?>