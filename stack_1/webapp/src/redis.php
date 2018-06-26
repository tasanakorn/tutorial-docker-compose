<?php
    header('Content-Type: application/json');
    $redis = new Redis();
    $redis->pconnect('redis', 6379);
    if (isset($_GET['action']) && ($_GET['action'] == 'set')) {
        $redis->set("message", $_GET['message']);
        echo json_encode([
            "action" => "set"
        ]);
    } else {
        echo json_encode([
            "action" => "get",
            "message" => $redis->get("message")
        ]);
    }
