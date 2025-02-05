<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>
</head>
<body>
    <h1>Dictionary</h1>
    <form action="" method="post">
        <label for="txtname">Name Dictionary (A-Z):</label>
        <input type="text" name="txtname" id="txtname" required> 
        <br><br>
        <input type="submit" value="Send">
    </form>
    
    <?php
    if (isset($_POST['txtname'])) {
        $file = trim(strtoupper($_POST['txtname'])); // Convert input to uppercase
        $validLetters = range('A', 'Z'); // Allowed letters

        if (in_array($file, $validLetters)) {
            $filename = "$file.txt";

            if (file_exists($filename)) {
                $handle = fopen($filename, "r") or die("Unable to open file!");
                echo "<h2>Content of $filename:</h2><pre>" . fread($handle, filesize($filename)) . "</pre>";
                fclose($handle);
            } else {
                echo "<p>File '$filename' does not exist.</p>";
            }
        } else {
            echo "<p>Invalid input. Please enter a letter from A to Z.</p>";
        }
    }
    
    
    ?>
</body>
</html>


<?php
    // $file = fopen ("Z.txt","w") or die ("not file");
    // fwrite($file,"");
    // fclose($file);
?>
