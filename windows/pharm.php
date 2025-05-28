<?php
include('../template.php');
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";
$sql2 = "";
$sql3 = "";

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
$sql_pr = "SELECT echanges.id,echanges.type,echanges.date,echanges.pharmacie,echanges.total,echanges.utilisateur FROM echanges WHERE echanges.date>=$date_debut AND echanges.date<=$date_fin ";
if ($_GET['pharmacie'] != "")
{
$sql1 = "AND echanges.pharmacie LIKE '%".$_GET['pharmacie']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND echanges.utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == 2)
{
$sql3 = "AND echanges.type = 'EE' ";
}
if ($_GET['type'] == 3)
{
$sql3 = "AND echanges.type = 'ES' ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[5]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
$sql_zzz = "SELECT telephone,ecart_initial,pharmacie FROM pharmacies";
$rs->Open($sql_zzz, $ProviderOLEDBHFSQL);
echo "{{{";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "}}}";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>