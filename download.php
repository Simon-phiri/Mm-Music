<?php
// Check if the 'song' parameter is set in the URL
if(isset($_GET['song'])) {
    // Sanitize the input to prevent security issues
    $file_name = filter_var($_GET['song'], FILTER_SANITIZE_STRING);

    // Set the path to the songs directory
    $file_path = 'songs/' . $file_name;

    // Check if the file exists
    if(file_exists($file_path)) {
        // Force the browser to download the file
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file_path) . '"');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit;
    } else {
        echo 'The requested song does not exist.';
    }
} else {
    echo 'No song specified.';
}
?>
