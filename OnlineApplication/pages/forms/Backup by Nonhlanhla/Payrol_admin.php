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
  <title>Melody Admin | Payrol_admin</title>
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
                <li class="nav-item"><a class="nav-link" href="Premium.html">New Payments</a></li>
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
            <a class="nav-link" href="New_Stock.html">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">Physical Products</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification_portal.html">
              <i class="fas fa-bell menu-icon"></i>
              <span class="menu-title">Notifications Portal</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Phonebook.php">
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
                Pay Roll Adminstration
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
            </nav>
          </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><B>Payslip Details</B><h/4>
               <br>
                    <br>
                    <?php
if (isset($_POST['checkk'])) {
    $other_deductions = $_POST['Other_Deduction'];
    $tax_code = $_POST['tax_code'];
    $EmployeeNo = $_POST['EmployeeNo'];
    $Emp_names = $_POST['Emp_names'];
    $Emp_cell = $_POST['Emp_cell'];
    $Standard = $_POST['Standard'];
    $sta_rate = 12.50;
    $total_standard = $Standard * $sta_rate;
    $Remuration = $_POST['Remuration'];
    $Com_bonus = $_POST['Com_bonus'];
    $period = $_POST['periodroll'];
    $Overtime_hr = $_POST['Overtime_hr'];
    $over_rate = 18.50;
    $total_overtime = $Overtime_hr * $over_rate;
    $Holidays_hr = $_POST['Holidays_hr'];
    $pub_rate = 18.50;
    $total_public = $Holidays_hr * $pub_rate;
    $Leave_hr = $_POST['Leave_hr'];
    $leave_rate = 12.50;
    $total_leave = floatval($Leave_hr) * floatval($leave_rate);
    $Sick_hr = $_POST['Sick_hr'];
    $sick_rate = 12.50;
    $total_sick = floatval($Sick_hr) * floatval($sick_rate);
    $gross = $total_sick + $total_leave + $total_public + $total_overtime + $total_standard + $Remuration + $Com_bonus;
    $paye = floatval($gross) * 0.14;
    $uif =  floatval($gross) * 0.01;
    $union = floatval(105);
    $total_deductions = $paye + $uif + $union + $other_deductions;
    $net_total = $gross - $total_deductions;
    //document.getElementById("prt").disabled = false;
    echo '<script>

    alert("Calculations successfully you can now print payrol slip")
    </script>';
}
?>
                  
                    <form class="pt-3" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Period</label>
                      <input type="text" class="form-control" id="periodroll" name="periodroll" placeholder="Enter Period e.g 10/02">
                    </div>
                    <div class="form-group">
                      <label for="EmployeeNo">Employee number</label>
                      <input type="text"  class="form-control" id="EmployeeNo" name="EmployeeNo" placeholder="Enter Employee Number">
                    </div>
                    <div class="form-group">
                      <label for="tax_code">Tax code</label>
                      <input type="text" class="form-control" id="tax_code" name="tax_code" placeholder="Enter Tax Code">
                    </div>
                    <div class="form-group">
                      <label for="Emp_names">Employee names</label>
                      <input type="text"  class="form-control" id="Emp_names" name="Emp_names" placeholder="Enter Employee Name(s)">
                    </div>
                    <div class="form-group">
                      <label for="Emp_cell">Employee cell</label>
                      <input type="text"  class="form-control" id="Emp_cell" name="Emp_cell" placeholder="Enter Employee Cell">
                    </div>
                    <div class="form-group">
                      <label for="Emp_cell">Employee email</label>
                      <input type="text"  class="form-control" id="Emp_email" name="Emp_email" placeholder="Enter Employee Email">
                    </div>
                    <div class="form-group">
                      <label for="Other_Deduction">Standard worked(Hours) </label>
                      <input type="number" class="form-control" id="Standard" name="Standard" onchange="get_st_hours()" placeholder="Enter Hour(s) Worked">
                    </div>
                    <div class="form-group">
                      <label for="Remuration">Remuration(R)</label>
                      <input type="number" class="form-control" id="Remuration" name="Remuration" onchange="get_r_rands()" placeholder="Enter Remuration">
                    </div>
                    <div class="form-group">
                      <label for="Com_bonus">Commission and Bonus(R)</label>
                      <input type="text" class="form-control" id="Com_bonus" name="Com_bonus" onchange="get_c_rands()" placeholder="Enter Commission and Bonus">
                    </div>
                    <div class="form-group">
                      <label for="Overtime_hr">Overtime(Hour(s))</label>
                      <input type="text" class="form-control" id="Overtime_hr" name="Overtime_hr" onchange="get_ov_hours()" placeholder="Enter Overtime Hour(s)">
                    </div>
                    <div class="form-group">
                      <label for="Holidays_hr">Public Holidays(Hour(s))</label>
                      <input type="text" class="form-control" id="Holidays_hr" name="Holidays_hr" onchange="get_p_hours()" placeholder="Enter Public Holiday(s) Hour(s)">
                    </div>
                    <div class="form-group">
                      <label for="Leave_hr">Leave(Hour(s)) </label>
                      <input type="text" class="form-control" id="Leave_hr" name="Leave_hr" onchange="get_l_hours()" placeholder="Enter Leave Hour(s)">
                    </div>
                    <div class="form-group">
                      <label for="Sick_hr">Sick(Hour(s)) </label>
                      <input type="text" class="form-control" id="Sick_hr" name="Sick_hr" onchange="get_s_hours()" placeholder="Enter Sick Hour(s)">
                    </div>
                    <div class="form-group">
                      <label for="Other_Deduction">Other Deduction(R) </label>
                      <input type="number" class="form-control" id="Other_Deduction" name="Other_Deduction" onchange="get_o_rands()" placeholder="Enter Other Deduction(s)">
                    </div>
                    <button  type="submit" id="checkk" name="checkk" class="btn btn-primary mr-2" name="save_payroll">Calculate</button>
        <button type="reset" class="btn btn-light" onclick="clearTextbox()" name="resetDis">Clear All</button>
      	<button type="button" id="prt" name="prt" class="btn btn-primary mr-2" onclick="printSlip()">Print</button>
