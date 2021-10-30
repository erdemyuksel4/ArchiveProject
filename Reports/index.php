<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="node_modules/print-js/dist/print.css" />
    <link rel="stylesheet" href="assets/jquery-print-preview-plugin-master/src/css/print-preview.css" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="./css/style.css" />
    <style>

    </style>
    <script>

        

    </script>

<body>

    <div id="toolbar">
        <select id="reportList">
            <option></option>
            <option value="1">EK-1-Haftalık Ders Programı</option>
            <option value="8">Ek-8-Türkçe Dersleri Öğrenci Kayıt Formu</option>

        </select>
        <button class="btn btn-yazdir btn-sm btn-secondary" data-area="#printArea"><span
                class="fa fa-print"></span>
            Yazdır</button>
    </div>

    <div id="main">
        <div id="printArea" class="printArea printArea-a4-landscape">

        <?php

            include("ogrenciistatistikformu.html");

        ?>
          

        </div>

    </div>

    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/print-js/dist/print.js"></script>
    <script src="assets/jquery-print-preview-plugin-master/src/jquery.print-preview.js"></script>
    <script src="js/script.js"></script>

</body>

</html>