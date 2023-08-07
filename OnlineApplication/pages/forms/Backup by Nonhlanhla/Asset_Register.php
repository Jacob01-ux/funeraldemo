<?php
//include 'session_handler.php';
//include 'Birthday.php';
//if(session_status() == PHP_SESSION_NONE) {
  // Start the session
  //session_start();
//} 
//if(isset($_SESSION["id"])){
// Connect to the database using PDO
//$host = 'localhost';
//$dbname = 'mandhagr_websystems_10';
//$username = 'mandhagr_websystems_10';
//$password = 'websystems_10';

//$dsn = "mysql:host=$host;dbname=$dbname";
//$options = [
 //   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
   // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    //PDO::ATTR_EMULATE_PREPARES => false,
//];
//try {
  //  $connection = new PDO($dsn, $username, $password, $options);
//} catch (\PDOException $e) {
  //  throw new \PDOException($e->getMessage(), (int)$e->getCode());
//}

//$conn = new mysqli($host, $username, $password, $dbname);

//if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
//}

//$sql = "SELECT * FROM accounts
//WHERE id = '{$_SESSION["id"]}'";

//$result = $conn->query($sql);

//$u = $result->fetch_assoc();
//retrieving policy number from new clients

//$sql1 = "SELECT * FROM policies";
//$stmt1 = $connection->prepare($sql1);
//$stmt1->execute();
//$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
//}else{
  //header("Location: ../samples/login-2.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Funeral demo | Asset_Register</title>
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
                Assets
            </h3>
            
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Asset Register</h4>
                  <p class="card-description">
                    
                  </p>
                 <form class="pt-3" method="post" action="asset.php">
                   <div class="form-group">
                      <label for="exampleSelectGender">Month</label>
                        <select class="form-control" id="AMonth" name="AMonth" >
                          <option>Select Month</option>
                           <option>January</option>
                           <option>February</option>
                           <option>March</option>
                           <option>April</option>
                           <option>May</option>
                           <option>July</option>
                           <option>August</option>
                           <option>September</option>
                           <option>October</option>
                           <option>November</option>
                          <option> December</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Year</label>
                        <select class="form-control" id="AYear" name="AYear" >
                         <option>Select Year</option>
                          <option>1900</option>
                          
							<option>1901</option>
<option>1902</option>
<option>1903</option>
<option>1904</option>
<option>1905</option>
<option>1906</option>
<option>1907</option>
<option>1908</option>
<option>1909</option>
<option>1910</option>
<option>1911</option>
<option>1912</option>
<option>1913</option>
<option>1914</option>
<option>1915</option>
<option>1916</option>
<option>1917</option>
<option>1918</option>
<option>1919</option>
<option>1920</option>
<option>1921</option>
<option>1922</option>
<option>1923</option>
<option>1924</option>
<option>1925</option>
<option>1926</option>
<option>1927</option>
<option>1928</option>
<option>1929</option>
<option>1930</option>
<option>1931</option>
<option>1932</option>
<option>1933</option>
<option>1934</option>
<option>1935</option>
<option>1936</option>
<option>1937</option>
<option>1938</option>
<option>1939</option>
<option>1940</option>
<option>1941</option>
<option>1942</option>
<option>1943</option>
<option>1944</option>
<option>1945</option>
<option>1946</option>
<option>1947</option>
<option>1948</option>
<option>1949</option>
<option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>


                           <option>2000</option>
                           <option>2001</option>
                           <option>2002</option>
                           <option>2003</option>
                           <option>2004</option>
                           <option>2005</option>
                           <option>2006</option>
                           <option>2007</option>
                           <option>2008</option>
                          <option> 2009</option>
                          <option>2010</option>
                           <option>2011</option>
                           <option>2012</option>
                           <option>2013</option>
                           <option>2014</option>
                           <option>2015</option>
                           <option>2016</option>
                           <option>2017</option>
                           <option>2018</option>
                           <option>2019</option>
                          <option> 2020</option>
                           <option>2021</option>
                           <option>2022</option>
                           <option>2023</option>
                        </select>
                      </div>
                        
    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Supplier Name</label>
                      <input type="text" class="form-control" id="suppName" name="AsuppName" placeholder="Enter Supplier">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Asset Name</label>
                      <input type="text"  class="form-control" id="AssetName" name="AassetName" placeholder="Enter Asset Name eg.Coffin(s)">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Asset Type</label>
                    <select class="form-control form-control-lg" id="assetType" name="AassetType">
                      <option>Select Asset Type</option>
                      <option>Furniture</option>
                      <option>Inventory</option>
                      <option>Investment</option>
                      <option>Vehicle</option>
                      <option>PPE</option>
                      <option>Patents</option>
                      <option>Account Receivable</option>
                      <option>Cash</option>
                      <option>Cash equivalents</option>
                    </select>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Model Number</label>
                      <input type="text"  class="form-control" id="modelNo" name="AmodelNo" placeholder="Enter Model Number eg. Rf110FC">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Reference Number</label>
                      <input type="text"  class="form-control" id="refNo" name="ArefNo" placeholder="Enter Ref Number eg. PART110FC">
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Quantity</label>
                      <input type="number" inputmode="numeric" class="form-control" pattern="[0-9]*" id="Quantity" name="Aquantity" min="0" max="9999" />
                  </div>
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Unit Price</label>
                   
                       <input type="number" inputmode="numeric" class="form-control" pattern="[0-9]*" id="unitPrice" name="AunitPrice" min="0" max="9999" />
                  </div>
                   
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Total Cost</label>
                      <input type="text"  class="form-control" id="AssettotalCost" name="AtotalCost" placeholder="R1000.00">
                    </div>

                    <div class="form-group">
                        <label>Transaction Date:</label>
                        <input  class="form-control" name = "Adatetime"  mask="'alias': 'date'" />
                      </div>
           
              
               <form>
    <div style="text-align: center;">
        <button type="submit" class="btn btn-primary mr-2" name="save_Asset">Submit</button>
        <button type="reset" class="btn btn-light" name="ClearAsset" value="Clear">Clear All</button>
        <button type="button" class="btn btn-light" onclick="goToNextPage()" name="getRecords">Records</button>
    </div>
