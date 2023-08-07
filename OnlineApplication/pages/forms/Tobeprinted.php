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

//retrieving policy number from new clients

$myValue = $_COOKIE['value'];

session_start();
$myValue = $_SESSION['value'];
echo $myValue; // Output: Hello, World!





    


// Query 1 - get all policies
$sql1 = "SELECT * FROM policies";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);


// Query 2 - get policy count
$sql2 = "SELECT COUNT(*) AS count FROM policies";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$count = $result2['count'];

// Query 3 - get clients with policy MOE0011
$sql3 = "SELECT * FROM new_clients WHERE policy_no = ?";
$stmt3 = $connection->prepare($sql3);
$stmt3->execute([$myValue]);
$result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$polName = "";
$groName = "";
foreach ($result3 as $rows) {
    //$polName = $rows['Package'];
    $groName = $rows['Group_Name'];
}

// Query 4 - get spouse details for policy MOE0011
$sql4 = "SELECT * FROM spousedetails WHERE spousePolicy = ?";
$stmt4 = $connection->prepare($sql4);
$stmt4->execute([$myValue]);
$result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

// Query 5 - get additional benefits for policy MOE0011
$sql5 = "SELECT * FROM members_additional_benefits WHERE Policy_Number = ?";
$stmt5 = $connection->prepare($sql5);
$stmt5->execute([$myValue]);
$result5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

// Query 6 - get beneficiaries for policy MOE0011
$sql6 = "SELECT * FROM beneficiaries WHERE Policy_number = ?";
$stmt6 = $connection->prepare($sql6);
$stmt6->execute([$myValue]);
$result6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);

// Query 7 - get additional members for policy MOE0011
$sql7 = "SELECT * FROM additional_members WHERE Policy_Number = ?";
$stmt7 = $connection->prepare($sql7);
$stmt7->execute([$myValue]);
$result7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);

// Query 8 - get policy by policy name and group name
$sql8 = "SELECT * FROM policies WHERE Policy_Name = ? AND Group_name = ?";
$stmt8 = $connection->prepare($sql8);
$stmt8->execute([$polName, $groName]);
$result8 = $stmt8->fetchAll(PDO::FETCH_ASSOC);

// Query 9 - get all branch details
$sql9 = "SELECT * FROM branch_details";
$stmt9 = $connection->prepare($sql9);
$stmt9->execute();
$result9 = $stmt9->fetchAll(PDO::FETCH_ASSOC);

// Query 10 - get all branch details (duplicate)
$sql10= "SELECT * FROM branch_details";
$stmt10 = $connection->prepare($sql10);
$stmt10->execute();
$result10 = $stmt10->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Vakhandli Group | Tobeprinted</title>
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
     
<div class="content-wrapper" style="background-image: url(images/display.jpeg); background-size: cover; overflow-x: auto;">        
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body" id="print-card-body">
        <div class="row">
          <div class="d-flex flex-row align-items-start justify-content-between w-100">
            <div>
            <img src="../../images/faces/face11.html" class="img-lg rounded mr-3" alt="profile image" style="width: 200px !important; height: 200px !important;"/>
          </div>
          <div>
            <label style="display: block; font-size: 2em;">Policy Certificate</label>
            <div>
              <label style="display: inline-block;">Date: </label>
              <label style="display: inline-block;"> <?php echo date("m/d/Y H:i:s"); ?></label>
            </div>
            <hr>
            <ul class="ml-auto" style="white-space: nowrap;">
                <?php foreach ($result10 as $rows): ?>
    <li><?= htmlspecialchars($rows['Business_Name']) ?></li>
    <li><?= htmlspecialchars($rows['Address']) ?></li>
    <li><?= htmlspecialchars($rows['Contact_Number']) ?></li>
    <li><?= htmlspecialchars($rows['Email']) ?></li>
<?php endforeach; ?>
            </ul>
          </div>
        </div>
        <h4 class="card-title">PRODUCT CERTIFICATE</h4>
      </div>
      <!-- MAIN MEMBER -->
     <div class="table-responsive">
      <table style="width: 100%;">
        <tr>
          <td style="width: 100%;">
            <p class="text-light bg-dark pl-1" style="font-size: 20px;">MAIN MEMBER</p>
          </td>
        </tr>
        <tr>
          <td style="width: 50%;">
            <table style="width: 100%;">
              <thead>
                <tr>
                  <th style="border: 1px solid black;">NAME</th>
                  <th style="border: 1px solid black;">ID NUMBER</th>
                  <th style="border: 1px solid black;">CELLPHONE NUMBER</th>
                </tr>
              </thead>
              <tbody>
                <!-- Main member information goes here -->
                <?php
                                          
                                         foreach ($result3 as $rows) { 
?>
    <tr>
      <td style="border: 1px solid black;"><?php echo $rows['Customer_names']?></td>
      <td style="border: 1px solid black;"><?php echo $rows['ID_no']?></td>
      <td style="border: 1px solid black;"><?php echo $rows['phone']?></td>
    </tr>
<?php
  }
