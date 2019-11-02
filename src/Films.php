<?php
namespace ibrahimhcadirci\films;

class Films {

    protected $films    = [];
   public function __construct(){
       
   }

   public function vision_get() {
        $curl = curl_init();// curl işlemini başlatıyoruz
        curl_setopt($curl,CURLOPT_URL,"http://sinema.mynet.com/vizyondaki-filmler");// linkimizi belirtiyoruz
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);// veritransferini etkinleştiriyoruz
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1); // linki takip etmesini sağlıyoruz
        $sonuc = curl_exec($curl); // ve sonucu bir değişkene atıyoruz
        preg_match_all('@<div class="vizyonImg">(.*?)</div>@si',$sonuc,$new); /* preg_match_all ile de sadece istdiğimiz kısımları seçiyoruz son olarak döngüye sokup yazdırıyoruz..*/ 
        preg_match_all('@<ul class="vizyonInfo clr">(.*?)</ul>@si',$sonuc,$info);
        $new = $new[0];
        $info = $info[0];
        for($i=0; $i < count($info);$i++){
            array_push($this->films, ["images"  => $new[$i], "info"     => $info[$i]]);
        }
        return $this->films;
   }
}
