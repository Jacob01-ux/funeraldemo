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
  <title>Funeral Demo | Pending Applications</title>
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
                Pending Applications
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                </ol>
            </nav>
          </div>



          <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <form class="form-sample">
                    <p class="card-description">
                      NB: Select Application Number To see client details
                    </p>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Application Number</label>
                          <div class="col-sm-9">
                          <select class="form-control" id="PolicyNumber" name="PolicyNumber" onchange="myFunction()" >
                       <option disabled selected value="">-Select Application No-</option>
                       <?php
                        
                        $query = mysqli_query($conn, 'SELECT * FROM incoming_clients WHERE _By = "' . htmlspecialchars($u["names"]) . '"');

                  		$array = mysqli_fetch_array($query);
                  
                  			echo "time";
                  
                               foreach ($query as $rows) { 
                              ?>
                                  <option><?php echo $rows['Policy'] ?></option>
                              <?php
                                }
                              ?>
                        </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>



              <div class="card">
                <div class="card-body">
                  <form class="form-sample">

                    <h4 class="card-title">Policy Details</h4>

                  
                    <input type="hidden" id="admin" name="admin" value=<?= htmlspecialchars($u["names"]) ?>/>
                    <div class="form-group">
                      <label for="period">Period</label>
                      <input type="text" class="form-control" id="n_month" name="n_month" placeholder="Select Policy Number.." readonly required>
                         
                    </div>
                    <div class="form-group">
                		    <label for="Group_Name">Group Name</label>
                        <input type="text" class="form-control" id="Group_Name" name="Group_Name" disabled placeholder="Select Policy Number.."readonly>
                    </div>
                  
                    <div class="form-group">
                      <label for="product">Product </label>
                       <input type="text" class="form-control" id="product" name="product" disabled placeholder="Select Policy Number.." readonly>
                       
                     
                    </div>
                    
                     <div class="form-group">
                      <label for="Premium">Premium</label>
                      <input type="text" class="form-control" id="Premium" name="Premium" placeholder="Select Policy Number.." readonly required>
                    </div>
                    
                  

                    
                     <div class="form-group">
                      <label for="product_add_ben">Product Additional Benefits</label>
                        <input type="text" class="form-control" id="product_add_ben" name= "product_add_ben" placeholder="Select Policy Number.."readonly>
                        
                    </div>
                      <div class="form-group">
                      <label for="Dep_covered">Dependent Covered</label>
                        <input type="text" class="form-control" id="Dep_covered" name="Dep_covered"  placeholder="Select Policy Number.." readonly>
                        
                    </div>
                     <div class="form-group">
                      <label for="ext_members">Extended Members</label>
                        <input type="text"class="form-control" id="ext_members" name="ext_members" disabled placeholder="Select Policy Number.."readonly >
                        
                    
                  </div>
                   <div class="form-group">
                      <label for="Preferred_Payment_Date">Preferred Payment Day</label>
                        <input type="text" class="form-control" id="Preferred_Payment_Date" name="Preferred_Payment_Date"  placeholder="Select Policy Number.."readonly required>
                      
                      </div>
                  
                  
                    <div class="form-group">
                          <label for="Preferred_Payment_Date">Inception Date</label>
  
                             <input type="text"  class="form-control" id="inc_date" name="inc_date" placeholder="Select Policy Number.." readonly required>
                     
                        </div>
                    
               
                  <h4 class="card-title"><b>Main Member</b></h4>
                  
                  
                    <div class="form-group">
                      <label for="names">Name</label>
                      <input type="text" class="form-control" id="names"name ="names" placeholder="Select Policy Number.." required readonly>
                    </div>
                    
                     
                    
                     <div class="form-group">
                      <label for="phone">Contact number</label>
                      <input type="number" class="form-control" id="phone1"  name="phone1" placeholder="Select Policy Number.." required readonly>
                    </div>
                   
                    <div class="form-group">
                      <label for="idno">ID/passport</label>
                      <input type="number" class="form-control" id="idno" name="idno" placeholder="Select Policy Number.." required readonly>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 col-form-label">Nationality</label>
                        
                          <input type="text" class="form-control" id="Nationality" name="Nationality"placeholder="Select Policy Number.." readonly required>

                        </div>
                    
                        <div class="form-group">
                      <label for="languages_">Langauge</label>
                      <input type="text"class="form-control" id="languages_" name="languages_" placeholder="Select Policy Number.." readonly required>
    
                    </div>

                        <div class="form-group">
                      <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender"  placeholder="Select Policy Number.."readonly>
                         
                      </div>
                     <div class="form-group">
                      <label for="Email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Select Policy Number.." readonly required>
                    </div>
                    <div class="form-group">
                      <label for="res_address">Address</label>
                     <input type="text"class="form-control" id="res_address" name= "res_address" rows="4" placeholder="Select Policy Number.." readonly required>
                    </div>
                    <div class="form-group">
                      <label for="m_status">Marital Status</label>
                        <input type="text"class="form-control" id="m_status" name="m_status"  placeholder="Select Policy Number.." readonly required>
                          
                      </div>
                  <!-- <div id="ad_member_ad" name="ad_member_ad"></div> -->
                    <button type="button" class="btn btn-primary mr-2" onclick="ac()" id="Accept_ap" name="Accept_ap" >Accept</button>
                    <button type="button" id="Reject_ap" name="Reject_ap" onclick="rj()" class="btn btn-light" >Reject</button>
                </div>
                  
              </div>




            </div>


          


          
            
            
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
			url:"profiledata1.php",
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
            
<!-- 
<div class="text-Left">
  <button type="button"  class="btn btn-primary mr-2">Update</button>
   <button type="button"  class="btn btn-light">Delet</button>
   <button type="submit" onclick="submitForm()" class="btn btn-light">Print</button> -->
  <!--
  <button type="submit" onclick="myFunction()"; id="submit" class="btn btn-primary mr-2">Submit</button>
  
  <button type="button" onclick="clear_client()" class="btn btn-light">Clear All</button>
  <button type="button" onclick="document.location='AssetTable.php'"  class="btn btn-light">View Records</button>
-->
<!-- </div> -->
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
  <script src="js.js"></script>
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
  
function ac() {
  //alert("aasfsfhsh")
  
  // Make an AJAX call to retrieve the corresponding value from the database
  $.ajax({
          url:'accept.php',
          type:'post',
          data:{Customer:$('#Customer').val(), idno:$('#idno').val(),phone:$('#phone').val(),gender:$('#gender').val(),main_Nationality:$('#main_Nationality').val(),languages_:$('#languages_').val(),product:$('#product').val(),PremiumCoverAmount:$('#Premium').val(),policy_no:$('#PolicyNumber').val(),Dep_covered:$('#Dep_covered').val(),
            cat:$('#Group_Name').val(),email:$('#email').val(),res_address:$('#res_address').val(),product_add_ben:$('#product_add_ben').val(),ext_members:$('#ext_members').val(),m_status:$('#m_status').val(),inc_date:$('#inc_date').val(),Preferred_Payment_Date:$('#Preferred_Payment_Date').val(),period:$('#period').val(),_By:$('#_By').val()
              },
          success:function(response){
              $('#ad_member_ad').html(response);
              //alert("iyafika")
              window.location.href = "policy-certificate.php";
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

