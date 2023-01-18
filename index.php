<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Water Bills</title>
</head>
<body>
    <?php
    $amount = '';
	$water_usage = '';
	if (isset($_POST['submit'])) {
		$units = $_POST['water'];
		if (!empty($units)) {
			$water_usage = water_bills($units);
			$amount = '<strong>Total amount of ' . $units . ' units -</strong> ' . $water_usage;
		}
	}
	// Water bills per units
    //Conditional statement is the if else
	function water_bills($units) {
		$first_unit_cost = 35;
		$second_unit_cost = 40;
		$third_unit_cost = 45;
		$fourth_unit_cost = 50;

		if($units <= 20) {
			$bill = $units * $first_unit_cost;
		}
		else if($units > 21 && $units <= 49) {
			$temp = 20 * $first_unit_cost;
			$remaining_units = $units - 20;
			$bill = $temp + ($remaining_units * $second_unit_cost);
		}
		else if($units > 50 && $units <= 100) {
			$temp = (20 * $first_unit_cost) + (28 * $second_unit_cost);
			$remaining_units = $units - 50;
			$bill = $temp + ($remaining_units * $third_unit_cost);
		}
		else {
			$temp = (20 * $first_unit_cost) + (28 * $second_unit_cost) + (50 * $third_unit_cost);
			$remaining_units = $units - 100;
			$bill = $temp + ($remaining_units * $fourth_unit_cost);
		}
		return number_format((float)$bill, 2, '.', '');
	}
	?>

    <!--form section to display the water bills -->
    
	<div class="section">
		<h1>Your Water Bills This month</h1>
		<div class="form-section">
		<form action="" method="post">
		<div class="form-section">
			<input type="number" name="water" placeholder="Please enter no. of Units" class="form-control" />
		</div>
		<div class="form-section">		
			<input type="submit" name="submit" class="btn btn-primary" value="Submit" />
		</div>	
		</form>
		</div>
		<div>
		    <?php echo '<br/>' . $amount; ?>
		</div>
	</div>
   
</body>
</html>