?>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
       <br><br> 
       <!--Spouse -->
             <table style="width: 100%;">
                     <tr>
                       <td style="width: 100%;">
                <p class="text-light bg-dark pl-1" style="font-size: 20px;">SPOUSE</p></td>
              </tr>  
              <tr>
                <td style="width: 50%;">
                  <table style="width: 100%;">
                    <thead>
                      <tr>
                        <th style="border: 1px solid black;">NAME</th>
                        <th style="border: 1px solid black;">SURNAME</th>	
                        <th style="border: 1px solid black;">ID NUMBER</th>	
                        <th style="border: 1px solid black;">CELLPHONE NUMBER</th>	
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                                     foreach ($result4 as $rows) {
?>
<tr>
    <td style="border: 1px solid black;"><?php echo $rows['spouse_Name'] ?></td>
    <td style="border: 1px solid black;"><?php echo $rows['spouse_Surname'] ?></td>
    <td style="border: 1px solid black;"><?php echo $rows['spouse_ID']?></td>
    <td style="border: 1px solid black;"><?php echo $rows['spouse_Number'] ?></td>
</tr>
<?php
}
?>
                    </tbody>
                  </table>
                </td>

              </tr>

            </table>
                   <br><br>   
      
      <!--Additional Benefits -->
<table style="width: 100%; border-collapse: collapse;">
         <tr>
    <td style="width: 100%;"><p class="text-light bg-dark pl-1" style="font-size: 20px;">ADDITIONAL BENEFITS</p></td>
  </tr>  
  <tr>
    <td style="width: 50%;">
      <table style="width: 100%;">
        <thead>
          <tr>
            <th style="border: 1px solid black;">BENEFIT NAME</th>
            <th style="border: 1px solid black;">ADDITIONAL AMOUNT</th>	
          </tr>
        </thead>

        <tbody>
          <!-- insert table rows for EXTENDED MEMBERS here -->
         <?php
foreach ($result5 as $rows) {
?>
    <tr>
        <td style="border: 1px solid black;"><?php echo $rows['benefit_name'] ?></td>
        <td style="border: 1px solid black;"><?php echo $rows['addAmount'] ?></td>
    </tr>
<?php
}
?>
          
        </tbody>
      </table>
    </td>
    
  </tr>
 
</table>
      
   <br><br>   
      
<table style="width: 100%;">
  <tr>
    <td style="width: 50%;">
      <p class="text-light bg-dark pl-1" style="font-size: 20px;">DEPENDENTS</p>
      <table style="width: 100%;">
        <thead>
          <tr>
            <th style="border: 1px solid black;">NAME</th>
            <th style="border: 1px solid black;">SURNAME</th>
            <th style="border: 1px solid black;">ID NUMBER</th>
            <th style="border: 1px solid black;">RELATIONSHIP</th>
          </tr>
        </thead>
        <tbody>
          <!-- insert table rows for EXTENDED MEMBERS here -->
          <?php
           
            foreach ($result6 as $rows) {
          ?>
            <tr>
              <td style="border: 1px solid black;"><?php echo $rows['Name']?></td>
              <td style="border: 1px solid black;"><?php echo $rows['surname']?></td>
              <td style="border: 1px solid black;"><?php echo $rows['_ID']?></td>
              <td style="border: 1px solid black;"><?php echo $rows['Relationship']?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </td>
    <td style="width: 50%;">
      <p class="text-light bg-dark pl-1" style="font-size: 20px;">EXTENDED MEMBERS</p>
      <table style="width: 100%;">
        <thead>
          <tr>
            <th style="border: 1px solid black;">NAME</th>
            <th style="border: 1px solid black;">SURNAME</th>
            <th style="border: 1px solid black;">ID NUMBER</th>
          </tr>
        </thead>
        <tbody>
          <!-- insert table rows for DEPENDENTS here -->
          <?php
             foreach ($result7 as $rows) {
          ?>
            <tr>
              <td style="border: 1px solid black;"><?php echo $rows['Name']?></td>
              <td style="border: 1px solid black;"><?php echo $rows['Surname']?></td>
              <td style="border: 1px solid black;"><?php echo $rows['_ID']?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </td>
  </tr>
</table>
      <!-- PRODUCT INFORMATION -->
      
   <br><br> 
<p class="text-light bg-dark pl-1" style="font-size: 1.2em;">PRODUCT INFORMATION</p>
<div style="display: flex;">
<div style="flex: 1; padding-right: 20px;">
  <?php
    foreach ($result8 as $rows) {
  ?>
  <label style="display: block;">Date: <?php echo date("m/d/Y"); ?></label>
  <label style="display: block;">Policy Group:  <?php echo $rows['Group_name']?></label>
  <label style="display: block;">Policy Name:  <?php echo $rows['Policy_Name']?></label>
  <label style="display: block;">Amount per Month:  R<?php echo $rows['Amount']?></label>
  <label style="display: block;">Cover Amount:  R<?php echo $rows['Cover_Amount']?></label>
  
 
</div>
  <br>
  <div style="flex: 1;">
    <label style="display: block;">Description:  <?php echo $rows['Description']?></label>
     <?php
    }
  ?>
  </div>
</div>
 
    
    </div>
  </div>
               	<button onclick="printCard()">Print Page</button>
	
	<script>
	   function printCard() {
        var printContents = document.getElementById("print-card-body").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      }
    </script>  
</div>
                 

  </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
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
      
      <script>
function handleChange(select) {
  var selectedOption = select.value;
  
  if (selectedOption === "textbox") {
    var textbox = document.createElement("input");
    textbox.setAttribute("type", "text");
    textbox.setAttribute("placeholder", "Enter text here");
    document.getElementById("textbox-container").appendChild(textbox);
  } else {
    // Clear any existing textboxes
    document.getElementById("textbox-container").innerHTML = "";
  }
}
</script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:07:34 GMT -->
</html>
