<?php
session_start();

if (!isset($_SESSION['visited']) || !$_SESSION['visited']) {
    $_SESSION['visited'] = true;
} else {
    // User has returned to the page, perform refresh or desired actions here
    header("Refresh: 180");
}

if (isset($_SESSION["id"])) {
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

    $sql = "SELECT * FROM accounts WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $_SESSION["id"]);
    $stmt->execute();
    $u = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retrieving policy number from new clients
    $sql1 = "SELECT * FROM policies";
    $stmt1 = $connection->prepare($sql1);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $sql19 = "SELECT * FROM categories";
    $stmt19 = $connection->prepare($sql19);
    $stmt19->execute();
    $result19 = $stmt19->fetchAll(PDO::FETCH_ASSOC);

    $sql11 = "SELECT DISTINCT group_name FROM groups";
    $stmt11 = $connection->prepare($sql11);
    $stmt11->execute();
    $result11 = $stmt11->fetchAll(PDO::FETCH_ASSOC);
} else {
    header("Location: ../samples/login-2.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">


<head>
  

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Jeudfra Burial Society | new client</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/Eyomusa.png" />
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
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="fab fa-wpforms menu-icon"></i>
              <span class="menu-title">Clients</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="newClient.php">New Clients</a></li>                
                <li class="nav-item"><a class="nav-link" href="Pending-Applications.php">Pending Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="Rejected-Applications.php">Rejected Applications</a></li>
                <li class="nav-item"><a class="nav-link" href="Approved-Applications.php">Approved Applications</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="incoming-documents.php">
              <i class="fa fa-paper-plane menu-icon"></i>
              <span class="menu-title">Documents</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="incoming-reports.php">
              <i class="fa fa-paper-plane menu-icon"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- Side Menu Ends -->
      

       <!-- partial -->
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
                           <option value="January">January</option>
                           <option value="February">February</option>
                           <option value="March">March</option>
                           <option value="April">April</option>
                           <option value="May">May</option>
                        <option value="July">June</option>
                           <option value="July">July</option>
                           <option value="August">August</option>
                           <option value="September">September</option>
                           <option value="October">October</option>
                           <option value="November">November</option>
                          <option value="December"> December</option>
                        </select>
                      <br>
                        <select class="form-control" id="n_year" name="n_year" required>
                           <option value="">-Select Year-</option>
                           <option value="2023">2023</option>
                           <option value="2022">2022</option>
                           <option value="2021">2021</option>
                           <option value="2020">2020</option>
                           <option value="2019">2019</option>
                          <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        </select>
                    </div>
                   <div class="form-group">
                        <label for="cat">Branch Name<a style="color: red; font-size: large;">*</a></label>
                        <select class="form-control" id="cat" name="cat" onchange="updateSelection()">
                            <option value="">-Select Branch-</option>
                            <?php 
                            foreach ($result11 as $rows) { 
                            ?>
                                <option><?php echo $rows['group_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="product">Product<a style="color: red; font-size: large;">*</a></label>
                        <select class="form-control" id="product" name="product" onchange="updateSelection()">
                            <option value="">-Select Product-</option>
                            <?php 
                            foreach ($result1 as $rows) { 
                            ?>
                                <option><?php echo $rows['Policy_Name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>


                    
                                              <div class="form-group">
                      <label for="Premium">Premium<a style="color: red; font-size: large;">*</a></label>
                     <input type="text" class="form-control" id="Premium" name="Premium" placeholder="Premium amount will display here" required disabled>
</div>

<script>
 const input1 = document.getElementById('cat');
const input2 = document.getElementById('product');
const output = document.getElementById('Premium');

input1.addEventListener('change', fetchProducts);
input2.addEventListener('change', updateOutput);

function fetchProducts() {
  const value1 = input1.value;

  $.ajax({
    type: 'POST',
    url: 'fetchProducts.php',
    data: { value1: value1 },
    success: function(response) {
      input2.innerHTML = response; // Populate the product select element
      input2.disabled = false; // Enable the product select element
      updateOutput(); // Call updateOutput to set the initial premium value
    },
    error: function() {
      console.log('Error retrieving values from the database');
    }
  });
}

function updateOutput() {
  const value1 = input1.value;
  const value2 = input2.value;

  $.ajax({
    type: 'POST',
    url: 'get_premium.php',
    data: { value1: value1, value2: value2 },
    success: function(response) {
      output.value = response;
      output.disabled = true;
    },
    error: function() {
      console.log('Error retrieving value from the database');
    }
  });
}

</script>
                  <div class="form-group">
                      <label for="Fee">Joining Fee<a style="color: red; font-size: large;">*</a></label>
                     <input type="text" class="form-control" id="Joining" name="Joining" placeholder="Enter the Joining Fee here" required>
</div>
                    <div class="form-group">
                      <label for="method">Payment Method<a style="color: red; font-size: large;">*</a></label>
                  <select class="form-control" name="payment_method" id="payment_method">
                  <option value="eft">Electronic Funds Transfer (EFT)</option>
                  <option value="credit_card">Credit Card</option>
                  <option value="debit_card">Debit Card</option>
                  <option value="cash">Cash</option>
                  <option value="mobile_payment">Mobile Payment (e.g., SnapScan, Zapper)</option>
                  <option value="bank_deposit">Bank Deposit</option>
                  <option value="cheque">Cheque</option>
                </select>
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
                      <label for="Premium">Activation Date<a style="color: red; font-size: large;">*</a></label>
                      <input type="text" class="form-control" id="act_date" name="act_date" placeholder="Activation Date will display here" required>
                    </div>
                    <input type="hidden" id="admin" name="admin" value=<?= htmlspecialchars($u["names"]) ?>/>
                     <div class="form-group">
                      <label for="product_add_ben">Product Additional Benefits</label>
                        <select class="form-control" id="product_add_ben" name= "product_add_ben">
                        <option value="">-Select members-</option>
                        <option value="1">01</option>
                                  <option value="2">02</option>
                                  <option value="3">03</option>
                                  <option value="4">04</option>
                                  <option value="5">05</option>
                                  <option value="6">06</option>
                                  <option value="7">07</option>
                                  <option value="8">08</option> 
                                  <option value="9">09</option>
                                  <option value="10">10</option>
                       </select>
                    </div>
                      <div class="form-group">
                      <label for="Dep_covered">Dependent Covered</label>
                        <select class="form-control" id="Dep_covered" name="Dep_covered">
                        <option value="">-Select members-</option>
                        <option value="1">01</option>
                                  <option value="2">02</option>
                                  <option value="3">03</option>
                                  <option value="4">04</option>
                                  <option value="5">05</option>
                                  <option value="6">06</option>
                                  <option value="7">07</option>
                                  <option value="8">08</option> 
                                  <option value="9">09</option>
                                  <option value="10">10</option>
                       </select>
                    </div>
                     <div class="form-group">
                      <label for="ext_members">Extended Members</label>
                        <select class="form-control" id="ext_members" name="ext_members">
                        <option value="">-Select members-</option>
                        <option value="1">01</option>
                                  <option value="2">02</option>
                                  <option value="3">03</option>
                                  <option value="4">04</option>
                                  <option value="5">05</option>
                                  <option value="6">06</option>
                                  <option value="7">07</option>
                                  <option value="8">08</option> 
                                  <option value="9">09</option>
                                  <option value="10">10</option>
                       </select>
                    
                  </div>

                      <div class="form-group">
  <label for="Preferred_Payment_Date">Preferred Payment Date<a style="color: red; font-size: large;">*</a></label>
  <input type="date" class="form-control" id="Preferred_Payment_Date" name="Preferred_Payment_Date" placeholder="Preferred_Payment_Date" required>
  <label id="date_error" style="color: red;"></label>
</div>

<script>
  // Get the input element and error label
  var datePicker = document.getElementById("Preferred_Payment_Date");
  var dateErrorLabel = document.getElementById("date_error");

  // Set the minimum and maximum date values
  datePicker.setAttribute("min", "2023-01-01");
  datePicker.setAttribute("max", "2023-12-10");

  // Handle date selection and display error label
  datePicker.addEventListener("input", function() {
    var selectedDate = new Date(this.value);
    var day = selectedDate.getDate();
    
    if (day < 1 || day > 10) {
      dateErrorLabel.textContent = "Please select a date from the 1st to the 10th of the month.";
    } else {
      dateErrorLabel.textContent = "";
    }

    // Check if the selected day is greater than 10
    if (day > 10) {
      // Move to the following month on the 1st
      selectedDate.setMonth(selectedDate.getMonth() + 1);
      selectedDate.setDate(1);
      this.value = selectedDate.toISOString().split("T")[0];
    }
  });
</script>

                  
                     
<div class="form-group">
  <label for="Preferred_Payment_Date">Inception Date<a style="color: red; font-size: large;">*</a></label>
  <input type="date" class="form-control" id="inc_date" name="inc_date" placeholder="Inception Date" required>
  <label id="date_error" style="color: red;"></label>
</div>






                        <p class="card-description">
                    NB: All fields with a <a style="color: red; font-size: large;">*</a> are required. 
                  </p>
                  <div class="form-group" style="display: none">
                    
                    </div>
                    <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">View Records</button>
                    <button class="btn btn-light">Clear All</button> -->
                    
                  <!-- </form> -->
               
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


          <div class="col-12 grid-margin stretch-card">
            
              <div class="card">
               
                <div class="card-body">
                  <h4 class="card-title">Main Member Details</h4>
                  <p class="card-description">
                    Fill In The Details Below
                  </p>
                  
                    <div class="form-group">
  <label for="names">Name(s)<a style="color: red; font-size: large;">*</a></label>
  <input type="text" class="form-control" id="names" name="names" placeholder="Enter name" required>
</div>

<div class="form-group">
  <label for="Surname">Surname<a style="color: red; font-size: large;">*</a></label>
  <input type="text" class="form-control" id="Surname" name="Surname" placeholder="Enter Surname" required>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Function to send values to n2.php, n3.php, and n4.php
    function sendValues(names, surname) {
      // AJAX POST request to n2.php
      $.post('n2.php', { names: names, surname: surname }, function(response) {
        console.log(response); // Handle the response from n2.php if needed
      });
      
      // AJAX POST request to n3.php
      $.post('n3.php', { names: names, surname: surname }, function(response) {
        console.log(response); // Handle the response from n3.php if needed
      });
      
      // AJAX POST request to n4.php
      $.post('n4.php', { names: names, surname: surname }, function(response) {
        console.log(response); // Handle the response from n4.php if needed
      });
    }
    
    // Trigger the sendValues function when there is a change in the input fields
    $('#names, #Surname').on('input', function() {
      var names = $('#names').val();
      var surname = $('#Surname').val();
      sendValues(names, surname);
    });
  });
</script>

                    
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
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antartica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France Metropolitan">France, Metropolitan</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
<option value="Holy See">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran (Islamic Republic of)</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
<option value="Korea">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao">Lao People's Democratic Republic</option>
<option value="Latvia">Latvia</option>

<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia, Federated States of</option>
<option value="Moldova">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>

<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
<option value="Span">Spain</option>

<option value="Suriname">Suriname</option>
<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syrian Arab Republic</option>

<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>

<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Viet Nam</option>
<option value="Virgin Islands (British)">Virgin Islands (British)</option>
<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Serbia">Serbia</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                       
                          </select>
                        </div>
                    
                        <div class="form-group">
                      <label for="languages_">Langauge<a style="color: red; font-size: large;">*</a></label>
                      <select class="form-control" id="languages_" name="languages_" required>
    <option value="">-Select Language-</option>
                        <option value="af">Swati</option>
    <option value="af">Afrikaans</option>
    <option value="sq">Albanian - shqip</option>
    <option value="am">Amharic - አማርኛ</option>
    <option value="ar">Arabic - العربية</option>
    <option value="an">Aragonese - aragonés</option>
    <option value="hy">Armenian - հայերեն</option>
    <option value="ast">Asturian - asturianu</option>
    <option value="az">Azerbaijani - azərbaycan dili</option>
    <option value="eu">Basque - euskara</option>
    <option value="be">Belarusian - беларуская</option>
    <option value="bn">Bengali - বাংলা</option>
    <option value="bs">Bosnian - bosanski</option>
    <option value="br">Breton - brezhoneg</option>
    <option value="bg">Bulgarian - български</option>
    <option value="ca">Catalan - català</option>
    <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
    <option value="zh">Chinese - 中文</option>
    <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
    <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
    <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
    <option value="co">Corsican</option>
    <option value="hr">Croatian - hrvatski</option>
    <option value="cs">Czech - čeština</option>
    <option value="da">Danish - dansk</option>
    <option value="nl">Dutch - Nederlands</option>
    <option value="en">English</option>
    <option value="en-AU">English (Australia)</option>
    <option value="en-CA">English (Canada)</option>
    <option value="en-IN">English (India)</option>
    <option value="en-NZ">English (New Zealand)</option>
    <option value="en-ZA">English (South Africa)</option>
    <option value="en-GB">English (United Kingdom)</option>
    <option value="en-US">English (United States)</option>
    <option value="eo">Esperanto - esperanto</option>
    <option value="et">Estonian - eesti</option>
    <option value="fo">Faroese - føroyskt</option>
    <option value="fil">Filipino</option>
    <option value="fi">Finnish - suomi</option>
    <option value="fr">French - français</option>
    <option value="fr-CA">French (Canada) - français (Canada)</option>
    <option value="fr-FR">French (France) - français (France)</option>
    <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
    <option value="gl">Galician - galego</option>
    <option value="ka">Georgian - ქართული</option>
    <option value="de">German - Deutsch</option>
    <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
    <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
    <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
    <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
    <option value="el">Greek - Ελληνικά</option>
    <option value="gn">Guarani</option>
    <option value="gu">Gujarati - ગુજરાતી</option>
    <option value="ha">Hausa</option>
    <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
    <option value="he">Hebrew - עברית</option>
    <option value="hi">Hindi - हिन्दी</option>
    <option value="hu">Hungarian - magyar</option>
    <option value="is">Icelandic - íslenska</option>
    <option value="id">Indonesian - Indonesia</option>
    <option value="ia">Interlingua</option>
    <option value="ga">Irish - Gaeilge</option>
    <option value="it">Italian - italiano</option>
    <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
    <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
    <option value="ja">Japanese - 日本語</option>
    <option value="kn">Kannada - ಕನ್ನಡ</option>
    <option value="kk">Kazakh - қазақ тілі</option>
    <option value="km">Khmer - ខ្មែរ</option>
    <option value="ko">Korean - 한국어</option>
    <option value="ku">Kurdish - Kurdî</option>
    <option value="ky">Kyrgyz - кыргызча</option>
    <option value="lo">Lao - ລາວ</option>
    <option value="la">Latin</option>
    <option value="lv">Latvian - latviešu</option>
    <option value="ln">Lingala - lingála</option>
    <option value="lt">Lithuanian - lietuvių</option>
    <option value="mk">Macedonian - македонски</option>
    <option value="ms">Malay - Bahasa Melayu</option>
    <option value="ml">Malayalam - മലയാളം</option>
    <option value="mt">Maltese - Malti</option>
    <option value="mr">Marathi - मराठी</option>
    <option value="mn">Mongolian - монгол</option>
    <option value="ne">Nepali - नेपाली</option>
    <option value="no">Norwegian - norsk</option>
    <option value="nb">Norwegian Bokmål - norsk bokmål</option>
    <option value="nn">Norwegian Nynorsk - nynorsk</option>
    <option value="oc">Occitan</option>
    <option value="or">Oriya - ଓଡ଼ିଆ</option>
    <option value="om">Oromo - Oromoo</option>
    <option value="ps">Pashto - پښتو</option>
    <option value="fa">Persian - فارسی</option>
    <option value="pl">Polish - polski</option>
    <option value="pt">Portuguese - português</option>
    <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
    <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
    <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
    <option value="qu">Quechua</option>
    <option value="ro">Romanian - română</option>
    <option value="mo">Romanian (Moldova) - română (Moldova)</option>
    <option value="rm">Romansh - rumantsch</option>
    <option value="ru">Russian - русский</option>
    <option value="gd">Scottish Gaelic</option>
    <option value="sr">Serbian - српски</option>
    <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
    <option value="sn">Shona - chiShona</option>
    <option value="sd">Sindhi</option>
    <option value="si">Sinhala - සිංහල</option>
    <option value="sk">Slovak - slovenčina</option>
    <option value="sl">Slovenian - slovenščina</option>
    <option value="so">Somali - Soomaali</option>
    <option value="st">Southern Sotho</option>
    <option value="es">Spanish - español</option>
    <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
    <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
    <option value="es-MX">Spanish (Mexico) - español (México)</option>
    <option value="es-ES">Spanish (Spain) - español (España)</option>
    <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
    <option value="su">Sundanese</option>
    <option value="sw">Swahili - Kiswahili</option>
    <option value="sv">Swedish - svenska</option>
    <option value="tg">Tajik - тоҷикӣ</option>
    <option value="ta">Tamil - தமிழ்</option>
    <option value="tt">Tatar</option>
    <option value="te">Telugu - తెలుగు</option>
    <option value="th">Thai - ไทย</option>
    <option value="ti">Tigrinya - ትግርኛ</option>
    <option value="to">Tongan - lea fakatonga</option>
    <option value="tr">Turkish - Türkçe</option>
    <option value="tk">Turkmen</option>
    <option value="tw">Twi</option>
    <option value="uk">Ukrainian - українська</option>
    <option value="ur">Urdu - اردو</option>
    <option value="ug">Uyghur</option>
    <option value="uz">Uzbek - o‘zbek</option>
    <option value="vi">Vietnamese - Tiếng Việt</option>
    <option value="wa">Walloon - wa</option>
    <option value="cy">Welsh - Cymraeg</option>
    <option value="fy">Western Frisian</option>
    <option value="xh">Xhosa</option>
    <option value="yi">Yiddish</option>
    <option value="yo">Yoruba - Èdè Yorùbá</option>
    <option value="zu">Zulu - isiZulu</option>
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
                      <label for="m_status">Marital Status<a style="color: red; font-size: large;">*</a></label>
                        <select class="form-control" id="m_status" name="m_status" required>
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
                      
                       
                      
  <p class="card-description">
                    NB: All fields with a <a style="color: red; font-size: large;">*</a> are required. 
                  </p>
                    <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">View Records</button>
                    <button class="btn btn-light">Clear All</button> -->
                    
                  <!-- </form> -->
               
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
                       
                     <div class="form-group">
                      <label for="date">inception date<a style="color: red; font-size: large;">*</a></label>
                      <input type="date" class="form-control" id="Sp_date" name="Sp_date" >
                    </div>
                    <p class="card-description">
                    NB: All fields with a <a style="color: red; font-size: large;">*</a> are required. 
                  </p>
                      </div>
                    
                      </div>
              </div>
            </div>

            


            <div id="ad_member_ad" name="ad_member_ad"></div>
            <div class="col-12 grid-margin stretch-card"  id="Ex_m" name= "Ex_m" style="display: none">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Extended Members</h4>
                  <p class="card-description">
                    Fill In The Details Below
                  </p>
                  <div id="ad_member_ad"  name="ad_member_ad"></div>
                  <h4 style="font-weight: bolder; text-align: end; color: grey;" id="display_2" name="display_"></h4>
                  <div class="forms-sample" id="ex_form" name="ex_form">
                    <div class="form-group">
                      <label for="Name">Name<a style="color: red; font-size: large;">*</a></label>
                      <input type="text" class="form-control" id="Ex_Name" name="Ex_Name" placeholder="Enter name">
                    </div>
                    
                     <div class="form-group">
                      <label for="Surname">Surname<a style="color: red; font-size: large;">*</a></label>
                      <input type="text" class="form-control" id="Ex_Surname" name= "Ex_Surname"  placeholder="Enter Surname">
                    </div>
                    
                     <div class="form-group">
                      <label for="ContactNo">Contact number<a style="color: red; font-size: large;">*</a></label>
                      <input type="number" class="form-control" id="Ex_ContactNo" name="Ex_ContactNo" placeholder="Enter cellphone Number">
                    </div>
                   
                    <div class="form-group">
                      <label for="idNumber">ID/passport<a style="color: red; font-size: large;">*</a></label>
                      <input type="number" class="form-control" id="Ex_idNumber"  name="Ex_idNumber" placeholder="Enter ID number">
                    </div>
                   
                     <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Relationship to mainmember<a style="color: red; font-size: large;">*</a></label>
                       
                         <select class="form-control" id="Ex_Relationship" name="Ex_Relationship">
                           <option selected disabled value="">Select relationship</option>
                           <option value="Father">Father</option>
                           <option value="Mother">Mother</option>
                           <option value="Fatherinlaw">Father in law</option>
                           <option value="Motherinlaw">Mother in law</option>
                           <option value="Brother">Brother</option>
                           <option value="Sister">Sister</option>
                           <option value="BrotherInLaw">Brother in law</option>
                           <option value="SisterInLaw">Sister in law</option>
                           <option value="Cousin">Cousin</option>
                           <option value="Uncle">Uncle</option>
                           <option value="Aunti">Aunti</option>
                           <option value="Child">Child</option>
                           <option value="Child">Grand-Child</option>
                           <option value="AdoptedChild">Adopted child</option>
                           <option value="ExtendedChild">Extended child</option>
                          </select>
                        </div>
                    
                    
                    <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Nationality<a style="color: red; font-size: large;">*</a></label>
                        
                          <select class="form-control" id="Ex_Nationality" name="Ex_Nationality">
                           
                            <option selected disabled value="">Select Nationality</option>
                            <option value="South Africa">South Africa</option>
                                <option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antartica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France Metropolitan">France, Metropolitan</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
<option value="Holy See">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran (Islamic Republic of)</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
<option value="Korea">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao">Lao People's Democratic Republic</option>
<option value="Latvia">Latvia</option>

<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia, Federated States of</option>
<option value="Moldova">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>

<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
<option value="Span">Spain</option>

<option value="Suriname">Suriname</option>
<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syrian Arab Republic</option>

<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>

<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Viet Nam</option>
<option value="Virgin Islands (British)">Virgin Islands (British)</option>
<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Serbia">Serbia</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                       
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
                    
                    
                    
                    
                        
                    <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">View Records</button>
                    <button class="btn btn-light">Clear All</button> -->
                    
                  </div>
                </div>
              </div>
            </div>
           
            <div class="col-12 grid-margin stretch-card" id="d_m" name="d_m" style="display: none">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Depended Member</h4>
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
                      <input type="number"  class="form-control" id="de_ContactNo" name="de_ContactNo" placeholder="Enter cellphone Number">
                    </div>
                   
                    <div class="form-group">
                      <label for="idNumber">ID/passport<a style="color: red; font-size: large;">*</a></label>
                      <input type="number" class="form-control" id="de_idNumber" name="de_idNumber" placeholder="Enter ID number">
                    </div>
                   
                     <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Relationship to mainmember<a style="color: red; font-size: large;">*</a></label>
                       
                         <select class="form-control" id="deRelationship" name = "deRelationship" >
                           <option selected disabled value="">-Select relationship-</option>
                           <option value="Father">Father</option>
                           <option value="Mother">Mother</option>
                           <option value="Fatherinlaw">Father in law</option>
                           <option value="Motherinlaw">Mother in law</option>
                           <option value="Brother">Brother</option>
                           <option value="Sister">Sister</option>
                           <option value="BrotherInLaw">Brother in law</option>
                           <option value="SisterInLaw">Sister in law</option>
                           <option value="Cousin">Cousin</option>
                           <option value="Uncle">Uncle</option>
                           <option value="Aunti">Aunti</option>
                           <option value="Child">Child</option>
                           <option value="Child">Grand-Child</option>
                           <option value="AdoptedChild">Adopted child</option>
                           <option value="ExtendedChild">Extended child</option>
                          </select>
                        </div>
                    
                    
                    <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Nationality<a style="color: red; font-size: large;">*</a></label>
                        
                          <select class="form-control" id="de_Nationality"name="de_Nationality" >
                           
                            <option selected disabled value="">-Select Nationality-</option>
                            <option value="South Africa">South Africa</option>
                                                               <option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antartica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="France Metropolitan">France, Metropolitan</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
<option value="Holy See">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran (Islamic Republic of)</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
<option value="Korea">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao">Lao People's Democratic Republic</option>
<option value="Latvia">Latvia</option>

<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia, Federated States of</option>
<option value="Moldova">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>

<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia">South Georgia and the South Sandwich Islands</option>
<option value="Span">Spain</option>

<option value="Suriname">Suriname</option>
<option value="Svalbard">Svalbard and Jan Mayen Islands</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syrian Arab Republic</option>

<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>

<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Viet Nam</option>
<option value="Virgin Islands (British)">Virgin Islands (British)</option>
<option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
<option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Serbia">Serbia</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>   
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
                    <button type="button" onclick="clear_de()"  class="btn btn-light">Clear member</button>

                </div>
              </div>
            </div>

<style>
  .invisible-card {
    display: none;
  }
</style>

<div class="card invisible-card" id="p_ben" name="p_ben">
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
              
                <div>
                    <button type="button" id="submit_c" name="submit_c" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" onclick="clear_client()" class="btn btn-light">Clear All</button>
                    <button type="button" onclick="document.location='AssetTable.php'"  class="btn btn-light">View Records</button>
                </div>

              </div>
            </div>
              </div>
            </div>
            </form>
          </div>
         
          <div class="modal fade" id="validator_msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="mt-3 text-center">
        <div id="err_msg" name="err_msg" style="color: red; font-weight: bold; padding: 10%; padding-bottom: 0%"></div>
    </div>
    <div class="mt-3 text-center" style="padding: 5%">
      <button type="button"  class="btn btn-primary"  data-dismiss="modal">OK</button>
      <!-- <button type="button" onclick="document.location='admin-portal.php'" class="btn btn-primary" id="remove"  name="remove" onclick="remove_files()">YES</button> -->
    </div>
  </div>
</div> 
                              </div>   
        <!-- content-wrapper ends -->

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.eKhonnector.co.za/" target="_blank">eKhonnector</a>. All rights reserved.</span>
           
          </div>

  <script>



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
  <script src="js.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

<script>
  // Get references to the input boxes and the output boxes
  const input1 = document.getElementById('cat');
  const input2 = document.getElementById('product');
  const premiumOutput = document.getElementById('Premium');
  const actDateOutput = document.getElementById('act_date');

  // Add event listeners to the input boxes
  input1.addEventListener('change', updateOutputs);
  input2.addEventListener('change', updateOutputs);

  // Function to update the output boxes
  function updateOutputs() {
    // Get the values of input1 and input2
    const value1 = input1.value;
    const value2 = input2.value;

    // Make an AJAX call to retrieve the corresponding values from the database
    $.ajax({
      type: 'POST',
      url: 'get_premium.php',
      data: { value1: value1, value2: value2 },
      success: function(response) {
        // Update the premium output box with the retrieved value
        premiumOutput.value = response;
        
        // Disable the premium input box
        premiumOutput.disabled = true;
      },
      error: function() {
        console.log('Error retrieving premium value from database');
      }
    });

    // Make another AJAX call to retrieve the activation date value
    $.ajax({
      type: 'POST',
      url: 'get_activation.php',
      data: { value1: value1, value2: value2 },
      success: function(response) {
        // Update the activation date output box with the retrieved value
        actDateOutput.value = response;

        // Disable the activation date input box
        actDateOutput.disabled = true;
      },
      error: function() {
        console.log('Error retrieving activation date value from database');
      }
    });
  }
</script>


<script>
document.querySelector('#policy_opt').addEventListener('change', function() {
    
    let x = Math.floor((Math.random() * 999) + 1);

    if (document.getElementById("policy_opt").value === "Automatic") {
        document.getElementById("policy_no1").disabled = true;
        document.getElementById("policy_no1").value = "***AUTOMATED***";
        document.getElementById("policy_no").value = document.getElementById("policy_no1").value;
    }

    if (document.getElementById("policy_opt").value === "Manually") {
        document.getElementById("policy_no1").disabled = false;
    }
});

document.getElementById("policy_no1").addEventListener('input', function() {
    document.getElementById("policy_no").value = this.value;
});

    // Function to send the value using AJAX
    function sendValue() {
        var policyNo = document.getElementById("policy_no").value;

        // Perform AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "n1.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // AJAX request completed successfully
                console.log(xhr.responseText);
            }
        };
        xhr.send("policy_no=" + policyNo);
    }
  
  function select_opt(){
    if(document.getElementById("snd_opt").value == "single"){
      document.getElementById("e_mail").style.display = "block"; 
      document.getElementById("filt").disabled = true;
    }else{
      document.getElementById("e_mail").style.display = "none";
      document.getElementById("filt").disabled = false; 
    }
  }
  document.querySelector('#m_status').addEventListener('change', function(){
    var msg = "";
    const display = document.getElementById('err_msg');
    if(document.getElementById("m_status").value == "Married" || document.getElementById("m_status").value == "Partner"){
      msg = "Please fill details of your spouse or partner bellow";
      display.innerHTML = msg;
      $('#validator_msg').modal("show");
      document.getElementById("spouse").style.display = "block";
    }
    if(document.getElementById("m_status").value == "Divorced" || document.getElementById("m_status").value == "Single"){
      document.getElementById("spouse").style.display = "none";
    }
  })
  
  function get_0(){
    
    if(document.getElementById("ext_members").value != ""){
      document.getElementById("Ex_m").style.display = "block";
      
      document.getElementById("product_add_ben").value;
    }else {
      document.getElementById("Ex_m").style.display = "none";
    }
  }
  function get_1(){
    
    if(document.getElementById("Dep_covered").value != ""){
      document.getElementById("d_m").style.display = "block";
    }else {
      document.getElementById("d_m").style.display = "none";
    }
  }
  function get_2(){
    
    if(document.getElementById("product_add_ben").value != ""){
      document.getElementById("p_ben").style.display = "block";
    }else {
      document.getElementById("p_ben").style.display = "none";
    }
  }
  function valueee(){
    document.getElementById("policy_no").value = document.getElementById("policy_no1").value;
  }
  function remove_files() {
    $('#exampleModal').modal("hide");
    $.ajax({
      url:'doc-del.php',
      type:'post',
      data:{admin:$('#admin').val()
          },
      success:function(response){
          //$('#ad_member_ad').html(response);
          //alert("iyafika")
          window.location.replace("upload.php");
      }
  });
  }
</script>

</html>
