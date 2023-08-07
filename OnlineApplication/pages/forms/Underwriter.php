<?php
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

$query = "SELECT DISTINCT * FROM underwritten";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json_result = json_encode($result);

// Query to get the count of policies
$sql = "SELECT COUNT(*) AS count FROM policies";
$stmt2 = $connection->prepare($sql);
$stmt2->execute();
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$count = $result2['count'];


/////

?>
<!-- save button -->
<?php
session_start();
 // Connect to the database
 $conn1 = mysqli_connect("localhost", "ekhonnec_Eyomusa_Funeral", "websystems_10", "ekhonnec_Eyomusa_Funeral") or die("something wrong happend");

////Saving and Securing Data
if (isset($_POST['Save'])) {

    // Take html names and declare to place holders
    $ID = $_POST['ID'];
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $monthlyPremium= $_POST['monthlyPremium'];
    $payoutAmount = $_POST['payoutAmount'];
    $policyNumber = $_POST['policyNumber'];
    $policyPlan = $_POST['policyPlan'];
  	
    

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$ID = filter_var($_POST['ID'], FILTER_SANITIZE_NUMBER_INT);
$company_name = filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$monthlyPremium = filter_var($_POST['monthlyPremium'], FILTER_SANITIZE_STRING);
$payoutAmount= filter_var($_POST['payoutAmount'], FILTER_SANITIZE_NUMBER_INT);
$policyNumber = filter_var($_POST['policyNumber'], FILTER_SANITIZE_STRING);
$policyPlan= filter_var($_POST['policyPlan'],FILTER_SANITIZE_NUMBER_INT);



// Prepare and execute SQL query
$stmt1 = $conn1->prepare ("INSERT INTO underwriter_details (ID,company_name,email,monthlyPremium,payoutAmount,policyNumber,policyPlan) 
                         VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt1->bind_param("sssssss", $ID,$company_name,$email,$monthlyPremium,$payoutAmount,$policyNumber,$policyPlan);
$stmt1->execute();

// Check for errors and commit or rollback transaction
if (!$stmt1->error) {
    mysqli_query($conn1, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("Cash_Book.html");
    </script>';
} else {
    mysqli_query($conn1, "ROLLBACK");
    echo "Records not added successfully";
}

// Close connection and statement
$stmt1->close();
$conn1->close();
}

?>

<!-- Add buttton -->
<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group") or die("something wrong happend");

////Saving and Securing Data
if (isset($_POST['AddBtn'])) {

    // Take html names and declare to place holders
 
    $ID = $_POST['ID'];
    $period = $_POST['period'];
    $policy_number= $_POST['policy_number'];
  	$Name_surname= $_POST['Name_surname'];
    $Pass_ID= $_POST['Pass_ID'];
    $underwriter= $_POST['underwriter'];
    $underwriterPlan = $_POST['underwriterPlan'];
    $cover_Amount = $_POST['cover_Amount'];
   
  	
    

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs

$period = filter_var($_POST['period'], FILTER_SANITIZE_NUMBER_INT);
$policy_number = filter_var($_POST['policy_number'], FILTER_SANITIZE_STRING);
$Name_surname = filter_var($_POST['Name_surname'], FILTER_SANITIZE_STRING);
$Pass_ID= filter_var($_POST['Pass_ID'], FILTER_SANITIZE_NUMBER_INT);
$underwriter = filter_var($_POST['underwriter'], FILTER_SANITIZE_STRING);
$underwriterPlan= filter_var($_POST['underwriterPlan'],FILTER_SANITIZE_NUMBER_INT);
$cover_Amount= filter_var($_POST['cover_Amount'],FILTER_SANITIZE_NUMBER_INT);


							
// Prepare and execute SQL query
$stmt = $conn->prepare ("INSERT INTO underwritten (period,policy_number,Name_surname,Pass_ID,underwriter,underwriterPlan,cover_amount) 
                         VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $$period,$policy_number,$Name_surname,$Pass_ID,$underwriter,$underwriterPlan,$cover_amount,);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("Cash_Book.html");
    </script>';
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "Records not added successfully";
}

// Close connection and statement
$stmt->close();
$conn->close();
}

?>



<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vakhandli Group | Underwriter</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="../../index-2.html"><img src="../../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index-2.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
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
                    <i class="fas fa-search"></i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Search" aria-label="Search">
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item dropdown">
            
             
           
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                
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
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              
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
              <a class="dropdown-item" class="nav-link" href="../samples/login-2.html">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <!--li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li-->
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
                <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
        
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
                  Welcome Jane
                </p>
                <p class="designation">
                  Super Admin
                </p>
              </div>
            </div>
          </li>
          
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
                <li class="nav-item"><a class="nav-link" href="Claims.html">Funeral Claims</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Asset Records</a></li>
                <li class="nav-item"> <a class="nav-link" href="Cashbook.php">Cash Book</a></li>
                <li class="nav-item"> <a class="nav-link" href="Invoice_profile.php">Invoice Profile</a></li>
                 <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Cash Book Records</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="../icons/font-awesome.html">Employee Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Staff Records</a></li>
                <li class="nav-item"> <a class="nav-link" href="payrol_settings.php">Payroll Settings</a></li>
                <li class="nav-item"> <a class="nav-link" href="../icons/themify.html">Payslips</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="policyReport.php">Policy Reports</a></li>
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
            <a class="nav-link" href="New_Stock.php">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">Physical Products</span>
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
                <li class="nav-item"> <a class="nav-link" href="Payrol_admin.php">Payroll Administration</a></li>
                <li class="nav-item "> <a class="nav-link" href="payrol_settings.php">Payroll Settings</a></li>
                <!--li class="nav-item "> <a class="nav-link" href="rreportss.php">Reports</a></li-->
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
      
      <!--End of Side Menu-->
      
      
      <!-- Form Text boxes Start Here --> 
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                UNDERWRITTING
            </h3>
            
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">UNDERWRITER DETAILS</h4>
                  <p class="card-description">
                    
                  </p>
                 <form class="pt-3" method="post" >
                   <div class="form-group">
                      <label for="exampleSelectGender">Month</label>
                        <select class="form-control" id="AMonth" name="AMonth" >
                           <option>January</option>
                           <option>February</option>
                           <option>March</option>
                           <option>April</option>
                           <option>May</option>
                           <option>July</option>
                           <option>August</option>
                           <option>September</option>
                           <option>October</option>
                           <option>November</option>
                          <option> December</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Year</label>
                        <select class="form-control" id="AYear" name="AYear" >
                         <option>1900</option>
<option>1901</option>
<option>1902</option>
<option>1903</option>
<option>1904</option>
<option>1905</option>
<option>1906</option>
<option>1907</option>
<option>1908</option>
<option>1909</option>
<option>1910</option>
<option>1911</option>
<option>1912</option>
<option>1913</option>
<option>1914</option>
<option>1915</option>
<option>1916</option>
<option>1917</option>
<option>1918</option>
<option>1919</option>
<option>1920</option>
<option>1921</option>
<option>1922</option>
<option>1923</option>
<option>1924</option>
<option>1925</option>
<option>1926</option>
<option>1927</option>
<option>1928</option>
<option>1929</option>
<option>1930</option>
<option>1931</option>
<option>1932</option>
<option>1933</option>
<option>1934</option>
<option>1935</option>
<option>1936</option>
<option>1937</option>
<option>1938</option>
<option>1939</option>
<option>1940</option>
<option>1941</option>
<option>1942</option>
<option>1943</option>
<option>1944</option>
<option>1945</option>
<option>1946</option>
<option>1947</option>
<option>1948</option>
<option>1949</option>
<option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>


                           <option>2000</option>
                           <option>2001</option>
                           <option>2002</option>
                           <option>2003</option>
                           <option>2004</option>
                           <option>2005</option>
                           <option>2006</option>
                           <option>2007</option>
                           <option>2008</option>
                          <option> 2009</option>
                          <option>2010</option>
                           <option>2011</option>
                           <option>2012</option>
                           <option>2013</option>
                           <option>2014</option>
                           <option>2015</option>
                           <option>2016</option>
                           <option>2017</option>
                           <option>2018</option>
                           <option>2019</option>
                          <option> 2020</option>
                           <option>2021</option>
                           <option>2022</option>
                           <option>2023</option>
                           <option>2024</option>
                        </select>
                      </div>
                        
 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Company Name</label>
                      <input type="text" class="form-control" id="suppName" name="company_name" placeholder="eg. Phill's Printworks">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Number</label>
                      <input type="text"  class="form-control" id="AssetName" name=" ID" placeholder="eg. 0123456789">
                    </div>
                    
                 
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Email</label>
                      <input type="text"  class="form-control" id="modelNo" name="email" placeholder="eg. name@gmail.com">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Monthly Premium</label>
                      <input type="text"  class="form-control" id="refNo" name=",monthlyPremium" placeholder="eg. R120">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Payout Amount</label>
                      <input type="text"  class="form-control" id="refNo" name="payoutAmount" placeholder="eg. R12000">
                    </div>
                    
                    
                   
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Policy Number</label>
                      <input type="text"  class="form-control" id="AssettotalCost" name="polivyNumber" placeholder="1234">
                    </div>
						<div class="form-group">
                      <label for="exampleInputConfirmPassword1">Policy Plan</label>
                      <input type="text"  class="form-control" id="AssettotalCost" name="policyPlan" placeholder="basic">
                    </div>
           
              
               <form>
    <div style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2" name="Save">Save</button>
        <button type="reset" class="btn btn-light" name="ClearAsset" value="Clear">Clear All</button>
       
    </div>
		</form>
                   
            </div>
               </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">UNDERWRITTER CLIENT</h4>
                  <p class="card-description">
                 
                  </p>
                  <form class="pt-3" method="post" >
                    <div class="form-group">
                      <label for="exampleSelectGender">Month</label>
                        <select class="form-control" id="DisprodMonth" name="DisprodMonth" >
                           <option>January</option>
                           <option>February</option>
                           <option>March</option>
                           <option>April</option>
                           <option>May</option>
                           <option>July</option>
                           <option>August</option>
                           <option>September</option>
                           <option>October</option>
                           <option>November</option>
                          <option> December</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Year</label>
                        <select class="form-control" id="DisprodYear" name="DisprodYear" >
                         <option>1900</option>
<option>1901</option>
<option>1902</option>
<option>1903</option>
<option>1904</option>
<option>1905</option>
<option>1906</option>
<option>1907</option>
<option>1908</option>
<option>1909</option>
<option>1910</option>
<option>1911</option>
<option>1912</option>
<option>1913</option>
<option>1914</option>
<option>1915</option>
<option>1916</option>
<option>1917</option>
<option>1918</option>
<option>1919</option>
<option>1920</option>
<option>1921</option>
<option>1922</option>
<option>1923</option>
<option>1924</option>
<option>1925</option>
<option>1926</option>
<option>1927</option>
<option>1928</option>
<option>1929</option>
<option>1930</option>
<option>1931</option>
<option>1932</option>
<option>1933</option>
<option>1934</option>
<option>1935</option>
<option>1936</option>
<option>1937</option>
<option>1938</option>
<option>1939</option>
<option>1940</option>
<option>1941</option>
<option>1942</option>
<option>1943</option>
<option>1944</option>
<option>1945</option>
<option>1946</option>
<option>1947</option>
<option>1948</option>
<option>1949</option>
<option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>



                           <option>2000</option>
                           <option>2001</option>
                           <option>2002</option>
                           <option>2003</option>
                           <option>2004</option>
                           <option>2005</option>
                           <option>2006</option>
                           <option>2007</option>
                           <option>2008</option>
                          <option> 2009</option>
                          <option>2010</option>
                           <option>2011</option>
                           <option>2012</option>
                           <option>2013</option>
                           <option>2014</option>
                           <option>2015</option>
                           <option>2016</option>
                           <option>2017</option>
                           <option>2018</option>
                           <option>2019</option>
                          <option> 2020</option>
                           <option>2021</option>
                           <option>2022</option>
                           <option>2023</option>
                        </select>
                      </div>
                    
            
                    <div class="form-group">
                      <label for="exampleInputEmail1">Policy Number</label>
                      <input type="text" class="form-control" id="DisModelNo" name = "policy_number" placeholder="eg. pcF1223">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name and surname</label>
                      <input type="text" class="form-control" id="DisprodName" name="Name_surname" placeholder="eg. John Dave">
                    </div>
                    
                   <div class="form-group">
                      <label for="exampleInputEmail1">ID/Passport</label>
                      <input type="text" class="form-control" id="DisModelNo" name = "ID" placeholder="eg. 1234567890123">
                    </div>
                    
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Underwritter</label>
                    
                          <div >
                            <select class="js-example-basic-multiple w-100"  name = "underwriter">
                           <?php 
                               foreach ($result as $rows) { 
                              ?>
                                  <option><?php echo $rows['underwriter'] ?></option>
                              <?php
                                }
                              ?>
                             
							</select>
                            
                            </div>
                  </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Underwritter Plan</label>
                    
                          <div >
                            <select class="js-example-basic-multiple w-100" size="3" name = "underwriterPlan">
                           <?php 
                               foreach ($result as $rows) { 
                              ?>
                                  <option><?php echo $rows['underwriterPlan'] ?></option>
                              <?php
                                }
                              ?>
                             
							</select>
                            
                            </div>
                  </div>
                   
            
                     <div class="form-group">
                      <label for="exampleInputEmail1">Cover Amount</label>
                      <input type="text" class="form-control" id="DisModelNo" name = "cover_amount" placeholder="eg. R23">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Payout Amount</label>
                      <input type="text"  class="form-control" id="refNo" name="payout_amount" placeholder="eg. R12000">
                    </div>
                  
  <div style="text-align: center;">
                    
                    <button type="submit" id='sub' class="btn btn-primary mr-2" name="save_Disposal" >View</button>
                    <button type="reset" class="btn btn-light" onclick="clearTextbox()" name="resetDis">Remove</button>
                    <button type="submit" class="btn btn-primary mr-2" name="AddBtn">Add</button>
</div>          
           </form>
            
      
 <!-- Form Text boxes END Here -->     

<!-- partial -->
   
 <!--CLEAR TEXTBOXES FUNCTION -->
<script>
      
  
  
  function goToNextPage() {

  window.location.href = "AssetTable.php";
             function clearText() {

        document.getElementById("AsuppName").value = "";
  		document.getElementById("AassetName").value = "";
  		document.getElementById("AassetType").value = "";
  		document.getElementById("AmodelNo").value = "";
  		document.getElementById("ArefNo").value = "";
  		document.getElementById("Aquantity").value = "";
	    document.getElementById("AunitPrice").value = "";
  		document.getElementById("AtotalCost").value = "";
  		document.getElementById("Adatetime").value = "";

      }
}
</script>
                  
<script>
      function clearTextbox() {
        document.getElementById("DisprodName").value = "";
  		document.getElementById("DisModelNo").value = "";
  		document.getElementById("DisReason").value = "";
  		document.getElementById("disComment").value = "";
  		document.getElementById("disQuantity").value = "";
  		document.getElementById("disPrice").value = "";
  		document.getElementById("disTransDate").value = "";

      }

  
    </script>

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

