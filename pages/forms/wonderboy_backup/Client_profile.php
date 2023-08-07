<?php


session_start();

if(isset($_SESSION["id"])){
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'mandhagr_websystems_10';
$username = 'mandhagr_websystems_10';
$password = 'websystems_10';

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

$sql11 = "SELECT Distinct group_name FROM groups";
$stmt11 = $connection->prepare($sql11); // Fix: Use $sql11 instead of $sql1
$stmt11->execute();
$result11 = $stmt11->fetchAll(PDO::FETCH_ASSOC);
  
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
  <title>Funeral Demo | new client</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <script src="jquery-3.6.3.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
          </li>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-ellipsis-h"></i>
            </a>
          </li>
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
                <!--<li class="nav-item"><a class="nav-link" href="..">Reports</a></li>-->
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
                <!--li class="nav-item"> <a class="nav-link" href="policyReport.php">Policy Reports</a></li-->
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
      
      <script>
	$(document).ready(function(){
	
		function load_data(query)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
      
      
      
      function load_data1(query1)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query1:query1},
			success:function(data)
			{
				$('#result1').html(data);
			}
			});
		}
      
      
      function load_data2(query2)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query2:query2},
			success:function(data)
			{
				$('#result2').html(data);
			}
			});
		}
      
      
      
      function load_data3(query3)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query3:query3},
			success:function(data)
			{
				$('#result3').html(data);
			}
			});
		}
      
      
      function load_data4(query4)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query4:query4},
			success:function(data)
			{
				$('#result4').html(data);
			}
			});
		}
      
      
      
      function load_data5(query5)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query5:query5},
			success:function(data)
			{
				$('result5').html(data);
			}
			});
		}
      
      
      function load_data6(query6)
		{
			$.ajax({
			url:"fill.php",
			method:"POST",
			data:{query6:query6},
			success:function(data)
			{
				$('#result6').html(data);
			}
			});
		}
      
      
      
      
      
      
		$('#PolicyNumber').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
		load_data(search);
      load_data1(search);
      load_data2(search);
      load_data3(search);
      load_data4(search);
      load_data5(search);
      load_data6(search);
		}
		else
		{
			load_data();
		}
		});
	});
        
        
        
        
        
        
        
        
        
        
        
        
        
    
        $(document).ready(function(){
		
		function load_data_id(query)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
		}
      
      
      
      function load_data_id1(query1)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query1:query1},
			success:function(data)
			{
				$('#result1').html(data);
			}
			});
		}
      
      
      function load_data_id2(query2)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query2:query2},
			success:function(data)
			{
				$('#result2').html(data);
			}
			});
		}
      
      
      
      function load_data_id3(query3)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query3:query3},
			success:function(data)
			{
				$('#result3a').html(data);
			}
			});
		}
      
      
      function load_data_id4(query4)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query4:query4},
			success:function(data)
			{
				$('#result4').html(data);
			}
			});
		}
      
      
      
      function load_data_id5(query5)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query5:query5},
			success:function(data)
			{
				$('result5').html(data);
			}
			});
		}
      
      
      function load_data_id6(query6)
		{
			$.ajax({
			url:"fill_id.php",
			method:"POST",
			data:{query6:query6},
			success:function(data)
			{
				$('#result6').html(data);
			}
			});
		}

        
        
        
		$('#identity').keyup(function(){
		var search = $(this).val();
        
		if(search != '')
		{
		load_data_id(search);
      load_data_id1(search);
      load_data_id2(search);
      load_data_id3(search);
      load_data_id4(search);
      load_data_id5(search);
      load_data_id6(search);
		}
		else
		{
			load_data_id();
		}
		});
	});
        
        
        
        
        
         
			$.ajax({
			url:"total.php",
			method:"POST",
			
			success:function(data)
			{
				$('#num').html(data);
			}
			});
		

        
         
			$.ajax({
			url:"sms.php",
			method:"POST",
			
			success:function(data)
			{
				$('#nosms').html(data);
			}
			});
		
        
                 
	
      </script>
       <!-- partial -->
       <div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
           
            <h3 class="page-title">
                Client Profile
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                </ol>
            </nav>
          </div>
          <form class="forms-sample" method="post" action="" id="myForm">
          <div class="col-12 grid-margin stretch-card">
            
              <div class="card">
               
                <div class="card-body">
                  <h4 class="card-title">Policy Details</h4>
                  <p class="card-description">
                    Fill In The Details Below Clientprofile-certificate.php
                  </p>
                  
                  <div class="form-group">
                      <label for="product">Policy number </label>
                       <select class="form-control" id="PolicyNumber" name="PolicyNumber" onchange="myFunction()" >
                       <?php
  
  						$query = mysqli_query($conn, 'select * from clients ');
                  		$array = mysqli_fetch_array($query);
                  
                  			echo"time";
                  
                               foreach ($query as $rows) { 
                              ?>
                                  <option><?php echo $rows['Policy'] ?></option>
                              <?php
                                }
                              ?>
                        </select>
                     
                    </div>
                  
                    <div class="form-group">
                      <label for="period">Period</label>
                      <input type="text" class="form-control" id="n_month" name="n_month" placeholder="june"required>
                         
                    </div>
                    <div class="form-group">
                		    <label for="cat">Group Name</label>
                        <input type="text" class="form-control" id="Group_Name" name="Group_Name"placeholder="Ekhonn">
                        
                    </div>
                  
                    <div class="form-group">
                      <label for="product">Product </label>
                       <input type="text" class="form-control" id="product" name="product"placeholder="cd-cj" >
                       
                     
                    </div>
                    
                     <div class="form-group">
                      <label for="Premium">Premium</label>
                      <input type="text" class="form-control" id="Premium" name="Premium" placeholder="234" required>
                    </div>
                    
                  

                    
                     <div class="form-group">
                      <label for="product_add_ben">Product Additional Benefits</label>
                        <input type="text" class="form-control" id="product_add_ben" name= "product_add_ben" placeholder="2">
                        
                    </div>
                      <div class="form-group">
                      <label for="Dep_covered">Dependent Covered</label>
                        <input type="text" class="form-control" id="Dep_covered" name="Dep_covered"placeholder="3" >
                        
                    </div>
                     <div class="form-group">
                      <label for="ext_members">Extended Members</label>
                        <input type="text"class="form-control" id="ext_members" name="ext_members"placeholder="4" >
                        
                    
                  </div>
                   <div class="form-group">
                      <label for="Preferred_Payment_Date">Preferred Payment Day</label>
                        <input type="text" class="form-control" id="Preferred_Payment_Date" name="Preferred_Payment_Date" placeholder="01-01-2021" required>
                      
                      </div>
                  
                  
                    <div class="form-group">
                          <label for="Preferred_Payment_Date">Inception Date</label>
  
                             <input type="text"  class="form-control" id="inc_date" name="inc_date" placeholder="Inception Date" required>
                     
                        </div>
                    
               
                  <h4 class="card-title"><b>Main Member</b></h4>
                  
                  
                    <div class="form-group">
                      <label for="names">Name</label>
                      <input type="text" class="form-control" id="names"name ="names" placeholder="Tester" required>
                    </div>
                    
                     
                    
                     <div class="form-group">
                      <label for="phone">Contact number</label>
                      <input type="number" class="form-control" id="phone1"  name="phone1" placeholder="0721356788" required>
                    </div>
                   
                    <div class="form-group">
                      <label for="idno">ID/passport</label>
                      <input type="number" class="form-control" id="idno" name="idno" placeholder="090908764" required>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Nationality</label>
                        
                          <input type="text" class="form-control" id="Nationality" name="Nationality"placeholder="South Africa" required>
                           
                            
                        </div>
                    
                        <div class="form-group">
                      <label for="languages_">Langauge</label>
                      <input type="text"class="form-control" id="languages_" name="languages_" placeholder="English"required>
    
                    </div>

                        <div class="form-group">
                      <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender"placeholder="Male">
                         
                      </div>
                     <div class="form-group">
                      <label for="Email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="ekhonnector@gmail.com" required>
                    </div>
                    <div class="form-group">
                      <label for="res_address">Address</label>
                     <input type="text"class="form-control" id="res_address" name= "res_address" rows="4" placeholder="Mbombela 200"required>
                    </div>
                    <div class="form-group">
                      <label for="m_status">Marital Status</label>
                        <input type="text"class="form-control" id="m_status" name="m_status"  placeholder="Single"required>
                          
                      </div>
                  
                  <div class="form-group">
                      <label for="Name">Spouse Name</label>
                      <input type="text" class="form-control" id="Sp_Name" name="Sp_Name" placeholder="Ekhonnector">
                    </div>
                    
                     <div class="form-group">
                      <label for="Surname">Spouse Surname</label>
                      <input type="text" class="form-control" id="Sp_Surname" name="Sp_Surname" placeholder="Zuza">
                    </div>
                    
                     <div class="form-group">
                      <label for="ContactNo">Spouse Contact number</label>
                      <input type="number" class="form-control" id="Sp_ContactNo" name="Sp_ContactNo" placeholder="013246545">
                    </div>
                   
                    <div class="form-group">
                      <label for="idNumber">Spouse ID/passport</label>
                      <input type="number" class="form-control" id="Sp_idNumber" name="Sp_idNumber" placeholder="090908098">
                    </div>
                       
                  
                   <h4 class="card-title"><b>Payment hestory</b></h4>
                  
           <div class="form-group">
                      <label for="Month">Month</label>
                      <input type="text" class="form-control" id="Month" name="Month" placeholder="June">
                    </div>
	
		<div class="form-group">
                      <label for="year">year</label>
                      <input type="text" class="form-control" id="year" name="year" placeholder="2023">
                    </div>
                  

			<div class="form-group">
                      <label for="Policy">Policy</label>
                      <input type="text" class="form-control" id="Policy" name="Policy" placeholder="EKC001">
                    </div>

			<div class="form-group">
                      <label for="Date">Date</label>
                      <input type="text" class="form-control" id="Date" name="Date" placeholder="21/09/2023">
                    </div>

			<div class="form-group">
                      <label for="Premium">Premium</label>
                      <input type="text" class="form-control" id="Premium1" name="Premium1" placeholder="Enter Premium">
                    </div>

		<div class="form-group">
                      <label for="Client"> Name and Surname</label>
                      <input type="text" class="form-control" id="Client" name="Client" placeholder="Enter Client">
                    </div>

		<div class="form-group">
                      <label for="Plan">Plan</label>
                      <input type="text" class="form-control" id="Plan" name="Plan" placeholder="Enter Plan">
                    </div>    
                  <!-- <button type="update" name="update" id="update" class="btn btn-primary mr-2">Update</button>-->
                  <button type="update" name="update" id="update" onclick="submitForm('')" class="btn btn-primary mr-2">Update</button>
 				  <button type="delete" name="delete" id="delete" onclick="confirmDelete()" class="btn btn-light">Delete</button>
                  
                <!--  <button type="Button" name="delete" id="delete" onclick="confirmDelete()" class="btn btn-light">Delete</button>-->


  
  					<button type="submit" name="print" onclick="submitForm('Clientprofile-certificate.php')" class="btn btn-light">Print</button>

                  
                </div>
              </div>
            </div>
          <div class="page-header">
            <h3 class="page-title">
             
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
               
                </ol>
            </nav>
          </div>


          
          <div class="page-header">
            <h3 class="page-title">
             
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
               
                </ol>
            </nav>
          </div>

