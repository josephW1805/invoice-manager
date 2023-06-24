<div class="form-floating py-2 col-12">
  <input type="text" class="form-control" name="client" placeholder="Client Name"
    value="<?php echo $invoice['client'] ?? ''; ?>">
  <label class="ms-2">Client Name</label>
  <div class="error text-danger">
    <?php echo $errors['client'] ?? ''; ?>
  </div>
</div>
<div class="form-floating py-2 col-12">
  <input type="text" class="form-control" name="email" placeholder="Client Email"
    value="<?php echo $invoice['email'] ?? ''; ?>">
  <label class="ms-2">Client Email</label>
  <div class="error text-danger">
    <?php echo $errors['email'] ?? ''; ?>
  </div>
</div>
<div class="form-floating py-2 col-12">
  <input type="number" class="form-control" name="amount" placeholder="Invoice Amount"
    value="<?php echo $invoice['amount'] ?? ''; ?>">
  <label class="ms-2">Invoice Amount</label>
  <div class="error text-danger">
    <?php echo $errors['amount'] ?? ''; ?>
  </div>
</div>
<div class="form-floating py-2 col-12">
  <select class="form-select" name="status">
    <option value="">Select a Status</option>
    <?php foreach (['draft', 'pending', 'paid'] as $status): ?>
      <option value="<?php echo $status; ?>" <?php if (isset($invoice['status']) && $status === $invoice['status']): ?>
          selected <?php endif; ?>>
        <?php echo $status; ?>
      </option>
    <?php endforeach; ?>
  </select>
  <div class="error text-danger">
    <?php echo $errors['status'] ?? ''; ?>
  </div>
</div>
<input type="file" class="form-control" name="doc" accept=".pdf">