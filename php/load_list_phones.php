<?php 
    $mysql = new mysqli("localhost", "root", "root", "phone");
    $list_with_phones = $mysql->query("SELECT * FROM `phone`");
    
    $array = [];
    $i = 0;
    while($element_of_list = $list_with_phones->fetch_assoc()) {
        $i = $i+1;
        $id = $element_of_list['ID'];
        $name = $element_of_list['name'];
        $phone = $element_of_list['tel'];
        $array[$i] = [$id,$name,$phone];
    };

    header('Content-Type: application/json');
    echo json_encode($array);
?>