<?php
$host = 'localhost';
$dbname = 'mandhagr_websystems_10';
$username = 'mandhagr_websystems_10';
$password = 'websystems_10';

// Create a new connection
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['update'])) {
    $Policy = $_POST['Policy'];

    // Retrieve the values from the form
    $n_month = $_POST['n_month'];
    $Group_Name = $_POST['Group_Name'];
    $product = $_POST['product'];
    $Premium = $_POST['Premium'];
    $product_add_ben = $_POST['product_add_ben'];
    $Dep_covered = $_POST['Dep_covered'];
    $ext_members = $_POST['ext_members'];
    $Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
    $inc_date = $_POST['inc_date'];
    $names = $_POST['names'];
    $phone1 = $_POST['phone1'];
    $idno = $_POST['idno'];
    $Nationality = $_POST['Nationality'];
    $languages_ = $_POST['languages_'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $res_address = $_POST['res_address'];
    $m_status = $_POST['m_status'];
    $Sp_Name = $_POST['Sp_Name'];
    $Sp_Surname = $_POST['Sp_Surname'];
    $Sp_ContactNo = $_POST['Sp_ContactNo'];
    $Sp_idNumber = $_POST['Sp_idNumber'];

    // Update the clients table
    $sql = "UPDATE clients SET
            Period = '$n_month',
            Group_Name = '$Group_Name',
            Package = '$product',
            PremiumCoverAmount = '$Premium',
            Product_Added_Benefit = '$product_add_ben',
            Covered = '$Dep_covered',
            extended_members = '$ext_members',
            Payment_Date = '$Preferred_Payment_Date',
            inception_date = '$inc_date',
            Customer = '$names',
            Number = '$phone1',
            _ID = '$idno',
            Nationality = '$Nationality',
            languageOf_com = '$languages_',
            Gender = '$gender',
            email = '$email',
            Address = '$res_address',
            Marital_Status = '$m_status',
            spouse_Name = '$Sp_Name',
            spouse_Surname = '$Sp_Surname',
            spouse_Number = '$Sp_ContactNo',
            spouse_ID = '$Sp_idNumber'
            WHERE Policy = '$Policy'";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $Policy = $_POST['Policy'];

    // Delete the record from the clients table
    $sql = "DELETE FROM clients WHERE Policy = '$Policy'";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
mysqli_close($conn); // Close the database connection

?>


          
            
<script>
function confirmDelete() {
    if (confirm("Are you sure you want to delete this record?")) {
        submitForm('');
    }
}

function submitForm() {
    // Your existing code to submit the form goes here
    document.getElementById("myForm").submit();
}
</script>
            
            <script>

  
		function myFunction(){
          
		var search = $('#PolicyNumber').val();
          
          
		if(search != '')
		{
		load_data(search);
      load_data1(search);
      load_data2(search);
      load_data3(search);
      load_data4(search);
      load_data5(search);
      load_data6(search);
      load_data7(search);
      load_data8(search);
      load_data9(search);
      load_data10(search);
      load_data11(search);
      load_data12(search);
      load_data13(search);
      load_data14(search);
      load_data15(search);
      load_data16(search);
      load_data17(search);
      load_data18(search);
      load_data19(search);
      load_data20(search);
      load_data21(search);
      load_data22(search); 
      load_data23(search); 
      load_data24(search);
      load_data25(search);
      load_data26(search);
      load_data27(search);
      load_data28(search);
		}
		else
		{
			load_data();
		}
		
  }


  		function load_data(query)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				//$('#me1').html(data);
              $("input[name='n_month']").val(data);
			}
			});
		}
      
      
      
      function load_data1(query1)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query1:query1},
			success:function(data)
			{
				//$('#result1').html(data);
              $("input[name='Group_Name']").val(data);
			}
			});
		}
      
      
      function load_data2(query2)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query2:query2},
			success:function(data)
			{
				//$('#result2').html(data);monthly_premium
                $("input[name='product']").val(data);
			}
			});
		}
      
      
      
      function load_data3(query3)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query3:query3},
			success:function(data)
			{
				 $("input[name='Premium']").val(data);
			}
			});
		}
              
              
              function load_data4(query4)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query4:query4},
			success:function(data)
			{
				 $("input[name='product_add_ben']").val(data);
			}
			});
		}
           function load_data5(query5)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query5:query5},
			success:function(data)
			{
				 $("input[name='Dep_covered']").val(data);
			}
			});
		}
              
              
              
               function load_data6(query6)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query6:query6},
			success:function(data)
			{
				 $("input[name='ext_members']").val(data);
			}
			});
		}
              
              
                 function load_data7(query7)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query7:query7},
			success:function(data)
			{
				 $("input[name='Preferred_Payment_Date']").val(data);
			}
			});
		}
              
              
                 function load_data8(query8)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query8:query8},
			success:function(data)
			{
				 $("input[name='inc_date']").val(data);
			}
			});
		}
              
              
                 function load_data9(query9)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query9:query9},
			success:function(data)
			{
				 $("input[name='names']").val(data);
			}
			});
		}
              
                       function load_data10(query10)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query10:query10},
			success:function(data)
			{
				 $("input[name='phone1']").val(data);
			}
			});
		}
              
              
                             function load_data11(query11)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query11:query11},
			success:function(data)
			{
				 $("input[name='idno']").val(data);
			}
			});
		}
              
             function load_data12(query12)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query12:query12},
			success:function(data)
			{
				 $("input[name='Nationality']").val(data);
			}
			});
		}
              
              
           function load_data13(query13)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query13:query13},
			success:function(data)
			{
				 $("input[name='languages_']").val(data);
			}
			});
		}
              
                function load_data14(query14)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query14:query14},
			success:function(data)
			{
				 $("input[name='gender']").val(data);
			}
			});
		}
              
              
                     function load_data15(query15)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query15:query15},
			success:function(data)
			{
				 $("input[name='email']").val(data);
			}
			});
		}
     
                   function load_data16(query16)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query16:query16},
			success:function(data)
			{
				 $("input[name='res_address']").val(data);
			}
			});
		}
              
              
              
                   function load_data17(query17)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query17:query17},
			success:function(data)
			{
				 $("input[name='m_status']").val(data);
			}
			});
		}
              
                  function load_data18(query18)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query18:query18},
			success:function(data)
			{
				 $("input[name='Sp_Name']").val(data);
			}
			});
		}
              
                function load_data19(query19)
		{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query19:query19},
			success:function(data)
			{
				 $("input[name='Sp_Surname']").val(data);
			}
			});
		}
              function load_data20(query20)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query20:query20},
			success:function(data)
			{
				 $("input[name='Sp_ContactNo']").val(data);
			}
			});
		}
              
               function load_data21(query21)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query21:query21},
			success:function(data)
			{
				 $("input[name='Sp_idNumber']").val(data);
			}
			});
		}
              
              
               function load_data22(query22)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query22:query22},
			success:function(data)
			{
				 $("input[name='Month']").val(data);
			}
			});
		}
              
        function load_data23(query23)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query23:query23},
			success:function(data)
			{
				 $("input[name='year']").val(data);
			}
			});
		}
  
              
        function load_data24(query24)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query24:query24},
			success:function(data)
			{
				 $("input[name='Policy']").val(data);
			}
			});
		}
              
              function load_data25(query25)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query25:query25},
			success:function(data)
			{
				 $("input[name='Date']").val(data);
			}
			});
		}
              
              function load_data26(query26)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query26:query26},
			success:function(data)
			{
				 $("input[name='Premium1']").val(data);
			}
			});
		}
              
              function load_data27(query27)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query27:query27},
			success:function(data)
			{
				 $("input[name='Client']").val(data);
			}
			});
		}
              
              function load_data28(query28)
              	{
			$.ajax({
			url:"profiledata.php",
			method:"POST",
			data:{query28:query28},
			success:function(data)
			{
				 $("input[name='Plan']").val(data);
			}
			});
		}
