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
  
$sql11 = "SELECT Distinct Product FROM stock";
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
  <title>Vakhandli Group Funeral Services | Sales</title>
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
        <i class="settings-close fa fa-times"></i>
        <!--ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul-->
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
                Sales
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                </ol>
            </nav>
          </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
               
                <div class="card-body">
                
                  <p class="card-description">
                    Existing Clients: Please select your policy number. New Clients: Please provide your info 
                  </p>
                  <form class="forms-sample" method="post" action="insertsales.php">
                    
                    
                      <div class="form-group">
                      <label for="names">Policy</label>
                      <select class="form-control" id="PolicyNumber" name="PolicyNumber" onchange="myFunction()" >
                      <option value="">-Select Policy-</option>
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
                      <label for="Name">Name</label>
                      <input type="text" class="form-control" id="Name" name ="Name" placeholder="Enter name">
                    </div>
                    
                     <div class="form-group">
                      <label for="Contact">Contact Number</label>
                      <input type="text" class="form-control" id="Contact" name ="Contact" placeholder="Enter Phone Number">
                    </div>
                    
                    <div class="form-group">
                      <label for="names">Address</label>
                      <input type="text" class="form-control" id="Address" name ="Address" placeholder="Address">
                    </div>
				 
                     <div class="form-group">
                		   <label for="Product name">Product Name</label>  
                        <select class="form-control" id="Product_Name" name="Product_Name" onchange="myFunction2()">
                        <option value="">-Select Product-</option>
                        <?php 
                               foreach ($result11 as $rows) { 
                              ?>
                                  <option><?php echo $rows['Product'] ?></option>
                              <?php
                                }
                              ?>
                        </select>
                    </div>
                    
                    
                 <!--   <div class="form-group">
                      <label for="names">Measurement</label>
                      <input type="text" class="form-control" id="Measurement"name ="Measurement" placeholder="Enter Measurement">
                    </div>-->
                    
                  <div class="form-group">
                      <label for="names">Quantity</label>
                      <input type="text" class="form-control" id="Quality" name ="Quality" placeholder="Enter Quantity">
                    </div>
                    
                      <div class="form-group">
                       <label for="phone">Unit Price</label>
                      <input type="Numbers" class="form-control" id="Price"  name="Price" placeholder="Enter Unit price">
                    </div>
                    <input type="hidden" id="admin" name="admin" value="<?= htmlspecialchars($u["names"]) ?>" />

                    <div class="form-group">
                      <label for="idno">Total Cost</label>
                      <input type="text" class="form-control" id="Total_cost" name="Total_cost" placeholder="Total Cost">
                    </div>
                   
                    <div class="form-group">
                      <label for="Product_Additonal_Benefits">Description</label>
                      <textarea class="form-control" id="Description"placeholder="Enter Text" name = "Description" rows="8"></textarea>
                    </div>
                      
                   
                    <button type="submit" class="btn btn-primary mr-2">Add</button>
                    <button type="reset"  class="btn btn-light" value="Clear">Clear all</button>
                    <button class="btn btn-light">Save</button>
                    
                   <button type="button" onclick='get()' class="btn btn-light" value="Records">View sales</button>
                
                  </form>
               
                </div>
              </div>
          
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
               
                </ol>
            </nav>
          </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sales</h4>
                  <p class="card-description">
                    Fill In The Details Below
                  </p>
                  <form class="forms-sample" method="post" action="cashsales.php">
                   
                    <div class="form-group ">
                       <label class="">Period</label>
                       
                      <input type="date" class="form-control" id="period"  name="period" placeholder="Enter Phone period">
                    </div>
                    <div class="form-group">
                      <label for="Product name">Transaction type</label>  
                        <select class="form-control" id="transaction_type" name="transaction_type">
                          <option> Select Transaction Type</option>
                          <option value="Cash"> Cash</option>
                          <option value="Credit">Credit</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="Product name">Client status</label>  
                        <select class="form-control" id="client_status" name="client_status">
                          <option>Select Status</option>
                          <option value=" Existing client"> Existing client</option>
                          <option value="New client">New client</option>
                        </select>
                      </div>
                     <div class="form-group">
                      <label for="names">ID/Passport</label>
                      <input type="text" class="form-control" id="ID"name ="ID" placeholder="Enter ID/Passport number">
                    </div>
                     <div class="form-group">
                      <label for="Product name">Type of payment</label>  
                        <select class="form-control" id="payment" name="payment">
                          <option>Select Payment Type</option>
                          <option value="cash">Cash</option>
                           <option value="check">Check</option>
                           <option value="bank">Bank transfer</option>
                           <option value="EFT">EFT(e-wallet)</option>
                           <option value="debit">Debit card</option>
                           <option value="credit">Credit card</option>
                        </select>
                      </div>
                     <div class="form-group">
                      <label for="Product name">Invoice type</label>  
                        <select class="form-control" id="invoice_type" name="invoice_type">
                          <option>Select Invoice Type</option>
                           <option value="quotation">Quotation</option>
                          <option value="payment">Payment made</option>
                        </select>
                      </div>
                       <div class="form-group ">
                       <label class="">Phone number</label>
                       
                      <input type="text" class="form-control" id="number"  name="number" placeholder="Enter Phone Number">
                    </div>
                         
                          <div class="form-group ">
                       <label class="">Address</label>
                       
                      <input type="text" class="form-control" id="address"  name="address" placeholder="Enter Address">
                    
                            </div>
                     <div class="form-group ">
                       <label class="">Transaction date</label>
                       
                      <input type="date" class="form-control" id="transaction_date"  name="transaction_date" placeholder="Date of Transaction">
                    </div>
                    <div class="form-group">
                      <label for="Down Payment">Down payment</label>
                      <input type="text" class="form-control" id="down_payment"  name="down_payment" placeholder="Down Payment">
                    </div>
                       <div class="form-group ">
                       <label class="">Next payment date</label>
                       
                      <input type="date" class="form-control" id="next_payment_date"  name="next_payment_date" placeholder="Date of Transaction">
                    </div>
                        <div class="form-group-group">
                        	<label for="PolicyNumber">Enable SMS</label>
                        
                		    <label style="padding-left: 20px;" for="Enable SMS">YES</label>
							<input type="radio" id="Enable_SMS" name="Enable_SMS" value="1">
                      
								<label style="padding-left: 20px;" for="Enable SMS">NO</label>
								<input type="radio" id="Enable_SMS" name="Enable_SMS" value="2">
                    </div><br>
 				<div>
                    <button type="submit" class="btn btn-primary mr-2">Next</button>
                    <button type="button" onclick='get2()' class="btn btn-light" value="Records">View sales</button>
                    <button type="reset"  class="btn btn-light" value="Clear">Clear all</button>
                  
                     </div>
                  </form>
              
              </div>
            </div>
           </div>
          
                
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Sales</h4>
                  <p class="card-description">
                     Fill In The Details Below
                  </p>
                  <form class="forms-sample" method="post" action="sale_deceased.php">
                    
                    <div class="form-group">
                      <label for="Name">Deceased Name and Surname</label>
                     <input type="text" class="form-control" id="de_Name" name="de_Name" placeholder="Enter Name and Surname">
                    </div>
      
                   
                    <div class="form-group">
                      <label for="idNumber">Deceased ID/passport</label>
                    <input type="text" class="form-control" id="de_idNumber" name="de_idNumber" placeholder="Enter ID Number">
                    </div>
                   <div class="form-group ">
                       <label class="">Date Of Death</label>
                       
                      <input type="date" class="form-control" id="DOB"  name="DOB" placeholder="Date of Transaction">
                    </div>
                     
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type='button' onclick="history.back()" class="btn btn-light">Back</button>
                   
                 </form>
                 </div>
          
                <script>

  
		function myFunction(){
          
		var search = $('#PolicyNumber').val();
          
          
		if(search != '')
		{
		load_data(search);
      load_data1(search);
          load_data2(search);
                }
		else
		{
			load_data();
		}
		
  }
                  
                  function load_data(query)
		{
			$.ajax({
			url:"Salesdata.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
				//$('#me1').html(data);
              $("input[name='Name']").val(data);
			}
			});
		}
      
      
      
      function load_data1(query1)
		{
			$.ajax({
			url:"Salesdata.php",
			method:"POST",
			data:{query1:query1},
			success:function(data)
			{
				//$('#result1').html(data);
              $("input[name='Contact']").val(data);
			}
			});
		}
      
      
      function load_data2(query2)
		{
			$.ajax({
			url:"Salesdata.php",
			method:"POST",
			data:{query2:query2},
			success:function(data)
			{
				
                $("input[name='Address']").val(data);
			}
			});
		}
      
      
      
                
                
        </script>
                 <script>

  
		function myFunction2(){
          
		var search2 = $('#Product_Name').val();
          
          
		if(search2 != '')
		{
		load_data11(search2);
      load_data12(search2);
          load_data22(search2);
                }
		else
		{
			load_data();
		}
		
  }
                  
                  function load_data11(query11)
		{
			$.ajax({
			url:"Sales_data.php",
			method:"POST",
			data:{query11:query11},
			success:function(data)
			{
				
              $("input[name='Quality']").val(data);
			}
			});
		}
      
      function load_data111(query111)
		{
			$.ajax({
			url:"Sales_data.php",
			method:"POST",
			data:{query111:query111},
			success:function(data)
			{
				
              $("input[name='Product_Additonal_Benefits']").val(data);
			}
			});
		}
      
      
      function load_data12(query12)
		{
			$.ajax({
			url:"Sales_data.php",
			method:"POST",
			data:{query12:query12},
			success:function(data)
			{
				//$('#result1').html(data);
              $("input[name='Price']").val(data);
			}
			});
		}
      
      
      function load_data22(query22)
		{
			$.ajax({
			url:"Sales_data.php",
			method:"POST",
			data:{query22:query22},
			success:function(data)
			{
				
                $("input[name='Total_cost']").val(data);
			}
			});
		}
      
      
      
                
                
        </script>
                  
          <!--div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
                          Coffins
                        </p>
                        <h2>540</h2>
                        <label class="badge badge-outline-success badge-pill">2.7% increase</label>
                      </div>
                      
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Domes
                        </p>
                        <h2>750</h2>
                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Casket
                        </p>
                        <h2>900</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Tombstones
                        </p>
                        <h2>500</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>
                    <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Flowers
                        </p>
                        <h2>300</h2>
                        <label class="badge badge-outline-danger badge-pill">16% decrease</label>
                      </div>
                  </div-->
            
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
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.eKhonnector.co.za" target="_blank">eKhonnector</a>. All rights reserved.</span>
         
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

  
  <?php

