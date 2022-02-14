<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ekleme, Silme, Güncelleme</title>
</head>
<body>
		<h1>Ekleme, Silme, Güncelleme</h1>
	<form action="islem.php" method="POST">
		<input type="text" required="" name="bilgilerim_ad" placeholder="Adınızı Giriniz...">
		<input type="text" required="" name="bilgilerim_soyad" placeholder="Soyadınızı Giriniz...">
		<input type="email" required="" name="bilgilerim_mail" placeholder="Mail Giriniz...">
		<input type="text" required="" name="bilgilerim_yas" placeholder="Yaş Giriniz...">
		<button type="submit" name="insertislemi">Formu Gönder</button>
	</form>
	<br>
	<h2>Kayıt Listelesi</h2>
	<hr>
	<table style="width: 60%" border="1">
		<tr>
			<th>S.NO</th>
			<th>ID</th>
			<th>Ad</th>
			<th>Soyad</th>
			<th>Mail</th>
			<th>Yaş</th>
			<th width="50">İşlemler</th>
			<th width="50">İşlemler</th>
		</tr>
		<?php
		$bilgilerimsor=$db->prepare("SELECT * from bilgilerim");
		$bilgilerimsor->execute();
		$say=0;
		while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>
			<tr>
				<td><?php echo $say; ?></td>
				<td><?php echo $bilgilerimcek['bilgilerim_id'] ?></td>
				<td><?php echo $bilgilerimcek['bilgilerim_ad'] ?></td>
				<td><?php echo $bilgilerimcek['bilgilerim_soyad'] ?></td>
				<td><?php echo $bilgilerimcek['bilgilerim_mail'] ?></td>
				<td><?php echo $bilgilerimcek['bilgilerim_yas'] ?></td>
				<td align="center"><a href="duzenle.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id'] ?>"><button>Düzenle</button></td></a>
				<td align="center"><a href="islem.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id'] ?>&bilgilerimsil=ok"><button>Sil</button></td></a>
			</tr>
		<?php } ?>
	</table>
</body>
</html>