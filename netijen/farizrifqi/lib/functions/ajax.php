<?php
require '../config.php';
$smm = new SMM();
$con = $smm->config() ['con'];
$manageFile = $smm->config() ['manageFile'];
if (isset($_POST['search'])) {
    $Name = $_POST['search'];
    switch ($Name) {
        case "tsel":
            $Name = "telkomsel";
        break;
        case "three":
            $Name = "tri";
        break;
        case "im3":
            $Name = "tri";
        break;
        default:
            $Name;
    }
    $Query = 'SELECT * FROM penjualanan WHERE (nama_layanan LIKE "%' . $Name . '%" OR deskripsi LIKE "%' . $Name . '%" OR provider="' . $Name . '") AND status = "1" ORDER BY provider';
    $ExecQuery = mysqli_query($con, $Query);
?>
<div class="card">
  <div class="card-body">
  <div class="table-responsive">
  
                <table class="table table-hover">    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Layanan</th>
        <th scope="col">Harga</th>
        <th scope="col">Deskripsi</th>
    </tr>
    </thead>
    <tbody>

    <?php
    while ($Result = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC)) {
        echo "<tr style=\"background:#" . $smm->setBgColor($Result['provider']) . ";color: #" . $smm->setColor($Result['provider']) . "\">";
        echo "<td>" . $Result['id'] . "</td>";
        echo "<td>" . $Result['nama_layanan'] . "</td>";
        echo "<td>Rp" . number_format($Result['harga'], 0, ",", ".") . "</td>";
        echo "<td>" . $Result['deskripsi'] . "</td>";
        echo "</tr>";
    }
}
?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
