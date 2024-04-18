<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class = "row">
                <div class = "cold-md-8">
                  <body>
                    
                    
    <div class="container">
        <h1 class="my-4">Loan Application Dashboard</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Apply for a Loan</h5>
                <form action="process_loan_application.php" method="post">
                    <div class="col-md-8">
                        <label for="loan_amount" class="form-label">Loan Amount</label>
                        <input type="number" class="form-control" id="loan_amount" name="loan_amount" required>
                    </div>
                    <div class="col-md-8">
                        <label for="interest_rate" class="form-label">Interest Rate (%)</label>
                        <input type="number" class="form-control" id="interest_rate" name="interest_rate" required>
                    </div>
                    <div class="col-md-8 ">
                        <label for="duration" class="form-label">Loan Duration (months)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
