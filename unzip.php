<?php
$zip = new ZipArchive;
$res = $zip->open('crochetshop_upload.zip');
if ($res === TRUE) {
    $zip->extractTo('./');
    $zip->close();
    echo '<h2 style="color:green;font-family:sans-serif;">Files Extracted Successfully!</h2>';
    echo '<p style="font-family:sans-serif;">You can now delete unzip.php and crochetshop_upload.zip from File Manager.</p>';
} else {
    echo '<h2 style="color:red;font-family:sans-serif;">Extraction Failed! Code: ' . $res . '</h2>';
}
?>