<!DOCTYPE html>
<html lang="en">


<head>
  

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Funeral demo | new client</title>
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
  <style>
    .re{
      color: red;
    }
  </style>
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
        </ul>
      </nav>
      <!-- Side Menu Ends -->
	  
	  

<div class="main-panel">        
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        New Client Registration
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          
        </ol>
      </nav>
    </div>
	
    <!-- Policy-->
    <form class="forms-sample" method="post">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Policy Details</h4>
            <p class="card-description">
              Fill In The Details Below
            </p>
            <div class="form-group">
              <label for="period">Period<a style="color: red; font-size: large;">*</a></label>
              <select class="form-control" id="n_month" name="n_month" required>
                <option value="">-Select Month-</option>
              </select>
              <select class="form-control" id="n_year" name="n_year" required>
                <option value="">-Select Year-</option>
                <option value="2023">2023</option>
              </select>
            </div>

            <div class="form-group">
              <label for="cat">Business Name<a style="color: red; font-size: large;">*</a></label>
              <select class="form-control" id="cat" name="cat">
                <option value="">-Select Business-</option>
                <?php foreach ($result11 as $rows) { ?>
                  <option><?php echo $rows['group_name'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="Category">Category<a style="color: red; font-size: large;">*</a></label>
              <select class="form-control" id="Category" name="Category">
                <option value="">-Select Category-</option>
                <?php foreach ($result19 as $rows) { ?>
                  <option><?php echo $rows['categoryName'] ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
              <label for="product">Product<a style="color: red; font-size: large;">*</a></label>
              <select class="form-control" id="product" name="product">
                <option value="">-Select Product-</option>
                <?php foreach ($result1 as $rows) { ?>
                  <option><?php echo $rows['Policy_Name'] ?></option>
                <?php } ?>
              </select>
            </div>
                    
            <div class="form-group">
              <label for="Premium">Premium<a style="color: red; font-size: large;">*</a></label>
              <input type="text" class="form-control" id="Premium" name="Premium" placeholder="Premium amount will display here" required>
            </div>

            <input type="hidden" id="policy_no" name="policy_no">

            <div class="form-group-group">
              <label for="policy_opt">Policy number option<a style="color: red; font-size: large;">*</a></label>
              <select class="form-control" id="policy_opt" name="policy_opt" required>
                <option disabled selected value="">-Select option-</option>
                <option value="Automatic">Automatic</option>
                <option value="Manually">Manually</option>
              </select>
            </div><br>

            <input type="hidden" id="sms_status" name="sms_status"/>

            <div class="form-group">
              <label for="policy_no1">Policy Number<a style="color: red; font-size: large;">*</a></label>
              <input type="text" class="form-control" id="policy_no1" name="policy_no1" placeholder="Enter policy number" required>
            </div>

            <div class="form-group">
              <label for="ac_dae">Policy Activation date<a style="color: red; font-size: large;">*</a></label>
              <input type="text" class="form-control" id="ac_dae" name="ac_dae" value="<?php echo $newDate; ?>" placeholder="Policy Activation date will display here(today + 6months)" disabled required>
            </div>

            <input type="hidden" id="admin" name="admin" value="<?= htmlspecialchars($u["names"]) ?>"/>

            <div class="form-group">
              <label for="product_add_ben">Product Additional Benefits</label>
              <select class="form-control" id="combobox1" name="combobox1" onchange="handleChange(1)">
                <option value="">-Select members-</option>
                <option value="1">01</option>
                <option value="2">02</option>
              </select>
            </div>

            <div class="form-group">
              <label for="Dep_covered">Dependent Covered</label>
              <select class="form-control" id="combobox2" name="combobox2" onchange="handleChange(2)">
                <option value="">-Select members-</option>
                <option value="1">01</option>
                <option value="2">02</option>
              </select>
            </div>

            <div class="form-group">
              <label for="ext_members">Extended Members</label>
              <select class="form-control" id="combobox3" name="combobox3" onchange="handleChange(3)">
                <option value="">-Select members-</option>
                <option value="1">01</option>
                <option value="2">02</option>
              </select>
            </div>

            <div class="form-group">
              <label for="Preferred_Payment_Date">Preferred Payment Day<a style="color: red; font-size: large;">*</a></label>
              <select class="form-control" id="Preferred_Payment_Date" name="Preferred_Payment_Date" placeholder="01-01-2021" required>
                <option value="">-Select day-</option>
                <option>01-05</option>
                <option>06-10</option>
                <option>11-15</option>
                <option>16-20</option>
                <option>21-25</option>
                <option>26-31</option>
              </select>
            </div>
            </div>
          </div>
        </div>
			
			<!-- Main Member -->
			
			          <div class="page-header">
            <h3 class="page-title">
             
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
               
                </ol>
            </nav>
          </div>


          <div class="col-12 grid-margin stretch-card">
            
              <div class="card">
               
                <div class="card-body">
                  <h4 class="card-title">Main Member Details</h4>
                  <p class="card-description">
                    Fill In The Details Below
                  </p>
                  
                    <div class="form-group">
                      <label for="names">Name(s)<a style="color: red; font-size: large;">*</a></label>
                      <input type="text" class="form-control" id="names"name ="names" placeholder="Enter name" required>
                    </div>
                    
                     <div class="form-group">
                      <label for="Surname">Surname<a style="color: red; font-size: large;">*</a></label>
                      <input type="text" class="form-control" id="Surname" name="Surname" placeholder="Enter Surname" required>
                    </div>
                    
                     <div class="form-group">
                      <label for="phone">Contact number<a style="color: red; font-size: large;">*</a></label>
                      <input type="number" class="form-control" id="phone"  name="phone" placeholder="Enter cellphone Number" required>
                    </div>
                   
                    <div class="form-group">
                      <label for="idno">ID/passport<a style="color: red; font-size: large;">*</a></label>
                      <input type="number" class="form-control" id="idno" name="idno" placeholder="Enter ID number" required>
                    </div>
   
                    <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Nationality<a style="color: red; font-size: large;">*</a></label>
                        
                          <select class="form-control" id="main_Nationality" name="main_Nationality" required>
                           
                            <option selected disabled value="">Select Nationality</option>
                            
                                <option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
                       
                          </select>
                        </div>
                    
                        <div class="form-group">
                      <label for="languages_">Langauge<a style="color: red; font-size: large;">*</a></label>
                      <select class="form-control" id="languages_" name="languages_" required>
    <option value="">-Select Language-</option>
    <option value="af">Afrikaans</option>

</select>
                    </div>

                        <div class="form-group">
                      <label for="gender">Gender<a style="color: red; font-size: large;">*</a></label>
                        <select class="form-control" id="gender" name="gender">
                          <option value="">-Select Gender-</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                     <div class="form-group">
                      <label for="Email">Email<a style="color: red; font-size: large;">*</a></label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                      <label for="res_address">Address<a style="color: red; font-size: large;">*</a></label>
                      <textarea class="form-control" id="res_address" name= "res_address"placeholder="Enter Address" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="combobox4">Marital Status<a style="color: red; font-size: large;">*</a></label>
                        <select class="form-control" id="combobox4" name="combobox4" required>
                          <option value="">-Select Status-</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Partner">Partner</option>
                          <option value="Divorced">Divorced</option>
                        </select>
                      </div>
					   <div class="form-group">
                      <label for="status">Client Status</label>
                        <select class="form-control" id="status" name= "status">
                        <option value="">-Select Status-</option>
								<option value="Active">Active</option>
                                <option value="Suspended">Suspended</option>
                                <option value="Lapsed">Lapsed</option>
                                  
                       </select>
                    </div>
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Enable SMS</label></br>
                          <div class="col-sm-4"></br>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sms_statuss" id="sms_status1" value="Enabled" checked>
                                Enabled
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5"></br>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sms_statuss" id="sms_status2" value="disabled">
                                Disabled
                              </label>
                            </div>
                          </div>
                        </div>

            <div class="form-group">
              <label for="inc_date">Inception Date<a style="color: red; font-size: large;">*</a></label>
              <input type="date" class="form-control" value="" id="inc_date" name="inc_date" placeholder="Inception Date" required>
            </div>

            <p class="card-description">
              NB: All fields with a <a style="color: red; font-size: large;">*</a> are required.
            </p>

            <div class="form-group" style="display: none">
              <input type="text" id="act_date" name="act_date" value="<?= htmlspecialchars($newDate) ?>">
            </div>
            
           <!-- SPOUSE -->
<div id="card4" class="card" style="display: none;">
  <div class="page-header">
    <h3 class="page-title">
    </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
      </ol>
    </nav>
  </div>

  <div class="col-12 grid-margin stretch-card" id="spouse" name="spouse" style="display: none;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Spouse Details</h4>
        <p class="card-description">
          Fill In The Details Below
        </p>
        <!-- <form class="forms-sample" method="post" action="n4.php"> -->
        <div class="form-group">
          <label for="Name">Name<a style="color: red; font-size: large;">*</a></label>
          <input type="text" class="form-control" id="Sp_Name" name="Sp_Name" placeholder="Enter name">
        </div>

        <div class="form-group">
          <label for="Surname">Surname<a style="color: red; font-size: large;">*</a></label>
          <input type="text" class="form-control" id="Sp_Surname" name="Sp_Surname" placeholder="Enter Surname">
        </div>

        <div class="form-group">
          <label for="ContactNo">Contact number<a style="color: red; font-size: large;">*</a></label>
          <input type="number" class="form-control" id="Sp_ContactNo" name="Sp_ContactNo" placeholder="Enter cellphone Number">
        </div>

        <div class="form-group">
          <label for="idNumber">ID/passport<a style="color: red; font-size: large;">*</a></label>
          <input type="number" class="form-control" id="Sp_idNumber" name="Sp_idNumber" placeholder="Enter ID number">
        </div>

        <div class="form-group">
          <label for="Gender">Gender<a style="color: red; font-size: large;">*</a></label>
          <select class="form-control" id="Sp_Gender" name="Sp_Gender">
            <option selected disabled value="">-Select gender-</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>

        <div class="form-group">
          <label for="date">inception date<a style="color: red; font-size: large;">*</a></label>
          <input type="date" class="form-control" id="Sp_date" name="Sp_date">
        </div>

        <p class="card-description">
          NB: All fields with a <a style="color: red; font-size: large;">*</a> are required.
        </p>
      </div>
    </div>
  </div>
</div>

<!-- ADDITIONAL MEMBER -->
<div id="card1" class="col-12 grid-margin stretch-card" class="card" style="display: none;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Dependent Member</h4>
        <p class="card-description">
          Fill In The Details Below
        </p>
        <h4 style="font-weight: bolder; text-align: end; color: grey;" id="display_1" name="display_1"></h4>
        <!-- <form class="forms-sample" method="post" action="n3.php"> -->
        <div class="form-group">
          <label for="Name">Name<a style="color: red; font-size: large;">*</a></label>
          <input type="text" class="form-control" id="de_Name" name="de_Name" placeholder="Enter name">
        </div>

        <div class="form-group">
          <label for="Surname">Surname<a style="color: red; font-size: large;">*</a></label>
          <input type="text" class="form-control" id="de_Surname" name="de_Surname" placeholder="Enter Surname">
        </div>

        <div class="form-group">
          <label for="ContactNo">Contact number<a style="color: red; font-size: large;">*</a></label>
          <input type="number" class="form-control" id="de_ContactNo" name="de_ContactNo" placeholder="Enter cellphone Number">
        </div>

        <div class="form-group">
          <label for="idNumber">ID/passport<a style="color: red; font-size: large;">*</a></label>
          <input type="number" class="form-control" id="de_idNumber" name="de_idNumber" placeholder="Enter ID number">
        </div>

        <div class="form-group">
          <label class="col-sm-3 col-form-label">Relationship to main member<a style="color: red; font-size: large;">*</a></label>
          <select class="form-control" id="deRelationship" name="deRelationship">
            <option selected disabled value="">-Select relationship-</option>
            <option value="Father">Father</option>
            <option value="Mother">Mother</option>
          </select>
        </div>

        <div class="form-group">
          <label class="col-sm-3 col-form-label">Nationality<a style="color: red; font-size: large;">*</a></label>
          <select class="form-control" id="de_Nationality" name="de_Nationality">
            <option selected disabled value="">-Select Nationality-</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Albania">Albania</option>
          </select>
        </div>

        <div class="form-group">
          <label for="Gender">Gender<a style="color: red; font-size: large;">*</a></label>
          <select class="form-control" id="de_Gender" name="de_Gender">
            <option selected disabled value="">-Select gender-</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>

        <p class="card-description">
          NB: All fields with a <a style="color: red; font-size: large;">*</a> are required.
        </p>

        <button type="button" id="de_btn" name="de_btn" class="btn btn-primary mr-2">Add member</button>
        <button type="button" onclick="clear_de()" class="btn btn-light">Clear member</button>
      </div>
    </div>
  </div>
</div>


<!-- EXTENDED MEMBER -->
<div class="col-12 grid-margin stretch-card" id="card2" class="card" style="display: none;">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Extended Members</h4>
        <p class="card-description">
          Fill In The Details Below
        </p>
        <div id="ad_member_ad" name="ad_member_ad"></div>
        <h4 style="font-weight: bolder; text-align: end; color: grey;" id="display_2" name="display_"></h4>
        <div class="forms-sample" id="ex_form" name="ex_form">
          <div class="form-group">
            <label for="Name">Name<a style="color: red; font-size: large;">*</a></label>
            <input type="text" class="form-control" id="Ex_Name" name="Ex_Name" placeholder="Enter name">
          </div>

          <div class="form-group">
            <label for="Surname">Surname<a style="color: red; font-size: large;">*</a></label>
            <input type="text" class="form-control" id="Ex_Surname" name="Ex_Surname" placeholder="Enter Surname">
          </div>

          <div class="form-group">
            <label for="ContactNo">Contact number<a style="color: red; font-size: large;">*</a></label>
            <input type="number" class="form-control" id="Ex_ContactNo" name="Ex_ContactNo" placeholder="Enter cellphone Number">
          </div>

          <div class="form-group">
            <label for="idNumber">ID/passport<a style="color: red; font-size: large;">*</a></label>
            <input type="number" class="form-control" id="Ex_idNumber" name="Ex_idNumber" placeholder="Enter ID number">
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-form-label">Relationship to main member<a style="color: red; font-size: large;">*</a></label>
            <select class="form-control" id="Ex_Relationship" name="Ex_Relationship">
              <option selected disabled value="">Select relationship</option>
              <option value="Father">Father</option>
            </select>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-form-label">Nationality<a style="color: red; font-size: large;">*</a></label>
            <select class="form-control" id="Ex_Nationality" name="Ex_Nationality">
              <option selected disabled value="">Select Nationality</option>
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Gender">Gender<a style="color: red; font-size: large;">*</a></label>
            <select class="form-control" id="Ex_Gender" name="Ex_Gender">
              <option selected disabled value="">-Select gender-</option>
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>

          <p class="card-description">
            NB: All fields with a <a style="color: red; font-size: large;">*</a> are required.
          </p>

          <button type="button" id="Ex_btn" name="Ex_btn" class="btn btn-primary mr-2">Add member</button>
          <button type="button" onclick="clear_ext()" class="btn btn-light">Clear member</button>
        </div>
      </div>
    </div>
  </div>

            </div>

            <!-- PRODUCTS -->
<div id="card3" class="card" style="display: none;">
  <style>
    .invisible-card {
      display: none;
    }
  </style>
    <div class="card-body">
      <h4 class="card-title">Product Additional Benefits</h4>
      <p class="card-description">
        Fill In The Details Below
      </p>
      <h4 style="font-weight: bolder; text-align: end; color: grey;" id="display_" name="display_"></h4>
      <div class="form-group">
        <label for="Name_of_Benefits">Name of Benefits<a style="color: red; font-size: large;">*</a></label>
        <input type="text" class="form-control" id="Name_of_Benefits" name="Name_of_Benefits" placeholder="Enter">
      </div>
      <div class="form-group">
        <label for="Product_Additonal_Benefits">Product Description<a style="color: red; font-size: large;">*</a></label>
        <textarea class="form-control" id="Product_Additonal_Benefits" name="Product_Additonal_Benefits" rows="8"></textarea>
      </div>
      <p class="card-description">
        NB: All fields with a <a style="color: red; font-size: large;">*</a> are required.
      </p>
      <button type="button" id="Benefits_btn" name="Benefits_btn" class="btn btn-primary mr-2">Add Product</button>
      <button type="button" onclick="clear_pro()" class="btn btn-light">Clear Product</button>
    </div>
  </div>
  </div>
<button type="button" id="submit_c" name="submit_c" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" onclick="clear_client()" class="btn btn-light">Clear All</button>
                    <button type="button" onclick="document.location='AssetTable.php'"  class="btn btn-light">View Records</button>
                </div>


<script>
  function handleChange() {
    var selectedValue = document.getElementById("policy_opt").value;
    var policyNumberInput = document.getElementById("policy_no1");

    if (selectedValue === "Automatic") {
      // Make an AJAX request to the server to generate a unique auto-incremental policy number
      generatePolicyNumber();
      // Disable the policy number input
      policyNumberInput.disabled = true;
    } else {
      // Enable the policy number input
      policyNumberInput.disabled = false;
    }
  }

  function generatePolicyNumber() {
    // Make an AJAX request to the server to generate a unique policy number
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "generate_policy_number.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = xhr.responseText;

        // Display the generated policy number
        document.getElementById("policy_no1").value = response;
      }
    };

    xhr.send();
  }
</script>



<script>
  function handleChange(comboboxNumber) {
    var comboboxId = "combobox" + comboboxNumber;
    var selectedValue = parseInt(document.getElementById(comboboxId).value);

    if (selectedValue > 0) {
      var cardId = "card" + comboboxNumber;
      document.getElementById(cardId).style.display = "block";
    } else {
      var cardId = "card" + comboboxNumber;
      document.getElementById(cardId).style.display = "none";
    }
  }
</script>



	  