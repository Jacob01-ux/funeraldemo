<html>
<body>

	<form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
		<p>Enter the ID Number: <input name="idnumber" type="text" id="idnumber" /> </p>
		<p> <input type="submit" value="Check" /> </p>
	</form>

</body>
</html>
<?php


	Validate($_POST['idnumber']);
	function Validate($idNumber) {
		$correct = true;
		if (strlen($idNumber) !== 13 || !is_numeric($idNumber) ) {
			echo "ID number does not appear to be authentic - input not a valid number";
			$correct = false; die();
		}

		$year = substr($idNumber, 0,2);
		$currentYear = date("Y") % 100;
		$prefix = "19";
		if ($year < $currentYear)
		    $prefix = "20";
	    $id_year = $prefix.$year;

        $id_month = substr($idNumber, 2,2);
        $id_date = substr($idNumber, 4,2);

		$fullDate = $id_date. "-" . $id_month. "-" . $id_year;
		
		if (!$id_year == substr($idNumber, 0,2) && $id_month == substr($idNumber, 2,2) && $id_date == substr($idNumber, 4,2)) {
			echo 'ID number does not appear to be authentic - date part not valid'; 
			$correct = false;
		}
		$genderCode = substr($idNumber, 6,4);
        $gender = (int)$genderCode < 5000 ? "Female" : "Male";

       $citzenship = (int)substr($idNumber, 10,1)  === 0 ? "citizen" : "resident";//0 for South African citizen, 1 for a permanent resident

        $total = 0;
        $count = 0;
	    for ($i = 0;$i < strlen($idNumber);++$i)
	    {
		    $multiplier = $count % 2 + 1;
		    $count ++;
		    $temp = $multiplier * (int)$idNumber[$i];
		    $temp = floor($temp / 10) + ($temp % 10);
		    $total += $temp;
	    }
	    $total = ($total * 9) % 10;

	    if ($total % 10 != 0) {
	        echo 'ID number does not appear to be authentic - check digit is not valid';
		    $correct = false;
	    }

        if ($correct){
            echo nl2br( "\nSouth African ID Number:   ". $idNumber .
                '  Birth Date:   ' . $fullDate.
                '  Gender:  ' . $gender .
                '  SA Citizen:  ' . $citzenship);
        }
	}