</script>
            
                  <script>

function submitForm() {
    var form = document.getElementById("PolicyInfo");
    var formData = new FormData(form);

    // Add policy number input box value to form data
    formData.append("policy_number", document.getElementById("policy_number").value);

    // Send data to first PHP file
    var xhr1 = new XMLHttpRequest();
    xhr1.open("POST", "policycertificate.php");
    xhr1.send(formData);//Premuim*/

    // Send data to second PHP file
    var xhr2 = new XMLHttpRequest();
    xhr2.open("POST", "policycertificate.php");
    xhr2.send(formData);
}

}

	</script>   
         
            
            
            <script>
// Get references to the input boxes and the output boxes
const input1 = document.getElementById('PolicyNumber');
const output1 = document.getElementById('Name_and_Surname');


// Add event listener to the input box
input1.addEventListener('change', updateOutput);

// Function to update the output boxes
function updateOutput() {
  // Get the value of the input box
  const value1 = input1.value;

  // Make an AJAX call to retrieve the corresponding value from the database
  $.ajax({
    type: 'POST',
    url: 'policycertificate.php',
    data: { PolicyNumber: value1 },
    success: function(response) {
      // Update the output boxes with the retrieved values
      if (response === 'No results found') {
        alert('No results found');
      } else {
        const [Client] = response.split(',');
        output1.value = Client;
       
      }
    },
    error: function() {
      console.log('Error retrieving value from database');
    }
  });
}

  </script>  
            
            

            

