<?php 
// LOGIN
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

?>
<?php
    include_once 'insert_new_nurse.php';
    include_once 'insert_admin.php';
    include('db_conn.php');
?>


<?php
     include_once 'insert_data.php';
     include('db_conn.php');
     $email = $_SESSION['email'];

     // SELECT ALL ADMINS
     $fetchAllAdmins = mysqli_query($conn, "SELECT * FROM `admins` WHERE email = '$email'");
     $admins = mysqli_fetch_assoc($fetchAllAdmins);

     // SELECT ADD ADMINS
     $fetchAddAdmins = mysqli_query($conn, "SELECT * FROM `admins`");
     

     // SELECT ALL STUDENTS 
     $fetchAllStudents = mysqli_query($conn, "SELECT * FROM `students`");
     
     // SELECT ALL REPORTS 
     $fetchAllReports = mysqli_query($conn, "SELECT * FROM `reports`");

     // SELECT ALL NURSES 
     $fetchAllNurses = mysqli_query($conn, "SELECT * FROM `nurses`");

     // SELECT ALL NURSES TODAY
     $fetchAllNursesToday = mysqli_query($conn, "SELECT * FROM `nurses`");
     
     // SELECT ALL MESSAGES 
     $fetchAllMessages = mysqli_query($conn, "SELECT * FROM `messages`");

     // SELECT ALL MEDICINE 
     $fetchAllMedicine = mysqli_query($conn, "SELECT * FROM `medicine`");


     // COUNT ALL ADMINS
     $fetchAdmins = mysqli_query($conn, "SELECT COUNT(*) as totalAd FROM `admins`");
     $countAdmins = mysqli_fetch_assoc($fetchAdmins);

     // COUNT ALL NURSES
     $fetchNurses = mysqli_query($conn, "SELECT COUNT(*) as totalNur FROM `nurses`");
     $countNurses = mysqli_fetch_assoc($fetchNurses);

     // COUNT ALL STUDENTS
     $fetchStudents = mysqli_query($conn, "SELECT COUNT(*) as totalStud FROM `students`");
     $countStudents = mysqli_fetch_assoc($fetchStudents);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN | CLINIC MS</title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./css/addAdmin.css"/>
    <link rel="stylesheet" href="./css/NurseTab.css" />
    <link rel="stylesheet" href="./css/StudentTab.css" />
    <link rel="stylesheet" href="./css/DashboardTab.css"/>
    <link rel="stylesheet" href="./css/medicine.css"/>
    <link rel="stylesheet" href="./css/messagetab.css"/>
    <link rel="stylesheet" href="./css/reportchart.css"/>
    <link rel="stylesheet" href="./css/archivesTab.css"/>
    

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <div class="main">
      <nav
        id="sidebar"
        class="sidebar navbar-dark active"
        style="
          width: 225px;
          box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
        "
      >
        <div class="logo navbar-brand px-3 m-0" href="#">
          <img src="./assets/QCUClinicLogo.png" alt="" />
          QCU Clinic
        </div>
        <ul class="list-unstyled navbar-nav ps-0">
          <li
            data-tab-target="#dashboard"
            class="mt-3 px-4 w-100 mb-1 nav-item so_active tab"
          >
            <i class="fa fa-area-chart"></i>
            <a class="nav-link align-items-center"> Dashboard </a>
          </li>

          <li data-tab-target="#admins" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-users" aria-hidden="true"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Admins
            </div>
          </li>

          <li data-tab-target="#students" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-users"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Students
            </div>
          </li>

          <li data-tab-target="#nurses" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-user-md" aria-hidden="true"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Nurses
            </div>
          </li>

          <li data-tab-target="#messages" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-commenting-o" aria-hidden="true"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Messages
            </div>
          </li>

          <li data-tab-target="#reports" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-book"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Reports
            </div>
          </li>

          <li data-tab-target="#archives" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Archives
            </div>
          </li>

          <li data-tab-target="#medicine" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-medkit"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Medicine
            </div>
          </li>

        </ul>
      </nav>
      <nav
        id="navigation"
        class="mynav px-3 navbar navbar-expand navbar-dark"
        style="z-index: 1"
      >
        <div class="container-fluid d-flex justify-content-start">
          <button
            id="sidebarCollapse"
            class="navbar-toggle border-0 bg-dark ms-0 ms-md-2 ms-lg-0 order-1 order-md-1"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="ms-auto order-sm-0" id="navbarNav">
            <ul
              class="navbar-nav ms-auto text-white d-flex align-items-left align-items-lg-center"
            >
              <span></span>
              <li class="nav-item px-0 d-flex align-items-center">
                <a
                  class="nav-link modal-trigger text-dark"
                  data-toggle="modal"
                  data-target="#loginmodal"
                  href="#"
                  ><?=$admins['fname']?></a
                >
              </li>
              <div class="dropdown nav-item">
                <div
                  class="account background-none nav-link dropdown-toggle dropdown-toggle d-flex justify-content-center align-items-center"
                  type="button"
                  id="dropdownMenuButton1"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="background: none"
                >
                  <img src="./assets/<?=$admins['img']?>" alt="" />
                </div>

                <ul
                  class="dropdown-menu dropdown-menu-end dropdown-menu-dark"
                  aria-labelledby="dropdownMenuButton1"
                >
                  <li>
                    <a class="dropdown-item" href="#"
                      >Login As: <span id="email_span"></span
                    ></a>
                  </li>
                  <li><a class="dropdown-item" href="#">My Account</a></li>
                  <li id="logout">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                  </li>
                </ul>
              </div>
            </ul>
          </div>
        </div>
      </nav>
      
      <div class="content_wrapper">


      
      <!-- DASHBOARD PAGE -->
        <section id="dashboard" class="dashboard so_content so_active" data-tab-content>
          <div class="dashboard_header d-flex justify-content-between">
            <h3 class="m-0">ANALYTICS</h3>
          </div>

          <div class="card_container">
            <div class="card" style="background-color:#7BAD89;">
              <div class="card_content">
                <span class="number"> <?=$countAdmins['totalAd']?> </span>
                <span class="name">Admins</span>
              </div>
              <div class="icon">
                <i class="fa solid fa-user" aria-hidden="true"></i>
              </div>
            </div>
            <div class="card" style="background-color:#7B89AD;">
              <div class="card_content">
                <span class="number"> <?=$countNurses['totalNur']?> </span>
                <span class="name">Nurses</span>
              </div>
              <div class="icon">
                <i class="fa solid fa-user" aria-hidden="true"></i>
              </div>
            </div>
            <div class="card" style="background-color:#AD7B7B;">
              <div class="card_content" >
                <span class="number"> <?=$countStudents['totalStud']?> </span>
                <span class="name">Students</span>
              </div>
              <div class="icon">
                <i class="fa solid fa-user" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="chart_container">
            <div class="card_content">
              <div class="chart1">
              <span>NUMBER OF PATIENTS</span>
                <select name="filter" id="filter">
                  <option value="Monthly">Monthly</option>
                  <option value="Yearly">Yearly</option>
                </select>
              <canvas id="myChart" style="width:80%; max-width:550px; height: 130px; padding-top: 15px;"></canvas>
            </div>
            </div>
            <div class="card_content">
              <div class="chart2">
              <select name="filter" id="filter">
                  <option value="Year Level">Year Level</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
              </select>
              <canvas id="myChart2" style="width:70%; max-width:500px; height: 110px; padding-left: 5px; padding-top: 15px"></canvas>
            </div>
            </div>
          </div>
          <div class="nurses_details">
            <span class="title">NURSES TODAY</span>
            <table>

            <?php if(mysqli_num_rows($fetchAllNursesToday) > 0) { 
                while ($todayNurses = mysqli_fetch_assoc($fetchAllNursesToday)) {  ?>

            <tr class="container">
              <td class="number"><span><?=$todayNurses['emp_id']?></span></td>
              <td class="name"><img src="./assets/<?=$todayNurses['profile_pic']?>"/><span class="name"><?=$todayNurses['firstname']?> <?=$todayNurses['lastname']?></span></td>
              <td><span class="type"><?=$todayNurses['position']?></span></td>
              <td><span class="date"><?=$todayNurses['schedule']?></span></td>
                <td class="class">
                  <span>Chat Now</span>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </td>
            </tr>

            <?php } } ?>

            </table>
          </div>
        </section>



        <!-- ADMINS PAGE -->
        <section id="admins" class="admins so_content" data-tab-content>
          <div class="admins_header d-flex justify-content-between">
            <h3 class="m-0">ADMINS</h3>
            <button class="custom_btn">
              <a href="#addAdminModal" class="custom_btn" data-toggle="modal"><i class="fa fa-user-md"></i>Add Admin</a>
            </button>
          </div>
          <div class="filter_wrapper">
            <div class="sort flex-grow-1">
              <span>Sort by</span>
              <select name="filter" id="filter">
                <option value="Surname">Surname</option>
                <option value="Firstname">Firstname</option>
              </select>
            </div>
            <div class="r">
              <div class="search">
                <input type="text" placeholder="Search" />
              </div>
              <div class="grid">
                <i class="fa fa-th-large" aria-hidden="true"></i>
              </div>
              <div class="bars">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="admins_table_details" >
            <table>
              <tr>
                <th>Image </th>
                <th> Admin ID</th>
                <th> Name<sub>Firstname Surname</th>
                <th> Email Address</th>
                <th> Status</th>
                <th><span>Action</span></th>
              </tr>
              

              <?php if(mysqli_num_rows($fetchAddAdmins) > 0) { 
                while ($addAdmins = mysqli_fetch_assoc($fetchAddAdmins)) {  ?>


              <tr class="container">
                <td><img src="./assets/<?=$addAdmins['img']?>"/></td>
                <td><span class="unique_id"><?=$addAdmins['unique_id']?></span></td>
                <td><span class="name"><?=$addAdmins['fname']?> <?=$addAdmins['lname']?></span></td>
                <td><span class="email"><?=$addAdmins['email']?></span></td>
                <td><span class="status"><?=$addAdmins['status']?></span></td>
                <td>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                </td>
              </tr>
              <?php } } ?>

              
            </table>
          </div>
          <div></div>


