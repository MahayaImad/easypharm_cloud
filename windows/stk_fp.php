<?php
include('../template.php');
$produit = $_GET['produit'];
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";

///////////////////////////////////////////////////////////////////////////////////////////////////////
echo "[[[";
$sql_pr = "SELECT type_entree,id_entree,date_entree,fournisseur,qte_entree,lot,peremption FROM entrees_produits WHERE date_entree>=$date_debut AND date_entree<=$date_fin ";
$sql1 = "AND nom = '".$_GET['produit']."' ";
$sql = $sql_pr . $sql1;
$rs->Open($sql, $ProviderOLEDBHFSQL);
while (!$rs->EOF)
{
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
///////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
echo "[e[e[";
$sql_pr = "SELECT date_echange,pharmacie,qte,lot,peremption FROM echanges_sorties_produits WHERE date_echange>=$date_debut AND date_echange<=$date_fin ";
$sql1 = "AND nom = '".$_GET['produit']."' ";
$sql = $sql_pr . $sql1;
$rs->Open($sql, $ProviderOLEDBHFSQL);

while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]e]e]";
///////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
echo "[i[i[";
$sql_pr = "SELECT date,client,qte_sortie,lot,peremption FROM instance_produits WHERE date>=$date_debut AND date<=$date_fin ";
$sql1 = "AND nom = '".$_GET['produit']."' ";
$sql = $sql_pr . $sql1;
$rs->Open($sql, $ProviderOLEDBHFSQL);

while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]i]i]";
///////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
echo "[v[v[";
$sql_pr = "SELECT date,client,qte_sortie,lot,peremption FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";
$sql1 = "AND nom = '".$_GET['produit']."' ";
$sql = $sql_pr . $sql1;
$rs->Open($sql, $ProviderOLEDBHFSQL);

while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]v]v]";
///////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////
echo "[n[n[";
$sql_pr = "SELECT date,utilisateur,ecart,lot,peremption FROM inventaires_produits WHERE date>=$date_debut AND date<=$date_fin ";
$sql1 = "AND produit = '".$_GET['produit']."' ";
$sql = $sql_pr . $sql1;
$rs->Open($sql, $ProviderOLEDBHFSQL);

while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]n]n]";
///////////////////////////////////////////////////////////////////////////////////////////////////////



?>