<?php
include('../template.php');
$mode = $_GET['mode'];
$ech = $_GET['ech'];
$noww = $_GET['noww'];
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";
$sql2 = "";
$sql3 = "";
$sql4 = "";

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT id,type,date,heure,client,n_assure_chifa,n_assure_cvm,nom,prix_achat_ttc,prix_vente,qte_sortie,lot,peremption,motif,echeance FROM instance_produits WHERE date>=$date_debut AND date<=$date_fin ";
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
if ($_GET['type'] != 0)
{
$sql3 = "AND type = '".$_GET['type']."' ";
}
////////////////////////////////////////////////////////////////
if ($_GET['ech'] == 2)
{
$sql4 = "AND echeance<>'' AND echeance<=$noww ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$val_ach = 0;
$val_ppa = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
$val_ach = $val_ach + ((float)$rs->Fields[8]->Value * (float)$rs->Fields[10]->Value) ;
$val_ppa = $val_ppa + ((float)$rs->Fields[9]->Value * (float)$rs->Fields[10]->Value) ;
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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==2)
{
$sql_pr = "SELECT client,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM instance_produits WHERE date>=$date_debut AND date<=$date_fin ";

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
if ($_GET['type'] != 0)
{
$sql3 = "AND type = '".$_GET['type']."' ";
}
////////////////////////////////////////////////////////////////
if ($_GET['ech'] == 2)
{
$sql4 = "AND echeance<>'' AND echeance<=$noww ";
}
////////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY client ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql_grp;
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
$sql_pr = "SELECT nom,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie),SUM(qte_sortie) FROM instance_produits WHERE date>=$date_debut AND date<=$date_fin ";

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
if ($_GET['type'] != 0)
{
$sql3 = "AND type = '".$_GET['type']."' ";
}
////////////////////////////////////////////////////////////////
if ($_GET['ech'] == 2)
{
$sql4 = "AND echeance<>'' AND echeance<=$noww ";
}
////////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY nom ";
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


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($mode==4)
{
$sql_pr = "SELECT type,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM instance_produits WHERE date>=$date_debut AND date<=$date_fin ";

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
if ($_GET['type'] != 0)
{
$sql3 = "AND type = '".$_GET['type']."' ";
}
////////////////////////////////////////////////////////////////
if ($_GET['ech'] == 2)
{
$sql4 = "AND echeance<>'' AND echeance<=$noww ";
}
////////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY type ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql_grp;
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
$sql_pr = "SELECT motif,SUM(prix_achat_ttc * qte_sortie),SUM(prix_vente * qte_sortie) FROM instance_produits WHERE date>=$date_debut AND date<=$date_fin ";

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
if ($_GET['type'] != 0)
{
$sql3 = "AND type = '".$_GET['type']."' ";
}
////////////////////////////////////////////////////////////////
if ($_GET['ech'] == 2)
{
$sql4 = "AND echeance<>'' AND echeance<=$noww ";
}
////////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY motif ";
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql_grp;
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