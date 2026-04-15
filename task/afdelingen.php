<?php require_once("../backend/config.php"); 
 $selectAfdelingen = $_GET ['afdelingen'] ?? 'all';
 $selectfolders = $_GET ['folders'] ?? 'all';

 try{
    $afdeling = [ 'personeel', 'horeca', 'techniek', 'inkoop', 'klantenservice', 'groen'];
 

    $sql = "SELECT * FROM taken WHERE 1 = 1";
     $params = [];
     
    if ($selectAfdelingen !== 'all') {
        $sql .= " AND afdeling = :afdeling";
        $params[':afdeling'] = $selectAfdelingen;
 
    }
    if ($selectfolders !== 'all') {
        $sql .= " AND status = :status";
        $params[':status'] = $selectfolders;
    }


?>