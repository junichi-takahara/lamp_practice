<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>

  <div class="container">
    <h1>購入履歴</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>


      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>詳細へ</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $value) { ?>
                <tr>
                    <td><?php print $value['order_id']; ?></td>
                    <td><?php print $value['created']; ?></td>
                    <td><?php print $value['total']; ?></td>
                    <td><a href="details.php?order_id=<?php print $value['order_id']; ?>">詳細</a></td>
                </tr>
            <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>