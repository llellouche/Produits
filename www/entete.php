<?php
header("Content-Type:text/html; charset=UTF-8");
    session_start();
    
    function GetClassFiles($dir) {
        $AfilesClass = array ();
        if (is_dir($dir)) {
            $AcontentDir = scandir($dir);
            
            $j = 0;
            foreach ($AcontentDir as $i => $value) {
                if (preg_match('#^[a-z_]+\.class.php$#i', $value)) {
                    $AfilesClass[$j] = $value;
                    $j++;
                }
            }
        } else {
            echo 'Chemin spécié invalide';
        }
        return $AfilesClass;
    }
    
    function chargerClasse($dirClass) {
        $Afiles_class = GetClassFiles ($dirClass);
        if (is_array($Afiles_class) && !empty ($Afiles_class)) {
            foreach ($Afiles_class as $i => $value) {
                require_once $dirClass . $value;
            }
        }
    }
    
    chargerClasse($dirClass);
?>
