# PHP ile vizyondaki filmeleri çekme
Açıklama : Bu sınıf sayesinde Vizyondaki Filmleri sitenizde kullanabilirsiniz.

## İçeriği 
- get() : Vizyondaki filmleri getirir.
- categorys() : Vizyondaki filmlerin kategorileri getirir.
- random() : Vizyondaki filmler arasından random olarak bir film seçer.

## Kullanım 
`<?php`
`require_once("../src/Films.php");` <br/>
`$films      = new Films();`<br/>
`$random      = $films->random(); // Rastgele bir Film `<br/>
`$films_data      = $films->get(); // Vizyondaki Filmler `<br/>
`$categorys      = $films->categorys(); // Film kategorileri `<br/>


## Yardım 
[ibrahimcadirci.net](http://ibrahimcadirci.net/) <br>
[ibrahimh.cadirci@gmail.com](mailto:ibrahimh.cadirci@gmail.com)


