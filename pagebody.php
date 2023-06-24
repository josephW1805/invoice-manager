<h2 class="text-secondary">
    <?php echo ucfirst($myCurrentPage); ?>
</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th width='10%'>Number</th>
            <th width='10%'>Client</th>
            <th width='20%'>Email</th>
            <th width='10%'>Amount</th>
            <th width='15%'>Status</th>
            <th width='5%' Colspan="3"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        require "function.php";
        if (isset($_GET["status"])) {
            $invoices = filterInvoices($_GET["status"]);
        } else {
            $invoices = getInvoices();
        }
        foreach ($invoices as $invoice) {
            switch ($statuses[$invoice['status_id'] - 1]) {
                case 'pending':
                    $stat_background = 'bg-primary';
                    break;
                case 'draft':
                    $stat_background = 'bg-secondary';
                    break;
                case 'paid':
                    $stat_background = 'bg-success';
            }

            echo "<tr>";
            echo "<td>{$invoice['number']}</td>";
            echo "<td style='color: blue'>{$invoice['client']}</td>";
            echo "<td>{$invoice['email']}</td>";
            echo "<td>$" . $invoice['amount'] . "</td>";
            echo "<td class='$stat_background' style='color: white; text-align:center;'>{$statuses[$invoice['status_id'] - 1]}</td>";
            $file = 'documents/' . $invoice['number'] . '.pdf';
            if (file_exists($file)) {
                echo "<td style='text-align:center;'><a class='btn btn-info'  href='{$file}'>View</a></td>";
            } else {
                echo "<td></td>";
            }
            echo "<td style='text-align:center;'><a class='btn btn-warning' href='update.php?number={$invoice['number']}'>Edit</a></td>
                  <td style='text-align:center;'>
                    <form class='form' method='post' action='delete.php'>
                            <input type='hidden' name='number' value='{$invoice['number']}'>
                            <button class='btn btn-danger'>Delete</button>
                        </form>
                    </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</main>
</body>

</html>