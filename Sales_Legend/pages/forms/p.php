<?php


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

$id = $_GET["_id"];


$sql = "SELECT * FROM accounts
WHERE id = '{$_SESSION["id"]}'";

$result = $conn->query($sql);

$u = $result->fetch_assoc();
//retrieving policy number from new clients

$sql1 = "SELECT * FROM policies";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$sql10= "SELECT * FROM branch_details";
$stmt10 = $connection->prepare($sql10);
$stmt10->execute();
$result10 = $stmt10->fetchAll(PDO::FETCH_ASSOC);

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
  <title>Websystems | T and Cs</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
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
          <li class="nav-item d-none d-lg-flex">
            <a class="nav-link" href="#">
              <span class="btn btn-primary">+ Create new</span>
            </a>
          </li>
          <li class="nav-item dropdown d-none d-lg-flex">
            <div class="nav-link">
              <span class="dropdown-toggle btn btn-outline-dark" id="languageDropdown" data-toggle="dropdown">English</span>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item font-weight-medium" href="#">
                  French
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-medium" href="#">
                  Espanol
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-medium" href="#">
                  Latin
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item font-weight-medium" href="#">
                  Arabic
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fas fa-bell mx-0"></i>
              <span class="count">16</span>
            </a>
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
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-envelope mx-0"></i>
              <span class="count">25</span>
            </a>
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
              <a class="dropdown-item">
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
                <li class="nav-item"> <a class="nav-link" href="../ui-features/clipboard.html">Clipboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/context-menu.html">Context menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/slider.html">Sliders</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/carousel.html">Carousel</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/colcade.html">Colcade</a></li>
                <li class="nav-item"> <a class="nav-link" href="../ui-features/loaders.html">Loaders</a></li>
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
                <li class="nav-item"><a class="nav-link" href="advanced_elements.html">Online Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="Client_profile.php">Client Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="..">Reports</a></li>
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
                <li class="nav-item"><a class="nav-link" href="..">Premuim Records</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
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
                <li class="nav-item"> <a class="nav-link" href="..">Asset Records</a></li>
                <li class="nav-item"> <a class="nav-link" href="Cash_Book.html">Cash Book</a></li>
                 <li class="nav-item"> <a class="nav-link" href="..">Cash Book Records</a></li>
                <li class="nav-item"> <a class="nav-link" href="../tables/sortable-table.html">Debtors Control</a></li>
                <li class="nav-item"> <a class="nav-link" href="../tables/sortable-table.html">Income Statement</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="Company_Staff.html">New Staff Member</a></li>
                <li class="nav-item"> <a class="nav-link" href="../icons/font-awesome.html">Employee Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="..">Staff Records</a></li>
                <li class="nav-item"> <a class="nav-link" href="../icons/themify.html">Payroll Settings</a></li>
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
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="fas fa-chart-pie menu-icon"></i>
              <span class="menu-title">Records</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../charts/chartjs.html">ChartJs</a></li>
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
            <a class="nav-link" href="Phonebook.html">
              <i class="fa fa-puzzle-piece menu-icon"></i>
              <span class="menu-title">Phonebook</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="Documents.php">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">Documents</span>
            </a>
          </li>
          
           <li class="nav-item">
            <a class="nav-link" href="terms and conditions.html">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">Terms and Conditions</span>
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
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="../layout/boxed-layout.html">Branch Details</a></li>
                <li class="nav-item"> <a class="nav-link" href="../layout/rtl-layout.html">RTL</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="../layout/horizontal-menu.html">Horizontal Menu</a></li>
              </ul>
            </div>
          </li>
         
           
          <li class="nav-item">
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
          </li>
        </ul>
      </nav>
      <!--end of side menu-->
      
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
          
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
            </nav>
          </div>
          
            <div class="col-12 grid-margin stretch-card">
           
              <div class="card">
                <div class="card-body" id="print-card-body">
                  

                <div class="row">
          <div class="d-flex flex-row align-items-start justify-content-between w-100">
            <div>
            <img src="../../images/logo-mini.svg" class="img-lg rounded mr-3" alt="profile image" style="width: 200px !important; height: 200px !important;"/>
          </div>
          <div>
            <div>
              <label style="display: inline-block;">PAYSLIP </label>
            </div>
            <hr>
            <ul class="ml-auto" style="white-space: nowrap;">

    <li>Mathenjwa Fam</li>
    <li>Matsulu</li>
    <li>1203</li>
    <li>0729476167</li>
    <li>alex@mathenjwafam.co.za</li>

            </ul>
          </div>
        </div>
      </div>
                
                  
                  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                
                  <div class="table-responsive">
                  <form class="forms-sample" id="PolicyInfo" method="POST">
                    <div class="form-group">
    
                    
                    <table class="table" style="border: none;">
  <thead>
    <tr>
      <th scope="col">Employee Information</th>
    </tr>
  </thead>
  <tbody>
    <tr style="border: none;">
      <td style="border: none;">Employ id</td>
    </tr>
    <tr style="border: none;">
      <td style="border: none;">period</td>
    </tr>
  </tbody>