<!-- Add New Admin Modal -->
<div id="addAdminModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="adminDashboard.php">
					<div class="modal-header">						
						<h4 class="modal-title">ADD NEW ADMIN</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
          <label><b>Basic Information</b></label> <br>
            <div class="form-group">
							<label>Admin ID</label> 
							<input type="text" class="form-control" name="unique_id" required>
            </div>	
            <div class="form-group">
							<label>Email Address</label> 
							<input type="text" class="form-control" name="email" required>
            </div>	
            <div class="form-group">
							<label>Password</label> 
							<input type="text" class="form-control" name="password" required>
            </div>	
            <div class="form-group">
							<label>Firstname</label> 
							<input type="text" class="form-control" name="fname" required>
            </div>				
						<div class="form-group">
							<label>Lastname</label>
							<input type="text" class="form-control" name="lname" required>
						</div>
            <div class="form-group">
							<label>Status</label>
							<input type="text" class="form-control" name="status" required>
						</div>	
  

            <div class="form-group">
              <center><label>Upload Image</label>
							<input type="file" class="form-control" name="img" required></center>
						</div>	
            
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="addAdmin" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>




        <!-- STUDENTS PAGE -->
        <section id="students" class="students so_content" data-tab-content>
          <div class="student_header d-flex justify-content-between">
            <h3 class="m-0">STUDENTS</h3>
          </div>
          <div class="filter_wrapper">
            <div class="sort flex-grow-1">
              <span>Sort by</span>
              <select name="filter" id="filter">
                <option value="Surname">Surname</option>
                <option value="Firstname">Firstname</option>
              </select>
            </div>
            <div class="r">
              <div class="search">
                <input type="text" placeholder="Search" />
              </div>
              <div class="grid">
                <i class="fa fa-th-large" aria-hidden="true"></i>
              </div>
              <div class="bars">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="stud_table_details" >
            <table>
              <tr>
                <th>1×1</th>
                <th>Student ID</th>
                <th>Fullname<sub>Surname, Firstname Middlename</th>
                <th>Course</th>
                <th>Year Level</th>
                <th>Status</th>
                <th><span>Action</span></th>
              </tr>
              

              <?php if(mysqli_num_rows($fetchAllStudents) > 0) { 
                while ($students = mysqli_fetch_assoc($fetchAllStudents)) {  ?>


              <tr class="container">
                <td><img src="./assets/<?=$students['image']?>"/></td>
                <td><span class="stud_id"><?=$students['student_id']?></span></td>
                <td><span class="name"><?=$students['lastname']?>, <?=$students['firstname']?> <?=$students['middlename']?></span></td>
                <td><span class="course"><?=$students['course']?></span></td>
                <td><span class="year"><?=$students['year_level']?></span></td>
                <td><span class="status"><?=$students['Remarks']?></span></td>
                <td>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </td>
              </tr>
              <?php } } ?>

              
            </table>
          </div>
          <div></div>
        </section>


        <!-- NURSES PAGE -->
        <section id="nurses" class="nurses so_content" data-tab-content>
          <div class="nurse_header d-flex justify-content-between">
            <h3 class="m-0">NURSES</h3>
            <button class="custom_btn">
              <a href="#addNurseModal" class="custom_btn" data-toggle="modal"><i class="fa fa-user-md"></i>Add Nurses</a>
            </button>
          </div>
          <div class="filter_wrapper">
            <div class="sort flex-grow-1">
              <span>Sort by</span>
              <select name="filter" id="filter">
                <option value="Surname">Surname</option>
                <option value="Firstname">Firstname</option>
              </select>
            </div>
            <div class="r">
              <div class="search">
                <input type="text" placeholder="Search" />
              </div>
              <div class="grid">
                <i class="fa fa-th-large" aria-hidden="true"></i>
              </div>
              <div class="bars">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="card_container">

          <?php if(mysqli_num_rows($fetchAllNurses) > 0) { 
                while ($nurses = mysqli_fetch_assoc($fetchAllNurses)) {  ?>

            <div class="card">
              <img src="./assets/<?=$nurses['profile_pic']?>" alt="" />
              <div class="card_content">
                <span class="stud_id"><?=$nurses['emp_id']?></span>
                <span class="name"><?=$nurses['firstname']?> <?=$nurses['lastname']?></span>
                <span class="nurse"><?=$nurses['position']?></span>
                <div class="card_footer">
                  <span class="date"><?=$nurses['schedule']?></span>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </div>
              </div>
            </div>

            <?php } } ?>

          </div>


