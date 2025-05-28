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

//////////////////////////////////////////////////////////////1////////////////////////////////////////////////////////////////////////////
if ($mode==1)
{
$sql_pr = "SELECT * FROM sorties WHERE date>=$date_debut AND date<=$date_fin ";
if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
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
$total = 0;
$vers = 0;
$benef = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
$total = $total + ((float)$rs->Fields[7]->Value) ;
$vers = $vers + (float)$rs->Fields[8]->Value ;
$benef = $benef + (float)$rs->Fields[13]->Value  ;
echo $rs->Fields[0]->Value . "|";
echo $rs->Fields[2]->Value . "|";
echo $rs->Fields[12]->Value . "|";
echo $rs->Fields[10]->Value . "|";
echo $rs->Fields[39]->Value . "|";
echo $rs->Fields[9]->Value . "|";
echo $rs->Fields[4]->Value . "|";
echo $rs->Fields[7]->Value . "|";
echo $rs->Fields[8]->Value . "|";
echo $rs->Fields[13]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $total . "|";
echo $vers . "|";
echo $benef . "|";
echo "}t}t}";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////2///////////////////////////////////////////////////////////////////////////////////
if ($mode==2)
{
$sql_pr = "SELECT client,SUM(total_a_payer),SUM(versement),SUM(benefices) FROM sorties WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
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
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////3///////////////////////////////////////////////////////////////////////////////////
if ($mode==3)
{
$sql_pr = "SELECT utilisateur,SUM(total_a_payer),SUM(versement),SUM(benefices) FROM sorties WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['caisse'] != "")
{
$sql3 = "AND caisse LIKE '%".$_GET['caisse']."%' ";
}
///////////////////////////////////////////////////////////////
$sql_grp = "GROUP BY utilisateur ";
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


//////////////////////////////////////////////////////////////4///////////////////////////////////////////////////////////////////////////////////
if ($mode==4)
{
$sql_pr = "SELECT caisse,SUM(total_a_payer),SUM(versement),SUM(benefices) FROM sorties WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
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
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////5///////////////////////////////////////////////////////////////////////////////////
if ($mode==5)
{
$sql_pr = "SELECT poste,SUM(total_a_payer),SUM(versement),SUM(benefices) FROM sorties WHERE date>=$date_debut AND date<=$date_fin ";

if ($_GET['client'] != "")
{
$sql1 = "AND client LIKE '%".$_GET['client']."%' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
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
echo $rs->Fields[3]->Value . "|";
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>