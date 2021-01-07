<?php

// $test = 123;
// $test = "テストです";
// echo $test;

// $test_1 = 123;
// $test_2 = 456;
// $test_3 = $test_1 + $test_2;
// $test_4 = $test_1.$test_2;
// echo $test_4;echo"<br/>";
// echo $test_4;echo"<br/>";

// var_dump($test_4);

// const MAX = 10;
// echo MAX;

$array = [1, 'あああ', 2, 3];
// echo $array[1];

$array_2 = [
  ['赤', '青', '黄'],
  ['緑', '紫', '黒']
];

// echo '<pre>';
// var_dump($array_2);
// echo '</pre>';

$array_member = [
  'name' => '本田',
  'height' => 170,
  'hobby' => 'サッカー',
];

// echo $array_member['hobby'];
// echo '<pre>';
// var_dump($array_member);
// echo '</pre>';

$array_member_2 = [
  '本田' => [
    'height' => 170,
    'hobby' => 'サッカー'
  ],
  '香川' => [
    'height' => 165,
    'hobby' => '野球'
  ],
];

// echo $array_member_2['本田']['hobby'];
// echo '<pre>';
// var_dump($array_member_2);
// echo '</pre>';

$array_member_3 = [
  '1kumi' => [
    '本田' => [
      'height' => 170,
      'hobby' => 'サッカー'
    ],
    '香川' => [
      'height' => 165,
      'hobby' => '野球'
    ],
  ],
  '2kumi' => [
    '小田' => [
      'height' => 180,
      'hobby' => 'テニス'
    ],
    '山崎' => [
      'height' => 161,
      'hobby' => 'ピアノ'
    ],
  ],
];

// echo $array_member_3['2kumi']['小田']['hobby'];
// echo '<pre>';
// var_dump($array_member_3);
// echo '</pre>';

$test_empry = "";
if (!empty($test_empry)) {
  echo '空ではありません<br/>';
}

// $test_isset = null;
// if (isset($test_isset)) {
//   echo 'nullではありません<br/>';
// } else {
//   echo 'nullです<br/>';
// }

// $test_isset = null;
// if (is_null($test_isset)) {
//   echo 'Nullです<br/>';
// } else {
//   echo 'Nullではありません<br/>';
// }

/*
$members = [
  'name' => '本田',
  'height' => 170,
  'hobby' => 'サッカー',
];

// foreach ($members as $member) {
//   echo $member;
// }

foreach ($members as $key => $value) {
  echo $key." : ".$value;
  echo "<br />";
}
*/

/*
$data = "4";

// switch は === ではなく ==
// つまり「型まで見ない」
// 型まで見るには $data === 1　という風に書く
switch($data) {
  case 1:
    echo '1です';
    break;
  case 2:
    echo '2です';
    break;
  case 3:
    echo '3です';
    break;
  default: 
    echo 'いずれでもありません';
}
*/

/*
function test() {
  echo 'テスト';
}
test();

$comment = 'コメント';
function getComment($string) {
  echo $string;
}

getComment($comment);

echo '<br/><br/>';

function getNumberOfComment() {
  return 100;
}

echo(getNumberOfComment());
*/

/*
$text = 'あいうえお';

// var_dump($text);  

var_dump(strlen($text));  
var_dump(mb_strlen($text));
*/

/*
$str = "文字列を置換します";
echo str_replace("置換", "ちかん", $str);

echo ('<hr/><br/>');

$str_2 = "指定文字列で、分割します";

echo '<pre>';
var_dump(explode("、", $str_2));
echo '</pre>';

foreach (explode("、", $str_2) as $i) {
  echo $i."<br/>";
}

$str_3 = "特定の文字列が含まれるか確認する";
echo preg_match("/文字列/", $str_3);
*/

/*
echo '<hr/><br/>';
echo substr("あいうえお", 2);
echo '<hr/><br/>';
echo mb_substr("あいうえお", 2);

echo '<hr/><br/>';
echo substr("abcdeあfghい", 2);
echo '<hr/><br/>';
echo mb_substr("abcdeあfghい", 2);
*/

// 配列に配列を追加
// $array = ['りんご', 'みかん'];
// var_dump(array_push($array, '柿'));
// var_dump($array);

// camelcase
// checkPostalCode()

// snakeCase
// check_postal_code()

$postalCode = "123-4567";
// camelcase
function checkPostalCode($str) {
  $replaced = str_replace("-", "", $str);
  $length = strlen($replaced);

  if ($length === 7) {
    return true;
  }

  return false;
}

// var_dump(checkPostalCode($postalCode));


$globalVal = "グローバル";

function checkScope($str) {
  $localVal = "ローカル";
  echo $localVal;
  // global $globalVal;
  // echo $globalVal;
  echo "<hr><br>";
  echo $str;
  $str = "グローバル2";
}

// echo $globalVal;
// echo '<hr><br>';
// // echo $localVal;
// echo '<hr><br>';
// echo checkScope($globalVal);
// // echo checkScope($localVal);
// echo '<hr><br>';
// echo $globalVal;

// include_once("./common_.php");
// require_once("./common_.php");

// echo $commonVal;
// echo '<hr>';
// echo commonTest();

// echo $test;
// phpinfo();


// $array = [];
// $array[] = "A";
// $array[] = 2;
// var_dump($array);

