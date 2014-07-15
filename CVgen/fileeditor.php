<?php

// configuration
$url = dirname($_SERVER['PHP_SELF']);
$file = 'content/jsonfile.txt';



// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    

    if (!file_put_contents($file, $_POST['text'])) {
    echo "Error updating the file...\n";
    $errors= error_get_last();
    echo "FILE PUT ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
    exit();
}

    // redirect to form again
    header(sprintf('Location: %s', $url));
    
    exit();
}


$backup_name = 'backups/backup'.time().'.txt';
if (!copy($file, $backup_name)) {
    echo "Error creating backup...\n";
    $errors= error_get_last();
    echo "COPY ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
}

// read the textfile
$text = file_get_contents($file);


?>

<html>
<body>
<!-- HTML form -->

<form action="" method="post">
<textarea name="text" style="width: 90%; height: 90%;"><?php echo htmlspecialchars($text) ?></textarea><br><br>
<a href="http://jsonlint.com/" target="_blank">Json Validator</a>
<input type="submit" />

</form>
</body>
</html>