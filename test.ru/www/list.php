<?php
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
function listData() {
  global $smarty;
  global $dataName2;
  global $dataEmail2;
  global $dataTelephone2;
  global $dataComment2;
  global $DBH;
  global $tableName;
  $rows = array();
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
  $smarty->assign("name", $dataName);
  $smarty->assign("mail", $dataMail);
  $smarty->assign("telephone", $dataTelephone);
  $smarty->assign("comment", $dataComment);
  $smarty->display("list.tpl");
}  
#$r = mysql_query ("DROP DATABASE $dbName");