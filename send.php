<?php

if( !$_POST['hidden-input']) {

    $name = $_POST['name'];
    $phone = $_POST['phone']; 

    // token - the API key you get after creating a bot in telegram
    $token = "xxxxxxxxxx:xxxxxxxxxxxxxxxxxxxxxxxx"; 
    
    // go in https://api.telegram.org/bot{token}/getUpdates
    // open bot and send /start
    // add bot in chat and send message ( maybe tag him ) and check id_chat ( id with minus)
    $chat_id = "-xxxxxxxxxx";

    $arr = array(
    'Телефон: ' => $phone,
    'Имя: ' => $name,
    );

    foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
    };

    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

    if ($sendToTelegram) {
        echo json_encode([
             'status' => 'success'
        ]);
    } else {
        echo json_encode([
            'status' => 'error'
       ]);
    }
}
