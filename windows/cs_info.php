<?php
include('../template.php');
$id = $_GET['id'];
$sql = "SELECT util_ouvre,date_debut,heure_debut,util_cloture,date_fin,heure_fin,caisse,etat_cloture,fond_de_caisse,total_réel FROM suivi_caisses WHERE id=$id";
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
echo $rs->Fields[6]->Value . "|";
echo $rs->Fields[7]->Value . "|";
echo $rs->Fields[8]->Value . "|";
echo $rs->Fields[9]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
?>