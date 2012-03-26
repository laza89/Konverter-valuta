<?php
$url="http://www.google.com/ig/calculator?hl=en&q=1";
$broj=$_GET['broj'];
$iz=$_GET['iz'];
$u=$_GET['u'];
if ($broj<0 || strlen($broj)==0 || !is_numeric($broj)){
echo "<p id='greska'>Morate uneti nenegativan broj za količinu!</p>";
}
else{
$url=$url.$iz."=?".$u;
$string=file_get_contents($url);
//moze i na ovaj nacin da se dodaju navodnici za kljuceve u nepotpunom JSON-u koji salje google pa da se tretira kao pravi JSON
//$phpJson = preg_replace("/((\"?[^\"]+\"?)[ ]*:[ ]*([^,\"]+|\"[^\"]*\")(,?))/i", '"\\2": \\3\\4', str_replace(array('{', '}'), array('',''), $string));
//$phpJson="{".$phpJson."}";
//$json=json_decode($phpJson);

$string = explode('"', $string);
$rez1 = explode(' ', $string[3]);
$rez = $rez1[0];
$rez=$rez*$broj;
$rez =number_format($rez, 2, '.', ',');
echo "<p>".$rez." ".$u."</p>";
}

?>