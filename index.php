<?php
include ("baglanti.php");
?>
<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Untitled Document</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php
		$stmt = $db->query("SELECT bilgilerim_id,bilgilerim_ad,bilgilerim_soyad,bilgilerim_telefon FROM bilgiler");
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
		?>
		<div class="container">
			<table class="table">
				<thead class=" thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Ad</th>
						<th scope="col">Soyad</th>
						<th scope="col">Telefon</th>
						<th scope="col">Düzenle</th>
						<th scope="col">Sil</th>

					</tr>
				</thead>
				<tbody>
					<?php foreach($user as $key=>$value){ ?>
						<tr>
							<td><?php echo $value['bilgilerim_id'] ?></td>
							<td><?php echo $value['bilgilerim_ad'] ?></td>
							<td><?php echo $value['bilgilerim_soyad'] ?></td>
							<td><?php echo $value['bilgilerim_telefon'] ?></td>
							<td><a href="duzenle.php?bilgilerim_id=<?php echo $value['bilgilerim_id']?>"><button>Düzenle</button></td></a>
							<td><a href="update.php?bilgilerim_id=<?php echo $value['bilgilerim_id']?>&bilgilerimsil=ok"><button>Sil</button></td></a>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</body>
	</html>