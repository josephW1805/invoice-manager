<?php
require 'data.php';
require 'function.php';


if (isset($_POST['number'])) {
    $file_name = 'documents/' . $_POST['number'] . '.pdf';
    if (file_exists($file_name)) {
        unlink($file_name);
    }

    deleteInvoice($_POST['number']);
}

header("Location: index.php");