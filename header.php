<?php require 'data.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Paid</title>
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
                            <a href="index.php" class="nav-link text-dark">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="draft.php" class="nav-link text-dark"><?php echo ucfirst($statuses[1]) ; ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="pending.php" class="nav-link text-dark"><?php echo ucfirst($statuses[2]); ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="paid.php" class="nav-link text-dark"><?php echo ucfirst($statuses[3]); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>