<div class="text-Left">
 <!-- <button type="button"  class="btn btn-primary mr-2">Update</button>
   Rest of your HTML form 

<button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
-->
  
  
  
  <script>
function submitForm(action) {
  document.getElementById("myForm").action = action;
  document.getElementById("myForm").submit();
}
</script>
  
  <!--
  <button type="submit" onclick="myFunction()"; id="submit" class="btn btn-primary mr-2">Submit</button>
  
  <button type="button" onclick="clear_client()" class="btn btn-light">Clear All</button>
  <button type="button" onclick="document.location='AssetTable.php'"  class="btn btn-light">View Records</button>
-->
</div>
          <!-- this is where you paste to duplicate -->
             </div>
            </div>
              </div>
            </div>
            </form>
          </div>
   <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.eKhonnector.co.za/" target="_blank">eKhonnector</a>. All rights reserved.</span>
           
          </div>
        </footer>
        <!-- partial -->
      
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script>
//   function clear_new_c(e){
//      e.preventDeault();
//      alert("working!!")
// }

function redirectToPolicyCertificate(event) {
  event.preventDefault(); // Prevents the form from submitting automatically

  // Get the policy_no value from the form
  const policy_no = document.querySelector('input[name="policy_no"]').value;

  // Submit the form to n1.php and send policy_no as a parameter
  fetch('n1.php?policy_no=' + encodeURIComponent(policy_no), {
    method: 'POST',
    body: new FormData(event.target)
  }).then(response => {
    if (response.ok) {
      // Update browser history without navigating to a new URL
      const stateObj = { policy_no: policy_no };
      window.history.pushState(stateObj, '', 'policycertificate.php');

      // Redirect to policycertificate.php after successful submission
      window.location.reload();
    } else {
      // Handle error response
      console.error('Form submission failed');
    }
  }).catch(error => {
    // Handle network or other errors
    console.error(error);
  });
}

