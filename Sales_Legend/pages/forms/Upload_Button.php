<?php

// Start the session
session_start();

// Check if the session has expired
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // Session has expired - destroy the session and redirect the user to the login page
    session_unset();
    session_destroy();
    header("Location: https://www.mandhagri.co.za/21/pages/samples/login-2.php");
    exit;
}

// Update the LAST_ACTIVITY timestamp
$_SESSION['LAST_ACTIVITY'] = time();



?>

<?php
include_once('connection.php');
$query = "SELECT * FROM clients";
$result = mysqli_query($connection,$query); // assuming $connection is the established mysqli connection
json_encode($result);

include_once('connection.php');
$sql = "SELECT COUNT(*) AS count FROM clients";
$result2 = mysqli_query($connection, $sql);

// Get count from query result
$count = mysqli_fetch_assoc($result2)['count'];

/////
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Funeral Demo | Upload_Button</title>
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
                <li class="nav-item"><a class="nav-link" href="AssetTable.php">Premuim Records</a></li>
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
                 <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Cash Book Records</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="Company_Staff.php">New Staff Member</a></li>
                <li class="nav-item"> <a class="nav-link" href="../icons/font-awesome.html">Employee Profile</a></li>
                <li class="nav-item"> <a class="nav-link" href="AssetTable.php">Staff Records</a></li>
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
            <a class="nav-link" data-toggle="collapse" href="#Recordscharts" aria-expanded="false" aria-controls="charts">
              <i class="fas fa-chart-pie menu-icon"></i>
              <span class="menu-title">Records</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Recordscharts">
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
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Admin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="branch.php">Branch Details</a></li>
                <li class="nav-item"> <a class="nav-link" href="Payrol_admin">Payroll Administration</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="payrol_settings.php">Payroll Settings</a></li>
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
      <!-- Side Menu Ends --> 
      
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
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <p class="card-description">
                   
                  </p>
 
                 
                    
               			
                     <div class="form-group ">
                      <label for="Clients_PolicyNumber"><B>Clients Policy Number</B></label>
                      <select id="SelectPolicy" class="form-control" name = "Policy" onchange="SelectPolicy()">
                           <?php 
                                while ($row = mysqli_fetch_assoc($result)) { 
                              ?>
                                  <option value="<?php echo $row['Policy'] ?>"> <?php echo $row['Policy'] ?>  </option>
                        
                              <?php
                                }
                              ?>
                             
							</select>
                          </div>  
                    <!-- 
                         <div class="row">
                           
                                <div class="col-md-8">
                                    <input type="text" name="id" class="form-control"placeholder="by id from database eg 7">
                                </div>
                    
                                <div class="col-md-4">
                                    <button type="submit" id='get' name = "search" value = "search Data" class="btn btn-primary">Search</button>
                                </div>
                     </div>
                         
                           
                    <div class="form-group">
                      <label for="Name"><B>Name of Client</B></label>
                      <input type="text" class="form-control" id="Name_and_Surname" name="Name_and_Surname"  placeholder="Jeremiah Zulu">
                    </div>
                    
                    <div class = "form-group">
                      <label for="gender"><B>Gender</B></label>
							<select id="gender"  class="form-control" name="gender">
 							 <option value="">Select Gender</option>
  								<option value="male">Male</option>
 								 <option value="female">Female</option>
									</select>
                      </div>
                    
                    
                    <div class="form-group">
                      <label for="ID/Passport"><B>SA ID/Passport</B></label>
                      <input type="text" class="form-control" id="ID" name="ID" placeholder="9608135432089" >
                    </div>
                    
                    <div class="form-group">
                      <label for="Cellphone"><B> Cellphone</B></label>
                      <input type="text" class="form-control" id="Cellphone" name="Cellphone" placeholder="071 234 5678" >
                    </div>
                    
                    <div class="form-group">
                      <label for="Underwritten"><B>Underwritten</B></label>
                      <input type="text" class="form-control" id="Underwriten" name="Underwritten" placeholder="Avbob">
                    </div>
                    
                    <div class="form-group">
                      <label for="Product_Plan"><B>Product Plan</B></label>
                      <input type="text" class="form-control" id="Product_Plan" name="Product_Plan" placeholder="Gold">
                      
                    </div>
                    
                    <div class="form-group">
                      <label for="Resindential Area"><B>Resindential Area</B></label>
                      <input type="text" class="form-control" id="Resindential_Area" name="Resindential_Area" placeholder="Stonehange">
                    </div>
                    
                    <div class = "form-group">
                    <label for="marital-status"><B>Marital Status</B></label>
							<select id="marital-status" class="form-control" name="marital-status">
  							<option value="single">Single</option>
  							<option value="married">Married</option>
  							<option value="widowed">Widowed</option>
 							 <option value="divorced">Divorced</option>
					</select>
                    </div>
                    
                    <div class="form-group">
                  		  <label for="start-date"><B>Inception Date</B></label>
						<input type="date"   class="form-control" id="start-date" name="start-date">
                    </div>
                   
                    
                    
                     
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><B>Spouse Details</B></h4>
                  <p class="card-description">
                    Fill In The Details Below
                  </p>
                  <form class="forms-sample" method="post" action="n4.php">
                    <div class="form-group">
                      <label for="Name"><B>Name</B></label>
                      <input type="text" class="form-control" id="Sp_Name" name="Sp_Name" placeholder="Enter name">
                    </div>
                    
                     <div class="form-group">
                       <label for="Surname"><B>Surname</B></label>
                      <input type="text" class="form-control" id="Sp_Surname" name="Sp_Surname" placeholder="Enter Surname">
                    </div>
                    
                     <div class="form-group">
                       <label for="ContactNo"><B>Contact number</B></label>
                      <input type="Numbers" class="form-control" id="Sp_ContactNo" name="Sp_ContactNo" placeholder="Enter cellphone Number">
                    </div>
                   
                    <div class="form-group">
                      <label for="idNumber"><B>ID/passport</B></label>
                      <input type="text" class="form-control" id="Sp_idNumber" name="Sp_idNumber" placeholder="Enter ID number">
                    </div>
                   
                     <div class="form-group">
                       <label for="Gender"><B>Gender</B></label>
                        <select class="form-control" id="Sp_Gender" name="Sp_Gender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                       <br>
                     <div class="form-group">
                       <label for="date"><B>Inception date</B></label>
                      <input type="date" class="form-control" id="Sp_date" name="Sp_date">
                    </div>
                    
                   
                      </div>
                          -->
                          
                  
                     <br><br>
 					 <button type= "print" class="btn btn-light" onclick="window.print()">Print</button>
                     <button  class="btn btn-light" onclick="window.history.back()">Back</button>
                
                  </form>
                  <div id='result'></div>
                       
                <?php
                    
                    $connection = mysqli_connect("localhost","ekhonnec_JeudfraBS","JeudfraBS33@");
				$db= mysqli_select_db($connection,"ekhonnec_JeudfraBS"); 
                  
                  if (isset($_POST['search']))
                  {
                    $id = $_POST['id'];
                    $query = "SELECT * FROM clients WHERE id='$id' ";   

					 $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_array($query_run))
                    {
                    ?>
                  		<form id="now" action="" method="POST">
                         
                           
                          <input type="hidden"  class="form-control"name="id" value= "<?php echo $row['id']?>">
                          
                             
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Name</B></label>
                          <input type="text"  class="form-control"  name="Customer" value= "<?php echo $row['Customer']?>">
                             </div>
                          
                           
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>ID</B></label>
                          <input type="text"   class="form-control" name="_ID" value= "<?php echo $row['_ID']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Number</B></label>
                          <input type="text"  class="form-control" name="Number" value= "<?php echo $row['Number']?>">
                          </div>
                              
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Gender</B></label>
                          <input type="text"  class="form-control" name="Gender" value= "<?php echo $row['Gender']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Nationality</B></label>
                          <input type="text"  class="form-control" name="Nationality" value= "<?php echo $row['Nationality']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Package</B></label>
                          <input type="text"  class="form-control"name="Package" value= "<?php echo $row['Package']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Premium Cover Amount</B></label>
                          <input type="text" class="form-control" name="PremiumCoverAmount" value= "<?php echo $row['PremiumCoverAmount']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>PolicyNumber</B></label>
                          <input type="text"  class="form-control"name="Policy" value= "<?php echo $row['Policy']?>">
                          </div>
                              
                                <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Status</B></label>
                          <input type="text"  class="form-control" name="status" value= "<?php echo $row['status']?>">
                          </div> 
                                  
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Cover</B></label>
                          <input type="text"  class="form-control" name="Covered" value= "<?php echo $row['Covered']?>">
                          </div>
                              
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Group Name</B></label>
                          <input type="text"  class="form-control"name="Group_Name" value= "<?php echo $row['Group_Name']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Email</B></label>
                          <input type="text"  class="form-control"name="email" value= "<?php echo $row['email']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Address</B></label>
                          <input type="text" class="form-control" name="Address" value= "<?php echo $row['Address']?>">
                          </div>
                              
                                <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Product Added Benefit</B></label>
                          <input type="text"  class="form-control"name="Product_Added_Benefit" value= "<?php echo $row['Product_Added_Benefit']?>">
                          </div>     
                                 
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Marital Status</B></label>
                          <input type="text"  class="form-control"name="Marital_Status" value= "<?php echo $row['Marital_Status']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Inception Date</B></label>
                          <input type="text" class="form-control" name="Inception_date" value= "<?php echo $row['Inception_date']?>">
                          </div>
                              
                                <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Payment Date</B></label>
                          <input type="text" class="form-control" name="Payment_Date" value= "<?php echo $row['Payment_Date']?>">
                          </div>
                          
                                 <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Period</B></label>   
                          <input type="text" class="form-control" name="Period" value= "<?php echo $row['Period']?>">
                          </div>
                                
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Spouse Surname</B></label>
                          <input type="text"  class="form-control"name="spouse_Surname" value= "<?php echo $row['spouse_Surname']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Spouse Name</B></label>
                          <input type="text" class="form-control" name="spouse_Name" value= "<?php echo $row['spouse_Name']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Spouse ID</B></label>
                          <input type="text"  class="form-control"name="spouse_ID" value= "<?php echo $row['spouse_ID']?>">
                          </div>
                          
                                <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>Spouse Number</B></label>
                          <input type="text" class="form-control" name="spouse_Number" value= "<?php echo $row['spouse_Number']?>">
                            </div>     
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>By</B></label>
                          <input type="text"  class="form-control"name="_By" value= "<?php echo $row['_By']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Clients_PolicyNumber"><B>On</B></label>
                          <input type="text"  class="form-control"name="_On" value= "<?php echo $row['_On']?>">
                          </div>
                         <br><br>
                          <input type="submit"  class="btn btn-light" bame="update" value="UPDATE DATA">
                           </form>
                  <?php
                      
                    }
                  }
                    
                    
                  ?>
                  
                          
                  
                </div>
              
            
            
              
            </div>
              </div>
            </div>
                    <div class="row grid-margin">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div></div> 
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
  </div> 
