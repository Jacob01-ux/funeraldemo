<script>
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });
</script>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
session_start();
if (isset($_SESSION["id"])) {
    // Connect to the database using PDO
$host = 'localhost';
$dbname = 'ekhonnec_vakhandli_group';
$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

///
// Retrieve sale_id values from sales_payment table
$querySaleIDsTopUp = "SELECT sale_id FROM sales_payment WHERE transaction_type = 'Top-UP'";
$queryResultSaleIDsTopUp = $connection->query($querySaleIDsTopUp);

// Get the total number of sale_id values for Top-UP transactions
$totalSaleIDsTopUp = $queryResultSaleIDsTopUp->rowCount();

// Array to store the sale_id values for Top-UP transactions
$saleIDsTopUp = array();

// Fetch sale_id values from the query result for Top-UP transactions
while ($row = $queryResultSaleIDsTopUp->fetch()) {
$saleIDsTopUp[] = $row['sale_id'];
}

// Calculate the total cost from sales table using the retrieved sale_id values for Top-UP transactions
$totalCostTopUp = 0;
if (!empty($saleIDsTopUp)) {
$saleIDListTopUp = implode(',', $saleIDsTopUp);
$queryTotalCostTopUp = "SELECT SUM(total_cost) AS total_cost FROM sale WHERE sale_id IN ($saleIDListTopUp)";
$queryResultTotalCostTopUp = $connection->query($queryTotalCostTopUp);
$rowTotalCostTopUp = $queryResultTotalCostTopUp->fetch();
$totalCostTopUp = $rowTotalCostTopUp['total_cost'];
}

// Retrieve sale_id values from sales_payment table for Cash transactions
$querySaleIDsCash = "SELECT sale_id FROM sales_payment WHERE transaction_type = 'Cash'";
$queryResultSaleIDsCash = $connection->query($querySaleIDsCash);

// Get the total number of sale_id values for Cash transactions
$totalSaleIDsCash = $queryResultSaleIDsCash->rowCount();

// Array to store the sale_id values for Cash transactions
$saleIDsCash = array();

// Fetch sale_id values from the query result for Cash transactions
while ($row = $queryResultSaleIDsCash->fetch()) {
$saleIDsCash[] = $row['sale_id'];
}

// Calculate the total cost from sales table using the retrieved sale_id values for Cash transactions
$totalCostCash = 0;
if (!empty($saleIDsCash)) {
$saleIDListCash = implode(',', $saleIDsCash);
$queryTotalCostCash = "SELECT SUM(total_cost) AS total_cost FROM sale WHERE sale_id IN ($saleIDListCash)";
$queryResultTotalCostCash = $connection->query($queryTotalCostCash);
$rowTotalCostCash = $queryResultTotalCostCash->fetch();
$totalCostCash = $rowTotalCostCash['total_cost'];
}

// Retrieve sale_id values from sales_payment table for Credit transactions
$querySaleIDsCredit = "SELECT sale_id FROM sales_payment WHERE transaction_type = 'Credit'";
$queryResultSaleIDsCredit = $connection->query($querySaleIDsCredit);

// Get the total number of sale_id values for Credit transactions
$totalSaleIDsCredit = $queryResultSaleIDsCredit->rowCount();

// Array to store the sale_id values for Credit transactions
$saleIDsCredit = array();

// Fetch sale_id values from the query result for Credit transactions
while ($row = $queryResultSaleIDsCredit->fetch()) {
$saleIDsCredit[] = $row['sale_id'];
}

// Calculate the total cost from sales table using the retrieved sale_id values for Credit transactions
$totalCostCredit = 0;
if (!empty($saleIDsCredit)) {
$saleIDListCredit = implode(',', $saleIDsCredit);
$queryTotalCostCredit = "SELECT SUM(total_cost) AS total_cost FROM sale WHERE sale_id IN ($saleIDListCredit)";
$queryResultTotalCostCredit = $connection->query($queryTotalCostCredit);
$rowTotalCostCredit = $queryResultTotalCostCredit->fetch();
$totalCostCredit = $rowTotalCostCredit['total_cost'];
}
  
$currentYear = date('Y');
$query = "SELECT SUBSTRING(Period, 1, LENGTH(Period) - 4) AS month, SUBSTRING(Period, -4) AS year, COUNT(*) AS count
FROM clients
WHERE SUBSTRING(Period, -4) = $currentYear
GROUP BY SUBSTRING(Period, 1, LENGTH(Period) - 4)
ORDER BY FIELD(SUBSTRING(Period, 1, LENGTH(Period) - 4), 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')";

$result = $connection->query($query);
if (!$result) {
    echo "Query error: " . $connection->errorInfo()[2];
} else {
    // Initialize arrays for labels and data
    $labels = [];
    $data = [];

    // Loop through query results and populate arrays
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $label = $row['month'] . ' ' . $row['year'];
        array_push($labels, $label);
        array_push($data, $row['count']);
    }
}
  
  //Previous year
  
  
  $previousYear = $currentYear - 1; // calculate previous year

$query2 = "SELECT SUBSTRING(Period, 1, LENGTH(Period) - 4) AS month, SUBSTRING(Period, -4) AS year, COUNT(*) AS count
FROM clients
WHERE SUBSTRING(Period, -4) = $previousYear
GROUP BY SUBSTRING(Period, 1, LENGTH(Period) - 4)
ORDER BY FIELD(SUBSTRING(Period, 1, LENGTH(Period) - 4), 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')";

$result2 = $connection->query($query2);
if (!$result2) {
    echo "Query error: " . $connection->errorInfo()[2];
} else {
    // Initialize arrays for labels and data
    $labels2 = [];
    $data2 = [];

    // Loop through query results and populate arrays
    while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        $label2 = $row2['month'] . ' ' . $row2['year'];
        array_push($labels2, $label2);
        array_push($data2, $row2['count']);
    }
}
  
// Calculate percentage increase/decrease
$total_current_year = array_sum($data);
$total_previous_year = array_sum($data2);

if ($total_previous_year == 0) {
    $percentage_change = 0;
} else {
    $percentage_change = ($total_current_year - $total_previous_year) / $total_previous_year * 100;
}

  //underwriter
  
// Query the database to get the number of times each name appears
$sql_char = "SELECT Underwritten_By, COUNT(*) as count FROM policies GROUP BY Underwritten_By ORDER BY count DESC";
$result_char = $connection->query($sql_char);

// Create arrays to hold the labels and data for the chart
$labels_char = array();
$data_char = array();

if ($result_char->rowCount()  > 0) {
  // Loop through the result set and add each name and count to the arrays
  while($row1 = $result_char->fetch(PDO::FETCH_ASSOC)) {
    array_push($labels_char, $row1["Underwritten_By"]);
    array_push($data_char, $row1["count"]);
  }
}



  
////doohnut
// Define the SQL query to get the count of each gender
$query12 = "SELECT COUNT(*) AS count, Gender FROM clients GROUP BY Gender";

// Execute the query and fetch the results
$stmt12 = $connection->query($query12);
$data12 = $stmt12->fetchAll();

// Convert the data to the format required by the chart
$labels12 = array();
$values12 = array();
foreach ($data12 as $item12) {
    $labels12[] = ucfirst($item12['Gender']);
    $values12[] = $item12['count'];
}
  
//Line chart//

// Define the SQL query to get the total amount paid for each year
$query22 = "SELECT YEAR(Date) AS year, SUM(monthly_premium) AS total_amount_paid FROM premiums GROUP BY YEAR(Date)";

// Execute the query and fetch the results
$stmt22 = $connection->query($query22);
$data22 = $stmt22->fetchAll();

// Convert the data to the format required by the chart
$line_labels = array();
$line_values = array();
foreach ($data22 as $item22) {
    $line_labels[] = ucfirst($item22['year']);
    $line_values[] = $item22['total_amount_paid'];
}

// Execute SQL query to count number of months that match current month
$sql33 = "SELECT COUNT(*) AS total FROM premiums WHERE MONTH(Date) = MONTH(CURRENT_DATE()) AND YEAR(Date) = YEAR(CURRENT_DATE())";
$result33 = $connection->query($sql33);

// Get total count from query result
if ($result33->rowCount() > 0) {
    $row = $result33->fetch(PDO::FETCH_ASSOC);
    $total33 = $row["total"];
} else {
    $total33 = 0;
}
  
  
  //line charts
  // Query the database to get the amount and date from the expenses table
$sql_expenses = "SELECT Amount, Transaction_date FROM expenses ORDER BY Transaction_date";
$result_expenses = $connection->query($sql_expenses);

// Create arrays to hold the labels and data for the expenses chart
$labels_expenses = array();
$data_expenses = array();

if ($result_expenses->rowCount()  > 0) {
  // Loop through the result set and add each date and amount to the arrays
  while($row1 = $result_expenses->fetch(PDO::FETCH_ASSOC)) {
    array_push($labels_expenses, $row1["Transaction_date"]);
    array_push($data_expenses, $row1["Amount"]);
  }
}

// Query the database to get the amount and date from the income1 table
$sql_income = "SELECT Amount, Transaction_date FROM income1 ORDER BY Transaction_date";
$result_income = $connection->query($sql_income);

// Create arrays to hold the labels and data for the income chart
$labels_income = array();
$data_income = array();

if ($result_income->rowCount()  > 0) {
  // Loop through the result set and add each date and amount to the arrays
  while($row2 = $result_income->fetch(PDO::FETCH_ASSOC)) {
    array_push($labels_income, $row2["Transaction_date"]);
    array_push($data_income, $row2["Amount"]);
  }
}
  
  // Calculate the total expenses
$total_expenses = array_sum($data_expenses);

// Calculate the total income
$total_income = array_sum($data_income);

  //line ends
$sql8 = "SELECT description FROM termsandConditions";
$result8 = $connection->query($sql8);
$u8 = $result8->fetch(PDO::FETCH_ASSOC);
  
// Retrieve user data
$sql = "SELECT * FROM accounts WHERE id = '{$_SESSION["id"]}'";
$result = $connection->query($sql);
$u = $result->fetch(PDO::FETCH_ASSOC);

// Close database connection
$connection = null;
}else{
  header("Location: ../samples/login-2.php");
}