<!-- Add New Nurse Modal -->
<div id="addNurseModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="adminDashboard.php">
					<div class="modal-header">						
						<h4 class="modal-title">ADD NEW NURSE</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
          <label><b>Basic Information</b></label> <br>
            <div class="form-group">
							<label>Employee ID</label> 
							<input type="text" class="form-control" name="emp_id" required>
            </div>	
            <div class="form-group">
							<label>Username</label> 
							<input type="text" class="form-control" name="username" required>
            </div>	
            <div class="form-group">
							<label>Password</label> 
							<input type="text" class="form-control" name="password" required>
            </div>	
            <div class="form-group">
							<label>Firstname</label> 
							<input type="text" class="form-control" name="firstname" required>
            </div>				
						<div class="form-group">
							<label>Middlename (Optional)</label> 
							<input type="text" class="form-control" name="middlename">
            </div>
						<div class="form-group">
							<label>Surname</label>
							<input type="text" class="form-control" name="lastname" required>
						</div>
						<div class="form-group">
							<label>Birthdate</label>
							<input type="date" class="form-control" name="birthdate" required>
						</div>
								
            <div class="form-group">
							<label>Gender</label>
							<input type="text" class="form-control" name="gender" required>
						</div>	
            <div class="form-group">
							<label>Position</label>
							<input type="text" class="form-control" name="position" required>
						</div>	
            <div class="form-group">
							<label>Schedule</label>
							<input type="text" class="form-control" name="schedule" required>
						</div>	
          
            <div class="form-group">
							<label>Email Address</label>
							<input type="email" class="form-control" name="email" required>
						</div>	
            <div class="form-group">
							<label>Contact Number</label>
							<input type="text" class="form-control" name="contact_num" required>
						</div>

            <div class="form-group">
              <center><label>Upload Image</label>
							<input type="file" class="form-control" name="profile_pic" required></center>
						</div>	
            
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="addnew" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



        <!-- MESSAGES PAGE -->
        <section id="messages" class="messages so_content" data-tab-content>
          <div class="row1">
            <div class="column1">

            <h3 class="m-0">MESSAGES</h3>
             <input type="text" class="msgsearch" placeholder="Search">
             
             <div class="stdmsg">
              <img src="./assets/nurse.jpg" alt="" id="stdimage">
              <p class="datetime">11/10/2022 - 5:06PM</p>
              <p class="std-name">Clarissa Calubaquib (Student - 4th year)</p>
              <p class="message-content">Good morning po, hindi po ako makakapasok.</p>
             </div>

             <div class="stdmsg">
              <img src="./assets/nurse.jpg" alt="" id="stdimage">
              <p class="datetime">11/10/2022 - 5:06PM</p>
              <p class="std-name">Jessica Bulleque (Student - 4th year)</p>
              <p class="message-content">Good morning po, hindi po ako makakapasok.</p>
             </div>

             <div class="stdmsg">
              <img src="./assets/nurse.jpg" alt="" id="stdimage">
              <p class="datetime">11/10/2022 - 5:06PM</p>
              <p class="std-name">Kenneth Nunag (Student - 4th year)</p>
              <p class="message-content">Di po ako papasok masama po kasi ako.</p>
             </div>
            </div>


            
            <div class="column2">
             <h5 class="stdname">Juan Dela Cruz (Student-4th year)</h5>
             <div class="stdchat">
              <img src="./assets/nurse.jpg" alt="" id="stdimg"> 
              <input type="text" class="chatbg" value="Hi" readonly>
             
            </div>
            <input type="text" class="msgreply" placeholder="Type Here">
            </div>
            
          </div>
      </section>


      <!-- REPORTS PAGE -->
      <section id="reports" class="reports so_content" data-tab-content>
      <h3 class="m-0">REPORTS</h3>
        <div class="headerpatients">
          <span class="headerpatients1">NUMBER OF PATIENTS</span>
                <select name="filter" class="reportfilter">
                  <option value="Monthly">Monthly</option>
                  <option value="Yearly">Yearly</option>
                </select>
              <div class="reportchart">
                <canvas id="lineChart" style="width:800px; height: 300px; padding-top: 15px;"></canvas>
              </div>
        </div>
      
        <div class="tbl_report">
          <table class="report-tbl">

            <tr>
              <th>ID</th>
              <th>Nurse Name</th>
              <th>Consultation</th>
              <th>Patients</th>
              <th>Status</th>
              <th>Date & Time</th>
            <tr><td colspan="6"></td></tr>
            </tr>

            <?php if(mysqli_num_rows($fetchAllReports) > 0) { 
                while ($reports = mysqli_fetch_assoc($fetchAllReports)) {  ?>


            <tr style="padding-bottom:1em;"> 
              <td><?=$reports['data_id']?></td>
              <td><?=$reports['nurse_name']?></td>
              <td><?=$reports['consultation']?></td>
              <td><?=$reports['patient_name']?></td>
              <td class="complete"><?=$reports['status']?></td>
              <td><?=$reports['date']?> - <?=$reports['time']?></td>
            <tr><td class="colsp" colspan="6"></td></tr>
            </tr>

            <?php } } ?>

           
          
          </table>
      </div>
          
          <button onClick="window.print()" class="reportbtn">Print</button>
          <br><br>
      </section>



      <!-- ARCHIVES PAGE -->
      <section id="archives" class="archives so_content" data-tab-content>  
        <div class="archives_header d-flex justify-content-between">
          <h3 class="m-0">Archive</h3>
        </div>
        <div class="container">
          <div class="filter_wrapper">
            <div class="sort flex-grow-1">
              <span>Sort by</span>
              <select name="filter" id="filter">
                <option value="Surname">Surname</option>
                <option value="Firstname">Firstname</option>
              </select>
            </div>
            <div class="r">
              <div class="search">
                <input type="text" placeholder="Search" />
              </div>
              <div class="scan">
                <button>Scan QR</button>
              </div>
            </div>
          </div>

          <h3 class="hh">Recent</h3>  
          <div class="archives-content">
            <table class="archives-table">
                <tr>
                  <th>Image</th>
                  <th>ID Number</th>
                  <th>Fullname<sub>Surname, Firstname Middlename</th>
                  <th>Position</th>
                  <th>Reason</th>
                  <th>Date</th>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/badang.JPG"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/nurse.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>
                
                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>

                <tr class="archives-info">
                  <td><img src="./assets/biogesic.jpg"></td>
                  <td>15-2323</td>
                  <td>Analos, Miguel Santos</td>
                  <td>Student</td>
                  <td>Graudated</td>
                  <td>July 29,2019</td>
                </tr>
            </table>
          </div>
        </div>
      </section>
