<script>
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });
</script>
<?php


session_start();

if(isset($_SESSION["id"])){
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

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


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * FROM accounts
WHERE id = '{$_SESSION["id"]}'";

$result = $conn->query($sql);

$u = $result->fetch_assoc();
//retrieving policy number from new clients

$sql1 = "SELECT * FROM policies";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}else{
  header("Location: ../samples/login-2.php");
}
?>
<?php
// Start the session
//include_once 'Reminders.php';
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

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

$query = "SELECT * FROM groups";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json_result = json_encode($result);

$query11 = "SELECT * FROM policies";
$stmt11 = $connection->prepare($query11);
$stmt11->execute();
$result11 = $stmt11->fetchAll(PDO::FETCH_ASSOC);
$json_result11 = json_encode($result11);


$query3 = "SELECT * FROM underwriter_details";
$stmt3 = $connection->prepare($query3);
$stmt3->execute();
$result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$json_result3 = json_encode($result3);

$query1 = "SELECT * FROM policies ";
$stmt1 = $connection->prepare($query1);
$stmt1->execute();
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$json_result1 = json_encode($result1);


$querycategories = "SELECT * FROM categories";
$stmtcategories = $connection->prepare($querycategories);
$stmtcategories->execute();
$resultcategories = $stmtcategories->fetchAll(PDO::FETCH_ASSOC);
$json_resultcategories = json_encode($resultcategories);


// Query to get the count of policies
$sql = "SELECT COUNT(*) AS count FROM policies";
$stmt2 = $connection->prepare($sql);
$stmt2->execute();
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$count = $result2['count'];


/////

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Funeral Demo | Products</title>
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
        <!-- <a class="navbar-brand brand-logo" href="../../index-2.html"><img src="../../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index-2.html"><img src="../../images/logo-mini.svg" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="fas fa-bars"></span>
        </button>
        <!--ul class="navbar-nav">
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
        </ul-->
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
          </li>
         <!--<li class="nav-item nav-settings d-none d-lg-block"> 
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
         <li class="nav-item">
            <a class="nav-link" href="Dashboard.php">
              <i class="fas fa-home menu-icon"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="fas fa-clipboard-list menu-icon"></i>
              <span class="menu-title">Sales</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Sales.php">New Sales</a></li>
                
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
                <!--<li class="nav-item"><a class="nav-link" href="..">Reports</a></li>-->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements2" aria-expanded="false" aria-controls="form-elements2">
              <i class="fab fa-wpforms menu-icon"></i>
              <span class="menu-title">Branches</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="Groups.php">New Branch</a></li>                
                
                <li class="nav-item"><a class="nav-link" href="Group_profile.php">Branch Profile</a></li>
               
              </ul>
            </div>
          </li>
           <!--li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements2" aria-expanded="false" aria-controls="form-elements2">
              <i class="fab fa-wpforms menu-icon"></i>
              <span class="menu-title">Branches</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="Groups.php">New Branch</a></li>                
                
                <li class="nav-item"><a class="nav-link" href="Group_profile.php">Branch Profile</a></li>
               
              </ul>
            </div>
          </li-->
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
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-table menu-icon"></i>
              <span class="menu-title">Finances</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Asset_Register.php">Asset Register and Disposal</a></li>
                <li class="nav-item"> <a class="nav-link" href="Cashbook.php">Cash Book</a></li>
                <li class="nav-item"> <a class="nav-link" href="Invoice_profile.php">Invoice Profile</a></li>               
                 <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Records</a></li>              
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Underwriter.php">
              <i class="fas fa-bell menu-icon"></i>
              <span class="menu-title">Underwriter</span>
            </a>
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
                <li class="nav-item "> <a class="nav-link" href="rreportss.php">Reports</a></li>
                <li class="nav-item "> <a class="nav-link" href="termcondition.php">Terms and Conditions</a></li>
              </ul>
            </div>
          </li>        
        </ul>
      </nav>
      <!-- Side Menu Ends -->
      
      <!-- partial -->