/*
//personal -info
$date = $_POST['date'];
$Name = $_POST['Name'];
$Surname = $_POST['Surname']; 
$ContactNo = $_POST['ContactNo'];
$IdNumber = $_POST['IdNumber'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$policy_No = $_POST['policy_No'];
$Address= $_POST['Address'];
$Product= $_POST['Product'];
$list_of_Benefits = $_POST['list_of_Benefits'];
$Product_Additional_Benefits = $_POST['Product_Additional_Benefits'];
$Dependent_Covered= $_POST['Dependent_Covered'];
$Extended_Members= $_POST['Extended_Members'];
$Marital_Status= $_POST['Marital_Status'];
$Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
$inception_date= $_POST['inception_date'];
  
  //Extended member
  
$Ex_Name = $_POST['Ex_Name'];
$Ex_Surname = $_POST['Ex_Surname']; 
$Ex_ContactNo = $_POST['Ex_ContactNo'];
$Ex_idNumber = $_POST['Ex_idNumber'];
$Relationship = $_POST['Relationship'];
$Nationality = $_POST['Nationality'];
$Ex_Gender = $_POST['Ex_Gender'];
  
  // spouse details
$Sp_Name = $_POST['Sp_Name'];
$Sp_Surname = $_POST['Sp_Surname'];
$Sp_ContactNo = $_POST['Sp_ContactNo'];
$Sp_idNumber = $_POST['Sp_idNumber'];
$SP_Gender = $_POST['Sp_Gender'];
$Sp_date = $_POST['Sp_date'];
  
  //product additional befits Name_of_Benefits  Product_Additonal_Benefits

$Pr_Name = $_POST['Pr_Name'];
$Name_of_Benefits  = $_POST['Name_of_Benefits'];
$Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];
 */ ?>
                
                
                <script>
                  
                  
function get() {
  location.replace("https://www.mandhagri.co.za/21/pages/forms/salesrecord.php")
}
                              
function get2() {
  location.replace("https://www.mandhagri.co.za/21/pages/forms/sales_payment_record.php")
}      
                </script>
                
                
                