<?php

require 'db_connection.php';

// ユーザー入力無し query
// $sql = 'select * from contacts where id = 3';
// $stmt = $pdo->query($sql);

// $result = $stmt->fetchall();

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

// ユーザー入力あり prepare, bind, execute
$sql = 'select * from contacts where id = :id'; //名前付きプレースホルダ　？だと名前なしプレースホルダ
$stmt = $pdo->prepare($sql); // プリペアードステートメント
$stmt->bindValue('id', 4, PDO::PARAM_INT); // 紐づけ
$stmt->execute();

$result = $stmt->fetchall();

echo '<pre>';
var_dump($result);
echo '</pre>';


// トランザクション
$pdo->beginTransaction();

try {
  $stmt = $pdo->prepare($sql); // プリペアードステートメント
  $stmt->bindValue('id', 4, PDO::PARAM_INT); // 紐づけ
  $stmt->execute();

  $pdo->commit();
} catch (PDOException $e) {
  echo 'rollback' . "\n";

  $pdo->rollback();
}