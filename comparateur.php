<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Description" content="Calculateur pour r&eacute;seau TCP/IPV4" />
<meta name="Keywords" content="IP address, subnet mask, subnet, subnet comparator, network mask, ip calculator, tcp/ip, network" />
<style type="text/css">
<!--
input.in,select.in {  background-color:#DDFF33; }
input.out {  background-color:#A5A7E5; }
.Style1 {color: #C0C0C0}
table {
 border-width:1px; 
 border-style:solid; 
 border-color:black;
 }
td { 
  border-width:1px;
  border-style:solid;
  border-color:black; 
 }

-->
</style>
<title>Comparateur réseau IP v4</title>
</head>
<body>
<?php
/**
 * Nom programme		: comparateur.php
 *
 * Version			    : 2.0
 * Description		    : convertion d'un décimal en binaire
 * Date de création		: JJ/MM/AAAA
 * Date de modification : JJ/MM/AAAA
 * Auteur			    : Moi
 * Commentaire		    : 
*/

// Déclaration constante
define("MAXI", 7);

// Initialisation des variables ici ...
$adrDecComplet = false;
// -----------------------------------------------------------------------
if (! empty ($_POST["reset"])) {
 $adrDecComplet = false; 
} else {
  if (! empty ($_POST)) {
    if (isset ($_POST))  {
      $adrDecComplet = true;
      $adrIp1A = $_POST["adrIp1A"]; // T.A.F.  ...
      $adrIp2A = $_POST["adrIp2A"];
      $adrIp3A = $_POST["adrIp3A"]; 
      $adrIp4A = $_POST["adrIp4A"]; 
	  $adrIp1B = $_POST["adrIp1B"];
	  $adrIp2B = $_POST["adrIp2B"];
      $adrIp3B = $_POST["adrIp3B"]; 
      $adrIp4B = $_POST["adrIp4B"]; 
      $maskip1 = $_POST["maskip1"]; 
      $maskip2 = $_POST["maskip2"];
      $maskip3 = $_POST["maskip3"]; 
      $maskip4 = $_POST["maskip4"];
    }  
  }
}
?>
<h1>Comparateur  réseau IP v4</h1>
<form action="comparateur.php" method="post" name="convDecBin1" id="convDecBin1">
  <table border="0.1px">
    <colgroup>
    <col span="1" style="background-color:#FFFFFF" />
    <col span="1" style="background-color:#CCCCCC" />
    <col span="1" style="background-color:#EAE8E8" />
    </colgroup>
    <tr>
      <td width="158"></td>
      <td width="380" ><div align="center"><b>Poste A</b></div></td>
      <td width="377" ><div align="center"><b>Poste B</b></div></td>
    </tr>
    <tr>
      <td>Adresse IP</td>
      <td><div align="center">
          <input name="adrIp1A" size="3" <?php if($adrDecComplet){echo "value='$adrIp1A'" ; } else {echo "value='192'";} ?> class="in" type="text" />
          <input name="adrIp2A" size="3" <?php if($adrDecComplet){echo "value='$adrIp2A'" ; } else {echo "value='168'";} ?>  class="in" type="text" />
          <input name="adrIp3A" size="3" <?php if($adrDecComplet){echo "value='$adrIp3A'" ; } else {echo "value='21'";} ?> class="in" type="text" />
          <input name="adrIp4A" size="3" <?php if($adrDecComplet){echo "value='$adrIp4A'" ; } else {echo "value='9'";} ?>  class="in" type="text" />
        </div></td>
      <td><div align="center">
          <input name="adrIp1B" size="3" <?php if($adrDecComplet){echo "value='$adrIp1B'" ; } else {echo "value='192'";} ?> class="in" type="text" />
          <input name="adrIp2B" size="3" <?php if($adrDecComplet){echo "value='$adrIp2B'" ; } else {echo "value='168'";} ?> class="in" type="text" />
          <input name="adrIp3B" size="3" <?php if($adrDecComplet){echo "value='$adrIp3B'" ; } else {echo "value='21'";} ?> class="in" type="text" />
          <input name="adrIp4B" size="3" <?php if($adrDecComplet){echo "value='$adrIp4B'" ; } else {echo "value='254'";} ?> class="in" type="text" />
        </div></td>
    </tr>
    <tr>
      <td><span class="Style1">Adresse IP en binaire</span></td>
      <td><div align="center">
          <input name="adrbits1" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="adrbits2" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="adrbits3" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="adrbits4" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
        </div></td>
      <td><div align="center">
          <input name="adrbits12" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="adrbits22" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="adrbits32" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="adrbits42" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
        </div></td>
    </tr>
    <tr>
      <td>Masque</td>
      <td colspan="3"><div align="center">
          <select name="maskip1" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 0) {echo "selected";} } ?> value="0">0</option>
          </select>
          <select name="maskip2" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 0)   {echo "selected";} } ?> value="0">0</option>
          </select>
          <select name="maskip3" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 0)   {echo "selected";} } ?> value="0">0</option>
          </select>
          <select name="maskip4" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 0)   {echo "selected";} } ?> value="0">0</option>
          </select>
        </div>
        </div></td>
    </tr>
    <tr>
      <td><span class="Style1">Masque en binaire</span></td>
      <td colspan="3"><div align="center">
          <input name="maskbits1" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="maskbits2" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="maskbits3" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="maskbits4" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
        </div></td>
    </tr>
    <tr>
      <td>Résultat</td>
      <td><div align="center">
          <input name="resip1" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
          <input name="resip2" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
          <input name="resip3" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
          <input name="resip4" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
        </div></td>
      <td><div align="center">
          <input name="resip12" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
          <input name="resip22" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
          <input name="resip32" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
          <input name="resip42" size="3" value="<?php if($adrDecComplet){echo "";} ?>" class="out" type="text" />
        </div></td>
    </tr>
    <tr>
      <td><span class="Style1">Résultat en binaire </span></td>
      <td><div align="center">
          <input name="resbits1A" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="resbits2A" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="resbits3A" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="resbits4A" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
        </div></td>
      <td><div align="center">
          <input name="resbits1B" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="resbits2B" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="resbits3B" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
          <input name="resbits4B" size="8" value="<?php if($adrDecComplet){echo "";} ?>" type="text" />
        </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="right">
          <input name="submit" type="submit" value="Calculer"/>
          <input name="reset" type="submit" value="Réinitialiser"/>
        </div></td>
    </tr>
  </table>
</form>
<?php
if ($adrDecComplet) {
    echo "<h4>Résultat ici ...</h4>";
}
?>
</body>
</html>
