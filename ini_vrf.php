<?php 
session_start();
include('template.php');
$sql = "SELECT * FROM parametres"; 
$rs->Open($sql, $ProviderOLEDBHFSQL);
// Parcours du résultat de la requête
$index = 0;
while (!$rs->EOF) 
{
$id_cloud_local = $rs->Fields[59]->Value;
$rs->MoveNext();    
$index++;
}
$rs->Close();

if($id_cloud_local == $_GET['id_cloud'])
{
  $_SESSION['id_cloud'] = $_GET['id_cloud'] ;
  $_SESSION['ip_public_cloud'] = $_GET['ip_public_cloud'] ;  
  header('Location: index.php');
  exit;  
}
else
{
  header('Location: http://vps31502.lws-hosting.com/easypharm_cloud/default/index.php?err=5');
  exit;
}
?>