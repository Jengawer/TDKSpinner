<?php
function sayfa(){
?>
<form method="post" id="form">
    <table width="100%" align="center">
        <tr><h1>TDKSpinner</h1></td></tr>
        <tr>
            <td>
                <input type="text" name="degismeyecek" style="width:100%; float:left;" placeholder="Değiştirilmeyecek kelimeleri girin. Ayırmak için virgül koyun." />
                <select  name="spintur" style="width:300px; float:left; margin-left:0 6px 0 6px;" >
                    <option value="rastgele">Rastgele Spinlesin (Anlam Bozulabilir)</option>
                    <option value="ben">Spinleri Ben Belirleyeyim (Önerilir)</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <textarea name="yazi" style="width:100%; height: 400px; float:left;"></textarea>
            </td>
        </tr>
    </table>    
</form>    
<center>
    <button type="submit" id="btn" onclick="sondur()"> Spinle</button>                    
</center>
<div id="yaz"></div>   
        
<?php } ?>