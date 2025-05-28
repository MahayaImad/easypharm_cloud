<?php
include('../template.php');
$sql1 = "";
$sql2 = "";
$sql3 = "";

$sql_pr = "SELECT id,client,telephone,n_assure_chifa,num_assure_cvm,(solde_initial+credit),num_assuré_pharmnos FROM clients WHERE id>3 AND client<>'CVM' AND client<>'Hors CHIFA' AND client<>'PHARMNOS-IMP' ";
if ($_GET['client'] != "")
{
$sql1 = "AND client+n_assure_chifa+num_assure_cvm LIKE '%".$_GET['client']."%' ";
}
$sql = $sql_pr . $sql1 . $sql2 . $sql3 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$total = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
$total = $total + ((float)$rs->Fields[5]->Value) ;
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[5]->Value . "|";
echo $rs->Fields[6]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $total . "|";
echo "}t}t}";
?>