<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-body">
        <div class="page-header">
          <h3 class="page-title">Policies/Products</h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Forms</a></li>
              <li class="breadcrumb-item active" aria-current="page">Products/policies</li>
            </ol>
          </nav>
        </div>
        <h4 class="card-title">Policies</h4>
        <p class="card-description">Fill In The Details Below</p>    
        <form class="forms-sample" method="post" action="asset.php">
          <!-- page code goes here-->
        <label for="exampleSelectGender">Branch Name</label>
        <select class="form-control" id="prodCategory" name="prodCategory" placeholder="Select Branch Name">
                            <option value="">-Select Branch-</option>
                            <?php 
                            foreach ($result as $rows) { 
                            ?>
                                <option><?php echo $rows['group_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

<br>
<div class="form-group">
  <label for="exampleSelectGender">Policy Name</label>
  <input type="text" class="form-control" name="prodName" list="policyOptions" placeholder="Enter or select policy Name">
  <datalist id="policyOptions">
    <?php foreach ($result1 as $row) { ?>
      <option><?php echo $row['Policy_Name']; ?></option>
    <?php } ?>
  </datalist>
</div>
  <div class="form-group">
  <label for="exampleSelectGender">Policy Category</label>
  <input type="text" class="form-control" name="prodType" id="prodType" list="policyCate" placeholder="Enter or select policy category">
  <datalist id="policyCate">
    <?php foreach ($resultcategories as $row) { ?>
      <option><?php echo $row['categoryName']; ?></option>
    <?php } ?>
  </datalist>
</div>
          
          <div class="form-group">
    <label for="exampleInputName1">Joining Fee</label>
      <input type="text" class="form-control" id="Joining_fee" name="Joining_fee" placeholder="R50">
    </div>
          <div class="form-group">
    <label for="exampleInputName1">Extra Member Cost</label>
      <input type="text" class="form-control" id="Extra_Member" name="Extra_Member"  placeholder="name">
    </div>
          
          
  <div class="form-group">
    <label for="exampleInputName1">Waiting Period (Months)</label>
      <input type="number" class="form-control" inputmode="numeric" pattern="[0-9]*" name="prodWaiting" min="0" max="9999" placeholder="1">
    </div>

  <div class="form-group ">
    <label for="exampleInputName1">Premium Amount (Rands)</label>
         <input type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" name="prodAmnt" id="prodAmnt" placeholder="R0.00" step="0.01">
    </div>

  <div class="form-group ">
    <label for="exampleInputName1">Number of Dependents</label>
      <input type="number" class="form-control" inputmode="numeric" pattern="[0-9]*" name="prodDependents" min="0" max="9999" placeholder="1">
    </div>

  <div class="form-group">
    <label for="exampleInputName1">Additional Members</label>
      <input type="number" class="form-control" inputmode="numeric" pattern="[0-9]*" name="prodaddMember" min="0" max="9999" placeholder="1">
    </div>

  <div class="form-group ">
    <label for="exampleSelectGender">Underwritten By</label> 
         <input type="text" class="form-control" name="prodUnder" list="prodUnder" placeholder="Select an Underwriter">
          <datalist id="prodUnder">
  <?php foreach ($result3 as $row) { ?>
    <option><?php echo $row['company_name']; ?></option>
  <?php }   ?>

</datalist>
<br>
  <div class="form-group ">
    <label for="exampleSelectGender">Additional Benefits</label>
                   <input type="number" inputmode="numeric" class="form-control" pattern="[0-9]*" id = "prodBenefits" name = "prodBenefits" min="0" max="9999" placeholder="1">
  </div>
  
<div class="form-group ">
  <label class="col-sm-3 col-form-label">Product Code</label>
  <?php
  // Connect to the database using PDO
  $host = 'localhost';
  $dbname = 'jeudfra';
  $username = 'root ';
  $password = ' ';

  $dsn = "mysql:host=$host;dbname=$dbname";
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  );

  try {
    $pdo = new PDO($dsn, $username, $password, $options);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
  }

  // Retrieve the highest product code from the database
  $sql = "SELECT MAX(Product_Code) AS max_code FROM policies";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    // Display an error message if the query fails
    echo "Error retrieving product code.";
  } else {
    // Extract the numeric part of the code and increment it by 1
    $max_code = $row['max_code'];
    $numeric_part = (int)substr($max_code, 4);
    $next_numeric_part = $numeric_part + 1;

    // Construct the next product code
    $next_product_code = 'PROD' . str_pad($next_numeric_part, 4, '0', STR_PAD_LEFT);
    ?>
    <input type="text" id="prodCode" name="prodCode" class="form-control" value="<?php echo $next_product_code; ?>" readonly>
    <?php
  }
  ?>
