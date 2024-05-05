<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class = "row">
                <div class = "cold-md-8">
                <h1 class="cover-heading">Loan History</h1>
                  <body>
<div class="inner cover">
 

  <table class="table">
                <tr>
                    <th>Loan ID</th>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Monthly Due</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>The Loan ID</td>
                        <td><?php echo $_SESSION['user_id']; ?></td>
                        <td><?php echo $query = "SELECT * FROM loan_table->amount"; ?></td>
                        <td><?php echo 'Hello'?></td>
                    </tr>

            </tbody>
					</tbody>
				</table>
    </div>
</div>