?> 
<!DOCTYPE html>
<html lang="en">


<head>
  

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vakhandli | Reports</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/Eyomusa.png" />
  <script src="jquery-3.6.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <style>
    .re{
      color: red;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <!-- <a class="navbar-brand brand-logo" href="../../index-2.html"><img src="../../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index-2.html"><img src="../../images/logo-mini.svg" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">
          <li class="nav-item nav-search d-none d-md-flex">
            <div class="nav-link">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    
                  </span>
                </div>
               
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item dropdown d-none d-lg-flex">
            
          </li>
          
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-danger">
                    <i class="fas fa-exclamation-circle mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="fas fa-wrench mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="far fa-envelope mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="../../images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face5.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" class="nav-link" href="../samples/login-2.php">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
            </div>
       <!--   </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="fas fa-fill-drip"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close fa fa-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close fa fa-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task-todo">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove fa fa-times-circle"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="fa fa-times-circle text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="../../images/faces/face5.jpg" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                <?= htmlspecialchars($u["names"]) ?>
                </p>
                <p class="designation">
                <?= htmlspecialchars($u["AccessType"]) ?>
                </p>
              </div>
            </div>
          </li>
          
           <!--Side Menu Start-->
          <!--Side Menu Start-->
                    <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="fas fa-clipboard-list menu-icon"></i>
              <span class="menu-title">Sales</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Sales.php">New Sales</a></li>
                 <!-- <li class="nav-item"> <a class="nav-link" href="../ui-features/clipboard.html">Clipboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/context-menu.html">Context menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/slider.html">Sliders</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/carousel.html">Carousel</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/colcade.html">Colcade</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/loaders.html">Loaders</a></li>-->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="fab fa-wpforms menu-icon"></i>
              <span class="menu-title">Clients</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="newClient.php">New Clients</a></li>                
                <!--<li class="nav-item"><a class="nav-link" href="advanced_elements.html">Online Applications</a></li>-->
                <li class="nav-item"><a class="nav-link" href="Client_profile.php">Client Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="Incoming_Clients.php">Leads</a></li>
                <li class="nav-item"><a class="nav-link" href="rreportss.php">Reports</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
              <i class="fas fa-pen-square menu-icon"></i>
              <span class="menu-title">Premuims</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="Premium.php">New Payments</a></li>
                <li class="nav-item"><a class="nav-link" href="AssetTable.php">Premuim Records</a></li>
              </ul>
            </div>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="fas fa-chart-pie menu-icon"></i>
              <span class="menu-title">Reports</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../charts/chartjs.html">ChartJs</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/morris.html">Morris</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/flot-chart.html">Flot</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/google-charts.html">Google charts</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/sparkline.html">Sparkline js</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/c3.html">C3 charts</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/chartist.html">Chartists</a></li>
                <li class="nav-item"> <a class="nav-link" href="../charts/justGage.html">JustGage</a></li>
              </ul>
              </div>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-table menu-icon"></i>
              <span class="menu-title">Finances</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Asset_Register.php">Asset Register and Disposal</a></li>
                <!--<li class="nav-item"> <a class="nav-link" href="AssetTable.php">Asset Records</a></li>-->
                <li class="nav-item"> <a class="nav-link" href="Cashbook.php">Cash Book</a></li>
                <li class="nav-item"> <a class="nav-link" href="Invoice_profile.php">Invoice Profile</a></li>
                 <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Records</a></li>
               <!-- <li class="nav-item"> <a class="nav-link" href="../tables/sortable-table.html">Debtors Control</a></li>
                <li class="nav-item"> <a class="nav-link" href="../tables/sortable-table.html">Income Statement</a></li>-->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="fa fa-stop-circle menu-icon"></i>
              <span class="menu-title">Human Resources</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Company_Staff.php">New Staff Member</a></li>
                <!--<li class="nav-item"> <a class="nav-link" href="../icons/font-awesome.html">Employee Profile</a></li>-->
                <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Staff Records</a></li>
                <li class="nav-item"> <a class="nav-link" href="payrol_settings.php">Payroll Settings</a></li>
                 <li class="nav-item"> <a class="nav-link" href="Payrol_admin.php">Payroll Administration</a></li>
               
                <!--<li class="nav-item"> <a class="nav-link" href="../icons/themify.html">Payslips</a></li>-->
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
              <i class="fas fa-map-marker-alt menu-icon"></i>
              <span class="menu-title">Policies</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maps">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Products.php">Add Policies</a></li>
                <li class="nav-item"> <a class="nav-link" href="Add_Categories.php">Add Categories</a></li>
                <li class="nav-item"> <a class="nav-link" href="rreportss.php">Policy Reports</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Recordscharts" aria-expanded="false" aria-controls="charts">
              <i class="fas fa-chart-pie menu-icon"></i>
              <span class="menu-title">Records</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Recordscharts">
              <ul class="nav flex-column sub-menu">
                <!--<li class="nav-item"> <a class="nav-link" href="../charts/chartjs.html">ChartJs</a></li>-->
                <li class="nav-item"> <a class="nav-link" href="AssetTable.php">All Records</a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Claims.html">
              <i class="fas fa-pen-square menu-icon"></i>
              <span class="menu-title">Funeral Claims</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="New_Stock.php">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">New Stock</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification_portal.php">
              <i class="fas fa-bell menu-icon"></i>
              <span class="menu-title">Notifications Portal</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="phonebook.php">
              <i class="fa fa-puzzle-piece menu-icon"></i>
              <span class="menu-title">Phonebook</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="Document_Portal.php">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">Documents</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="branch.php">Branch Details</a></li>
                
                <li class="nav-item "> <a class="nav-link" href="rreportss.php">Reports</a></li>
                <li class="nav-item "> <a class="nav-link" href="termcondition.php">Terms and Conditions</a></li>
              </ul>
            </div>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="fas fa-window-restore menu-icon"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="../samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>-->
        </ul>
      </nav>
      <!-- Side Menu Ends --> 
      
      <!-- partial -->
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="page-header">           
      <h3 class="page-title">
        Report
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div>
<div class="card">
  <div class="card-body">       
    <h4 class="card-title">Reports</h4>
    <p class="card-description">System reports</p>
   
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Clients</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-underwriter-tab" data-toggle="pill" href="#pills-underwriter" role="tab" aria-controls="pills-underwriter" aria-selected="false">Underwriter</a>
  </li>
    <?php
if ($u["AccessType"] !== "Director") {
    ?>
    <li class="nav-item" style="display: none;">
        <a class="nav-link" id="pills-Revenue-tab" data-toggle="pill" href="#pills-Revenue" role="tab" aria-controls="pills-Revenue" aria-selected="false">Revenue</a>
    </li>
       <li class="nav-item">
        <a class="nav-link" id="pills-Premium-tab" data-toggle="pill" href="#pills-Premium" role="tab" aria-controls="pills-Premium" aria-selected="false">Premium</a>
    </li>
    <?php
} else {
    ?>
    <li class="nav-item">
        <a class="nav-link" id="pills-Revenue-tab" data-toggle="pill" href="#pills-Revenue" role="tab" aria-controls="pills-Revenue" aria-selected="false">Revenue</a>
    </li>
       <li class="nav-item">
        <a class="nav-link" id="pills-Premium-tab" data-toggle="pill" href="#pills-Premium" role="tab" aria-controls="pills-Premium" aria-selected="false">Premium</a>
    </li>
      
    <?php
}
?>

      <li class="nav-item">
    <a class="nav-link" id="pills-Terms-tab" data-toggle="pill" href="#pills-Terms" role="tab" aria-controls="pills-Terms" aria-selected="false">Terms and Conditions</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
 
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Line chart</h4>
                    <canvas id="myChart2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bar chart</h4>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          <br>
           <div class="text-center">
  <h5 class="mt-0">Percentage change from previous year: <?php echo round($percentage_change, 2); ?>%</h5>
</div>
<br>
            <div class="row">
  <div class="col-lg-6 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Male to Female Ratio</h4>
        <canvas id="doughnutChart"></canvas>
      </div>
    </div>
  </div>
</div>
  </div>
  <div class="tab-pane fade" id="pills-underwriter" role="tabpanel" aria-labelledby="pills-underwriter-tab">
    <!-- content for Underwriter tab goes here -->

  <div class="row">
  <div class="col-lg-6 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Policy Underwriters</h4>
        <canvas id="myChart3"></canvas>
      </div>
    </div>
  </div>
</div>
     <!-- content for Underwriter tab goes here -->
  </div>
  <div class="tab-pane fade" id="pills-Terms" role="tabpanel" aria-labelledby="pills-Terms-tab">
    <!-- content for Underwriter tab goes here -->
    <div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Quill Editor</h4>
        <div id="quillExample1" class="quill-container">
          <?php echo $u8['description']; ?>
        </div>
        <button id="editBtn" class="btn btn-primary mt-3" onclick="editContent()">Edit</button>
        <form id="editForm" style="display:none;">
          <input type="text" id="editInput" value="<?php echo $u8['description']; ?>">
          <button type="submit" class="btn btn-primary mt-3" >Save</button>
        </form>
      </div>
    </div>
  </div>

</div>  
     <!-- content for Underwriter tab goes here -->
    <label for="written_premiums">Written Premiums:</label>

    </div>
    <div class="tab-pane fade" id="pills-Revenue" role="tabpanel" aria-labelledby="pills-Revenue-tab">
    <!-- content for Underwriter tab goes here -->
     <div class="row">
  <div class="col-lg-6 grid-margin stretch-card mx-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Monthly Premium payments based on yearly gross</h4>
        <div class="chart-container">
          <canvas id="pieChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
 <label>Total Premiums for Current Month: <?php echo $total33; ?></label>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line chart</h4>
        <canvas id="myChart6" data-chart-type="line"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line chart</h4>
        <canvas id="myChart7" data-chart-type="line"></canvas>
      </div>
    </div>
  </div>
</div>
      <div class="row">
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Top-Up Customers</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">R<?php echo $totalCostTopUp; ?></h2>
                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                <i class="far fa-clock text-muted"></i>
                                <small class="ml-1 mb-0">Updated: <span id="current-time-topup"></span></small>
                            </div>
                        </div>
                        <small class="text-gray">Raised from <?php echo $totalSaleIDsTopUp; ?> orders.</small>
                    </div>
                    <div class="d-inline-block">
                        <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Cash Customers</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">R<?php echo $totalCostCash; ?></h2>
                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                <i class="far fa-clock text-muted"></i>
                                <small class="ml-1 mb-0">Updated: <span id="current-time-cash"></span></small>
                            </div>
                        </div>
                         <small class="text-gray">Raised from <?php echo $totalSaleIDsCash; ?> orders.</small>
                    </div>
                    <div class="d-inline-block">
                        <i class="fas fa-shopping-cart text-danger icon-lg"></i>                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-0">Credit Customers</h4>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-inline-block pt-3">
                        <div class="d-md-flex">
                            <h2 class="mb-0">R<?php echo $totalCostCredit; ?></h2>
                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                <i class="far fa-clock text-muted"></i>
                                 <small class="ml-1 mb-0">Updated: <span id="current-time-credit"></span></small>
                            </div>
                        </div>
                         <small class="text-gray">Raised from <?php echo $totalSaleIDsCredit; ?> orders.</small>
                    </div>
                    <div class="d-inline-block">
                        <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  <br>
         <div class="col-md-6">
        <label>Total Expenses: R<?php echo number_format($total_expenses, 2); ?></label><br>
        <label>Total Income: R<?php echo number_format($total_income, 2); ?></label><br>
        <label>Net Income: R<?php echo number_format(($total_income - $total_expenses), 2); ?></label><br>
    </div>
    <div class="col-md-6">
        <label for="n_sales" style="font-size: 20px;">Sales</label>
        <select class="form-control" id="n_sales" name="n_sales">
            <option>Select Timeframe</option>
            <option value="Monthly">Monthly</option>
            <option value="Weekly">Weekly</option>
            <option value="Daily">Daily</option>
            <option value="Yearly">Yearly</option>
        </select>
    </div>
</div>

<br>      
<label id="total_cost">Total Cost for </label><br>
<label id="total_made">Total Premiums for </label><br>
<label id="total_made1">Total Incomes for </label><br>
<label id="total_made2">Total Expenses for </label><br>
<label id="totalTotal">Total Profit for </label><br>

<script>
$(document).ready(function() {
  $('#n_sales').on('change', function() {
    var timeframe = $(this).val();

    // Update the timeframe label
    $('#timeframeLabel').text(timeframe);

    // Send AJAX request to the server
    $.ajax({
      url: 'calculate_cost.php',
      method: 'POST',
      data: $('#salesForm').serialize(),
      success: function(response) {
        // Update the total values on the page
        $('#total_cost').html('Total Cost for ' + timeframe + ': R' + (response.totalCost || 0));
        $('#total_made').html('Total Premiums for ' + timeframe + ': R' + (response.totalPremium || 0));
        $('#total_made1').html('Total Incomes for ' + timeframe + ': R' + (response.totalIncome || 0));
        $('#total_made2').html('Total Expenses for ' + timeframe + ': R' + (response.totalExpense || 0));
        $('#totalTotal').html('Total Profit for ' + timeframe + ': R' + (response.totalProfit || 0));
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
});
</script>



<script>
    function updateTime() {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';

        // Adjust the format of hours and minutes as needed
        hours = hours % 12;
        hours = hours ? hours : 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;

        var timeString = hours + ':' + minutes + ampm;
        document.getElementById('current-time-topup').innerHTML = timeString;
        document.getElementById('current-time-cash').innerHTML = timeString;
        document.getElementById('current-time-credit').innerHTML = timeString;
        document.getElementById('current-time-daily').innerHTML = timeString;
    }

    // Update the time every second
    setInterval(updateTime, 1000);
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</div>
<div class="tab-pane fade" id="pills-Premium" role="tabpanel" aria-labelledby="pills-Premium-tab">
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Premiums</h4>
                    <?php
                    ini_set('memory_limit', '256M');

                    // Establish database connection
                    $host = 'localhost';
                    $dbname = 'ekhonnec_vakhandli_group';
                    $username = 'ekhonnec_vakhandli_group';
                    $password = 'vakhandli_group';

                    $conn = new mysqli($host, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch clients who are not in the premiums table
                    $sql = "SELECT c.Policy, c.Inception_date, TIMESTAMPDIFF(MONTH, c.Inception_date, CURDATE()) AS missed_months
                            FROM clients AS c
                            LEFT JOIN premiums AS p ON c.Policy = p.Policy
                            WHERE p.Policy IS NULL";

                    $result = $conn->query($sql);

                    // Display the results for clients not in premiums
                    if ($result->num_rows > 0) {
                        echo "<h2>Clients without premiums:</h2>";
                        echo "<div class='table-responsive'>
                                <table class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>Policy Number</th>
                                            <th>Missed Months</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["Policy"] . "</td>
                                    <td>" . $row["missed_months"] . "</td>
                                  </tr>";
                        }
                        echo "</tbody>
                              </table>
                              </div>";
                    } else {
                        echo "<p>All clients have premiums.</p>";
                    }

                    // Fetch clients who are in the premiums table
                    $pageSize = 100; // Number of rows to fetch at a time
                    $page = 1; // Starting page
                    $offset = ($page - 1) * $pageSize;

                    $sql = "SELECT DISTINCT Policy FROM premiums";
                    $result = $conn->query($sql);
                    $totalRows = $result->num_rows;
                    $totalPages = ceil($totalRows / $pageSize);

                    for ($page = 1; $page <= $totalPages; $page++) {
                        $offset = ($page - 1) * $pageSize;

                        $sql = "SELECT c.Policy, p.month
                                FROM clients AS c
                                LEFT JOIN premiums AS p ON c.Policy = p.Policy
                                WHERE p.Policy IS NOT NULL
                                GROUP BY c.Policy
                                ORDER BY c.Policy, p.month
                                LIMIT $offset, $pageSize";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<h2>Clients with premiums:</h2>";
                            echo "<div class='table-responsive'>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th>Policy Number</th>
                                                <th>Missed Months</th>
                                                <th>Missed Premium Amount(Owed)</th>
                                            </tr>
                                        </thead>
                                        <tbody>";

                            while ($row = $result->fetch_assoc()) {
                                $policyNumber = $row["Policy"];
                                $month = $row["month"];

                                $missedMonths = getMissedMonths($policyNumber, $month, $conn);
                                if (!empty($missedMonths)) {
                                    $missedMonthsStr = implode(", ", array_values($missedMonths));
                                    $missedPremiumAmount = calculateMissedPremiumAmount($policyNumber, $missedMonths, $conn);
                                    echo "<tr>
                                            <td>" . $policyNumber . "</td>
                                            <td>" . $missedMonthsStr . "</td>
                                            <td>" . $missedPremiumAmount . "</td>
                                          </tr>";
                                }
                            }

                            echo "</tbody>
                                  </table>
                                  </div>";
                        }
                    }

                    $conn->close();

                    // Helper function to get missed months based on premiums
                    function getMissedMonths($policyNumber, $startMonth, $conn)
                    {
                        $currentMonth = new DateTime(date('Y-m'));
                        $endMonth = new DateTime(date('Y-m', strtotime("-1 month")));

                        $missedMonths = array();
                        $current = new DateTime($startMonth . '-01');

                        while ($current <= $endMonth) {
                            $currentMonthStr = $current->format('Y-m');
                            $monthName = date('F Y', strtotime($currentMonthStr));
                            $sql = "SELECT month FROM premiums WHERE Policy = '$policyNumber' AND month = '$currentMonthStr'";
                            $result = $conn->query($sql);

                            if ($result->num_rows === 0) {
                                $missedMonths[$currentMonthStr] = $monthName;
                            }

                            $current->modify('+1 month');
                        }

                        return $missedMonths;
                    }


                    // Helper function to calculate missed premium amount
                    function calculateMissedPremiumAmount($policyNumber, $missedMonths, $conn)
                    {
                        $monthlyPremium = getMonthlyPremium($policyNumber, $conn);
                        $missedMonthsCount = count($missedMonths); // Number of missed months
                        $totalAmount = $monthlyPremium * $missedMonthsCount; // Multiply by the number of missed months

                        return $totalAmount;
                    }

                    // Helper function to get the monthly premium for a policy
                    function getMonthlyPremium($policyNumber, $conn)
                    {
                        $sql = "SELECT monthly_premium FROM premiums WHERE Policy = '$policyNumber' ORDER BY month ASC LIMIT 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows === 1) {
                            $row = $result->fetch_assoc();
                            return $row['monthly_premium'];
                        }

                        return 0; // Return 0 if no monthly premium is found
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

<!DOCTYPE html>
<html>
<head>
    <title>Sum of Payments For Premiums</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Sum of Payments</h1>
        <form>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
        </form>

        <p id="selected_dates"></p>
        <p id="total_premium"></p>
    </div>

    <script>
        $(document).ready(function() {
            // Function to update the selected dates and total premium amount
            function updateTotalPremium() {
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();

                // Update the selected dates
                $("#selected_dates").text("Selected Dates: " + start_date + " to " + end_date);

                // Perform AJAX request to get the total premium
                $.ajax({
                    url: "calculateReports.php",
                    type: "POST",
                    data: {
                        start_date: start_date,
                        end_date: end_date
                    },
                    success: function(response) {
                        $("#total_premium").text("Total Premium Amount: R" + response);
                    }
                });
            }

            // Update the selected dates and total premium amount when the dates are changed
            $("#start_date, #end_date").on("change", function() {
                updateTotalPremium();
            });
        });
    </script>
</body>
</html>
</div>



              <style>
    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }

    #pieChart {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
             
            </div>
          
        </div>
    </div>
</div>
      
      
  </div>
</div>
    

  
<style>
.chart-container {
  display: flex;
  flex-direction: row;
     justify-content: space-between;
    margin: 20px 0;
}
canvas {
  width: 50%;
}
</style>

<br><br>
 <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
                          Clients
                        </p>
                        <h2 id='noclients'></h2>
                       
                      </div>
                      
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Policies
                        </p>
                        <h2 id='nopolicy'></h2>
                        
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Underwriters
                        </p>
                        <h2 id='nounder'></h2>
                        
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Policy Categories
                        </p>
                        <h2 id='nocate'></h2>
                        
                      </div>
                    
                  </div>
                </div>
              </div>
<script>
  function editContent() {
    // Hide the edit button
    document.getElementById("editBtn").style.display = "none";
    
    // Show the edit form and focus on the input field
    document.getElementById("editForm").style.display = "block";
    document.getElementById("editInput").focus();
  }
  
  // Submit the updated content to the server using AJAX
  document.getElementById("editForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var updatedContent = document.getElementById("editInput").value;
    
    // Send the updated content to the server using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xhttp.open("POST", "update_content.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("content=" + updatedContent);

    // Update the content on the page
    document.getElementById("quillExample1").innerHTML = updatedContent;
    
    // Hide the edit form and show the edit button
    document.getElementById("editForm").style.display = "none";
    document.getElementById("editBtn").style.display = "block";
  });
</script>      
<!-- Include the Chart.js library and create the chart script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <!-- Use PHP to output the chart data into JavaScript code -->
<script>
var ctx = document.getElementById('myChart3').getContext('2d');
var chartData = {
    labels: <?php echo json_encode($labels_char); ?>,
    datasets: [{
        label: 'Number of times each name appears',
        data: <?php echo json_encode($data_char); ?>,
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
    }]
};
var chartOptions = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
};
var myChart = new Chart(ctx, {
    type: 'bar',
    data: chartData,
    options: chartOptions
});
</script>           
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var pieChartData = {
        labels: <?php echo json_encode($line_labels); ?>,
        datasets: [{
            data: <?php echo json_encode($line_values); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ]
        }]
    };

    var pieChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'center',
            labels: {
                fontColor: '#333',
                fontSize: 12,
                usePointStyle: true,
                padding: 20
            }
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                        return previousValue + currentValue;
                    });
                    var currentValue = dataset.data[tooltipItem.index];
                    var percentage = Math.floor(((currentValue/total) * 100)+0.5);
                    return data.labels[tooltipItem.index] + ': ' + currentValue + ' (' + percentage + '%)';
                }
            }
        }
    };

    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: pieChartData,
        options: pieChartOptions
    });
