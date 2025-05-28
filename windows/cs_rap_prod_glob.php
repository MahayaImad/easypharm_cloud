<?php
include('../template.php');
$id_session = $_GET['id_session'];
$mode = $_GET['mode'];
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode == 1 OR $mode == 2 OR $mode == 3)
{
$sql = "SELECT sorties_produits.caisse,sorties_produits.id,sorties_produits.id_sortie,sorties_produits.date,sorties_produits.heure,sorties_produits.client,sorties_produits.id_produit,sorties_produits.id_nom,sorties_produits.nom,sorties_produits.prix_achat_ttc,sorties_produits.prix_vente,sorties_produits.qte_sortie,sorties_produits.lot,sorties_produits.péremption,sorties_produits.poste,sorties_produits.utilisateur,nomenclature.nom,nomenclature.de_equiv,nomenclature.forme,nomenclature.dci,nomenclature.dosage FROM sorties_produits,nomenclature WHERE sorties_produits.id_session=$id_session AND sorties_produits.id_nom=nomenclature.id ";
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
echo $rs->Fields[13]->Value . "|";
echo $rs->Fields[14]->Value . "|";
echo $rs->Fields[15]->Value . "|";
echo $rs->Fields[16]->Value . "|";
echo $rs->Fields[17]->Value . "|";
echo $rs->Fields[18]->Value . "|";
echo $rs->Fields[19]->Value . "|";
echo $rs->Fields[20]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode == 4)
{
$sql = "SELECT sorties_produits.caisse,sorties_produits.id,sorties_produits.id_sortie,sorties_produits.date,sorties_produits.heure,sorties_produits.client,sorties_produits.id_produit,sorties_produits.id_nom,sorties_produits.nom,sorties_produits.prix_achat_ttc,sorties_produits.prix_vente,sorties_produits.qte_sortie,sorties_produits.lot,sorties_produits.péremption,sorties_produits.poste,sorties_produits.utilisateur,entrées_produits.fournisseur FROM sorties_produits,entrees_produits WHERE sorties_produits.id_session=$id_session AND sorties_produits.id_produit=entrées_produits.id ";
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
echo $rs->Fields[13]->Value . "|";
echo $rs->Fields[14]->Value . "|";
echo $rs->Fields[15]->Value . "|";
echo $rs->Fields[16]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>