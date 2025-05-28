<?php 
session_start();
include('template.php');
$sql = "SELECT * FROM parametres"; 
$rs->Open($sql, $ProviderOLEDBHFSQL);
// Parcours du résultat de la requête
$index = 0;
while (!$rs->EOF) 
{
$_SESSION['nbr_jr_per_proche'] = $rs->Fields[15]->Value;
$id_cloud_local = $rs->Fields[59]->Value;
$rs->MoveNext();    
$index++;
}
$rs->Close();

if($id_cloud_local != $_SESSION['id_cloud'])
{
  header('Location: http://vps31502.lws-hosting.com/easypharm_cloud/defaut/index.php?err=5');
  exit;
}

try
{
	$bdd = new PDO('mysql:host=vps31502.lws-hosting.com;dbname=easypharm_1;charset=utf8', 'bailando2884', 'bailando2884');
}
  catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}
$id_cloud = $_SESSION['id_cloud'];
$abn = 0 ;

$reponse = $bdd->query("SELECT * FROM clients_easydev WHERE id_cloud = '$id_cloud'");
while ($donnees = $reponse->fetch())
{
  if(date("Y-m-d") > $donnees['date_fin'])
  {
    $abn = 0 ;
    $date_fin = $donnees['date_fin'] ;
  }
  else
  {
    $abn = 1 ;
  }
}
$reponse->closeCursor();

if($abn == 0)
{
  header('Location: http://vps31502.lws-hosting.com/easypharm_cloud/defaut/index.php?err=4&date_fin='.$date_fin.'');
  exit;
}
?>