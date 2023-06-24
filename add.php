<?php
require "function.php";

$invoice = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $invoice = sanitize($_POST);
    $errors = validate($invoice);

    if (count($errors) === 0) {
        $number = addInvoice($invoice);

        header("Location: index.php");
    }
}
?>
<?php require 'header.php'; ?>
<div class="card shadow border-0 m-4">
    <div class="card-header bg-secondary bg-gradient ml-0 py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-white py-2">Create Invoice</h2>
            </div>
        </div>
    </div>
    <div class="card-body p-4">
        <form class="form" method="post" enctype="multipart/form-data">
            <div class="p-3">
                <?php include "inputs.php"; ?>
                <div class="row pt-2">
                    <div class="col-6 col-md-3">
                        <button type="submit" class="btn btn-primary form-control">Create</button>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="index.php" class="btn btn-secondary border  form-control">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>