</form>
    <div >
        
    </div>
             <br>
                <br>
             <!--div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
                          Total Clients
                        </p>
                        <h2>1350</h2>
                        <label class="badge badge-outline-success badge-pill">100% Clients</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Not Paid
                        </p>
                        <h2>1050</h2>
                        <label class="badge badge-outline-danger badge-pill">70% of Clients</label>
                      </div>
                  <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                         Paid
                        </p>
                        <h2>300</h2>
                        <label class="badge badge-outline-success badge-pill">30% of Clients</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Smses
                        </p>
                        <h2>210</h2>
                        <label class="badge badge-outline-success badge-pill">Top Up</label>
                      </div>  
                  </div>
                </div>
              </div>
            </div>
          </div-->
         <!-- partial -->
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
      document.getElementById("unitPrice").addEventListener("input", function() {
        var num1 = document.getElementById("Quantity").value;
        var num2 = document.getElementById("unitPrice").value;
        var result = num1 * num2;
        document.getElementById("AssettotalCost").value = result;
      });
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
  <!-- Session Handler -->
   <script>
  setInterval(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == 'timeout') {
          // If session has timed out, redirect to login page
          window.location.href = '../samples/login-2.html';
        }
      }
    };
    xhttp.open('GET', 'session_handler.php', true);
    xhttp.send();
  }, 30000); // 30 seconds
