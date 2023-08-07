<script>
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });
</script>
<?php

session_start();

if(isset($_SESSION["id"])){
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';
$conn = new mysqli($host, $username, $password, $dbname);
$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$result = array();


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM accounts
WHERE id = '{$_SESSION["id"]}'";

$result1 = $conn->query($sql);

$u = $result1->fetch_assoc();

if (isset($_POST['filter-btn'])) {
  $filter = $_POST['data-filter'];
  
  if ($filter == 'clients') {
    // retrieve all data
    $table = 'clients';
    $firstColValue = 'id';
      try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM clients");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
  } else if ($filter == 'option1') {
    // retrieve data filtered by option 1
     $table = 'policies';
    $firstColValue = 'Policy_Id';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM policies");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    
  } else if ($filter == 'option2') {
    // retrieve data filtered by option 2
    
    $table = 'equipment';
    $firstColValue = 'ref_Number';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM equipment");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    
  } else if ($filter == 'option3') {
    // retrieve data filtered by option 3
    $table = 'asset_disposal';
    $firstColValue = 'ref_Num';
   
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM asset_disposal");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    } else if ($filter == 'option4') {
    // retrieve data filtered by option 2
    $table = 'phonebook';
    $firstColValue = 'ID_';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM phonebook");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    } else if ($filter == 'option5') {
    // retrieve data filtered by option 2
     $table = 'income1';
    $firstColValue = 'id';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM income1");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    } else if ($filter == 'option6') {
    // retrieve data filtered by option 2
    $table = 'underwriter_details';
    $firstColValue = 'ID';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM underwriter_details");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    } else if ($filter == 'option7') {
    // retrieve data filtered by option 2
    $table = 'sale';
    $firstColValue = 'Reference_Number';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM sale");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
    
  } else if ($filter == 'option8') {
    // retrieve data filtered by option 2
    $table = 'premiums';
    $firstColValue = 'id';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM premiums");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
  
  } else if ($filter == 'option9') {
    // retrieve data filtered by option 2
     $table = 'expenses';
    $firstColValue = 'id';
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = $connection->prepare("SELECT * FROM expenses");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
  }
    
    


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['table'] = $table;
$_SESSION['column'] = $firstColValue;
}
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
  <title>Funeral Demo | Asset table: Records</title>
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
    <div class="page-header">
      <h3 class="page-title">Records</h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="AssetTable.php">Tables</a></li>
        </ol>
      </nav>
    </div>

    <div class="card" id="card1">
      <div class="card-body">
        <?php
        if (isset($table)) {
          echo '<h4 class="page-title">' . $table . '</h4>';
        } else {
          echo '<p>No table selected, Please Choose a table</p>';
        }
        ?>

        <form class="form-inline d-flex justify-content-center" method="POST">
          <div class="form-group mb-2 mr-2 col-md-4">
            <div class="row">
              <div class="col-auto pr-0">
                <label for="data-filter"><font size="5">Choose Data:</font></label>
              </div>
              <div class="col-auto pr-0">
                <select name="data-filter" id="data-filter" class="form-control">
                  <option value="clients">Clients</option>
                  <option value="option1">Policies</option>
                  <option value="option2">Asset Register</option>
                  <option value="option3">Asset Disposal</option>
                  <option value="option4">PhoneBook</option>
                  <option value="option5">Incomes</option>
                  <option value="option9">Expenses</option>
                  <option value="option6">Underwriters</option>
                  <option value="option7">Sales</option>
                  <option value="option8">Premiums</option>
                </select>
              </div>
              <div class="col-auto pr-0">
                <button type="submit" name="filter-btn" class="btn btn-primary" id="filter-btn">Filter</button>
              </div>
            </div>
          </div>
          <input type="hidden" name="form-submitted" value="true">
        </form>
        
<script>
const filterSelect = document.getElementById("data-filter");
const productTitle = document.getElementById("product-title-label");

document.getElementById("filter-btn").addEventListener("click", () => {
  const selectedOption = filterSelect.options[filterSelect.selectedIndex].text;
  productTitle.textContent = selectedOption;
  return false;
});
</script>
        
      <style>
    /* Define the arrow animation */
    @keyframes arrow {
      0% {
        transform: translateX(0);
        opacity: 1;
      }
      50% {
        transform: translateX(10px);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    
    /* Apply the animation to the arrow */
    .arrow-container {
      width: 100%;
      overflow-x: scroll;
    }
    
    .arrow {
      display: inline-block;
      width: 0;
      height: 0;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent;
      border-left: 10px solid darkblue; /* Modified to dark blue color */
      animation: arrow 1s infinite;
    }
    
   /* Additional styles for the "scroll right" text */
.scroll-text {
  display: inline-block;
  margin-left: 10px;
  animation: scrollRight 2s infinite linear;
  color: darkblue; /* Added dark blue color */
}

/* Define the scroll animation for the text */
@keyframes scrollRight {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(100px);
  }
}
</style>
 <div class="arrow-container">
<div class="arrow"></div>
   <span class="scroll-text"><b>Scroll right</b></span>        

<div class="col-12">
<?php if (empty($result)) { ?>
    <p style="font-size: 4em; text-align: center;">No data found.</p>
</div>
<?php } else { ?>
    <div class="table-responsive">
        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <?php
                        $headers = $result[0];
                        foreach ($headers as $key => $value) {
                            echo "<th>" . htmlspecialchars($key) . "</th>";
                        }
                        echo "<th>Actions</th>";
                    ?>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($result as $row) { ?>
                    <tr>
                        <?php
                            $first_col_value = null;
                            foreach ($row as $key => $value) {
                                if ($key == array_keys($headers)[0]) {
                                    $first_col_value = $value;
                                }
                                echo "<td>" . htmlspecialchars($value) . "</td>";
                            }
                        ?>
                        <td>
                            <a href="edit2.php?id=<?php echo $first_col_value; ?>" style="display: inline-block; padding: 8px 12px; background-color: #007bff; color: #fff; border-radius: 4px; text-decoration: none; margin-right: 10px;">Edit</a>
                            <a href="Delete.php?id=<?php echo $first_col_value; ?>" onclick="return confirm('Are you sure you want to delete this item?')" style="display: inline-block; padding: 8px 12px; background-color: #dc3545; color: #fff; border-radius: 4px; text-decoration: none;">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
</div>

<script type ="text/javascript" src ="table2excel.js"></script>
        <script type ="text/javascript" src ="scriptExcel.js"></script>
<br><br>
<div class="button-container">

    <input type="hidden" name="table" value="<?php echo $table; ?>">
    <button onClick="tableToexcel()" class="btn btn-primary">Download as Excel</button>

</div>
<br>
<div>
  <form id="download-form" method="POST" action="download.php">
    <input type="hidden" name="table" value="<?php echo $table; ?>">
    <button type="submit" class="btn btn-primary">Download as PDF</button>
  </form>
</div>

<script>
  var downloadForm = document.getElementById("download-form");
  var makepdf = document.getElementById("makepdf");

  downloadForm.addEventListener("submit", function () {
    html2pdf().from(makepdf).save();
  });
</script>



   <script> 
    function editRow(button) {
  // Get the table row
  var row = button.parentNode.parentNode;
  // Get the name and age cells
  var nameCell = row.cells[0];
  var ageCell = row.cells[1];
  // Get the new name and age values from the user
  var newName = prompt("Enter a new name:", nameCell.innerHTML);
  var newAge = prompt("Enter a new age:", ageCell.innerHTML);
  // Update the cells with the new values
  nameCell.innerHTML = newName;
  ageCell.innerHTML = newAge;
}

function deleteRow(button) {
  // Get the table row
  var row = button.parentNode.parentNode;
  // Remove the row from the table
  row.parentNode.removeChild(row);
}
       </script> 
<script>
// Get the filter and button elements
const filterSelect = document.getElementById("data-filter");
const filterBtn = document.getElementById("filter-btn");
const filterLabel = document.querySelector('label[for="data-filter"]');

// Add click event listener to the button
filterBtn.addEventListener("click", function() {
  // Get the selected option text
  const selectedText = filterSelect.options[filterSelect.selectedIndex].text;
  // Set the label text to the selected option text
  filterLabel.textContent = `Filter data: ${selectedText}`;

   
</script>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.eKhonnector.co.za/" target="_blank">eKhonnector</a>. All rights reserved.</span>
           
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
  <script src="../../js/data-table.js"></script>
  <!-- End custom js for this page-->
        
 <script>
  document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form from submitting normally
    
    var searchTerm = document.getElementById("search-term").value;
    
    // Use AJAX to make a request to the server and retrieve search results
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var searchResults = JSON.parse(xhr.responseText);
        displaySearchResults(searchResults);
      }
    };
    xhr.open("GET", "search.php?search-term=" + searchTerm, true);
    xhr.send();
  });
  
  function displaySearchResults(searchResults) {
    var tableBody = document.getElementById("search-results");
    tableBody.innerHTML = ""; // Clear previous search results
    
    // Loop through each result and add a new row to the table
 searchResults.forEach(function(result) {
  var row = document.createElement("tr");
  var Product_Code = document.createElement("td");
  Product_Code.textContent = result.Product_Code;
  var Group_name = document.createElement("td");
  Group_name.textContent = result.Group_name;
  var Policy_Name = document.createElement("td");
  Policy_Name.textContent = result.Policy_Name;
  var Type = document.createElement("td");
  Type.textContent = result.Type;
  var Amount = document.createElement("td");
  Amount.textContent = result.Amount;
  var Period = document.createElement("td");
  Period.textContent = result.Period;
  var Covered = document.createElement("td");
  Covered.textContent = result.Covered;
  var addMembers = document.createElement("td");
  addMembers.textContent = result.addMembers;
  var Description = document.createElement("td");
  Description.textContent = result.Description;
  var Cover_Amount = document.createElement("td");
  Cover_Amount.textContent = result.Cover_Amount;
  var Underwritten_By = document.createElement("td");
  Underwritten_By.textContent = result.Underwritten_By;
  var _By = document.createElement("td");
  _By.textContent = result._By;
  var _On = document.createElement("td");
  _On.textContent = result._On;
  
  row.appendChild(Product_Code);
  row.appendChild(Group_name);
  row.appendChild(Policy_Name);
  row.appendChild(Type);
  row.appendChild(Amount);
  row.appendChild(Period);
  row.appendChild(Covered);
  row.appendChild(addMembers);
  row.appendChild(Description);
  row.appendChild(Cover_Amount);
  row.appendChild(Underwritten_By);
  row.appendChild(_By);
  row.appendChild(_On);
  
  tableBody.appendChild(row);
   
const filterBtn = document.getElementById('filter-btn');
filterBtn.addEventListener('click', switchCard);

function switchCard() {
  const filterText = filter;
  
  if (filterText === 'option 1') {
    document.getElementById('card1').style.display = 'block';
    document.getElementById('card2').style.display = 'none';
  } else  if (filterText === 'option 2') {
    document.getElementById('card1').style.display = 'none';
    document.getElementById('card2').style.display = 'block';
  }
}

   
});
  }
</script>
   
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:41 GMT -->
</html>


