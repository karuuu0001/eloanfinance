<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class = "row">
                <div class = "cold-md-8">
                <h1 class="cover-heading">Loan History</h1>
                  <body>
<div class="inner cover">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 <thead>
    <tr>
        <th>#</th>
        <th>Loan Reference No.</th>
        <th>Gcash NO</th>
        <th>Email</th>
        <th>Amount Loan</th>
        <th>Interest</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
<?php foreach ($loans as $loan) : ?>

   
    <tr>
    <td><?= $loan->loan_id; ?></td>
    <td><?= $loan->ref_no; ?></td>
    <td><?= $loan->contact_no; ?></td>
    <td><?= $loan->email; ?></td>
    <td><?= $loan->amount; ?></td>
    <td><?= $loan->interest; ?>%</td>
    <td><?= $loan->status; ?></td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>
</div>
        </div>
    </div>
</div>