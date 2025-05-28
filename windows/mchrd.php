<?php
include('../template.php');
$sql1 = "";
$sql_pr = "SELECT date,heure,utilisateur,poste,action,description FROM mouchard WHERE id>1 ";
if ($_GET['util'] != "")
{
$sql1 = "AND utilisateur LIKE '%".$_GET['util']."%' ";
}
$sql = $sql_pr . $sql1 ;
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

?>

