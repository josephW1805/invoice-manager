<?php
require "data.php";
function getInvoiceNumber($length = 5)
{
    $letters = range('A', 'Z');
    $number = [];

    for ($i = 0; $i < $length; $i++) {
        array_push($number, $letters[rand(0, count($letters) - 1)]);
    }
    return implode($number);
}
function sanitize($data)
{
    return array_map(function ($value) {
        return htmlspecialchars(stripslashes(trim($value)));
    }, $data);
}

//The Client Name field must contain only letters and spaces and cannot be more than 255 characters.
//The Client Email field must be a properly formatted email address.
//The Invoice Amount must be an integer.
//The Invoice Status must be either "draft", "pending", or "paid"
function validate($invoice)
{
    $fields = ['client', 'email', 'amount', 'status'];
    $errors = [];
    global $statuses;

    foreach ($fields as $field) {
        switch ($field) {
            case 'client':
                if (empty($invoice[$field])) {
                    $errors[$field] = 'Client Name is required';
                } else if (strlen($invoice[$field]) > 255) {
                    $errors[$field] = 'Client Name must be fewer than 255 characters';
                } else if (!preg_match('/^[a-zA-Z\s]+$/', $invoice[$field])) {
                    $errors[$field] = "Client name can contains only letters and spaces";
                }
                break;
            case 'email':
                if (empty($invoice[$field])) {
                    $errors[$field] = 'Client Email is required';
                } else if (!filter_var($invoice[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = 'Client Email is not properly formatted';
                }
                break;
            case 'amount':
                if (empty($invoice[$field])) {
                    $errors[$field] = 'Amount is required';
                } else if (!filter_var($invoice[$field], FILTER_VALIDATE_FLOAT)) {
                    $errors[$field] = 'Year must contain only numbers';
                }
                break;
            case 'status':
                if (empty($invoice[$field])) {
                    $errors[$field] = 'Invoice status is required';
                } else if (!in_array($invoice[$field], $statuses)) {
                    $errors[$field] = 'Invoice status must be in the list of status';
                }
                break;
        }
    }
    return $errors;
}

function getInvoices()
{
    global $db;
    $sql = "SELECT * FROM invoices JOIN statuses WHERE invoices.status_id = statuses.id ORDER BY invoices.id";
    $result = $db->query($sql);
    $invoices = $result->fetchAll();

    return $invoices;
}

function filterInvoices($status)
{
    global $db;
    $sql = "SELECT * FROM invoices JOIN statuses on invoices.status_id = statuses.id
    WHERE status = :status  ORDER BY invoices.id";
    $result = $db->prepare($sql);
    $result->execute([":status" => $status]);
    $invoices = $result->fetchAll();

    return $invoices;
}

function getInvoice($number)
{
    global $db;
    $sql = "SELECT * FROM invoices JOIN statuses on invoices.status_id = statuses.id
        WHERE number = :number";
    $result = $db->prepare($sql);
    $result->execute([':number' => $number]);
    return $result->fetch();
}

function addInvoice($invoice)
{
    global $db;
    global $statuses;

    $status_id = array_search($invoice['status'], $statuses) + 1;

    $sql = "INSERT INTO invoices (number, client, email, amount, status_id) VALUE (:number, :client, :email, :amount, :status_id)";
    $result = $db->prepare($sql);
    $invoice_number = getInvoiceNumber();
    $result->execute([
        "number" => $invoice_number,
        "client" => $invoice['client'],
        "email" => $invoice['email'],
        "amount" => $invoice['amount'],
        "status_id" => $status_id,
    ]);

    $number = $db->lastInsertId();
    saveFile($invoice_number);

    return $number;
}

function updateInvoice($invoice)
{
    global $db;
    global $statuses;

    $status_id = array_search($invoice['status'], $statuses) + 1;

    $sql = "UPDATE invoices SET number = :number, client = :client, email = :email, amount = :amount, status_id = :status_id WHERE number = :number";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        "client" => $invoice["client"],
        "email" => $invoice["email"],
        "amount" => $invoice["amount"],
        "status_id" => $status_id,
        "number" => $invoice["number"]
    ]);

    saveFile($invoice['number']);

    return $invoice["number"];
}

function deleteInvoice($number)
{
    global $db;
    $sql = "DELETE FROM invoices WHERE number = :number";
    $stmt = $db->prepare($sql);
    $stmt->execute(["number" => $number]);

    return $stmt->rowCount();
}

function saveFile($number)
{
    $file = $_FILES['doc'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        // get file extension
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = $number . "." . $ext;

        if (!file_exists('documents/')) {
            mkdir('documents/');
        }

        $dest = 'documents/' . $filename;

        if (file_exists($dest)) {
            unlink($dest);
        }

        return move_uploaded_file($file['tmp_name'], $dest);
    }

    return false;
}