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
        case "tdree":
            $Name = "tri";
        break;
        case "im3":
            $Name = "tri";
        break;
        default:
            $Name;
    }
    if (is_numeric($Name)) {
        $Query = 'SELECT * FROM penjualanan WHERE (id="' . $Name . '") ORDER BY status DESC';
    } else {
        $Query = 'SELECT * FROM penjualanan WHERE (nama_layanan LIKE "%' . $Name . '%" OR deskripsi LIKE "%' . $Name . '%" OR provider="' . $Name . '") ORDER BY status DESC';
    }
    $ExecQuery = mysqli_query($con, $Query);
?>


<div class="card">
  <div class="card-body">
  <div class="table-responsive">
  
                <table class="table table-hover">     <tdead>
    <tr>
        <td scope="col">ID</td>
        <td scope="col">Nama Layanan</td>
        <td scope="col">Harga</td>
        <td scope="col">Deskripsi</td>
        <td scope="col">Aksi</td>
    </tr>
    </tdead>
    <tbody>

    <?php
    while ($Result = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC)) {
        if ($Result['status'] == "1") {
            echo "<tr style=\"background:#" . $smm->setBgColor($Result['provider']) . ";color: #" . $smm->setColor($Result['provider']) . "\">";
        } else {
            echo "<tr class=\"table-active\">";
        }
        echo "<td>" . $Result['id'] . "</td>";
        echo "<td>" . $Result['nama_layanan'] . "</td>";
        echo "<td>Rp" . number_format($Result['harga'], 0, ",", ".") . "</td>";
        echo "<td>" . $Result['deskripsi'] . "</td>";
        echo "<td>";
        echo "<a href='./edit.php?a=edit&id=" . $Result['id'] . "'><button class='btn btn-primary'><i class=\"fa fa-edit\"></i></button></a> <a href='./" . $manageFile . ".php?a=switch&id=" . $Result['id'] . "'><button class='btn btn-warning'><i class=\"fa fa-refresh\"></i></button></a> <a href='./" . $manageFile . ".php?a=delete&id=" . $Result['id'] . "'><button onclick=\"return confirm('Yakin ingin menghapus layanan " . $Result['id'] . "?')\" class='btn btn-danger'><i class=\"fa fa-trash\"></i></button></a>";
        echo "</td>";
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
