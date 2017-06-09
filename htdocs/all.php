<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];
$dbName = $_SERVER['MYSQL_DB'];
# MySQL用のDSN文字列です。
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);
//検索実行
$sql = 'SELECT * FROM hinantb';
$prepare = $db->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

//結果の出力
foreach ($result as $person) {
  echo "<br/>避難所:";
  echo $person['避難所名'];//手抜き
  echo "<br/>緯度:";
  echo $person['緯度'];
  echo "<br/>経度:";
  echo $person['経度'];//手抜き
}