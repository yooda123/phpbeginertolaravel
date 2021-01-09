<?php
declare(strict_types=1); // 強い型指定
// phpinfo();

echo 'タイプヒンティングテスト'.'<br>';

function sum(int $a, int $b) {
  return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1.5, 2.5)); // strict_types=1でないと、1, 2にそれぞれ丸められて気付かない
echo '<hr/>';


function noTypeHint($string) {
  var_dump($string);
}

noTypeHint(['テスト']);
echo '<br />';


// function typeHint(array $string) {
function typeHint(string $string1) {
// function typeHint($string) {
    var_dump($string1);
}

typeHint(['配列']); // strict_types=1であろうとなかろうと、typeエラーになる
echo '<hr/>';


