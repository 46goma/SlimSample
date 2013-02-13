<?php
/**
 * トップ画面
 */
$app->get('/', function () use ($app) {
    require_once LIB_DIR . '/Session.php';

    $session = $app->factory->getSession();
    $user_info = array();
    if ($session->get('user_id')) {
        $user_info['id'] = $session->get('user_id');
        $user_info['name'] = $session->get('user_name');
    }

    $app->render('index.twig', array('user' => $user_info));
});

/*
 * エラー画面
 */
$app->error(function ($msg='') use ($app) {
    $app->render('error.twig', array('message' => $msg), 500);
});
