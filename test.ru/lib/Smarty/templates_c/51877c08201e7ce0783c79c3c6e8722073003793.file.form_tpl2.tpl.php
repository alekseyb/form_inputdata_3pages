<?php /* Smarty version Smarty-3.1.11, created on 2012-10-23 15:54:19
         compiled from ".\templates\form_tpl2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239215086856b514492-17006539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51877c08201e7ce0783c79c3c6e8722073003793' => 
    array (
      0 => '.\\templates\\form_tpl2.tpl',
      1 => 1350993060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239215086856b514492-17006539',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'formErrors' => 0,
    'error' => 0,
    'name1' => 0,
    'email1' => 0,
    'telephone1' => 0,
    'comment1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5086856b622d42_82302681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5086856b622d42_82302681')) {function content_5086856b622d42_82302681($_smarty_tpl) {?>﻿<html>
<head>
  <meta charset="utf-8" />
  <title>Форма обратной связи</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Форма обратной связи</h1>
<form action="form.php" method="post">
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formErrors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
<p class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
<?php } ?>
 <p class="brown">Имя: <input type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name1']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p class="blue">E-mail: <input type="text" name="email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email1']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p id="c1">Телефон: <input type="text" name="telephone" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['telephone1']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p>Комментарий: <input type="text" name="comment" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment1']->value, ENT_QUOTES, 'UTF-8', true);?>
" /></p>
 <p><input type="submit" name="submit" value="Отправить" /></p>
</form>
</body>
</html>
<?php }} ?>