<?php
namespace ibrahimhcadirci\films;

class Films {

   protected $films    = [],
             $categorys = [];
   public function __construct(){
        $this->vision_get();
   }

   public function vision_get() {
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,"http://sinema.mynet.com/vizyondaki-filmler");
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
        $sonuc = curl_exec($curl);
        preg_match_all('@<div class="vizyonImg">(.*?)</div>@si',$sonuc,$new); 
        preg_match_all('@<ul class="vizyonInfo clr">(.*?)</ul>@si',$sonuc,$info);
        $new = $new[0];
        $info = $info[0];
        for($i=0; $i < count($info);$i++){
            preg_match_all('/<a href="(.*?)" /',$new[$i],$link); 
            preg_match_all('/<img src="(.*?)" /',$new[$i],$image); 
            preg_match_all('/<span itemprop="name">(.*)<\/span>/',$new[$i],$name); 
            preg_match_all('@<li><span(.*?)</span>(.*?)</li>@si',$info[$i],$info_data); 
            $type       = isset($info_data[2][3]) ? $info_data[2][3] : 'Bilinmiyor' ;
            $this->films[$i]        = ["name"        => $name[1][0],"link"   => $link[1][0], "image"  => $image[1][0], 
                "year"  => $info_data[2][0],
                "display_date"  => $info_data[2][1],
                "point"  => $info_data[2][2],
                "film_type"  => $type
            ];
            array_push($this->categorys, $type);

        }
   }

   public function get($cache = null){
       return $this->films;
   }

   public function categorys(){
        return $this->categorys;
   }

   public function random(){
       return $this->films[rand(0,(count($this->films) - 1))];
   }
}