function clear_client(){
  document.getElementById("names").value = "";
  document.getElementById("Surname").value = "";
  document.getElementById("idno").value = "";
  document.getElementById("phone").value = "";
  document.getElementById("Premium").value = "";
  document.getElementById("email").value = "";
  document.getElementById("inc_date").value = "";
  document.getElementById("res_address").value = "";

}

function clear_ext(){

  document.getElementById("Ex_Name").value = "";
  document.getElementById("Ex_Surname").value = "";
  document.getElementById("Ex_ContactNo").value = "";
  document.getElementById("Ex_idNumber").value = "";

}
function clear_de(){

  document.getElementById("de_Name").value = "";
  document.getElementById("de_Surname").value = "";
  document.getElementById("de_ContactNo").value = "";
  document.getElementById("de_idNumber").value = "";

}
function clear_pro(){
  document.getElementById("Name_of_Benefits").value = "";
  document.getElementById("Product_Additonal_Benefits").value = "";
}
  
function pro_ad_b(){

}
function Product_add_ben_count(){  
  
}

function Dep_covered_(){
  
}
function Dep_covered_count(){  
  
}

function ext_members_(){  
 
}

function ext_members_count(){  
  

}

function ext_sub(){
   
}
</script>
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
// Get references to the input boxes and the output box
const input1 = document.getElementById('cat');
const input2 = document.getElementById('product');
const output = document.getElementById('Premium');

// Add event listeners to the input boxes
input1.addEventListener('change', updateOutput);
input2.addEventListener('change', updateOutput);

// Function to update the output box
function updateOutput() {
  // Get the values of input1 and input2
  const value1 = input1.value;
  const value2 = input2.value;
  
  // Make an AJAX call to retrieve the corresponding value from the database
  $.ajax({
    type: 'POST',
    url: 'get_premium.php',
    data: { value1: value1, value2: value2 },
    success: function(response) {
      // Update the output box with the retrieved value
      output.value = response;
    },
    error: function() {
      console.log('Error retrieving value from database');
    }
  });
}
  
  
function myFunction(){
  
  $.ajax({
    type: 'POST',
    url: 'policy-certificate.php',
    data: {contact_number:$('#phone1').value()},
    success: function(response) {
      // Update the output box with the retrieved value
      //output.value = response;
    },
    error: function() {
      //console.log('Error retrieving value from database');
    }
  });
}
  }
</script>


</html>

