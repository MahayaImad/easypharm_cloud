<?php
include('../template.php');
$sql1 = "";
$sql2 = "";
$sql3 = "";

$sql_pr = "SELECT id,fournisseur,telephone,(solde_initial+solde_actuel) FROM fournisseurs WHERE id>1 ";
if ($_GET['fourn'] != "")
{
$sql1 = "AND fournisseur LIKE '%".$_GET['fourn']."%' ";
}
$sql = $sql_pr . $sql1 . $sql2 . $sql3 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";

?>