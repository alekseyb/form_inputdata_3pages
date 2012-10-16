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

//переменные для подключения и создания базы данных
$hostName = "localhost";        // имя сервера 
$userName = "root";             // пользователь базы данных MySQL  
$passWord = "";                 // пароль для доступа к серверу MySQL  
$dbName = "test";               // название создаваемой базы данных 
$tableName = "Form";			// имя таблицы в базе данных

// массив с данными из формы
$dataForm = array();
$dataName2 = "";
$dataEmail2 = "";
$dataTelephone2 = "";
$dataComment2 = "";

listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                	$dataName2, $dataEmail2, $dataTelephone2, $dataComment2);
/**
 * Функция по выводу данных на экран из базы
 * @param string переменная шаблонизатора
 * @param string переменная с именем сервера
 * @param string переменная с именем пользователя базы данных
 * @param string переменная с паролем для доступа к серверу
 * @param string переменная с именем базы
 * @param string переменная с именем таблицы в базе
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 * @param string переменная с данными из формы
 */
function listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                         $dataName2, $dataEmail2, $dataTelephone2, $dataComment2) {
  $rows = array();
  //подключение к базе
  try {
    $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch (PDOException $e) {
    //вывод ошибки при исключении
	die("DB ERROR: ". $e->getMessage());
  }
  // выборка данных из таблицы
  $STH = $DBH->query("SELECT * FROM $tableName");  
  // устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);  
  // Вывод данных из таблицы на экран
  $dataName [] = "";
  $dataMail [] = "";
  $dataTelephone [] = "";
  $dataComment [] = "";
  while($row = $STH->fetch()) {  
    $dataName [] = $row['Name'];
	$dataMail [] = $row['E-mail'];
	if ($row['Telephone'] == NULL) {
	  $dataTelephone [] = "---";
	} else{
	  $dataTelephone [] = $row['Telephone'];
	}
	if ($row['Comment'] == NULL) {
	  $dataComment [] = "---";
	} else {
	  $dataComment [] = $row['Comment'];
	}
  }
  //отключииться от базы
  $DBH = NULL;
 #$r = mysql_query ("DROP DATABASE $dbName");
  $smarty->assign("name", $dataName);
  $smarty->assign("mail", $dataMail);
  $smarty->assign("telephone", $dataTelephone);
  $smarty->assign("comment", $dataComment);
  $smarty->display("data_tpl.tpl");
}  
?>