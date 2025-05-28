<?php
include('../template.php');
$id_session = $_GET['id_session'];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT caisse,client,utilisateur,poste,versement,total_a_payer,remise,benefices,montant_assuré,Pharmnos_total_non_remb,id,date,heure FROM sorties WHERE id_session=$id_session";
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
echo $rs->Fields[10]->Value . "|";
echo $rs->Fields[11]->Value . "|";
echo $rs->Fields[12]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sql2 = "SELECT opération,origine,destinataire,montant,id,date,heure,utilisateur FROM operations WHERE id_session=$id_session";
$rs->Open($sql2, $ProviderOLEDBHFSQL);
echo "[a[a[";
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
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]a]a]";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>