</div>

<div class="form-group">
  <label for="exampleSelectGender">Description of Benefits</label>
  <textarea class="form-control" name = "prodDescription" id="prodDescription" placeholder="Enter a description or benefits" rows="5" cols="50"></textarea>
</div>

<div class="form-group">
                          <label for="exampleInputName1" >Date </label>
                             <input type="date"  class="form-control" id="date" name="date" placeholder="Date of Transaction">
                          </div>

<div class="form-group ">
  <label for="exampleInputName1" >Cover Amount</label>
    <input type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" name="prodCoverAmnt" placeholder="R0.00" step="0.01">
  </div>
<div >
          <br>
      <!-- Age Range Stuff Start -->
      <style>
        #age-table {
          margin: auto;
        }
      </style>

      <div style="display: flex;">
        <label style="margin-right: 10px;">
          <input type="radio" name="card-visibility1" id="show-card-checkbox" value="show">
          Show Age Ranges
        </label>
        <label style="margin-left: 10px;">
          <input type="radio" name="card-visibility2" id="hide-card-checkbox" value="hide" checked>
          Hide Age Ranges
        </label>
      </div>

     <div class="card-body" id="card" style="display: none;" class="table-responsive">
  <div style="height: 200px; overflow: scroll;">
    <div style="text-align: center;">
      <font size="+6"><caption>Additional Members</caption></font>
      <br><br>
          <!-- Age Range code goes here-->
	<table id="age-table" >
  <tr>
    <td>
      <label style="margin-left: 10px;" for="age-range-1">Age range 1:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange1" name="ageRange1" min="0" max="120">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-2">Age range 2:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange2" name="ageRange2" min="0" max="120">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-2">Additional Amount:</label>
    </td>
    <td>
          <input style="margin-left: 10px;"type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addAmount1" name="addAmount1" placeholder="R0.00" step="0.01">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-2">Cover Amount</label>
    </td>
    <td>
         <input style="margin-left: 10px;"type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addCoverAmount1" name="addCoverAmount1" placeholder="R0.00" step="0.01">
    </td>
  </tr>
  <tr></tr> <!-- empty row for spacing -->
  <tr>
    <td>
      <label style="margin-left: 10px;" for="age-range-3">Age range 3:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange3" name="ageRange3" min="0" max="120">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-4">Age range 4:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange4" name="ageRange4" min="0" max="120">
    </td>
       <td>
      <label style="margin-left: 10px;" for="age-range-2">Additional Amount:</label>
    </td>
    <td>
          <input style="margin-left: 10px;"type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addAmount2" name="addAmount2" placeholder="R0.00" step="0.01">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-2">Cover Amount</label>
    </td>
    <td>
         <input style="margin-left: 10px;"type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addCoverAmount2" name="addCoverAmount2" placeholder="R0.00" step="0.01">
    </td>
  </tr>
  
   <tr></tr> 
  <tr>
    <td>
      <label style="margin-left: 10px;" for="age-range-5">Age range 5:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange5" name="ageRange5" min="0" max="120">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-6">Age range 6:</label>
    </td>
    <td>
      <input  style="margin-left: 10px;" type="number" class="form-control" id="ageRange6" name="ageRange6" min="0" max="120">
    </td>
    <td style="margin-left: 10px;">
      <label style="margin-left: 10px;" for="age-range-2">Additional Amount:</label>
    </td>
    <td>
          <input style="margin-left: 10px;" type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addAmount3" name="addAmount3" placeholder="R0.00" step="0.01">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-2">Cover Amount</label>
    </td>
    <td>
         <input style="margin-left: 10px;" type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addCoverAmount3" name="addCoverAmount3" placeholder="R0.00" step="0.01">
    </td>
  </tr>
  
  <tr></tr> 
  <tr>
    <td>
      <label  style="margin-left: 10px;"for="age-range-7">Age range 7:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange7" name="ageRange7" min="0" max="120">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-8">Age range 8:</label>
    </td>
    <td>
      <input style="margin-left: 10px;" type="number" class="form-control" id="ageRange8" name="ageRange8" min="0" max="120">
    </td>
       <td>
      <label style="margin-left: 10px;" for="age-range-2">Additional Amount:</label>
    </td>
    <td>
          <input style="margin-left: 10px;"type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addAmount4" name="addAmount4" placeholder="R0.00" step="0.01">
    </td>
    <td>
      <label style="margin-left: 10px;" for="age-range-2">Cover Amount</label>
    </td>
    <td>
         <input style="margin-left: 10px;"type="text" class="form-control" inputmode="numeric" pattern="^\$?[0-9]{1,3}(?:,?[0-9]{3})*(?:\.[0-9]{2})?$" id="addCoverAmount4" name="addCoverAmount4" placeholder="R0.00" step="0.01">
    </td>
  </tr>
