<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>

  <div class="container">
    <h1>購入明細</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td><?php print $data['order_id']; ?></td>
              <td><?php print $data['created']; ?></td>
              <td><?php print $data['total']; ?></td>
          </tr>
        </tbody>
      </table>

      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) { ?>
                <tr>
                    <td><?php print $item['name']; ?></td>
                    <td><?php print $item['price']; ?></td>
                    <td><?php print $item['amount']; ?></td>
                    <td><?php print $item['price'] * $item['amount']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>