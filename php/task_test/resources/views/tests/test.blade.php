<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>てすとだよ</h1>

  @foreach($values as $value) <!-- test.brade.php ★ compact('values')だから$values -->
    {{$value->id}}<br/>
    {{$value->text}}<br/>
  @endforeach



</body>
</html>