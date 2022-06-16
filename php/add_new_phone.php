<?php 
    $firstName = $_POST['firstName'];
    $phone = $_POST['phone'];

    $mysql = new mysqli("localhost", "root", "root", "phone");
    $mysql->query("INSERT INTO `phone` (`ID`, `name`, `tel`) VALUES (NULL, '$firstName', '$phone');");

    header('Content-Type: application/json');
    echo json_encode(['message'=> 'Новый телефон успешно добавлен!']);
?>