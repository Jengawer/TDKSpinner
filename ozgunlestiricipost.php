<?php
$yazi=$_POST['yazi'];
if($yazi==""){die ('<center>Lütfen metin kısmını boş bırakmayınız!</center>');}
$yazi = str_replace('"',"'",strip_tags($yazi));
$degismeyecek=explode(",",$_POST['degismeyecek']);
array_push($degismeyecek, "ve","de");
$kelimeler = explode(" ", $yazi);
$kelimesayisi= count($kelimeler);
$yeniyazi="";
$yedek="";
$ii=1;    
for($i=0;$i<$kelimesayisi;$i++){
    $istisnalar=$degismeyecek;
    if(in_array ($kelimeler[$i] ,$istisnalar)){
        $yenianlam=$kelimeler[$i];
        $yedekle=$kelimeler[$i];
    }
    else{
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,"http://tdk.org.tr/index.php?option=com_esanlamlar&arama=esanlam&guid=TDK.ESA.53522510b0f817.16944326");
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"keyword=".$kelimeler[$i]);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , 1);  
        $veri = curl_exec($ch);
        curl_close($ch);   
        if(strstr($veri, "<span id='notfound'>")){
            $yenianlam=$kelimeler[$i]; $yedekle=$kelimeler[$i];
        }else{    
            $veri = explode("<td  class='meaning'>",$veri);
            $veri2 = explode("</td>",$veri[1]);
            $anlamlar = explode (" / ",$veri2[0]);
            if($_POST['spintur']=="ben"){
                $yenianlambas='<select class="input-large m-wrap" tabindex="1" name="'.$ii.'">';
                $yenianlamson="";
                foreach($anlamlar as $eleman) {
                    $yenianlamson=$yenianlamson.'<option value="'.$eleman.'">'.$eleman.'</option>';
                }
                $yenianlam=$yenianlambas.$yenianlamson.'<option value="'.$kelimeler[$i].'">'.$kelimeler[$i].'</option></select>'; 
            }else{
                $yenianlam=  $anlamlar[array_rand($anlamlar)];
                }
            $yedekle="{[".$ii."]}";
            $ii++;        
            }
        }
    $yedek=$yedek." ".$yedekle;    
    $yeniyazi=$yeniyazi." ".$yenianlam;    
    }
    
    echo '<form method="post" id="form3">                        
            <div class="widget-body form">
                <input type="hidden" name="sayi" value='.$ii.'>
                <input type="hidden" name="yazii" value="'.$yedek.'">
                <input type="hidden" name="formadi" value="ozgunlestirici"></input>    
                <div class="control-group">
                    <table width="900" align="center">
                        <tr>
                            <td>
                                <center><p><b>Spinli Yazı</b></p></center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                '.$yeniyazi.'
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
<center><button  type="submit" id="btn3">Kaydet</button></center>                        
</form>';

    

    ?>
<div id="yaz3"></div> 
</body>
</html>

