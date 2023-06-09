<input type="text" class="form-control" name="client" placeholder="Client Name"
  value="<?php echo $invoice['client'] ?? ''; ?>">
<div class="error text-danger">
  <?php echo $errors['client'] ?? ''; ?>
</div>
<input type="text" class="form-control" name="email" placeholder="Client Email"
  value="<?php echo $invoice['email'] ?? ''; ?>">
<div class="error text-danger">
  <?php echo $errors['email'] ?? ''; ?>
</div>
<input type="number" class="form-control" name="amount" placeholder="Invoice Amount"
  value="<?php echo $invoice['amount'] ?? ''; ?>">
<div class="error text-danger">
  <?php echo $errors['amount'] ?? ''; ?>
</div>
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