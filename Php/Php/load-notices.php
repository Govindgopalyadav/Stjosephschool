<?php
$filename = "notices.txt";
if (file_exists($filename)) {
    $notices = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo implode(" | ", $notices);  // Separated by pipe for scroll
} else {
    echo "No notices available.";
}
?>