</script>

<style>
    #pieChart {
        height: 400px;
        width: 100%;
    }
</style>
<!-- Create script to initialize chart -->
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Number of Clients Joined Each Month',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
 
var ctx2 = document.getElementById('myChart2').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels2); ?>,
        datasets: [{
            label: 'Number of Clients Joined Each Month',
            data: <?php echo json_encode($data2); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});  
  
  
</script>
 <script>
var ctx = document.getElementById('myChart7').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($labels_expenses); ?>,
        datasets: [{
            label: 'Expenses Over Time',
            data: <?php echo json_encode($data_expenses); ?>,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var ctx2 = document.getElementById('myChart6').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($labels_income); ?>,
        datasets: [{
            label: 'Income Over Time',
            data: <?php echo json_encode($data_income); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});  
  
  
</script>
              
              
              
              
<?php
                    function sendWelcomemailtoClient()
                    {
                     
$to = "recipient@example.com";
$subject = "Test email";
$message = "This is a test email.";
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "Content-Type: text/html\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Email failed to send.";
}
                    }
//closing php tag below
?>
                  
                
              </div>
            </div>
          <!-- this is where you paste to duplicate -->
              
        
           
        
  			
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright Â© 2023 <a href="https://www.eKhonnector.co.za" target="_blank">eKhonnector</a>. All rights reserved.</span>
         
          </div>
        </footer>
        <!-- partial -->
      
      <!-- main-panel ends -->
    
    <!-- page-body-wrapper ends -->
  
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
    
</body>

</html>
    <script>
  var ctx = document.getElementById('doughnutChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: <?php echo json_encode($labels12); ?>,
      datasets: [{
        data: <?php echo json_encode($values12); ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)'
        ]
      }]
    }
  });
