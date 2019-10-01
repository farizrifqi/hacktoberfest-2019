<?php
require './lib/config.php';
$smm = new SMM();
$con = $smm->config()['con'];
$manageFile = $smm->config()['manageFile'];

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Manage Layanan</title>
        <meta charset="utf-8">
<meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/> <meta http-equiv="pragma" content="no-cache" />        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <br/>
            <br/>
            <?php
		if (!empty($_GET['a'])) {
			if ($_GET['a'] == 'switch' && !empty($_GET['id'])){
				$id = $_GET['id'];
				$Query = 'SELECT * FROM penjualanan WHERE id = "' . $_GET['id'] . '"';
				$ExecQuery = mysqli_query($con, $Query);
				$row = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC);
				if ($row['status'] == '0') {
					$sim = mysqli_query($con, "UPDATE penjualanan SET status='1' WHERE id='" . $id . "'");
				}else{
					$sim = mysqli_query($con, "UPDATE penjualanan SET status='0' WHERE id='" . $id . "'");
				}
				if($sim){
					header('location: ./'.$manageFile.'?n=success-switch');
				}else{
					header('location: ./'.$manageFile.'?n=fail-switch');
				}
			}
			if ($_GET['a'] == 'delete' && !empty($_GET['id'])){
				$id = $_GET['id'];
				$sim = mysqli_query($con, "DELETE FROM penjualanan WHERE id='" . $id . "'");
				if($sim){
					header('location: ./'.$manageFile.'?n=success-delete');
				}else{
					header('location: ./'.$manageFile.'?n=fail-delete');
				}
			}
		}else {
        ?>
                <h3>Manage Layanan</h3>
                <button class="btn btn-primary" id="tambah"><i class="fa fa-plus"></i> Tambah Produk</button>
                <br/>
                <hr/>

                <?php
        if (!empty($_GET['n'])) {
            if ($_GET['n'] == 'fail-switch') {
                ?>
                        <div class="alert alert-danger" role="alert">
                            Gagal ganti status layanan
                        </div>
                        <?php
            } if ($_GET['n'] == 'success-delete') {
                ?>
                            <div class="alert alert-success" role="alert">
                                Sukses menghapus layanan
                            </div>
                            <?php
            }
            if ($_GET['n'] == 'fail-delete') {
                ?>
                                <div class="alert alert-danger" role="alert">
                                    Gagal menghapus layanan
                                </div>
                                <?php
            }if ($_GET['n'] == 'success-add') {
                ?>
                                    <div class="alert alert-success" role="alert">
                                        Sukses menambahkan layanan
                                    </div>
                                    <?php
            }
            if ($_GET['n'] == 'fail-add') {
                ?>
                                        <div class="alert alert-danger" role="alert">
                                            Gagal menambahkan layanan
                                        </div>
                                        <?php
            }
        }

        ?>
                                            <div id="baru" style="display:none;">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5>Tambah Layanan</h5>
                                                        <?php
                    if (isset($_POST['tambah'])) {
                        $id = $_POST['id'];
                        $nama_layanan = $_POST['nama_layanan'];
                        $harga = $_POST['harga'];
                        $deskripsi = $_POST['deskripsi'];
                        $provider = $_POST['provider'];
                        $sim = mysqli_query($con, "INSERT INTO penjualanan VALUES('$id','$nama_layanan','$provider','$harga','".nl2br($deskripsi)."', '1')");
                        if($sim){
                            header('location: ./'.$manageFile.'?n=success-add');
                        }else{
                            header('location: ./'.$manageFile.'?n=fail-add');
                        }
                    }
                    ?>
                                                            <form action="" method="POST">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>ID</label>
                                                                            <input placeholder="AUTO" type="number" name="id" class="form-control" disabled/>
                                                                        </div>
                                                                        <label>Provider</label>
                                                                        <select placeholder="Pilih" name="provider" class="custom-select">
                                                                            <option disabled="disabled">Pilih Provider</option>
                                                                            <option value="telkomsel">Telkomsel</option>
                                                                            <option value="axis">Axis</option>
                                                                            <option value="xl">XL</option>
                                                                            <option value="indosat">Indosat</option>
                                                                            <option value="tri">Tri</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Nama Layanan</label>
                                                                            <input type="text" placeholder="Kuota 500 TB Telkomsel" name="nama_layanan" class="form-control" required/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Harga</label>
                                                                            <input type="number" name="harga" placeholder="10000" class="form-control" required/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <textarea type="text" placeholder="50 MB INTERNET DI SEMUA JARINGAN 9999.5 GB SOSIAL MEDIA" name="deskripsi" class="form-control"></textarea>
                                                                </div>
                                                                <br/>
                                                                <input type="submit" name="tambah" value="Simpan" class="btn btn-success" />
                                                            </form>
                                                    </div>
                                                </div>
                                                <hr/>
                                            </div>
                                            <input type="text" autocomplete="off" class="form-control" id="search" placeholder="Cari : ID / Nama Layanan / Deskripsi" />
                                            <br/>
                                            <div id="show">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">

                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Nama Layanan</th>
                                                                        <th scope="col">Harga</th>
                                                                        <th scope="col">Deskripsi</th>
                                                                        <th scope="col">Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                $Query = 'SELECT * FROM penjualanan ORDER BY status DESC, provider ASC';
                $ExecQuery = mysqli_query($con, $Query);
                while ($Result = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC)) {
                    if ($Result['status'] == "1") {
							echo '<tr style="background:#'.$smm->setBgColor($Result['provider']).';color: #'.$smm->setColor($Result['provider']).'">';
                    } else {
                        echo '<tr class="table-active">';
                    }
                    echo '<td>' . $Result['id'] . '</td>';
                    echo '<td>' . $Result['nama_layanan'] . '</td>';
                            echo '<td>Rp'.number_format($Result['harga'],0,',','.').'</td>';
                    echo '<td>' . $Result['deskripsi'] . '</td>';
                    echo '<td>';
                    echo '<a href="#editLayanan" data-toggle="modal" data-id="'.$Result['id'].'"\'><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a> <a href="./'.$manageFile.'?a=switch&id=' . $Result['id'] . '"><button class="btn btn-warning"><i class="fa fa-refresh"></i></button></a> <a href="./'.$manageFile.'?a=delete&id=' . $Result['id'] . '"><button onclick="return confirm(\'Yakin ingin menghapus layanan '.$Result['id'].'?\')" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="display"></div>
                                            <div class="modal fade" id="editLayanan" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-success" id="suksesSave" style="display:none;" role="alert">
                                                                Berhasil mengedit layanan!
                                                            </div>
                                                            <div class="alert alert-danger" id="gagalSave" style="display:none;" role="alert">
                                                                Gagal mengedit layanan!
                                                            </div>
                                                            <form action="" method="POST">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>ID</label>
                                                                            <input type="number" autocomplete="off" name="id" class="form-control" disabled/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Nama Layanan</label>
                                                                            <input type="text" autocomplete="off" name="nama_layanan" class="form-control" required/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-group">
                                                                            <label>Harga</label>
                                                                            <input type="number" name="harga" autocomplete="off" class="form-control" required/>
                                                                        </div>

                                                                        <label>Provider</label>
                                                                        <select placeholder="Pilih" name="provider" id="provider" class="custom-select">
                                                                            <option disabled="disabled">Pilih Provider</option>
                                                                            <option value="xl">XL</option>
                                                                            <option value="axis">Axis</option>
                                                                            <option value="indosat">Indosat</option>
                                                                            <option value="telkomsel">Telkomsel</option>
                                                                            <option value="tri">Tri</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <textarea type="text" name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="button" name="saveService" data-info="1" id="saveService" class="btn btn-success"><i class="fa fa-check"></i> Perbarui</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
    }
    ?>
        </div>
        <script type="text/javascript" src="./js/search.js?n=1"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>