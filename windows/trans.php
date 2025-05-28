<?php
include('../template.php');
$date_debut = str_replace("/","",$_GET['date_debut']);
$date_debut = substr($date_debut, 4, 4).substr($date_debut, 2,2).substr($date_debut, 0, 2);
$date_fin = str_replace("/","",$_GET['date_fin']);
$date_fin = substr($date_fin, 4, 4).substr($date_fin, 2,2).substr($date_fin, 0, 2);
$sql1 = "";
$sql2 = "";
$trs = $_GET['trs'];
if($trs == "dep"){$trs = "Dépense";}
$sql_pr = "SELECT id,date,heure,utilisateur,operation,origine,destinataire,montant,mode,ref,observation FROM opérations WHERE montant<>0 AND date>=$date_debut AND date<=$date_fin ";
if ($_GET['trs'] != "")
{
$sql1 = "AND opération = '".$trs."' ";
}
/////////////////////////////////////////////////////////////////
if ($_GET['utilisateur'] != "")
{
$sql2 = "AND utilisateur LIKE '%".$_GET['utilisateur']."%' ";
}
/////////////////////////////////////////////////////////////////
$sql = $sql_pr . $sql1 . $sql2 ;
$rs->Open($sql, $ProviderOLEDBHFSQL);
echo "[[[";
$nbr_ligne = 0;
$vf = 0;
$rf = 0;
$vc = 0;
$rc = 0;
$alim = 0;
$dep = 0;
$rec = 0;
$fdc = 0;
$vir = 0;
while (!$rs->EOF)
{
$nbr_ligne = $nbr_ligne + 1;
if($rs->Fields[4]->Value == "Versement fournisseur"){$vf=$vf + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Remboursement fournisseur"){$rf=$rf + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Versement client"){$vc=$vc + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Remboursement client"){$rc=$rc + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Alimentation"){$alim=$alim + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Dépense"){$dep=$dep + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Recette"){$rec=$rec + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Fond de caisse"){$fdc=$fdc + ((float)$rs->Fields[7]->Value);}
if($rs->Fields[4]->Value == "Virement de fond"){$vir=$vir + ((float)$rs->Fields[7]->Value);}
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
echo "&&&";
$rs->MoveNext();
}
$rs->Close();
echo "]]]";
echo "{t{t{";
echo $nbr_ligne . "|";
echo $vf . "|";
echo $rf . "|";
echo $vc . "|";
echo $rc . "|";
echo $alim . "|";
echo $dep . "|";
echo $rec . "|";
echo $fdc . "|";
echo $vir . "|";
echo "}t}t}";
?>