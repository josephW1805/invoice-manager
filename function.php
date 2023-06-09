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

function getInvoice($number)
{
    global $invoices;

    return current(array_filter($invoices, function ($invoice) use ($number) {
        return $invoice['number'] == $number;
    }));
}

function addInvoice($invoice)
{
    global $invoices;

    array_push($invoices, [
        'number' => getInvoiceNumber(),
        'amount' => $invoice['amount'],
        'status' => $invoice['status'],
        'client' => $invoice['client'],
        'email' => $invoice['email'],
    ]);

    $_SESSION['invoices'] = $invoices;

    return end($invoices)['number'];
}

function updateInvoice($invoice)
{
    global $invoices;

    $invoices = array_map(function ($i) use ($invoice) {
        if ($i['number'] == $invoice['number']) {
            return $invoice;
        }
        return $i;
    }, $invoices);

    $_SESSION['invoices'] = $invoices;

    return $invoice['number'];
}

function deleteInvoice($number)
{
    global $invoices;

    $invoices = array_filter($invoices, function ($invoice) use ($number) {
        return $invoice['number'] != $number;
    });

    $_SESSION['invoices'] = $invoices;

    return true;
} 