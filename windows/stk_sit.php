<?php
include('../template.php');
$mode = $_GET['mode'];
$sql1 = "";
$sql2 = "";
$sql3 = "";
$sql4 = "";
$sql5 = "";
$sql6 = "";
$sql7 = "";
$sql_ordby = "";

$noww = $_GET['noww'];
$nowwprch = $_GET['nowwprch'];
$grp = $_GET['grp'];

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT id,nom,prix_achat_ttc,marge,ppa,lot,peremption,qte_entree,stock,date_entree,fournisseur,type_achat,bloque FROM entrees_produits WHERE type_entree <> 'AV' ";

if ($_GET['dispo'] == 2)
{
$sql1 = "AND stock > 0 ";
}
if ($_GET['dispo'] == 3)
{
$sql1 = "AND stock = 0 ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['fournisseur'] != "")
{
$sql2 = "AND fournisseur LIKE '%".$_GET['fournisseur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql3 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['famille'] != "")
{
$sql4 = "AND famille LIKE '%".$_GET['famille']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['ppa'] != 0)
{
$sql5 = "AND ppa = '".$_GET['ppa']."' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == 2)
{
$sql6 = "AND type_achat = 'BL' ";
}
if ($_GET['type'] == 3)
{
$sql6 = "AND type_achat = 'Facture' ";
}
if ($_GET['type'] == 4)
{
$sql6 = "AND type_achat = 'E' ";
}
if ($_GET['type'] == 5)
{
$sql6 = "AND type_achat = 'I' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['peremption'] == 2)
{
$sql7 = "AND peremption_date>$noww AND peremption_date<='99999999' ";
}
if ($_GET['peremption'] == 3)
{
$sql7 = "AND peremption_date>'00000000' AND peremption_date<=$noww ";
}
if ($_GET['peremption'] == 4)
{
$sql7 = "AND peremption_date>$noww AND peremption_date<=$nowwprch ";
}
/////////////////////////////////////////////////////////////////
$sql_ordby = "ORDER BY nom ";
/////////////////////////////////////////////////////////////////

$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 . $sql_ordby ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$val_ach = 0;
$val_ppa = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
$val_ach = $val_ach + ((float)$rs->Fields[8]->Value * (float)$rs->Fields[2]->Value) ;
$val_ppa = $val_ppa + ((float)$rs->Fields[8]->Value * (float)$rs->Fields[4]->Value) ;
if ($_GET['nbr_ligne'] == 50 AND $nbr_ligne > 50){GOTO srt;}
if ($_GET['nbr_ligne'] == 200 AND $nbr_ligne > 200){GOTO srt;}
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
srt:
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $val_ach . "|";
echo $val_ppa . "|";
echo "}t}t}";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////2///////////////////////////////////////////////////////////////////////////////////
if ($mode==2)
{
 
 if ($grp==2)
{
$sql_pr = "SELECT nom,SUM(prix_achat_ttc*stock),SUM(ppa*stock),sum(stock) FROM entrees_produits WHERE type_entree <> 'AV' ";
}
 if ($grp==3)
{
$sql_pr = "SELECT fournisseur,SUM(prix_achat_ttc*stock),SUM(ppa*stock),sum(stock) FROM entrees_produits WHERE type_entree <> 'AV' ";
}
 if ($grp==4)
{
$sql_pr = "SELECT type_achat,SUM(prix_achat_ttc*stock),SUM(ppa*stock),sum(stock) FROM entrees_produits WHERE type_entree <> 'AV' ";
}
 if ($grp==5)
{
$sql_pr = "SELECT famille,SUM(prix_achat_ttc*stock),SUM(ppa*stock),sum(stock) FROM entrees_produits WHERE type_entree <> 'AV' ";
}
 if ($grp==6)
{
$sql_pr = "SELECT peremption,SUM(prix_achat_ttc*stock),SUM(ppa*stock),sum(stock) FROM entrees_produits WHERE type_entree <> 'AV' ";
}
 

if ($_GET['dispo'] == 2)
{
$sql1 = "AND stock > 0 ";
}
if ($_GET['dispo'] == 3)
{
$sql1 = "AND stock = 0 ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['fournisseur'] != "")
{
$sql2 = "AND fournisseur LIKE '%".$_GET['fournisseur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['produit'] != "")
{
$sql3 = "AND nom LIKE '%".$_GET['produit']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['famille'] != "")
{
$sql4 = "AND famille LIKE '%".$_GET['famille']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['ppa'] != 0)
{
$sql5 = "AND ppa = '".$_GET['ppa']."' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == 2)
{
$sql6 = "AND type_achat = 'BL' ";
}
if ($_GET['type'] == 3)
{
$sql6 = "AND type_achat = 'Facture' ";
}
if ($_GET['type'] == 4)
{
$sql6 = "AND type_achat = 'E' ";
}
if ($_GET['type'] == 5)
{
$sql6 = "AND type_achat = 'I' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['peremption'] == 2)
{
$sql7 = "AND peremption_date>$noww AND peremption_date<='99999999' ";
}
if ($_GET['peremption'] == 3)
{
$sql7 = "AND peremption_date>'00000000' AND peremption_date<=$noww ";
}
if ($_GET['peremption'] == 4)
{
$sql7 = "AND peremption_date>$noww AND peremption_date<=$nowwprch ";
}
/////////////////////////////////////////////////////////////////
 if ($grp==2)
{
  $sql_grp = "GROUP BY nom ";
}
 if ($grp==3)
{
  $sql_grp = "GROUP BY fournisseur ";
}
 if ($grp==4)
{
  $sql_grp = "GROUP BY type_achat ";
}
 if ($grp==5)
{
  $sql_grp = "GROUP BY famille ";
}
 if ($grp==6)
{
  $sql_grp = "GROUP BY peremption ";
}

////////////////////////////////////////////////////////////////

$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 . $sql_grp ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$val_ach = 0;
$val_ppa = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
$val_ach = $val_ach + ((float)$rs->Fields[1]->Value) ;
$val_ppa = $val_ppa + ((float)$rs->Fields[2]->Value) ;
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[1]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $val_ach . "|";
echo $val_ppa . "|";
echo "}t}t}";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>