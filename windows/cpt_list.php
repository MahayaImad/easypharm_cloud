<?php
include('../template.php');
//////////////////////////////////////////////////////////////////////////
$sql = "SELECT id,compte FROM comptes_bancaires ";
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
////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////
$sql_22 = "SELECT origine,destinataire,montant FROM opérations ";
$rs->Open($sql_22, $ProviderOLEDBHFSQL);
echo "[t[t[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]t]t]";
//////////////////////////////////////////////////////////////////////////
?>