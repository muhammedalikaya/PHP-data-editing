<?php require_once 'baglanti.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Düzenle</title>
</head>
<body>
	<h1>Düzenleme</h1>
	<hr>
<?php 	
	
$bilgilerimsor=$db->prepare("SELECT * from bilgiler where bilgilerim_id=:id");
	$bilgilerimsor->execute(array(
	'id' => $_GET['bilgilerim_id']
	));
	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
	
 ?>
<form action="update.php" method="POST">
	<input type="text" required="" name="bilgilerim_ad" value="<?php echo $bilgilerimcek['bilgilerim_ad'] ?>">
	<input type="text" required="" name="bilgilerim_soyad" value="<?php echo $bilgilerimcek['bilgilerim_soyad'] ?>">
	<input type="text" required="" name="bilgilerim_telefon" value="<?php echo $bilgilerimcek['bilgilerim_telefon'] ?>">
	<input type="hidden" value="<?php echo $bilgilerimcek['bilgilerim_id'] ?>" name="bilgilerim_id">
	<button type="submit" name="updateislemi">Formu Düzenle</button>
	<button><a href="index.php">Geri Dön</a></button>
</form>
<br>
<br>
</body>
</html>