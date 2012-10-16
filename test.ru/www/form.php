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
// ������ � ����������� �� ������
$formErrors = array();
//���������� ��� ����
$dataName2 = "";
$dataEmail2 = "";
$dataTelephone2 = "";
$dataComment2 = "";

 //������� �� �������� ����������� ���� �� ������ ������ "���������" � �����
if (isset($_POST['submit'])) {
  $dataForm['telephone1'] = $_POST['telephone'];
  $dataForm['comment1'] = $_POST['comment'];
  $dataForm['email1'] = $_POST['email'];
  $dataForm['name1'] = $_POST['name'];
  $dataName2 = $dataForm['name1'];
  $dataEmail2 = $dataForm['email1'];
  $dataTelephone2 = $dataForm['telephone1'];
  $dataComment2 = $dataForm['comment1'];
  // ������� �� �������� ����������� ���� �� ������� ������ � ���� ��� � �����
  if (empty($_POST['name']) && empty($_POST['email'])) {
    $formErrors[] = "�� �� ��������� ���� ��� � E-mail";
	formInput($smarty, $dataForm, $formErrors);
    // ������� �� �������� ������������ ���� �� ������� ������ � ���� ���
  } elseif (empty($_POST['name'])) {
    $formErrors[] = "�� �� ��������� ���� ���";
	formInput($smarty, $dataForm, $formErrors);
    // ������� �� �������� ������������ ���� �� ������� ������ � ���� �����
  } elseif (empty($_POST['email'])) {
    $formErrors[] = "�� �� ��������� ���� E-mail";
	formInput($smarty, $dataForm, $formErrors);
  } elseif (!empty($_POST['name']) && !empty($_POST['email'])) {
    $formInput=0;
    $message = sendMessage($dataForm);
    // ���������� ���������
    logMessage($message);
	addData ($hostName, $userName, $passWord, $dbName, $tableName,
             $dataName2, $dataEmail2, $dataTelephone2, $dataComment2);
  }
} else {
  $dataForm['telephone1'] = "";
  $dataForm['comment1'] = "";
  $dataForm['email1'] = "";
  $dataForm['name1'] = "";
  if (isset($_GET['page'])) {
    if ($_GET['page'] == '��������� �����') {
      formInput($smarty, $dataForm, $formErrors);
    } elseif ($_GET['page'] == '������ ���������') {
      listData($smarty, $hostName, $userName, $passWord, $dbName, $tableName,
                	$dataName2, $dataEmail2, $dataTelephone2, $dataComment2);
    } 
  } else {
    mainForm($smarty);
  }
}

/**
 * ������� �� ����� ������ � �����
 * @param string ���������� �������������
 * @param array ������ � �������
 * @param string �������������� ���������� ��� ������ ������ �� �����
 * @param array ������ � ��������
 */
function formInput($smarty, $dataForm, $formErrors) {
  extract($dataForm, EXTR_SKIP);
  $smarty->assign("name1", $name1);
  $smarty->assign("email1", $email1);
  $smarty->assign("telephone1", $telephone1);
  $smarty->assign("comment1", $comment1);
  $smarty->assign('formErrors', $formErrors);
  $smarty->display("form_tpl2.tpl");
}

/**
 * ������� �� ���������� ������� � ���� ������
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
function addData($hostName, $userName, $passWord, $dbName, $tableName, 
                 $dataName2, $dataEmail2, $dataTelephone2, $dataComment2) {
  // ����������� � ����
  try {
    $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
    $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch (PDOException $e) {
      // �������� ����� ����(����� �������), ���� ������� ����������� �� �������
      $e->createBase = newBase($hostName, $userName, $passWord, $dbName, $tableName);
      $DBH = new PDO("mysql:host=$hostName;dbname=$dbName", $userName, $passWord);
      $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
  // �������� ������� ������ � �������
  $sql = "INSERT INTO $tableName VALUES (:name, :email, :telephone, :comment)";
  //���������� ������� ��� ������� � �������
  $STH = $DBH->prepare($sql);
  // ������� ������ � �������
  $STH->execute(array(':name'=>$dataName2,
                      ':email'=>$dataEmail2,
					  ':telephone'=>$dataTelephone2,
					  ':comment'=>$dataComment2));
  //������������ �� ����
  $DBH = NULL;
}

/**
 * ������� ��� �������� ���������
 * @param array ������ � �������
 * @return string ���������� � ������� �� �������
 */
function sendMessage($dataForm) {
  extract($dataForm, EXTR_SKIP);
  $message = "\r\n"."���:".$name1."\r\n".
             "Email:".$email1."\r\n".
             "�������:".$telephone1."\r\n".
		     "�����������:".$comment1."\r\n";
  $headers = 'From: ' . $name1 . $email1 . "\r\n";
  $result = mail ('buravtsev_aa@ro78.fss.ru' , "Letter" , $message , $headers);
  if ($result) {
    echo $name1; 
    echo ", ������ ������� ����������.";
  } else {
    echo "������ �� ����������.";
  }
  return $message;
}

/**
 * ������� �� �������� �����
 * @param string ���������� � ������� �� �������
 */
function logMessage($message) {
  $file = 'log.txt';
  if (file_exists($file)) {
    $fp = fopen($file, 'a+');
    fwrite($fp, $message);
    fclose($fp);
  } else {
    $fp = fopen($file, 'w');
    fwrite($fp, $message);
    fclose($fp);
  }
}

/**
 * ������� �� �������� ����� ���� ������
 * @param string ���������� � ������ �������
 * @param string ���������� � ������ ������������ ���� ������
 * @param string ���������� � ������� ��� ������� � �������
 * @param string ���������� � ������ ����������� ����
 * @param string ���������� � ������ ������� � ����
 */
function newBase($hostName, $userName, $passWord, $dbName, $tableName) {
  //�������� ����
  try {
    $DBH = new PDO("mysql:host=$hostName", $userName, $passWord);
    $DBH->exec("CREATE DATABASE `$dbName`;
			USE `$dbName`;
            CREATE table $tableName (`Name` text, `E-mail` text,
			`Telephone` text, `Comment` text);");
  } catch (PDOException $e) {
    //����� ������ ��� ����������
    die("DB ERROR: ". $e->getMessage());
  }
}
?>