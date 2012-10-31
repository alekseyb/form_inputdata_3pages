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
  global $DBH;
  global $tableName;
  $rows = array();
  // выборка данных из таблицы
  $STH = $DBH->query("SELECT * FROM $tableName");  
  // устанавливаем режим выборки
  $STH->setFetchMode(PDO::FETCH_ASSOC);  
  // Вывод данных из таблицы на экран
  while($row = $STH->fetch()) {  
    $rows[] = $row;
  }
  //отключииться от базы
  $DBH = NULL;
  $smarty->assign("list", $rows);
  $smarty->display("list.tpl");
}  
#$r = mysql_query ("DROP DATABASE $dbName");