</script>               
               
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.eKhonnector.co.za/" target="_blank">eKhonnector</a>. All rights reserved.</span>
           
          </div>
        </footer>
        
      
        <div class="card-body" id="print-slip" style="display: none;">
     

                  <div class="row">
            <div class="d-flex flex-row align-items-start justify-content-between w-100" style="padding-bottom: 0%; padding-left: 2%; padding-right: 2%;">
              <div>
              <label style="display: inline-block; font-weight: bolder; color: black; font-size: 50px; padding-bottom: 0%;">Funeral Demo</label></br>
              <label style="display: inline-block; font-weight: bold; color: grey; font-size: smaller; padding-bottom: 0%;">Matsulu, 1203, str 500 north</label></br>
              <label style="display: inline-block; font-weight: bold; color: grey; font-size: smaller; padding-bottom: 0%;">funeraldemo@gmail.com</label></br>
              <label style="display: inline-block; font-weight: bold; color: grey; font-size: smaller; padding: 0%; padding-bottom: 0%;">0729476167</label></br>
              <div>
                <label style="display: inline-block; font-weight: bolder; color: black;">EMPLOYEE INFORMATION</label></br>
                <hr>
                <label style="display: inline-block; font-weight: bolder; color: grey;" ><?= htmlspecialchars($EmployeeNo) ?></label></br>
                <label style="display: inline-block; font-weight: bolder; color: grey;"><?= htmlspecialchars($Emp_names) ?></label></br>
                <label style="display: inline-block; font-weight: bolder; color: grey;"><?= htmlspecialchars($Emp_cell) ?></label></br>
              </div>
            </div>
            <div>
              <div>
                <label style="display: inline-block; font-weight: bolder; color: grey; font-size: 50px">PAYSLIP</label>
                <div>
                <label style="display: inline-block; font-weight: bolder; color: grey;">PAYTYPE: MONTHLY</label></br>
                <label style="display: inline-block; font-weight: bolder; color: grey;">PERIOD: <?= htmlspecialchars($period) ?></label></br>
                <label style="display: inline-block; font-weight: bolder; color: grey;" id="tax_code_" name="tax_code_">TAX CODE: <?= htmlspecialchars($tax_code) ?></label></br>
              </div>
              </div>
            </div>
          </div>
        </div>
                  
        <div class="mt-3 text-center">
  <p style="display: inline-block; font-weight: bolder; color: grey; font-size: 20px; padding: 2%">Payment Method</p>

  <table class="table" style="border: solid 0.1px;">
    <thead style="background-color: grey;">
      <tr>
        <th scope="col">EARNINGS</th>
        <th scope="col">HOURS</th>
        <th scope="col">RATE</th>
        <th scope="col">TOTAL(R)</th>
      </tr>
    </thead>
    <tbody style="border: none;">
      <tr style="border: none;">
        <td style="border: none; font-weight: bolder;">Standard Pay</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="<?= htmlspecialchars($Standard) ?>" id="sta_pay" name="sta_pay" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="number"  value="<?= 12.50 ?>" id="sta_rate" name="sta_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($total_standard) ?>" id="sta_total" name="sta_total" style="border: none; font-weight: bolder;"></td>
      </tr>
      <tr>
        <td style="border: none; font-weight: bolder;">Overtime Pay</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="<?= htmlspecialchars($Overtime_hr) ?>" id="over_pay" name="over_pay" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="18.50" id="over_rate" name="over_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($total_overtime) ?>" id="over_total" name="over_total" style="border: none; font-weight: bolder;"></td>
      </tr>
      <tr>
        <td style="border: none; font-weight: bolder;">Leave Pay</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="<?= htmlspecialchars($Leave_hr) ?>" id="leave_pay" name="leave_pay" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="12.50" id="leave_rate" name="leave_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($total_leave) ?>" id="leave_total" name="leave_total" style="border: none; font-weight: bolder;"></td>
      </tr>
      <tr>
      <td style="border: none; font-weight: bolder;">Sick Pay</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="<?= htmlspecialchars($Sick_hr) ?>" id="sick_pay" name="sick_pay" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="12.50" id="sick_rate" name="sick_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($total_sick) ?>" id="sick_total" name="sick_total" style="border: none; font-weight: bolder;"></td>
      </tr>
      <td style="border: none; font-weight: bolder;">Public Holidays</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="<?= htmlspecialchars($Holidays_hr) ?>" id="pub_pay" name="pub_pay" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="18.50" id="pub_rate" name="pub_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($total_public) ?>" id="pub_total" name="pub_total" style="border: none; font-weight: bolder;"></td>
      </tr>
      <td style="border: none; font-weight: bolder;">Remuration</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="-" id="" name="" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;"><input type="text"  value="-" id="sick_rate" name="sick_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($Remuration) ?>" id="re_pay" name="re_pay" style="border: none; font-weight: bolder;"></td>
      </tr>
      <td style="border: none; font-weight: bolder;">Commission and Bonus</td>
        <td style="border: none; font-weight: bolder;"><input type="text" value="-" id="" name="" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;"><input type="text"  value="-" id="sick_rate" name="sick_rate" style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($Com_bonus) ?>" id="cb_pay" name="sick_total" style="border: none; font-weight: bolder;"></td>
      </tr>
      <tr style="background-color: grey;">
        <th scope="col" style="border: none; font-weight: bolder; background-color: white;"></th>
        <th scope="col" style="border: none; font-weight: bolder; background-color: white;"></th>
        <th scope="col">GROSS PAY</th>
        <th scope="col">R<input type="text"  value="<?= htmlspecialchars($gross) ?>" id="g_total" name="g_total" style="border: none; font-weight: bolder; background-color: grey;"></th>
      </tr>
      <tr style="background-color: grey;">
        <th scope="col">DEDUCTION</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">TOTAL(R)</th>
      </tr>
      <td style="font-weight: bolder;">PAYE</td>
        <td></td>
        <td></td>
        <td style="font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($paye) ?>" id="p_deduction" name="p_deduction" style="border: none; font-weight: bolder;"></td>
      </tr>
      <td style="border: none; font-weight: bolder;">UIF</td>
        <td style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="number" value="<?= htmlspecialchars($uif) ?>"  id="uif_deduction" name="uif_deduction" style="border: none; font-weight: bolder;"></td>
      </tr>
      <td style="border: none; font-weight: bolder;">UNION</td>
        <td style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($union) ?>" id="un_deduction" name="un_deduction" style="border: none; font-weight: bolder;"></td>
      </tr>
         <td style="border: none; font-weight: bolder;">OTHER</td>
        <td style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;"></td>
        <td style="border: none; font-weight: bolder;">R<input type="text" value="<?= htmlspecialchars($other_deductions) ?>" id="other_de" name="other_de" style="border: none; font-weight: bolder;"></td>
      </tr>
      <tr style="background-color: grey;">
        <th scope="col" style="border: none; font-weight: bolder; background-color: white;"></th>
        <th scope="col" style="border: none; font-weight: bolder; background-color: white;"></th>
        <th scope="col">TOTAL DEDUCTION</th>
        <td style="border: none; font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($total_deductions) ?>" id="total_deduction" name="total_deduction" style="border: none; font-weight: bolder; background-color: grey;"></td>
      </tr>
      <tr style="background-color: grey;">
        <th scope="col" style="border: none; font-weight: bolder; background-color: white;"></th>
        <th scope="col" style="border: none; font-weight: bolder; background-color: white;"></th>
        <th scope="col">NET PAY</th>
        <td style="font-weight: bolder;">R<input type="text"  value="<?= htmlspecialchars($net_total) ?>" id="net_pay" name="net_pay" style="border: none; font-weight: bolder; background-color: grey;"></td>
      </tr>
    </tbody>
  </table>
  <div class="mt-3 text-center">
  <p>If you have any question about this payslip, please contact </br>( <?= htmlspecialchars($u["names"]) ?>, <?= htmlspecialchars($u["Contact_Number"]) ?>, <?= htmlspecialchars($u["Username"]) ?> )</p>
                          </div>

                          </div>
                
               
                  </div>
                </div>
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
  <script src="js/ngco.js"></script>
  <!-- End custom js for this page-->
</body>

<script>


</script>
</html>