</script>
     
                <script>
                  
                  
function get() {
  location.replace("https://www.mandhagri.co.za/21/pages/forms/salesrecord.php")
}
                              
function get2() {
  location.replace("https://www.mandhagri.co.za/21/pages/forms/sales_payment_record.php")
}      
                </script>
                
  <script>
  
  $.ajax({
			url:"countprods.php",
			method:"POST",
			
			success:function(data)
			{
				$('#nopolicy').html(data);
			}
			});
  
  
  $.ajax({
			url:"countClients.php",
			method:"POST",
			
			success:function(data)
			{
				$('#noclients').html(data);
			}
			});

  $.ajax({
			url:"countUnderwriter.php",
			method:"POST",
			
			success:function(data)
			{
				$('#nounder').html(data);
			}
			});
  $.ajax({
			url:"PolicyCategories.php",
			method:"POST",
			
			success:function(data)
			{
				$('#nocate').html(data);
			}
			});
  
  $.ajax({
			url:"dome.php",
			method:"POST",
			
			success:function(data)
			{
				$('#nodome').html(data);
			}
			});

  
</script>
              
      <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="../../vendors/tinymce/tinymce.min.js"></script>
  <script src="../../vendors/tinymce/themes/modern/theme.js"></script>
  <script src="../../vendors/summernote/dist/summernote-bs4.min.js"></script>
  <!-- plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/editorDemo.js"></script>
  <!-- End custom js for this page-->            
