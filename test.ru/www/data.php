<?php
// ��������� Smarty
require_once('..\lib\Smarty\libs\Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '..\lib\Smarty\templates';
$smarty->compile_dir = '..\lib\Smarty\templates_c';
$smarty->config_dir = '..\lib\Smarty\configs';
$smarty->cache_dir = '..\lib\Smarty\cache';

ini_set('display_errors', 1);
error_reporting(E_ALL);

//���������� ��� ����������� � �������� ���� ������
$hostName = "localhost";        // ��� ������� 
$userName = "root";             // ������������ ���� ������ MySQL  
$passWord = "";                 // ������ ��� ������� � ������� MySQL  
$dbName = "test";               // �������� ����������� ���� ������ 
$tableName = "Form";			// ��� ������� � ���� ������

// ������ � ������� �� �����
$dataForm = array();
$dataName2 = "";
$dataEmail2 = "";
$dataTelephone2 = "";
$dataComment2 = "";

listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                	$dataName2, $dataEmail2, $dataTelephone2, $dataComment2);
/**
 * ������� �� ������ ������ �� ����� �� ����
 * @param string ���������� �������������
 * @param string ���������� � ������ �������
 * @param string ���������� � ������ ������������ ���� ������
 * @param string ���������� � ������� ��� ������� � �������
 * @param string ���������� � ������ ����
 * @param string ���������� � ������ ������� � ����
 * @param string ���������� � ������� �� �����
 * @param string ���������� � ������� �� �����
 * @param string ���������� � ������� �� �����
 * @param string ���������� � ������� �� �����
 */
function listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                         $dataName2, $dataEmail2, $dataTelephone2, $dataComment2) {
  $rows = array();
  //����������� � ����
  try {
    $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch (PDOException $e) {
    //����� ������ ��� ����������
	die("DB ERROR: ". $e->getMessage());
  }
  // ������� ������ �� �������
  $STH = $DBH->query("SELECT * FROM $tableName");  
  // ������������� ����� �������
  $STH->setFetchMode(PDO::FETCH_ASSOC);  
  // ����� ������ �� ������� �� �����
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
  //������������ �� ����
  $DBH = NULL;
 #$r = mysql_query ("DROP DATABASE $dbName");
  $smarty->assign("name", $dataName);
  $smarty->assign("mail", $dataMail);
  $smarty->assign("telephone", $dataTelephone);
  $smarty->assign("comment", $dataComment);
  $smarty->display("data_tpl.tpl");
}  
?>