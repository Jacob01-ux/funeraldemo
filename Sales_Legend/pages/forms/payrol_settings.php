<?php
include 'session_handler.php';


session_start();

if(isset($_SESSION["id"])){
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';

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
  <title>Melody Admin: Pay Roll Settings</title>
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
        <!-- <a class="navbar-brand brand-logo" href="../../Home.php"><img src="../../images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../Home.php"><img src="../../images/logo-mini.svg" alt="logo"/></a> -->
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
                <li class="nav-item"> <a class="nav-link" href="Cash_Book.html">Cash Book</a></li>
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
      
      
      <!-- Form Text boxes Start Here --> 
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Pay Roll Settings
            </h3>
            
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><B>Deduction Details</B></h4>
                  <p class="card-description">
                    
                  </p>
                 <form class="pt-3" method="post" action="payroll_setting.php">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Name of Deduction</label>
                      <input type="text" class="form-control" id="NameOfDeduction" name="NameOfDeduction" placeholder="Enter Name of Deduction">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Deduction Rate</label>
                    <select class="form-control form-control-lg" id="DeductionRate" name="DeductionRate">
                      <option>Select Deduction Rate</option>
                      <option>Percentage</option>
                      <option>Amount</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Amount</label>
                      <input type="text"  class="form-control" id="Amount" name="Amount" placeholder="Enter Amount">
                    </div>
                   <br>
                    <form>
    <div style="text-align: center;">
        <button  type="submit" id='sub' class="btn btn-primary mr-2" name="save_Deduction">Submit</button>
        <button type="reset" class="btn btn-light" onclick="clearTextbox()" name="resetDis">Clear All</button>
        <button type="button" class="btn btn-light"  name="recordDis">Update</button>
    </div>
</form> 
                    
                   <br>
                   <h4 class="card-title"><B>Job Details</B></h4>
                 <br>
                   <form class="pt-3" method="post" action="payroll_setting.php">
                  <div class="form-group">
                      <label for="exampleInputUsername1">Job Title</label>
                      <input type="text" class="form-control" id="JobTitle" name="JobTitle" placeholder="Enter Job Title">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Job Type</label>
                    <select class="form-control form-control-lg" id="JobType" name="JobType">
                      <option>Select Job Type</option>
                      <option>Information Technology</option>
                      <option>Finance</option>
                      <option>Manufactuing</option>
                      <option>Marketing</option>
                      <option>Sales</option>
                      <option>Health science</option>
                      <option>Law</option>
                      <option>Transportaion,Distribution and logistics</option>
                     
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlSelect1">Remuneration Type</label>
                    <select class="form-control form-control-lg" id="RemunerationType" name="RemunerationType">
                      <option>Select Remuneration Type</option>
                      <option>Per Hour</option>
                      <option>Per Week</option>
                      <option>Per Month</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Amount</label>
                      <input type="text"  class="form-control" id="JobAmount" name="JobAmount" placeholder="Enter Amount">
                    </div>
                   <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Benefits</label>
                      <input type="text"  class="form-control" id="Benefits" name="Benefits" placeholder="Enter Benefit(s)">
                    </div>
              
               <form>
    <div style="text-align: center;">
        <button  type="submit" id='sub' class="btn btn-primary mr-2" name="save_Job">Submit</button>
        <button type="reset" class="btn btn-light" onclick="clearTextbox()" name="resetDis">Clear All</button>
        <button type="button" class="btn btn-light"  name="recordDis">Update</button>
    </div>
</form> 
                   
            </div>
               </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><B>Worked Rates</B></h4>
                  <form class="pt-3" method="post" action="payroll_setting.php">
                    <div class="form-group">
                      <label for="exampleSelectGender">Job Titles</label>
                        <select class="form-control" id="JobTitles" name="JobTitles" >
                            <option>Select Job Title</option>
                          <option>Manager</option>
                           <option>Sales Market</option>
                           <option>Others</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Ordinary Rate</label>
                      <input type="text" class="form-control" id="OrdinaryRate" name="OrdinaryRate" placeholder="Enter Ordinary Rate">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Leave Days Allowed</label>
                      <input type="text" class="form-control" id="LeaveDaysAllowed" name = "LeaveDaysAllowed" placeholder="Enter Leave Days">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Sunday Rate</label>
                      <input type="text" class="form-control" id="SundayRate" name="SundayRate" placeholder="Enter Sunday Rate">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sick Days Rate</label>
                      <input type="text" class="form-control" id="SickDaysRate" name = "SickDaysRate" placeholder="Enter Sick Day(s) Rate">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Public Days</label>
                      <input type="text" class="form-control" id="PublicDays" name="PublicDays" placeholder="Enter Public Day(s)">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Overtime Rate</label>
                      <input type="text" class="form-control" id="OvertimeRate" name = "OvertimeRate" placeholder="Enter Overtime Rate">
                    </div>
                    
 <form>
    <div style="text-align: center;">
        <button  type="submit" id='sub' class="btn btn-primary mr-2" name="save_Work">Submit</button>
        <button type="reset" class="btn btn-light" onclick="clearTextbox()" name="resetDis">Clear All</button>
        <button type="button" class="btn btn-light"  name="recordDis">Update</button>
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
                    
                    
