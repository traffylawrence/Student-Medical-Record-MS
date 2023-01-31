<?php 
// LOGIN
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

?>

<?php
     include_once 'insert_data.php';
     include('db_conn.php');
     $email = $_SESSION['email'];

     // SELECT ALL ADMINS
     $fetchAllAdmins = mysqli_query($conn, "SELECT * FROM `admins` WHERE email = '$email'");
     $admins = mysqli_fetch_assoc($fetchAllAdmins);
     

     // SELECT ALL STUDENTS 
     $fetchAllStudents = mysqli_query($conn, "SELECT * FROM `students`");
     

     // SELECT ALL NURSES 
     $fetchAllNurses = mysqli_query($conn, "SELECT * FROM `nurses`");
     
     // SELECT ALL MESSAGES 
     $fetchAllMessages = mysqli_query($conn, "SELECT * FROM `messages`");

     // SELECT ALL MESSAGES 
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
    <link rel="stylesheet" href="./css/NurseTab.css" />
    <link rel="stylesheet" href="./css/StudentTab.css" />
    <link rel="stylesheet" href="./css/DashboardTab.css"/>
    <link rel="stylesheet" href="./css/medicine.css"/>
    <link rel="stylesheet" href="./css/messagetab.css"/>
    <link rel="stylesheet" href="./css/reportchart.css"/>

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
          <img src="./assets/QCULogo.png" alt="" />
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
            <tr class="container">
              <td class="number"><span>17-1499</span></td>
              <td class="name"><img src="./assets/nurse.jpg"/><span class="name">Lawrence Tabunan</span></td>
              <td><span class="type">Nurse</span></td>
              <td><span class="date">Mon, Wed, Fri</span></td>
                <td class="class">
                  <span>Chat Now</span>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </td>
            </tr>
            <tr class="container">
              <td class="number"><span class="nurse_id">17-1499</span></td>
              <td class="name"><img src="./assets/nurse.jpg"/><span class="name">Kenneth S. Nunag</span></td>
              <td><span class="type">Nurse</span></td>
              <td><span class="date">Mon, Wed, Fri</span></td>
                <td class="class">
                  <span>Chat Now</span>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </td>
            </tr>
            <tr class="container">
              <td class="number"><span class="nurse_id">17-1499</span></td>
              <td class="name"><img src="./assets/nurse.jpg"/><span class="name">Kiara Carganillo</span></td>
              <td><span class="type">Nurse</span></td>
              <td><span class="date">Mon, Wed, Fri</span></td>
                <td class="class">
                  <span>Chat Now</span>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </td>
            </tr>
            </table>
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
              <i class="fa fa-user-md" aria-hidden="true"></i>
              Add Nurses
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
<tr style="padding-bottom:1em;"> 
<td>C-01</td>
<td>Jessica Bulleque</td>
<td>Consultation</td>
<td>Kenneth Nunag</td>
<td class="complete">Complete</td>
<td>Nov 10 2022 - 6:00pm</td>
<tr><td class="colsp" colspan="6"></td></tr>
</tr>
<tr>
  <td>C-02</td>
  <td>Jessica Bulleque</td>
  <td>Consultation</td>
  <td>Kenneth Nunag</td>
  <td class="pending">Pending</td>
  <td>Nov 10 2022 - 6:00pm</td>
  <tr><td class="colsp" colspan="6"></td></tr>
</tr>
<tr>
    <td>C-03</td>
  <td>Jessica Bulleque</td>
  <td>Consultation</td>
  <td>Kenneth Nunag</td>
  <td class="inc">Incomplete</td>
  <td>Nov 10 2022 - 6:00pm</td>
  <tr><td class="colsp" colspan="6"></td></tr>
</tr>
</table>
</div>
<input class="reportbtn" type="button" value="Print">
      </section>

      <!-- ARCHIVES PAGE -->
      <section id="archives" class="archives so_content" data-tab-content>
      <h3 class="m-0">ARCHIVES</h3>
      </section>


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
				<form method="post" action="home.php">
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