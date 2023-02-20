<?php
    // Get the contents of the 403.html file
    $contents = file_get_contents('pages/error/403.html');

    // Replace the word "denied" with "granted" in the contents
    $contents = str_replace('denied', 'granted', $contents);

    // Output the modified contents of the 403.html file
    echo $contents;
?>