<?php require 'data.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Invoice</title>
<body>
    <main>
    <?php require "header.php"; ?>
    <h2 class="text-secondary"><?php echo ucfirst($statuses[0]); ?></h2>
    <table class="table table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th>Number</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Client</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($invoices as $invoice){
                echo "<tr>";
                foreach ($invoice as $key => $data){
                    echo "<td>{$data}</td>";
                }
                echo "</tr>";
            }
        ?>
        </tr>
        </tbody>
    </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
    </main>
</html>


