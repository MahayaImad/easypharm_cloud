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
$noww = $_GET['noww'];
$nowwprch = $_GET['nowwprch'];

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT id,type,date,fournisseur,type_achat,date_piece,num_fact,num_bl,num_avoir,total_ttc, remise, total_a_payer,utilisateur,echeance,reglement FROM entrees WHERE avoir_financier=0 ";
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
$sql3 = "AND date>=$date_debut AND date<=$date_fin ";
}
else
{
$sql3 = "AND date_piece>=$date_debut AND date_piece<=$date_fin ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == "2")
{
$sql4 = "AND type = 'A' ";
}

if ($_GET['type'] == "3")
{
$sql4 = "AND type = 'AV' ";
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
if ($_GET['ech'] == 2)
{
$sql6 = "AND echeance>'00000000' AND echeance<=$nowwprch AND echeance<>'' AND reglement<total_a_payer ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$ttl_fact = 0;
$rms_fact = 0;
$ttl_bl = 0;
$rms_bl = 0;
$ttl_av = 0;
$rms_av = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
if($rs->Fields[1]->Value == "A" AND $rs->Fields[4]->Value == "Facture") 
{
$ttl_fact=$ttl_fact+ ((float)$rs->Fields[11]->Value) ;
$rms_fact=$rms_fact+ ((float)$rs->Fields[10]->Value) ;
}
if($rs->Fields[1]->Value == "A" AND $rs->Fields[4]->Value == "BL") 
{
$ttl_bl=$ttl_bl+ ((float)$rs->Fields[11]->Value) ;
$rms_bl=$rms_bl+ ((float)$rs->Fields[10]->Value) ;	
}
if($rs->Fields[1]->Value == "AV") 
{
$ttl_av=$ttl_av	+ ((float)$rs->Fields[11]->Value) ;
$rms_av=$rms_av+ ((float)$rs->Fields[10]->Value) ;
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
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $ttl_fact . "|";
echo $rms_fact  . "|";
echo $ttl_bl  . "|";
echo $rms_bl  . "|";
echo $ttl_av  . "|";
echo $rms_av  . "|";
echo "}t}t}";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////2///////////////////////////////////////////////////////////////////////////////////
if ($mode==2)
{
$sql_pr = "SELECT fournisseur,type_achat,total_a_payer FROM entrees WHERE avoir_financier=0 ";
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
$sql3 = "AND date>=$date_debut AND date<=$date_fin ";
}
else
{
$sql3 = "AND date_piece>=$date_debut AND date_piece<=$date_fin ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == "2")
{
$sql4 = "AND type = 'A' ";
}

if ($_GET['type'] == "3")
{
$sql4 = "AND type = 'AV' ";
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
if ($_GET['ech'] == 2)
{
$sql6 = "AND echeance>'00000000' AND echeance<=$nowwprch AND echeance<>'' AND reglement<total_a_payer ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 ;
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
$sql_pr = "SELECT utilisateur,type_achat,total_a_payer FROM entrees WHERE avoir_financier=0 ";
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
$sql3 = "AND date>=$date_debut AND date<=$date_fin ";
}
else
{
$sql3 = "AND date_piece>=$date_debut AND date_piece<=$date_fin ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['type'] == "2")
{
$sql4 = "AND type = 'A' ";
}

if ($_GET['type'] == "3")
{
$sql4 = "AND type = 'AV' ";
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
if ($_GET['ech'] == 2)
{
$sql6 = "AND echeance>'00000000' AND echeance<=$nowwprch AND echeance<>'' AND reglement<total_a_payer ";
}
////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 ;
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