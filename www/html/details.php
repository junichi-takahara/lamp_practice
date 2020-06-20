<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';

session_start();

if(is_logined() === false){
    redirect_to(LOGIN_URL);
  }  

$db = get_db_connect();

$user = get_login_user($db);

$order_id = get_get('order_id');

$data = get_history_by_order_id($db, $order_id);
// ログインしているユーザーIDを５とする。
// ユーザーIDが５なので、ユーザーID５で購入した注文番号１４番の詳細履歴を見ることができる。
// URLのorder_idを９に変えると、注文番号９番の詳細履歴を見ることができてしまう。
// その時にログインしているユーザーID５と注文番号９番のユーザーIDを比較する。
// $user_id = $data['user_id'];
// var_dump($user_id);
if(is_admin($user) === false){
  if($user['user_id'] !== $data['user_id']){
    redirect_to(HISTORY_URL);
  } else{
    $items = get_details($db, $order_id);
  }
} else{
  $items = get_details($db, $order_id);
}

include_once VIEW_PATH . 'details_view.php';