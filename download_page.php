<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin: 50px;
        }
        h1 {
            font-size: 2em;
        }
        p {
            font-size: 1.2em;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>
    <div class="container">
        <?php
            // Get the 'song' parameter from the URL
            $songName = isset($_GET['song']) ? $_GET['song'] : '';

            // If no song parameter is found, show an error
            if (empty($songName)) {
                echo "<p>Error: No song specified.</p>";
                exit;
            }

            // Create a user-friendly song title by replacing hyphens with spaces and removing the file extension
            $songTitle = str_replace('-', ' ', pathinfo($songName, PATHINFO_FILENAME));

            // Update the page content based on the selected song
            echo "<h1 id='songTitle'>{$songTitle}</h1>";
            echo "<p id='songDetails'>Download the hit song {$songTitle}!</p>";

            // Ensure the song file exists
            $songPath = 'songs/' . $songName;
            echo "<p>Checking for file at: {$songPath}</p>"; // Debugging line
            if (file_exists($songPath)) {
                // If the file exists, provide a download link
                echo "<a href='{$songPath}' id='downloadLink'>Download Now</a>";
            } else {
                // If the file does not exist, display an error message
                echo "<p>Sorry, the song file '{$songPath}' does not exist.</p>";
            }
        ?>
    </div>
</body>
</html>
