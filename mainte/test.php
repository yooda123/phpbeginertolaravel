<?php

  // echo __FILE__;
  // D:\xampp\htdocs\mainte\test.php

  // echo "<br/>";
  // echo(password_hash('password123', PASSWORD_BCRYPT));
  // $2y$10$7COiNQBU6oqFcgIYqjLaJe2QVfFXPHzsREfPNvOFXHH1YvCmnnIfa

  $contactFile = '.contact.dat';
  // ファイル丸ごと読み込み
  $fileContents = file_get_contents($contactFile);
  echo $fileContents;
  echo '<hr/>';

  // ファイル丸ごと書き込み(上書き)
  // $contactFile = '.contact.dat';

  $addText = 'テストです' . "\n";
  // file_put_contents($contactFile, $addText);

  // ファイル丸ごと書き込み(追記)
  // $contactFile = '.contact.dat';
  file_put_contents($contactFile, $addText, FILE_APPEND);
/*

  // 確認
  // $fileContents = file_get_contents($contactFile);
  // echo $fileContents;

  //-----------CSV
  // 配列file、区切る explode foreach
  $csvFile = '.contact.csv';
  $allData = file($csvFile); // 配列
  // var_dump($allData);
  foreach($allData as $lineData) {
    $lines = explode(",", $lineData);
    echo $lines[0], "<br/>";
    echo $lines[1], "<br/>";
    echo $lines[2], "<br/>";
  }

*/

// ストリーム型
// 
// 1. 開く fopen(r, w, a);
// 2. 排他ロック　flock
// 3. 読み込み/書き込み/追記 fgets/fwrite
// 4. 閉じる fclose （ロックも解除）
$fp = fopen($contactFile, "a+");
$addText = "1行追記" . "\n";
if (flock($fp, LOCK_EX)) {  // acquire an exclusive lock
  // ftruncate($fp, 0);      // truncate file
  fwrite($fp, $addText);
  fflush($fp);            // flush output before releasing the lock
  flock($fp, LOCK_UN);    // release the lock
} else {
  echo "Couldn't get the lock!";
}




?>