<?php require "header.php"; require "data.php" ?>

<div class="card shadow border-0 m-4">
    <div class="card-header bg-secondary bg-gradient ml-0 py-3">
    <div class="row">
        <div class="col-12 text-center">
                <h2 class="text-white py-2">Create Invoice</h2>
        </div>
    </div>
    </div>
    <div class="card-body p-4">
    <form class="row" method="post" action="index.php">
        <div class="p-3">
            <div class="form-floating py-2 col-12">
                <input name="client" class="form-control border-0 shadow" required />
                <label class="ms-2">Client Name</label>
            </div>
            <div class="form-floating py-2 col-12">
                <input name="email" class="form-control border-0 shadow" required />
                <label class="ms-2">Client Email</label>
            </div>
            <div class="form-floating py-2 col-12">
                <input name="amount" type="number" class="form-control border-0 shadow" required />
                <label class="ms-2">Invoice Amount</label>
            </div>
            <div class="form-floating py-2 col-12">
            <select name="status" class="form-select" required>
                <option value="" disabled selected>Select a Status</option>
                <?php 
                foreach (['draft', 'pending', 'paid'] as $status) : ?>
                <option value="<?php echo $status; ?>">
                <?php echo $status; ?>
                </option>
                <?php endforeach ?>
            </select>
            </div>

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