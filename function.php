<?php
	include 'config.php';
	if (isset($_POST['delete'])) {
		$sql = mysqli_query($conn,"DELETE users, participants FROM users JOIN participants WHERE users.id_users = participants.id_users AND users.id_users = '".$_POST['hapus']."'");
        // header('Location: index.php');
	}
	elseif (isset($_POST['edit'])) {
		$sql = mysqli_query($conn,"UPDATE participants SET name = '".$_POST['nama']."', gender = '".$_POST['gender']."', email = '".$_POST['email']."' WHERE id_users = '".$_POST['ubah']."'");
		// header('Location: index.php');
	}
	header('Location: index.php');
  ?>