<?php
    use Aijkl\AdShare\Response;
    require '../vendor/autoload.php';

    $authResult = new Response(false,"パスワードが間違っています");
    echo json_encode($authResult);
?>