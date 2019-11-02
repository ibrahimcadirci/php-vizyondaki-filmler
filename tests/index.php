<?php 
require_once("../src/Films.php");
use \ibrahimhcadirci\films\Films;

$films      = new Films();

$films      = $films->vision_get();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .films .vizyonImg {
    border: 2px solid #ccc;
    padding: 15px;
    width: 150px;
    float: left;
    margin: 0px 15px 15px 0px;
}

* {
    font-family : 'Roboto', sans-serif;
    font-size:14px;
    
    box-sizing: border-box;}

.vizyonImg a {
    color: #333;
    font-weight: bold;
    display: block;
    text-decoration: none;
    text-align: center;
}
    </style>
</head>
<body>
<div class="films">

    <?php foreach($films as $row) {?>
            <?=$row['images']?>

<?php }?>
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