</body>

  
<!-- Mirrored from www.urbanui.com/melody/template/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:07:34 GMT -->
<script>


</script>
    
</html>

<?php
/*
    $connection = mysqli_connect("localhost","ekhonnec_JeudfraBS","JeudfraBS33@");
				$db= mysqli_select_db($connection,"ekhonnec_JeudfraBS"); 
  
  if(isset($_POST['update']))
  {
  $Customer = $_POST['Customer'];
 $ID = $_POST['_ID'] ;
  $Number= $_POST['Number'];
  $Gender= $_POST['Gender'];
  $Nationality=$_POST['Nationality'];
  $Package= $_POST['Package']?? '';
  $PremiumCoverAmount = $_POST['PremiumCoverAmount'];
  $Policy= $_POST['Policy'];
  $status = $_POST['status'];
  $Covered = $_POST['Covered'];
  $Group_Name= $_POST['Group_Name'];
  $email = $_POST['email'];
  $Address = $_POST['Address'];
  $Product_Added_Benefit = $_POST['Product_Added_Benefit'];
  $Marital_Status = $_POST['Marital_Status'];
  $Inception_date = $_POST['Inception_date'];
  $Payment_Date =$_POST['Payment_Date'];
  $Period = $_POST['Period'];
  $spouse_Surname =$_POST['spouse_Surname'];
  $spouse_Name = $_POST['spouse_Name'];
  $spouse_ID = $_POST['spouse_ID'];
  $spouse_Number= $_POST['spouse_Number'];
  $_By = $_POST['_By'];
  $_On =$_POST['_On'];
  }

  
 //$query = "UPDATE clients SET Customer='$_POST[Customer]',_ID='$_POST[_ID]',Number='$_POST[Number]',Gender='$_POST[Gender]',Nationality='$_POST[Nationality]',Package='$_POST[Package]',PremiumCoverAmount='$_POST[PremiumCoverAmount]', Policy='$_POST[Policy]',status='$_POST[status]', Covered='$_POST[Covered]', Group_Name='$_POST[Group_Name]', email='$_POST[email]', Address='$_POST[Address]',Product_Added_Benefit='$_POST[Product_Added_Benefit]',Marital_Status='$_POST[Marital_Status]',Inception_date='$_POST[Inception_date]',Payment_Date='$_POST[Payment_Date]', Period='$_POST[Period]', spouse_Surname='$_POST[spouse_Surname]',spouse_Name='$_POST[spouse_Name]',spouse_ID='$_POST[spouse_ID]',spouse_Number='$_POST[spouse_Number]',_By='$_POST[_By]', _On='$_POST[_On]' WHERE id='$_POST[id]'";	
 $query_run= mysqli_query($connection,$query);
  
    if($query_run)
    {
      //echo'<script>alert(" DATA UPDATED")</script>';
    }
    else
    {
    	 echo'<script>alert(" DATA NOT UPDATED")</script>';
    }

  
  
  */?>
   <script>
    
     
     function SelectPolicy(){
     
       
    
       $.ajax({
        type: 'POST',
        url: 'bringdata.php',
        data: { bringdata: $('#SelectPolicy').val() },
        success: function(data)
        {
            $('#result').html(data);
        }
    });
     }
     
     $('#get').click(function() {
    $.ajax({
        type: 'POST',
        url: 'bringdata.php',
        data: { bringdata: $('#SelectPolicy').val() },
        success: function(data)
        {
            $('#result').html(data);
        }
    });
});
     
     
     
     </script>