</table>
             
<table class="table" style="border: none;">
  <thead>
    <tr>
      <th scope="col">Payement Method</th>
    </tr>
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
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="40" id="sta_pay" name="sta_pay" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="12.50" id="sta_rate" name="sta_rate" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="sta_total" name="sta_total" style="border: none; font-weight: bolder;"></td>
    </tr>
    <tr>
      <td style="border: none; font-weight: bolder;">Overtime Pay</td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="40" id="over_pay" name="over_pay" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="12.50" id="over_rate" name="over_rate" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="over_total" name="over_total" style="border: none; font-weight: bolder;"></td>
    </tr>
    <tr>
      <td style="border: none; font-weight: bolder;">Leave Pay</td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="40" id="leave_pay" name="leave_pay" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="12.50" id="leave_rate" name="leave_rate" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="leave_total" name="leave_total" style="border: none; font-weight: bolder;"></td>
    </tr>
    <tr>
    <td style="border: none; font-weight: bolder;">Sick Pay</td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="40" id="sick_pay" name="sick_pay" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="12.50" id="sick_rate" name="sick_rate" style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="sick_total" name="sick_total" style="border: none; font-weight: bolder;"></td>
    </tr>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">GROSS PAY</th>
      <th scope="col">R<input type="text"  value="5000" id="g_total" name="g_total" style="border: none; font-weight: bolder;"></th>
    </tr>
    <tr>
      <th scope="col">DEDUCTION</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">TOTAL(R)</th>
    </tr>
    <td style="font-weight: bolder;">PAYE</td>
      <td></td>
      <td></td>
      <td style="font-weight: bolder;">R<input type="text"  value="500" id="p_deduction" name="p_deduction" style="border: none; font-weight: bolder;"></td>
    </tr>
    <td style="border: none; font-weight: bolder;">UIF</td>
      <td style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="uif_deduction" name="uif_deduction" style="border: none; font-weight: bolder;"></td>
    </tr>
    <td style="border: none; font-weight: bolder;">UNION</td>
      <td style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="un_deduction" name="un_deduction" style="border: none; font-weight: bolder;"></td>
    </tr>
    <td style="border: none; font-weight: bolder;">OTHER</td>
      <td style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;"></td>
      <td style="border: none; font-weight: bolder;">R<input type="text"  value="500" id="un_deduction" name="un_deduction" style="border: none; font-weight: bolder;"></td>
    </tr>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">TOTAL DEDUCTION</th>
      <td style="font-weight: bolder;">R<input type="text"  value="500" id="total_deduction" name="total_deduction" style="border: none; font-weight: bolder;"></td>
    </tr>
    <tr>
      <th scope="col" style="border: none; font-weight: bolder;"></th>
      <th scope="col" style="border: none; font-weight: bolder;"></th>
      <th scope="col">NET PAY</th>
      <td style="font-weight: bolder;">R<input type="text"  value="5000" id="net_pay" name="net_pay" style="border: none; font-weight: bolder;"></td>
    </tr>
  </tbody>
</table>
<div class="mt-3 text-center">
<p>If you have any question about this payslip, please contact </br>(Alex Mathenjwa, 0729476167, alex@ekhonector.co.za)</p>
                        </div>
    
                           	<script>
		function submitForm() {
			var form = document.getElementById("PolicyInfo");
			var formData = new FormData(form);

			// Send data to first PHP file
			var xhr1 = new XMLHttpRequest();
			xhr1.open("POST", "Premuim.php");
			xhr1.send(formData);

			// Send data to second PHP file
			var xhr2 = new XMLHttpRequest();
			xhr2.open("POST", "premiumInvoice.php");
			xhr2.send(formData);
		}
	</script>
           
                    </div>
                    
                  </form>
                  </div>
                </div>
              </div>
            </div>
             
                </div>
              </div>
            </div>
            <script>

    </script> 
            <button type="button" class="btn btn-primary" onclick="printCard()">Print</button>
                     <button class="btn btn-light" id="download">Download</button>
                     <button type="button" class="btn btn-primary">Send</button>
                     <script>
    </script> 
              </div>
            </div>
              </div>
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


</script>
</html>

