<?php
include('../template.php');
$sql1 = "";
$sql_pr = "SELECT id,nom FROM nomenclature WHERE id>0 ";
if ($_GET['produit'] != "")
{
$sql1 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
$sql = $sql_pr . $sql1 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";

?>