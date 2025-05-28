<?php
include('../template.php');
$mode = $_GET['mode'];
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";
$sql2 = "";
$sql3 = "";

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT id,id_sortie,poste,caisse,date,heure,client,nom,prix_achat_ttc,prix_vente,qte_sortie,lot,peremption FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";
if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$val_ach = 0;
$val_vnt = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
$val_ach=$val_ach+ ((float)$rs->Fields[8]->Value * (float)$rs->Fields[10]->Value) ;
$val_vnt=$val_vnt+ ((float)$rs->Fields[9]->Value * (float)$rs->Fields[10]->Value) ;
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
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $val_ach . "|";
echo $val_vnt  . "|";
echo "}t}t}";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==2)
{
$sql_pr = "SELECT client,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY client ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==3)
{
$sql_pr = "SELECT nom,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie),SUM(qte_sortie) FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY nom ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==4)
{
$sql_pr = "SELECT famille,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY famille ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==5)
{
$sql_pr = "SELECT caisse,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY caisse ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==6)
{
$sql_pr = "SELECT poste,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM sorties_produits WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY poste ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==7)
{
$sql_pr = "SELECT entrees_produits.fournisseur,SUM(sorties_produits.prix_achat_ttc * sorties_produits.qte_sortie),SUM(sorties_produits.prix_vente * sorties_produits.qte_sortie) FROM sorties_produits,entrees_produits WHERE sorties_produits.id_produit=entrees_produits.id AND sorties_produits.date>=$date_debut AND sorties_produits.date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND sorties_produits.client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND sorties_produits.nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND sorties_produits.caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY entrees_produits.fournisseur ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==100)
{
$sql_pr = "SELECT sorties_produits.nom,SUM(sorties_produits.prix_achat_ttc * sorties_produits.qte_sortie),SUM(sorties_produits.prix_vente * sorties_produits.qte_sortie),SUM(sorties_produits.qte_sortie) FROM sorties_produits,entrees_produits WHERE sorties_produits.id_produit=entrees_produits.id AND sorties_produits.date>=$date_debut AND sorties_produits.date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND sorties_produits.client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql2 = "AND sorties_produits.nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND sorties_produits.caisse LIKE '%".$_GET['caisse']."%' ";
}
$sql4 = "AND entrees_produits.fournisseur = '".$_GET['fourn']."' ";

///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY sorties_produits.nom ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql_grp;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
while (!$rs->EOF)
{
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>