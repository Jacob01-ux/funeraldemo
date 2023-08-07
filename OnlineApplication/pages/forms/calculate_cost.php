<?php
session_start();

if (isset($_SESSION["id"])) {
    // Connect to the database using PDO
    $host = 'localhost';
    $dbname = 'ekhonnec_vakhandli_group';
    $username = 'ekhonnec_vakhandli_group';
    $password = 'vakhandli_10';

    $dsn = "mysql:host=$host;dbname=$dbname";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $connection = new PDO($dsn, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

    // Get the selected timeframe from the AJAX request
    $timeframe = $_POST['timeframe'];

    // Construct the SQL queries based on the selected timeframe
    switch ($timeframe) {
        case 'Monthly':
            $sqlCost = "SELECT IFNULL(SUM(down_payment), 0) AS totalCost FROM sales_payment WHERE MONTH(transaction_date) = MONTH(CURRENT_DATE())";
            $sqlPremium = "SELECT IFNULL(SUM(monthly_premium), 0) AS totalPremium FROM premiums WHERE MONTH(Date) = MONTH(CURRENT_DATE())";
            $sqlIncome = "SELECT IFNULL(SUM(Amount), 0) AS totalIncome FROM income1 WHERE MONTH(date) = MONTH(CURRENT_DATE())";
            $sqlExpense = "SELECT IFNULL(SUM(Amount), 0) AS totalExpense FROM expenses WHERE MONTH(_On) = MONTH(CURRENT_DATE())";
            break;
        case 'Weekly':
            $sqlCost = "SELECT IFNULL(SUM(down_payment), 0) AS totalCost FROM sales_payment WHERE YEARWEEK(transaction_date) = YEARWEEK(CURRENT_DATE())";
            $sqlPremium = "SELECT IFNULL(SUM(monthly_premium), 0) AS totalPremium FROM premiums WHERE YEARWEEK(Date) = YEARWEEK(CURRENT_DATE())";
            $sqlIncome = "SELECT IFNULL(SUM(Amount), 0) AS totalIncome FROM income1 WHERE YEARWEEK(date) = YEARWEEK(CURRENT_DATE())";
            $sqlExpense = "SELECT IFNULL(SUM(Amount), 0) AS totalExpense FROM expenses WHERE YEARWEEK(_On) = YEARWEEK(CURRENT_DATE())";
            break;
        case 'Daily':
            $sqlCost = "SELECT IFNULL(SUM(down_payment), 0) AS totalCost FROM sales_payment WHERE DATE(transaction_date) = CURRENT_DATE()";
            $sqlPremium = "SELECT IFNULL(SUM(monthly_premium), 0) AS totalPremium FROM premiums WHERE DATE(Date) = CURRENT_DATE()";
            $sqlIncome = "SELECT IFNULL(SUM(Amount), 0) AS totalIncome FROM income1 WHERE DATE(date) = CURRENT_DATE()";
            $sqlExpense = "SELECT IFNULL(SUM(Amount), 0) AS totalExpense FROM expenses WHERE DATE(_On) = CURRENT_DATE()";
            break;
        case 'Yearly':
            $sqlCost = "SELECT IFNULL(SUM(down_payment), 0) AS totalCost FROM sales_payment WHERE YEAR(transaction_date) = YEAR(CURRENT_DATE())";
            $sqlPremium = "SELECT IFNULL(SUM(monthly_premium), 0) AS totalPremium FROM premiums WHERE YEAR(Date) = YEAR(CURRENT_DATE())";
            $sqlIncome = "SELECT IFNULL(SUM(Amount), 0) AS totalIncome FROM income1 WHERE YEAR(date) = YEAR(CURRENT_DATE())";
            $sqlExpense = "SELECT IFNULL(SUM(Amount), 0) AS totalExpense FROM expenses WHERE YEAR(_On) = YEAR(CURRENT_DATE())";
            break;
        default:
            echo "Invalid timeframe";
            exit;
    }

    // Execute the SQL queries
    $totalCost = 0;
    $totalPremium = 0;
    $totalIncome = 0;
    $totalExpense = 0;

    try {
        $stmt = $connection->query($sqlCost);
        $totalCost = $stmt->fetchColumn();

        $stmt = $connection->query($sqlPremium);
        $totalPremium = $stmt->fetchColumn();

        $stmt = $connection->query($sqlIncome);
        $totalIncome = $stmt->fetchColumn();

        $stmt = $connection->query($sqlExpense);
        $totalExpense = $stmt->fetchColumn();

        $totalProfit = $totalCost + $totalPremium + $totalIncome - $totalExpense;

        // Return the total values as JSON response
        $response = [
            'totalCost' => $totalCost,
            'totalPremium' => $totalPremium,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'totalProfit' => $totalProfit,
        ];
        echo json_encode($response);
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
} else {
    echo "User not logged in.";
}
?>
