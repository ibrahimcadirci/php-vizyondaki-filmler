<?php
require_once("../src/Films.php");

use \ibrahimhcadirci\films\Films;

$films      = new Films();

$random      = $films->random();
$films_data      = $films->get();
$categorys      = $films->categorys();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        ul li {
            list-style: none;
        }
        .clearbox {
            clear: both;
        }
        body {
            background: #ededed;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
        }

        .films {
            width: 600px;
            background: #fff;
            padding: 15px;
            margin: 30px auto;
            box-shadow: 0px 0px 5px #3333332b;
            border-radius: 3px;
        }


        .films h2.title {
            display: block;
            text-align: center;
        }
        .films h3.title {
            padding: 15px 0px;
            border-bottom: 1px dashed;
            margin-bottom: 15px;
            text-align: center;
        }
        .films h2.title a {
            font-size: 12px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            background: #ededed;
            padding: 3px;
            border: 1px solid #ccc;
        }

        .films .random-film {
            background: #ef665d;
            padding: 14px;
            margin: 15px -15px;
            text-align: center;
            color: #fff;
            font-weight: 300;
            font-size: 18px;
        }

        ul.vision-films li {
            display: flex;
            flex-direction: row;
            margin-bottom: 15px;
        }

        ul.vision-films li .col {
            flex-grow: 1;
        }

        ul.vision-films li .col:nth-child(1) {
            flex-grow: 10;
        }

        ul.vision-films li span {
            font-size: 13px;
            margin: 5px;
            display: block;
            border-bottom: 1px solid #ededed;
        }

        ul.vision-films li p {
            font-weight: bold;
            color: #F44336;
            text-align: center;
        }
        .categorys ul li {
            float: left;
            background: #ededed;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            cursor: pointer;
            box-shadow: 0px 0px 5px #3333330d;
            transition: all 300ms;
        }

        .categorys ul li:hover {
            background: #ef665d;
            color: #fff;

        }


    </style>
</head>

<body>
    <div class="films">
        <h2 class="title">PHP ile vizyondaki filmeleri çekme <a href="https://github.com/ibrahimhcadirci/php-vizyondaki-filmler" target="_blank">Github</a></h2>
        <div class="random-film">
            <p>Random film : <?= $random['name'] ?></p>
        </div>
        <div class="categorys">
            <h3 class="title">Vizyondaki Filmlerin Kategorileri</h3>

            <ul>
                <?php foreach ($categorys as $row) { ?>
                    <li><?= $row ?></li>

                <?php } ?>
                <div class="clearbox"></div>
            </ul>
        </div>
        <h3 class="title">Vizyondaki Filmler</h3>
        <ul class="vision-films">
            <?php foreach ($films_data  as $row) {
                ?>
                <li>
                    <div class="col">
                        <p><?= $row['name'] ?></p> <br>
                        <span><b>Çıkış Tarihi : </b><?= $row['year'] ?></span>
                        <span><b>Aldığı Puan :</b> <?= $row['point'] ?></span>
                        <span><b>Gösterime Girdiği Tarih:</b> <?= $row['display_date'] ?></span>
                        <span><b>Kategori:</b> <?= $row['film_type'] ?></span>
                    </div>
                    <div class="col">
                        <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" />
                    </div>
                </li>
            <?php
            } ?>
        </ul>
    </div>

</body>

</html>