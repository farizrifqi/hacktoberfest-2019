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
            <div class="jumbotron">
                <h1 class="display-4">Hello, Memek!</h1>
                <p class="lead">Selamat datang di selling example page</p>
                <hr class="my-4">
                <p>Ada 2 versi index, silahkan di cek</p>
                <a class="btn btn-primary btn-lg" target="_blank" href="./index1" role="button">Index 1</a> <a target="_blank" class="btn btn-success btn-lg" href="./index2" role="button">Index 2</a> <a target="_blank" class="btn btn-warning btn-lg" href="./manage" role="button">Manage</a>

            </div>
        </div>
        <script type="text/javascript" src="./js/ajax.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

    </html>