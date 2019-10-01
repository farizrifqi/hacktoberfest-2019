<?php
require './lib/config.php';
$smm = new SMM();
$con=$smm->config()['con'];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Harga Layanan</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        $Query = 'SELECT * FROM penjualanan WHERE status="1" ORDER BY provider ASC, id ASC';
                        $ExecQuery = mysqli_query($con, $Query);
                        while ($Result = mysqli_fetch_array($ExecQuery, MYSQLI_ASSOC)) {
							echo "<tr style=\"background:#".$smm->setBgColor($Result['provider']).";color: #".$smm->setColor($Result['provider'])."\">";
						                     echo "<td>".$Result['id']."</td>";
                            echo "<td>".$Result['nama_layanan']."</td>";
                            echo "<td>Rp".number_format($Result['harga'],0,",",".")."</td>";
                            echo "<td>".$Result['deskripsi']."</td>";
                            echo "</tr>";
                        }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="display"></div>

        </div>
        <script type="text/javascript" src="./js/ajax.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>