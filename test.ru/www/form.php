<?php
// массив с информацией об ошибке
$formErrors = array();
//вспомогательная переменная для вывода ошибки на экран
$formError = NULL;

/**
 * Функция по вводу данных в форму
 * @param string вспомогательня переменная для вывода ошибки на экран
 * @param array массив с ошибками
 */
function formInput($formError, $formErrors) {
  global $dataForm;
  global $smarty;
  global $dataName2;
  global $dataEmail2;
  global $dataTelephone2;
  global $dataComment2;
  $formInput=1;
  if (isset($_POST['submit'])) {
    $dataForm['telephone1'] = $_POST['telephone'];
    $dataForm['comment1'] = $_POST['comment'];
    $dataForm['email1'] = $_POST['email'];
    $dataForm['name1'] = $_POST['name'];
    $dataName2 = $dataForm['name1'];
    $dataEmail2 = $dataForm['email1'];
    $dataTelephone2 = $dataForm['telephone1'];
    $dataComment2 = $dataForm['comment1'];
    //условие по которому проверяется была ли нажата кнопка "Отправить" в форме
    if ($_POST['submit'] == 'Отправить') {
      // условие по которому проверяется были ли введены данные в поля имя и емэил
      if (empty($_POST['name']) && empty($_POST['email'])) {
        $formError = 1;
        $formErrors[] = "Вы не заполнили поле имя и E-mail";
	  // условие по которому определяется были ли внесены данные в поле имя
      } elseif (empty($_POST['name'])) {
        $formError = 1;
        $formErrors[] = "Вы не заполнили поле имя";
	  // условие по которому определяется были ли внесены данные в поле емэил
      } elseif (empty($_POST['email'])) {
        $formError = 1;
	    $formErrors[] = "Вы не заполнили поле E-mail";
      } elseif (!empty($_POST['name']) && !empty($_POST['email'])) {
        $formInput=0;
        $message = sendMessage($dataForm);
        // сохранение сообщения
        logMessage($message);
	    addData ();
	  }
    }
} else {
  $dataForm['telephone1'] = "";
  $dataForm['comment1'] = "";
  $dataForm['email1'] = "";
  $dataForm['name1'] = "";
}
if ($formInput == 1) {
  extract($dataForm, EXTR_SKIP);
  $smarty->assign("name1", $name1);
  $smarty->assign("email1", $email1);
  $smarty->assign("telephone1", $telephone1);
  $smarty->assign("comment1", $comment1);
  $smarty->assign('formError', $formError);
  $smarty->assign('formErrors', $formErrors);
  $smarty->display("form.tpl");
}
}
/**
 * Функция по добавлению записей в базу данных
 */
function addData() {
  global $dataName2;
  global $dataEmail2;
  global $dataTelephone2;
  global $dataComment2;
  global $DBH;
  global $tableName;
  // операция вставки данных в таблицу
  $sql = "INSERT INTO $tableName VALUES (:name, :email, :telephone, :comment)";
  //подготовка шаблона для вставки в таблицу
  $STH = $DBH->prepare($sql);
  // вставка данных в таблицу
  $STH->execute(array(':name'=>$dataName2,
                      ':email'=>$dataEmail2,
					  ':telephone'=>$dataTelephone2,
					  ':comment'=>$dataComment2));
  //отключииться от базы
  $DBH = NULL;
}

/**
 * Функция для отправки сообщения
 * @param array массив с данными
 * @return string переменная с данными из массива
 */
function sendMessage($dataForm) {
  extract($dataForm, EXTR_SKIP);
  $message = "\r\n"."Имя:".$name1."\r\n".
             "Email:".$email1."\r\n".
             "Телефон:".$telephone1."\r\n".
		     "Комментарий:".$comment1."\r\n";
  $headers = 'From: ' . $name1 . $email1 . "\r\n";
  $result = mail ('buravtsev_aa@ro78.fss.ru' , "Letter" , $message , $headers);
  if ($result) {
    echo $name1; 
    echo ", данные успешно отправлены.";
  } else {
    echo "Данные не отправлены.";
  }
  return $message;
}

/**
 * Функция по отправке логов
 * @param string переменная с данными из массива
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


