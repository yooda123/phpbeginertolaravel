<?php

// DB接続 PDO
require 'db_connection.php';

// 入力　DB保存 prepare, execute(配列)

$params = [
  'id' => null,
  'your_name' => 'なまえ',
  'email' => 'test@test.com',
  'url' => 'http://test.com',
  'gender' => '1',
  'age' => '2',
  'contact' => 'いいい',
  'created_at' => null,
];

$count = 0;
$columns = '';
$values = '';

foreach (array_keys($params) as $key) {
  if ($count++ > 0) {
    $columns .= ', ';
    $values .= ', ';
  }
  $columns .= $key;
  $values .= ':'.$key;
}

$sql = 'insert into contacts ('. $columns . ') values ('. $values .')'; //名前付きプレースホルダ　？だと名前なしプレースホルダ
echo $sql;
// exit;

// トランザクション
$pdo->beginTransaction();

try {
  $stmt = $pdo->prepare($sql); // プリペアードステートメント
  // $stmt->bindValue('id', 4, PDO::PARAM_INT); // 紐づけ
  $stmt->execute($params);

  $pdo->commit();
} catch (PDOException $e) {
  echo 'rollback' . $e->getmessage() . "\n";

  $pdo->rollback();
}