<!-- E N D  A R C H I V E -->



      <!-- MEDICINE PAGE -->


      <section id="medicine" class="medicine so_content" data-tab-content>
          <div class="medicine_header d-flex justify-content-between">
            <h3 class="m-0">MEDICINE</h3>
              <button class="custom_btn">
						    <a href="#addMedicineModal" class="custom_btn" data-toggle="modal"><i class="fa fa-user-md"></i>Add Medicine</a>
              </button>
          </div>

        <div class="filter_wrapper">
          <div class="sort flex-grow-1">
            <span>Sort by</span>
            <select name="filter" id="filter">  
              <option value="Date Manufactured">Date Manufactured</option>
              <option value="Date Expiration">Date Expiration</option>
              <option value="Quantity">Quantity</option>
            </select>
          </div>
        <div class="r">
            <div class="search">
              <input type="text" placeholder="Search" />
            </div>
            <div class="grid">
              <i class="fa fa-th-large" aria-hidden="true"></i>
            </div>
            <div class="bars">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
      </div>


<!-- Add New Medicine Modal -->
<div id="addMedicineModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="adminDashboard.php">
					<div class="modal-header">						
						<h4 class="modal-title">ADD MEDICINE TO INVENTORY</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
          <div class="form-group">
							<label>Product ID</label> 
							<input type="text" class="form-control" name="prod_id" required>
            </div>				
						<div class="form-group">
							<label>Medicine Name</label> 
							<input type="text" class="form-control" name="name" required>
            </div>
						<div class="form-group">
							<label>Brand</label>
							<input type="text" class="form-control" name="brand" required>
						</div>
						<div class="form-group">
							<label>Stocks</label>
							<input type="text" class="form-control" name="num_stocks" required></input>
						</div>
						<div class="form-group">
							<label>Expiration Date</label>
							<input type="date" class="form-control" name="expirationDate" required>
						</div>		
            <div class="form-group">
							<label>Generic Name</label>
							<input type="text" class="form-control" name="genericName" required>
						</div>	
            <div class="form-group">
							<label>Date Manufactured</label>
							<input type="date" class="form-control" name="date_manufactured" required>
						</div>	
            <div class="form-group">
							<label>Product Condition</label>
							<input type="text" class="form-control" name="prodCondition" required>
						</div>	
            <div class="form-group">
							<label>Storage</label>
							<input type="text" class="form-control" name="storage" required>
						</div>	
            <div class="form-group">
							<label>Box ID</label>
							<input type="text" class="form-control" name="box_id" required>
						</div>	
            <div class="form-group">
							<label>Manufacturer's Company</label>
							<input type="text" class="form-control" name="manufacturerName" required>
						</div>	
            <!-- <div class="form-group"> -->
							<!-- <label>Email Address</label> -->
							<!-- <input type="text" class="form-control" name="phone" required> -->
						<!-- </div>	 -->
            <div class="form-group">
							<label>Contact Number</label>
							<input type="text" class="form-control" name="contact_info" required>
						</div>	
            <div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="description" required></textarea>
						</div>	

            <div class="form-group">
              <center><label>Upload Product Image</label>
							<input type="file" class="form-control" name="image" required></center>
						</div>	
            
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

