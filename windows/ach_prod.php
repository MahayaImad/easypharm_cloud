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
$sql4 = "";
$sql5 = "";
$sql6 = "";
$sql7 = "";

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT id,type_entree,date_entree,fournisseur,type_achat,date_piece,num_fact,num_bl,num_avoir,utilisateur,nom,prix_achat_ttc,ppa,marge,qte_entree,lot,peremption FROM entrees_produits WHERE id_entree<>0 ";
if ($_GET['fournisseur'] != "")
{
$sql1 = "AND fournisseur LIKE '%".$_GET['fournisseur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['filtrage_date'] == "1")
{
$sql3 = "AND date_entree>=$date_debut AND date_entree<=$date_fin ";
}
else
{
$sql3 = "AND date_piece>=$date_debut AND date_piece<=$date_fin ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == "2")
{
$sql4 = "AND type_entree = 'A' ";
}

if ($_GET['type'] == "3")
{
$sql4 = "AND type_entree = 'AV' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['piece'] == "2")
{
$sql5 = "AND type_achat = 'Facture' ";
}

if ($_GET['piece'] == "3")
{
$sql5 = "AND type_achat = 'BL' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql6 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['famille'] != "")
{
$sql7 = "AND famille LIKE '%".$_GET['famille']."%' ";
}
/////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$ttl_fact = 0;
$ttl_bl = 0;
$ttl_av = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
if($rs->Fields[1]->Value == "A" AND $rs->Fields[4]->Value == "Facture") 
{
$ttl_fact=$ttl_fact+ ((float)$rs->Fields[11]->Value * (float)$rs->Fields[14]->Value) ;
}
if($rs->Fields[1]->Value == "A" AND $rs->Fields[4]->Value == "BL") 
{
$ttl_bl=$ttl_bl+ ((float)$rs->Fields[11]->Value * (float)$rs->Fields[14]->Value);
}
if($rs->Fields[1]->Value == "AV") 
{
$ttl_av=$ttl_av	+ ((float)$rs->Fields[11]->Value * (float)$rs->Fields[14]->Value) ;
}
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
echo "{t{t{";
echo $nbr_ligne . "|";
echo $ttl_fact . "|";
echo $ttl_bl  . "|";
echo $ttl_av  . "|";
echo "}t}t}";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////2///////////////////////////////////////////////////////////////////////////////////
if ($mode==2)
{
$sql_pr = "SELECT nom,type_achat,(prix_achat_ttc * qte_entree) FROM entrees_produits WHERE id_entree<>0 ";
if ($_GET['fournisseur'] != "")
{
$sql1 = "AND fournisseur LIKE '%".$_GET['fournisseur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['filtrage_date'] == "1")
{
$sql3 = "AND date_entree>=$date_debut AND date_entree<=$date_fin ";
}
else
{
$sql3 = "AND date_piece>=$date_debut AND date_piece<=$date_fin ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == "2")
{
$sql4 = "AND type_entree = 'A' ";
}

if ($_GET['type'] == "3")
{
$sql4 = "AND type_entree = 'AV' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['piece'] == "2")
{
$sql5 = "AND type_achat = 'Facture' ";
}

if ($_GET['piece'] == "3")
{
$sql5 = "AND type_achat = 'BL' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql6 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['famille'] != "")
{
$sql7 = "AND famille LIKE '%".$_GET['famille']."%' ";
}
/////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 ;
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

//////////////////////////////////////////////////////////////2///////////////////////////////////////////////////////////////////////////////////
if ($mode==3)
{
$sql_pr = "SELECT famille,type_achat,(prix_achat_ttc * qte_entree) FROM entrees_produits WHERE id_entree<>0 ";
if ($_GET['fournisseur'] != "")
{
$sql1 = "AND fournisseur LIKE '%".$_GET['fournisseur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['filtrage_date'] == "1")
{
$sql3 = "AND date_entree>=$date_debut AND date_entree<=$date_fin ";
}
else
{
$sql3 = "AND date_piece>=$date_debut AND date_piece<=$date_fin ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == "2")
{
$sql4 = "AND type_entree = 'A' ";
}

if ($_GET['type'] == "3")
{
$sql4 = "AND type_entree = 'AV' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['piece'] == "2")
{
$sql5 = "AND type_achat = 'Facture' ";
}

if ($_GET['piece'] == "3")
{
$sql5 = "AND type_achat = 'BL' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql6 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['famille'] != "")
{
$sql7 = "AND famille LIKE '%".$_GET['famille']."%' ";
}
/////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 ;
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

?>