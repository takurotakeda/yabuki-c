<!DOCTYPE html>
<html>
<head>

<?php
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
$cnt1 = array();
$cnt2 = array();

foreach ($result as $person) {
    /*
  echo "<br/><br/>避難所:";
  echo $person['避難所名'];//手抜き
  echo "<br/>緯度:";
  echo $person['緯度'];
  echo "<br/>経度:";
  echo $person['経度'];//手抜き
*/
  //php変数を作りデータベースを入れる
  $cnt1[] = $person['緯度'];
  $cnt2[] = $person['経度'];  
  $cnt3[] = $person['避難所名'];
}
//データの数を数える
$kazu = count($cnt1);

//php変数の中を置き換える
$cnt1a = json_encode($cnt1);
$cnt2a = json_encode($cnt2);
$cnt3a = json_encode($cnt3);
?>

<meta charset="utf-8">
<script type ="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jqery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html { width: 100%; height: 100%; }
body { width: 100%; height: 100%; margin: 0; }
#map { width: 100%; height: 100%; }
</style>
</head>
<body>    
<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh-xxyYmMWlyvZElHmfygXIbckJAcW-r8&"></script>
var markerData = [];
<script type="text/javascript">
(function(){
    "use strict";
    // Geolocation APIに対応している
    if( navigator.geolocation ){
        // 現在位置を取得できる場合の処理
	console.log( "あなたの端末では、現在位置を取得することができます。" ) ;
    }
    // Geolocation APIに対応していない
    else {
        // 現在位置を取得できない場合の処理
	alert( "あなたの端末では、現在位置を取得できません。" ) ;
    }
    
// 現在位置を取得する
navigator.geolocation.getCurrentPosition( successFunc , errorFunc , optionObj ) ;

// 成功した時の関数
function successFunc( position )
{
                var mapData    = { pos: { lat: 35.6833, lng: 140.0333 }};
                var markerData = [];
                
        // 緯度
	console.log( position.coords.latitude ) ;
	// 経度
	console.log( position.coords.longitude ) ;
        markerData.push({ pos: { lat:position.coords.latitude, lng: position.coords.longitude }, title: "popup-title3", icon: "", infoWindowOpen: true, infoWindowContent: "<h3>現在地</h3><p>test</p>"  });
        

        
        //java変数にphp変数を入れる
        var lat = <?php echo $cnt1a; ?>;
        var lng = <?php echo $cnt2a; ?>;
        var name = <?php echo $cnt3a; ?>;
        var kazu = <?php echo $kazu; ?>;

       
       markerData.push({ pos: { lat: 40, lng: 150 }, title: "popup-title2", icon: "", infoWindowOpen: false, infoWindowContent: "<h3>tes</h3><p>piyopiyo</p>" });
       for(var i = 0; i < kazu; i++) {
//parseFlort文字列を数値に変換する
         markerData.push({ pos: { lat: parseFloat(lat[i]), lng: parseFloat(lng[i]) }, title: "popup-title2", icon: "", infoWindowOpen: false, infoWindowContent: name[i]  });
       /*
       document.write(lat[i]);
       document.write('<br>');
       document.write(lng[i]);
       document.write('<br>');
       document.write(name[i]);
       */
       }
       var map = new google.maps.Map(document.getElementById('map'), {
		center: mapData.pos,
		zoom:   15
	});
	for( var i=0; i < markerData.length; i++ )

	{ 
            console.log(markerData[i]);
		(function(){
			var marker = new google.maps.Marker({
				position: markerData[i].pos,
				title:    markerData[i].title,
				icon:     markerData[i].icon,
				map: map
			});
			if( markerData[i].infoWindowContent )
			{
				var infoWindow = new google.maps.InfoWindow({
					content: markerData[i].infoWindowContent
				});
				marker.addListener('click', function(){
					infoWindow.open(map, marker);
				});
				if( markerData[i].infoWindowOpen )
				{
					infoWindow.open(map, marker);
				}
			}
		}());
	}
}

// 失敗した時の関数
function errorFunc( error )
{
	// エラーコードのメッセージを定義
	var errorMessage = {
		0: "原因不明のエラーが発生しました…。" ,
		1: "位置情報の取得が許可されませんでした…。" ,
		2: "電波状況などで位置情報が取得できませんでした…。" ,
		3: "位置情報の取得に時間がかかり過ぎてタイムアウトしました…。" ,
	} ;
	// エラーコードに合わせたエラー内容をアラート表示
	alert( errorMessage[error.code] ) ;
}
// オプション・オブジェクト
var optionObj = {
	"enableHighAccuracy": false ,
	"timeout": 8000 ,
	"maximumAge": 5000 ,} ;
}());
</script>
</body>
</html>