<?php
// Установки Smarty
require_once('..\lib\Smarty\libs\Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '..\lib\Smarty\templates';
$smarty->compile_dir = '..\lib\Smarty\templates_c';
$smarty->config_dir = '..\lib\Smarty\configs';
$smarty->cache_dir = '..\lib\Smarty\cache';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'Заполнить форму') {
      include 'form.php';
    } elseif ($_GET['page'] == 'Список сообщений') {
      include 'data.php';
    } 
  } else {
    mainForm($smarty);
  }

/**
 * Функция по выводу на экран шаблона с данными из базы
 * @param string переменная шаблонизатора
*/
function mainForm($smarty) {
  $smarty->display("form_tpl.tpl");
}
?>
