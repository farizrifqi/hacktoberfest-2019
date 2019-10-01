<?php
require '../config.php';
$smm = new SMM();
$con = $smm->config() ['con'];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Query = "SELECT * FROM penjualanan WHERE id='" . $id . "'";
    $ExecQuery = mysqli_query($con, $Query);
    $Result = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC);
    echo json_encode($Result);
}
if (isset($_POST['saveService'])) {
    $id = $_POST['sId'];
    $nama_layanan = $_POST['nama_layanan'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['des'];
    $provider = $_POST['provider'];
    $sim = mysqli_query($con, "UPDATE penjualanan SET nama_layanan='" . $nama_layanan . "',harga='" . $harga . "',deskripsi='" . nl2br($deskripsi) . "', provider='" . $provider . "' WHERE id='" . $id . "'");
    $result = array();
    if ($sim) {
        $result['success'] = "1";
    }
    echo json_encode($result);
}
if (isset($_POST['switchService'])) {
    $id = $_POST['sId'];
    $Query = 'SELECT * FROM penjualanan WHERE id = "' . $_GET['id'] . '"';
	$ExecQuery = mysqli_query($con, $Query);
	$row = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC);
	if ($row['status'] == '0') {
		$sim = mysqli_query($con, "UPDATE penjualanan SET status='1' WHERE id='" . $id . "'");
	}else{
		$sim = mysqli_query($con, "UPDATE penjualanan SET status='0' WHERE id='" . $id . "'");
	}
	$result['success'] = "1";
	if($sim){
		$result['success'] = "1";
	}
	echo json_encode($result);
}

?>