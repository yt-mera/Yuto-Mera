<html>
<head>
<title>mission4</title>
</head>
<body>
<meta charset = "utf-8">

<?php
//mission3-1(データベース接続)
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

//編集
$edit = $_POST['edit'];
$pass = $_POST['password'];
$edipass = $_POST['edipass'];
if(!empty($edit)){
	if(!empty($edipass)){
 //ここではidで検索しpassword取得したい
 $sql = 'SELECT*FROM mission';
 $stmt = $pdo -> query($sql);
 $results = $stmt -> fetchALL();
 foreach($results as $row){
 //psが一致するかどうか条件分岐
       if ($row['id'] == $edit) {
        if($row['password'] == $edipass){ 
        	
        	$data0 = $row['id'];
        	$data1 = $row['name'];
        	$data2 = $row['comment'];
        	$data4 = $row['password'];        	
}
}
}
}
}
?>

<form action = "mission4.php" method = "post">
<p>
<input type = "text"  name = "name" placeholder = "名前" value = "<?php print $data1; ?>"><br>
<input type = "text" name = "comment" placeholder = "コメント" value = "<?php print $data2; ?>"><br>
<input type = "text" name = "password" placeholder = "パスワード" value = "<?php print $data4; ?>">
<input type = "hidden" name = "editnum" value = "<?php print $data0; ?>">
<input type = "submit" value = "送信">
</p>
</form>
<form action = "mission4.php" method = "post">
<p>
<input type = "text" name = "deletenum" placeholder = "削除対象番号"><br>
<input type = "text" name = "delpass" placeholder = "パスワード">
<input type = "submit" value = "削除">
</p>
</form>
<form action = "mission4.php" method = "post">
<p>
<input type = "text" name = "edit" placeholder = "編集対象番号"><br>
<input type = "text" name = "edipass" placeholder = "パスワード">
<input type = "submit" value = "編集">
</p>
</form>
<?php
//mission3-1
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

//mission3-2
$sql="CREATE TABLE IF NOT EXISTS mission"
."("
."id INT not null auto_increment primary key,"
."name char(32),"
."comment TEXT,"
."time DATETIME,"
."password TEXT"
.");";
$stmt=$pdo->query($sql);


$pass = $_POST['password'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$editnum = $_POST['editnum'];


//ここから投稿機能プログラム
if(empty($editnum)){
	if(!empty($pass)){
		if(!empty($name)){
			if(!empty($comment)){
//fopen,fwrite,fcloseの代わりに
$sql = $pdo -> prepare("INSERT INTO mission (name,comment,time,password) VALUES (:name,:comment,now(),:password)");
$sql -> bindParam(':name',$name,PDO::PARAM_STR);
$sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
$sql -> bindParam(':password',$pass,PDO::PARAM_STR);
$sql -> execute();
//mission3-6(入力データ表示)
$sql = 'SELECT*FROM mission';
$stmt = $pdo -> query($sql);
$results = $stmt -> fetchALL();
foreach ($results as $row){
	echo $row['id'].' ';
	echo $row['name'].' ';
	echo $row['comment'].' ';
	echo $row['time'].'<br>';
}
}else{
	echo "コメントが入力されていません";
}
}else{
	echo "名前が入力されていません";
}
}
}else{
}
?>
<?php
//mission3-1(データベース接続)
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

//編集
$edit = $_POST['edit'];
$pass = $_POST['password'];
$edipass = $_POST['edipass'];
if(!empty($edit)){
	if(!empty($edipass)){
 //ここではidで検索しpassword取得したい
 $sql = 'SELECT*FROM mission';
 $stmt = $pdo -> query($sql);
 $results = $stmt -> fetchALL();
 foreach($results as $row){
 //psが一致するかどうか条件分岐
       if ($row['id'] == $edit) {
        if($row['password'] == $edipass){ 
        	
        	$data0 = $row['id'];
        	$data1 = $row['name'];
        	$data2 = $row['comment'];
        	$data4 = $row['password'];        	
}else{
	echo "パスワードが間違っています";
}	
}
}
}else{
	echo "パスワードを入力してください";
}
}

//ここから編集機能プログラム
$pass = $_POST['password'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$editnum = $_POST['editnum'];

if(!empty($editnum)){
		if(!empty($name)){
			if(!empty($comment)){
//mission3-1
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
//mission3-7(データ編集)
$sql = 'update mission set name=:name,comment=:comment,time=now(),password=:password where id=:id';
$stmt = $pdo -> prepare($sql);
$stmt -> bindParam(':name',$name,PDO::PARAM_STR);
$stmt -> bindParam(':comment',$comment,PDO::PARAM_STR);
$stmt -> bindParam(':password',$pass,PDO::PARAM_STR);
$stmt -> bindParam(':id',$editnum,PDO::PARAM_STR);
$stmt -> execute();
//mission3-6
$sql = 'SELECT*FROM mission';
$stmt = $pdo -> query($sql);
$results = $stmt -> fetchALL();
foreach ($results as $row){
	echo $row['id'].' ';
	echo $row['name'].' ';
	echo $row['comment'].' ';
	echo $row['time'].'<br>';
}
}else{
	echo "コメントが入力されていません";
}
}else{
	echo "名前が入力されていません";
}
}
?>

<?php
//mission3-1
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
$delete = $_POST['deletenum'];
$delpass = $_POST['delpass'];

//ここから削除機能プログラム
	if(!empty($delete)){
		if(!empty($delpass)){
 //データ抽出
 //ここではidで検索しpassword取得したい
 $sql = 'SELECT*FROM mission';
 $stmt = $pdo -> query($sql);
 $results = $stmt -> fetchALL();
 foreach($results as $row){
 //psが一致するかどうか条件分岐
       if ($row['id'] == $delete) {
        if($row['password'] == $delpass){ 
        	
//mission3-8(データ削除)
$id = $delete;
$sql = 'delete from mission where id=:id';
$stmt = $pdo -> prepare($sql);
$stmt -> bindParam(':id',$id,PDO::PARAM_INT);
$stmt -> execute();
//mission3-6
$sql = 'SELECT*FROM mission';
$stmt = $pdo -> query($sql);
$results = $stmt -> fetchALL();
foreach ($results as $row){
	echo $row['id'].' ';
	echo $row['name'].' ';
	echo $row['comment'].' ';
	echo $row['time'].'<br>';
}
}else{
			echo "パスワードが間違っています";
			echo '<br>';
}}}
}else{
	echo "パスワードを入力してください";
		}
}else{    
}
?>

</body>
</html>