<?php $ProviderOLEDBHFSQL ='Provider=PCSOFT.HFSQL;
 Data Source=localhost:4900;
'. ' Initial Catalog=EASYPHARM;
 User ID=admin;
 Password=;
 Extended Properties="Password=*:25061986;
"';
 $ConnectionOLEDBHFSQL = new COM("ADODB.Connection") or die("Impossible d'instancier un objet ADO");
 $ConnectionOLEDBHFSQL ->ConnectionString = $ProviderOLEDBHFSQL;
 $ConnectionOLEDBHFSQL ->Open();
 $rs = new COM("ADODB.Recordset");
 
?>