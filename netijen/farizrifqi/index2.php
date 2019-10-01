<?php
require './lib/config.php';
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Harga Layanan</title>
        <meta charset="utf-8">
		<meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/> <meta http-equiv="pragma" content="no-cache" />        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <br/>
            <br/>
            <h3>Harga Layanan</h3>
            <input type="text" autocomplete="off" class="form-control" id="search" placeholder="Cari : Nama Layanan / Deskripsi" />
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$con = mysqli_connect("localhost", "root", "", "smm");
									$Query = 'SELECT * FROM penjualanan WHERE status="1" ORDER BY id ASC';
									$ExecQuery = mysqli_query($con, $Query);
									while ($Result = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC)) {
										echo '<tr>';
										echo '<td>'.$Result['id'].'</td>';
										echo '<td>'.$Result['nama_layanan'].'</td>';
										echo '<td>'.$Result['harga'].'</td>';
										echo '<td><a href="#detailLayanan" class="btn btn-primary" data-toggle="modal" data-id="'.$Result['id'].'">Details</a></td>';
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
            <div class="modal fade" id="detailLayanan" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="fetched-provider"></div>
                            <div class="fetched-deskripsi"></div>
                            <div class="fetched-harga"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./js/ajax.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>