</form>
                   
            </div>
               </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Asset Disposal</h4>
                  <p class="card-description">
                 
                  </p>
                  <form class="pt-3" method="post" action="asset.php">
                    <div class="form-group">
                      <label for="exampleSelectGender">Month</label>
                        <select class="form-control" id="DisprodMonth" name="DisprodMonth" >
                           <option>Select Month</option>
                          <option>January</option>
                           <option>February</option>
                           <option>March</option>
                           <option>April</option>
                           <option>May</option>
                           <option>July</option>
                           <option>August</option>
                           <option>September</option>
                           <option>October</option>
                           <option>November</option>
                          <option> December</option>
                        </select>
                      </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Year</label>
                        <select class="form-control" id="DisprodYear" name="DisprodYear" >
                         <option>Select Year</option>
                          <option>1900</option>
<option>1901</option>
<option>1902</option>
<option>1903</option>
<option>1904</option>
<option>1905</option>
<option>1906</option>
<option>1907</option>
<option>1908</option>
<option>1909</option>
<option>1910</option>
<option>1911</option>
<option>1912</option>
<option>1913</option>
<option>1914</option>
<option>1915</option>
<option>1916</option>
<option>1917</option>
<option>1918</option>
<option>1919</option>
<option>1920</option>
<option>1921</option>
<option>1922</option>
<option>1923</option>
<option>1924</option>
<option>1925</option>
<option>1926</option>
<option>1927</option>
<option>1928</option>
<option>1929</option>
<option>1930</option>
<option>1931</option>
<option>1932</option>
<option>1933</option>
<option>1934</option>
<option>1935</option>
<option>1936</option>
<option>1937</option>
<option>1938</option>
<option>1939</option>
<option>1940</option>
<option>1941</option>
<option>1942</option>
<option>1943</option>
<option>1944</option>
<option>1945</option>
<option>1946</option>
<option>1947</option>
<option>1948</option>
<option>1949</option>
<option>1950</option>
<option>1951</option>
<option>1952</option>
<option>1953</option>
<option>1954</option>
<option>1955</option>
<option>1956</option>
<option>1957</option>
<option>1958</option>
<option>1959</option>
<option>1960</option>
<option>1961</option>
<option>1962</option>
<option>1963</option>
<option>1964</option>
<option>1965</option>
<option>1966</option>
<option>1967</option>
<option>1968</option>
<option>1969</option>
<option>1970</option>
<option>1971</option>
<option>1972</option>
<option>1973</option>
<option>1974</option>
<option>1975</option>
<option>1976</option>
<option>1977</option>
<option>1978</option>
<option>1979</option>
<option>1980</option>
<option>1981</option>
<option>1982</option>
<option>1983</option>
<option>1984</option>
<option>1985</option>
<option>1986</option>
<option>1987</option>
<option>1988</option>
<option>1989</option>
<option>1990</option>
<option>1991</option>
<option>1992</option>
<option>1993</option>
<option>1994</option>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>



                           <option>2000</option>
                           <option>2001</option>
                           <option>2002</option>
                           <option>2003</option>
                           <option>2004</option>
                           <option>2005</option>
                           <option>2006</option>
                           <option>2007</option>
                           <option>2008</option>
                          <option> 2009</option>
                          <option>2010</option>
                           <option>2011</option>
                           <option>2012</option>
                           <option>2013</option>
                           <option>2014</option>
                           <option>2015</option>
                           <option>2016</option>
                           <option>2017</option>
                           <option>2018</option>
                           <option>2019</option>
                          <option> 2020</option>
                           <option>2021</option>
                           <option>2022</option>
                           <option>2023</option>
                        </select>
                      </div>
                    
            
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Product Name</label>
                      <input type="text" class="form-control" id="DisprodName" name="DisprodName" placeholder="Enter Product Name eg. Coffins(s)">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Model Number</label>
                      <input type="text" class="form-control" id="DisModelNo" name = "DisModelNo" placeholder="Enter Model Number eg. pcF1223">
                    </div>
                   <div class="form-group">
                    <label for="exampleFormControlSelect1">Reason</label>
                   
                       <input type="number" inputmode="numeric" class="form-control" pattern="[0-9]*" id="DisReason" name = "DisReason" min="0" max="9999" />
                  </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Comment</label>
                      <textarea class="form-control" id="disComment" name = "disComment" rows="4"></textarea>
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Quantity</label>
                    
                      <input type="number" inputmode="numeric" class="form-control" pattern="[0-9]*" id="disQuantity" name = "disQuantity" min="0" max="9999" />
                  </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Price</label>
                
                      <input type="text" class="form-control" id="disPrice" name = "disPrice" placeholder="eg. #000">
                  </div>
                   
            
                     <div class="form-group">
                        <label>Transaction Date:</label>
                        <input class="form-control" name = "disTransDate" data-inputmask="'alias': 'date'" />
                      </div>
                    
 <form>
    <div style="text-align: center;">
        <button  type="submit" id='sub' class="btn btn-primary mr-2" name="save_Disposal">Submit</button>
        <button type="reset" class="btn btn-light" onclick="clearTextbox()" name="resetDis">Clear All</button>
        <button type="button" class="btn btn-light" onclick="goToNextPage()" name="recordDis">Records</button>
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

