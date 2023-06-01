<?php require 'data.php'; 
function getInvoiceNumber ($length = 5) {
    $letters = range('A', 'Z');
    $number = [];
    
    for ($i = 0; $i < $length; $i++) {
      array_push($number, $letters[rand(0, count($letters) - 1)]);
    }
    return implode($number);
  }

    session_start();
    $status = isset($_GET['status']) ? $_GET['status'] : 'all';
    if (isset($_POST['client'])){
        array_push($invoices, [
            'number' => getInvoiceNumber(),
            'amount' => $_POST['amount'],
            'status' => $_POST['status'],
            'client' => $_POST['client'],
            'email'  => $_POST['email'],
        ]);
        $_SESSION['invoice'] = $invoices;
    }
    
    if (isset($_SESSION['invoice'])) {
        $invoices = $_SESSION['invoice'];
    } else {
        $_SESSION['invoice'] = $invoices;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Invoice</title>
</head>
<body>
<main>
<header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                <a class="navbar-brand" asp-area="" asp-page="/Index">Lab2</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark"" href="add.php">New Invoice</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

