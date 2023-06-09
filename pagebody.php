<h2 class="text-secondary">
    <?php echo ucfirst($myCurrentPage); ?>
</h2>
<table class="table table-striped">
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
        function showStatus($status)
        {
            global $myCurrentPage;
            return $status['status'] == $myCurrentPage;
        }

        $filteredInvoice = array_filter($invoices, "showStatus");
        if ($status == "all") {
            foreach ($invoices as $invoice) {
                echo "<tr>";
                foreach ($invoice as $key => $data) {
                    echo "<td>{$data}</td>";
                }
                echo "<td>
                            <a class='btn btn-primary m-3' href='update.php?number={$invoice['number']}'>Edit</a>
                            <form class='form' method='post' action='delete.php'>
                                <input type='hidden' name='number' value={$invoice['number']}>
                                <button class='btn btn-danger'>Delete</button>
                            </form>
                            </td>";
            }
        } else {
            foreach ($filteredInvoice as $invoice) {
                echo "<tr>";
                foreach ($invoice as $key => $data) {
                    echo "<td>{$data}</td>";
                }
                echo "<td>
                        <a class='btn btn-primary m-3' href='update.php?number={$invoice['number']}'>Edit</a>
                        <form class='form' method='post' action='delete.php'>
                            <input type='hidden' name='number' value={$invoice['number']}>
                            <button class='btn btn-danger'>Delete</button>
                        </form>
                        </td>";
            }
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