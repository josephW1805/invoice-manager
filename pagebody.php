
<h2 class="text-secondary"><?php echo ucfirst($myCurrentPage); ?></h2>
    <table class="table table-bordered table-striped">
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
                function showStatus($status){
                    global $myCurrentPage; 
                    return $status['status'] == $myCurrentPage;
                }

                $filteredInvoice = array_filter($invoices, "showStatus");
                if ($status == "all"){
                    foreach ($invoices as $invoice){
                        echo "<tr>";
                        foreach ($invoice as $key => $data){
                            echo "<td>{$data}</td>";
                        }
                        echo "</tr>";
                    }
                }else{
                    foreach ($filteredInvoice as $invoice){
                        echo "<tr>";
                        foreach ($invoice as $key => $data){
                            echo "<td>{$data}</td>";
                        }
                        echo "</tr>";
                    }
                }
                ?>
                </tr>
                </tbody>
            </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</main>
</body>
</html>