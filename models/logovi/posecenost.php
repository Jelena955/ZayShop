<?php

//dohvatanje logova iz log fajla, cepanje na delove i brojanje za odredjenu stranu zatim pretvaranje u procente za posete jednoj stranici od pocetka rada sajta kao i konkretnog broja u toku dana

$svi = file('data/log.txt');
      $svibr = count($svi);
    
      $i=0;
      $brk=0;
      $bra=0;
      $bri=0;
      $brl=0;
      $brr=0;
      $brh=0;
      $brab=0;
      $brs=0;
      $brkd=0;
      $brad=0;
      $brid=0;
      $brld=0;
      $brrd=0;
      $brabd=0;
      $brsd=0;
      $brhd=0;
      $datum=date('d-m-Y');
    

      for($i;$i<$svibr;$i++){

        $pocepan=explode("\t", $svi[$i]);
       
        $adresa=$pocepan[0];
        $date=$pocepan[1];
        list($datepocepan, $nesto)=explode(" ", $date);
    
      
       if(strrpos($adresa, "=")){

       

      list($indeks,$stranica)=explode("=", $adresa);

     
        if($stranica=="korisnik.php"){
            $brk++;
            if($datepocepan==$datum){
                $brkd++;
            }
           
        }
       else if($stranica=="admin.php"){
            $bra++;
            if($datepocepan==$datum){
                $brad++;
            }
            
            
        }
        else if($stranica=="register.php"){
            $brr++;
            if($datepocepan==$datum){
                $brrd++;
            }
           
        }
        else if($stranica=="login.php"){
            $brl++;
            if($datepocepan==$datum){
                $brld++;
            }
           
        }
        else if($stranica=="about.php"){
            $brab++;
            if($datepocepan==$datum){
                $brabd++;
            }
        }
        else if($stranica=="shop.php"){
            $brs++;
            if($datepocepan==$datum){
                $brsd++;
            }

            
        }

        else if($stranica=="home.php"){
            $brh++;
            if($datepocepan==$datum){
                $brhd++;
            }

            
        }
        $posetenakorisniku=round($brk/$svibr*100, 2);
        $posetenaadminu=round($bra/$svibr*100);
        $posetenaregistraciji=round($brr/$svibr*100);
        $posetenaloginu=round($brl/$svibr*100);
        $posetenaonama=round($brab/$svibr*100);
        $posetenasopu=round($brs/$svibr*100);
        $posetenahomeu=round($brh/$svibr*100);


    }}
     
     
?>