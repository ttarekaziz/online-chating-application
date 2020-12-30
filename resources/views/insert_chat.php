<?php

//insert_chat.php

$connect = new PDO("mysql:host=127.0.0.1;dbname=jibonsathi", "jibonsathi", "4Gkhq42&");

session_start();

$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => Session:: get('id'),
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);

$query = "
INSERT INTO chat_messages 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history(Session:: get('id'), $_POST['to_user_id'], $connect);
}

?>