<!-- Medicine list  -->
<div>
  <ul class="accordion">

    <?php if(mysqli_num_rows($fetchAllMedicine) > 0) { 
                while ($med = mysqli_fetch_assoc($fetchAllMedicine)) {  ?>


    <li>
        <input type="radio" name="accordion" id="first" checked>
        <label for="first">
          <div class="medicine-table">
            <table class="table-mdc">
              <tbody>
                <tr class="mdc-header">
                  <td style="width:120px;"><img src="./assets/<?=$med['image']?>" width="150px" height="130px"> </td>
                  <td style="width:200px;" >
                    <table>
                      <td class="b1"><?=$med['name']?></td>
                      <tr>
                      <td class="mdc-brand">Brand: <?=$med['brand']?></td>
                      <tr>
                      <td><?=$med['prod_id']?></td>
                    </table>
                  </td>
            
                  <td>
                    <span class="mdc-stock">In stock: </span>
                    <span class="mdc-qty"><?=$med['num_stocks']?></span>
                  </td>
                    
          
                  
                  <td style="width:280px;"><b>Expiration Date:</b> <?=$med['expirationDate']?></td>
                  <td><img src="./assets/<?=$med['prod_qrcode']?>" class="mdc-qrcode"></td>
                  <td><img src="./assets/caret-down-solid.svg" class="mdc-dropdown-icon"></td>
                  
                </tr>
                </tbody>
                </table>
                </div>
        </label>
        <div class="content">
            <h5>Description</h5>
            <p style="font-size: 13px;" class="mdc-description"><?=$med['description']?></p>
            <div>
              <table class="medicine-table">
              <tbody class="collapse-content">
              <tr>
                <td><h5>Generic name:</h5><p style="font-size: 14px;"> <?=$med['genericName']?></p></td>
                <td><h5>Date Manufactured:</h5><p style="font-size: 14px;"> <?=$med['date_manufactured']?></p></td>
                <td><h5>Product Condition</h5><p style="font-size: 14px;"><?=$med['prodCondition']?></p></td>
              </tr>
              <tr>
                <td><h5>Storage: </h4><?=$med['storage']?></td>
                <td><h5>Box ID: </h4><?=$med['box_id']?></td>
                <td><h5>Manufacturer's Name: </h5><p style="font-size: 14px;"> <?=$med['manufacturerName']?></p></td>
                <td><h5>Contact Information: </h5><p style="font-size: 14px;"> <?=$med['contact_info']?></p></td>
              </tr>
            </tbody>
            </table>
          </div>
        </div>
    </li>

    <?php } } ?>


    
</ul>
</div>
      </section>
<!-- E N D  M E D I C I N E -->


      </div>
    </div>
    <!-- custom js -->
    <script src="./js/app.js"></script>
    <script src="./js/status_color.js"></script>
    <script src="./js/line_graph.js"></script>
    <script src="./js/circle_graph.js"></script>

    <!-- bootstrap js -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/reportchart.js"></script>
    <script src="./js/modalSample.js"></script>

    <script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#message').hide();
            },3000);
        });
    </script>
    
  </body>

</html>


<?php 
// LOGOUT
}else{
     header("Location: index.php");
     exit();
}
 ?>