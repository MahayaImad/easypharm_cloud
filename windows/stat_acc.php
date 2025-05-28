<?php
include('../template.php');
$sql = "SELECT * FROM cloud_trt WHERE id=1";
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[1]->Value . "***";
echo $rs->Fields[2]->Value . "***";
echo $rs->Fields[3]->Value . "***";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";


$sql = "SELECT péremption_proche_jour,alerte_echeance_fournisseur FROM parametres WHERE id=1";
$rs->Open($sql, $ProviderOLEDBHFSQL);

while (!$rs->EOF)
{
echo "xxxx";
echo $rs->Fields[0]->Value;
echo "xxxx";
echo "yyyy";
echo $rs->Fields[1]->Value;
echo "yyyy";
$rs->MoveNext();
}
$rs->Close();

?>