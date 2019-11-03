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
    margin : 0px ; padding : 0px;
    
    }
    body {
        background : #ededed;
        font-family : 'Roboto', sans-serif;
    font-size:14px;
    }
    .films {
        width: 600px;
        background: #fff;
        padding: 15px;
        margin: 0px auto;
        box-shadow: 0px 0px 5px #3333332b;
        border-radius: 3px;
    }
    .films .vizyonImg {
    border: 2px solid #ccc;
    padding: 15px;
    width: 150px;
    float: left;
    margin: 0px 15px 15px 0px;
}



.vizyonImg a {
    color: #333;
    font-weight: bold;
    display: block;
    text-decoration: none;
    text-align: center;
}
.films h2.title  {
    display: block;
    text-align:center;
}
.films h2.title a{
    font-size: 12px;
    color : #333;
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
ul.vision-films li .col{
    flex-grow : 1;
}
ul.vision-films li .col:nth-child(1) {
    flex-grow : 10;
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
h3.title {
    padding: 15px 0px;
    border-bottom: 1px dashed;
    margin-bottom: 15px;
}
    </style>
</head>
<body>
<div class="films">
    <h2 class="title">PHP ile vizyondaki filmeleri çekme <a href="https://github.com/ibrahimhcadirci/php-vizyondaki-filmler" target="_blank">Github</a></h2>
    <div class="random-film">
    <p>Random film : <?=$random['name']?></p>
    </div>
    <h3 class="title">Vizyondaki Filmler</h3>
    <ul class="vision-films">
        <?php  foreach($films_data  as $row) {
        ?>
            <li>
                <div class="col">
                    <p><?=$row['name']?></p> <br> 
                    <span>Çıkış Tarihi : <?=$row['year']?></span>
                    <span>Aldığı Puan : <?=$row['point']?></span>
                    <span>Gösterime Girdiği Tarih: <?=$row['display_date']?></span>
                    <span>Kategori: <?=$row['film_type']?></span>
                </div>
                <div class="col">
                    <img src="<?=$row['image']?>" alt="<?=$row['title']?>"/>
                </div>
            </li>
        <?php
        }?>
    </ul>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/jquery.matchHeight-min.js"></script>
<script>
$(function() {
	$('.vizyonImg').matchHeight();
});
</script>
</body>
</html>