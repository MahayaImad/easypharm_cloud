<?php
include('../template.php');
$sql1 = "";
$sql2 = "";
$sql3 = "";
$sql_pr = "SELECT id,date,total_a_payer,no_facture_chifa,montant_assuré,Pharmnos_num_fact,Pharmnos_total_non_remb,client FROM sorties WHERE client = '".$_GET['client']."' ";
if ($_GET['num_chifa'] != "")
{
$sql1 = "OR n_assuré = '".$_GET['num_chifa']."' ";
}
if ($_GET['num_cvm'] != "")
{
$sql2 = "OR num_assuré_cvm = '".$_GET['num_cvm']."' ";
}
if ($_GET['num_pharmnos'] != "")
{
$sql3 = "OR Pharmnos_num_assure  = '".$_GET['num_pharmnos']."' ";
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
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[5]->Value . "|";
echo $rs->Fields[6]->Value . "|";
echo $rs->Fields[7]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";

?>