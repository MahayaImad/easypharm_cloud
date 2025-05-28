<?php
include('../template.php');
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";

$sql_pr = "SELECT * FROM suivi_caisses WHERE date_debut>=$date_debut AND date_debut<=$date_fin ";
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql1 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$ec_pos = 0;
$ec_neg = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
if($rs->Fields[23]->Value > 0){$ec_pos=$ec_pos + ((float)$rs->Fields[23]->Value);}
if($rs->Fields[23]->Value <= 0){$ec_neg=$ec_neg + abs((float)$rs->Fields[23]->Value);}
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[5]->Value . "|";
echo $rs->Fields[6]->Value . "|";
echo $rs->Fields[7]->Value . "|";
echo $rs->Fields[8]->Value . "|";
echo $rs->Fields[9]->Value . "|";
echo $rs->Fields[10]->Value . "|";
echo $rs->Fields[11]->Value . "|";
echo $rs->Fields[12]->Value . "|";
echo $rs->Fields[13]->Value . "|";
echo $rs->Fields[14]->Value . "|";
echo $rs->Fields[15]->Value . "|";
echo $rs->Fields[16]->Value . "|";
echo $rs->Fields[17]->Value . "|";
echo $rs->Fields[18]->Value . "|";
echo $rs->Fields[19]->Value . "|";
echo $rs->Fields[20]->Value . "|";
echo $rs->Fields[21]->Value . "|";
echo $rs->Fields[22]->Value . "|";
echo $rs->Fields[23]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $ec_pos . "|";
echo $ec_neg . "|";
echo "}t}t}";
?>