</table>

<p id="result"></p>

  </div>

        </div>
      </div>
      <!-- Age Range Stuff End -->

      <br><br>
      <button type="submit" id="sub" class="btn btn-primary mr-2" name="save_Products">Submit</button>
      <button type="reset" class="btn btn-light" onclick="clearTextboxes()" name="resetDis">Clear All</button>
      <button type="button" class="btn btn-light" onclick="location.href='AssetTable.php'">Records</button>
    </form>
    <div id='result'></div>
    <br><br>

</div>
  </div>
</div>
<style>
  @media (max-width: 576px) {
    .card-title {
      font-size: 24px;
    }
    .breadcrumb {
      font-size: 12px;
    }
    .card-description {
      font-size: 14px;
    }
  }
</style> 
<script>
  const showCardCheckbox = document.getElementById('show-card-checkbox');
  const hideCardCheckbox = document.getElementById('hide-card-checkbox');
  const card = document.getElementById('card');

  hideCardCheckbox.addEventListener('change', () => {
    if (hideCardCheckbox.checked) {
      card.style.display = 'none';
      showCardCheckbox.checked = false;
    } else {
      card.style.display = 'block';
    }
  });

  showCardCheckbox.addEventListener('change', () => {
    if (showCardCheckbox.checked) {
      card.style.display = 'block';
      hideCardCheckbox.checked = false;
    } else {
      card.style.display = 'none';
    }
  });
</script>

        
     
        
        
        
        
           <!--div class="row grid-margin">
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
            </div>
          </div-->
            
           <!-- partial -->
     
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.eKhonnector.co.za" target="_blank">eKhonnector</a>. All rights reserved.</span>
         
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
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
<script>
  const selectElement = document.getElementById("prodMonth");
  const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  for (let i = 0; i < months.length; i++) {
    const optionElement = document.createElement("option");
    optionElement.value = months[i];
    optionElement.text = months[i];
    selectElement.appendChild(optionElement);
  }
</script>
<script>
function checkInputNumber() {
  var submitButton = document.getElementById("sub");
  submitButton.addEventListener("click", function() {
    var inputNumber = document.getElementById("prodBenefits").value;
    if (inputNumber > 0) {
      window.location.href = "AdditionalBenefits.php?inputNumber=" + inputNumber;
    }
  });

      function clearTextboxes() {
        document.getElementById("prodCoverAmnt").value = "";
  		document.getElementById("prodDescription").value = "";
  		document.getElementById("prodMonth").value = "January";
  		document.getElementById("prodYear").value = "2001";
  		document.getElementById("prodaddMember").value = "";
  		document.getElementById("prodCode").value = "";
	    document.getElementById("prodUnder").value = "";
  		document.getElementById("prodBenefits").value = "";
  		document.getElementById("prodWaiting").value = "";
		document.getElementById("prodAmount").value = "";
  		document.getElementById("prodDependents").value = "";
  		document.getElementById("deasedName").value = "";
        document.getElementById("prodType").value = "";
  		document.getElementById("prodName").value = "";
  		document.getElementById("prodCategory").value = "";
      }
</script>
<!-- Mirrored from www.urbanui.com/melody/template/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:07:34 GMT -->
</html>

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
