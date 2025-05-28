<?php
include('../template.php');

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
$sql = "SELECT entrees_produits.nom,SUM(entrees_produits.stock),nomenclature.qte_alerte FROM nomenclature,entrees_produits WHERE nomenclature.id = entrees_produits.id_nom AND entrees_produits.type_entree = 'A' GROUP BY entrees_produits.nom,nomenclature.qte_alerte ";
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
while (!$rs->EOF)
{
if((float)$rs->Fields[1]->Value < (float)$rs->Fields[2]->Value)
{
  $nbr_ligne = $nbr_ligne + 1;
  echo $rs->Fields[0]->Value . "|";
  echo $rs->Fields[1]->Value . "|";
  echo $rs->Fields[2]->Value . "|";
  echo "&&&";
}
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo "}t}t}";
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>