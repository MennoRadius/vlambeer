<?php 
	include '../includes/header.php';

	include '../includes/profile.php';

	$customer_id = $_GET['customer_id'];

	$stmt = $db->prepare("SELECT * FROM tbl_invoice WHERE customer_id = $customer_id");
	$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoice overview</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="sorttable.js"></script>
</head>
<body>

<div class="container">
	
<h2>Invoice overview</h2>

	<table class="table table-striped sortable">
		<thead>
			<tr>
				<td>Order Status</td>
				<td>Amount</td>
				<td>Payment Status</td>
				<td>Invoice date</td>
				<td>Download</td>
			</tr>
		</thead>
		<tbody>
<?php
	$invoice = $stmt->fetch(PDO::FETCH_OBJ);

	if ($invoice == false) {
		echo 	"<tr>
					<td>De tabel is leeg</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>"; 
				
	} else {
		echo 	"<tr>
					<td>#" . $invoice->order_status . "</td>
					<td>" . $invoice->amount . "</td>
					<td>#" . $invoice->payment_status . "</td>
					<td>" . $invoice->date. "</td>
					<td><a href='#'>x</a></td>
				</tr>"; 
	}
?>
		</tbody>
	</table>
<?php
	include '../includes/footer.php';
?>
</div>
</body>
</html>