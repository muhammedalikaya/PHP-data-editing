<?php 
require_once 'baglanti.php';	

if (isset($_POST['updateislemi'])) {

	$bilgilerim_id=$_POST['bilgilerim_id'];
	$kaydet=$db->prepare("UPDATE bilgiler set
		bilgilerim_ad=:bilgilerim_ad,
		bilgilerim_soyad=:bilgilerim_soyad,
		bilgilerim_telefon=:bilgilerim_telefon
		where bilgilerim_id={$_POST['bilgilerim_id']}
		");
	$insert=$kaydet->execute(array(
		'bilgilerim_ad' => $_POST['bilgilerim_ad'],
		'bilgilerim_soyad' => $_POST['bilgilerim_soyad'],
		'bilgilerim_telefon' => $_POST['bilgilerim_telefon']
	));
	if ($insert) {
		echo "kayıt başarılı";
		Header("Location:duzenle.php?durum=ok&bilgilerim_id=$bilgilerim_id");
		exit;
	} else {
		echo "kayıt başarısız";
		Header("Location:duzenle.php?durumno&bilgilerim_id=$bilgilerim_id");
		exit;
	}
}
if ($_GET['bilgilerimsil']=="ok") {
	
	$sil=$db->prepare("DELETE from bilgiler where bilgilerim_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['bilgilerim_id']
	));
	if ($kontrol) {
		
		echo "kayıt başarılı";
		Header("Location:index.php?durum=ok");
		exit;

	} else {

		echo "kayıt başarısız";
		Header("Location:index.php?durum=no");
		exit;
	}
}


?>