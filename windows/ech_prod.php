<?php

include('../template.php');
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";
$sql2 = "";
$sql3 = "";


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($_GET['type'] == 2 )
{
$sql_pr = "SELECT id_echange,date_entree,date_entree,fournisseur,nom,ppa,qte_entree,lot,péremption FROM entrees_produits WHERE id_echange<>0 AND date_entree>=$date_debut AND date_entree<=$date_fin ";
if ($_GET['pharmacie'] != "")
{
$sql1 = "AND fournisseur LIKE '%".$_GET['pharmacie']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
////////////////////////////////////////////////////////////////
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
echo $rs->Fields[8]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($_GET['type'] == 3 )
{
$sql_pr = "SELECT id,date_echange,date_echange,pharmacie,nom,prix_vente,qte,lot,péremption FROM echanges_sorties_produits WHERE date_echange>=$date_debut AND date_echange<=$date_fin ";
if ($_GET['pharmacie'] != "")
{
$sql1 = "AND pharmacie LIKE '%".$_GET['pharmacie']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "{{{";
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
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "}}}";
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if ($_GET['type'] == 1 )
{
$sql_pr = "SELECT id_echange,date_entree,date_entree,fournisseur,nom,ppa,qte_entree,lot,péremption FROM entrees_produits WHERE id_echange<>0 AND date_entree>=$date_debut AND date_entree<=$date_fin ";
if ($_GET['pharmacie'] != "")
{
$sql1 = "AND fournisseur LIKE '%".$_GET['pharmacie']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
////////////////////////////////////////////////////////////////
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
echo $rs->Fields[8]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";

$sql_pr = "SELECT id,date_echange,date_echange,pharmacie,nom,prix_vente,qte,lot,péremption FROM echanges_sorties_produits WHERE date_echange>=$date_debut AND date_echange<=$date_fin ";
if ($_GET['pharmacie'] != "")
{
$sql1 = "AND pharmacie LIKE '%".$_GET['pharmacie']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "{{{";
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
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "}}}";

}

?>