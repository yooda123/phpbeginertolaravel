<?php
  

  function defaultValue($string = null) {
    echo $string . 'です。';
  }

  defaultValue();
  echo '<br/>';

  defaultValue("テスト");
  echo '<br/>';

?>