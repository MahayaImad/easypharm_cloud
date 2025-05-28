<?php
include('../template.php');
$mode = $_GET['mode'];
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";
$sql2 = "";
$sql3 = "";

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT * FROM echanges WHERE date>=$date_debut AND date<=$date_fin ";
if ($_GET['pharmacie'] != "")
{
$sql1 = "AND pharmacie LIKE '%".$_GET['pharmacie']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == 2)
{
$sql3 = "AND type = 'EE' ";
}
if ($_GET['type'] == 3)
{
$sql3 = "AND type = 'ES' ";
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
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[5]->Value . "|";
echo $rs->Fields[6]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>