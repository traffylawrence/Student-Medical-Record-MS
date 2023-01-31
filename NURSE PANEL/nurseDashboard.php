<?php 
// LOGIN
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

?>

<?php
     include_once 'insert_data.php';
      include('db_conn.php');
     
      // SELECT ALL NURSES 
      $fetchAllNurses = mysqli_query($conn, "SELECT * FROM `nurses`");

      // SELECT ALL MEDICINE 
      $fetchAllMedicine = mysqli_query($conn, "SELECT * FROM `medicine`");

      // SELECT ALL REPORTS 
      $fetchAllReports = mysqli_query($conn, "SELECT * FROM `reports`");


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NURSE | CLINIC MS</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./css/NurseTab.css" />
    <link rel="stylesheet" href="./css/medicine.css" />
    <link rel="stylesheet" href="./css/reportchart.css"/>
    <link rel="stylesheet" href="./css/messagetab.css"/>
    <link rel="stylesheet" href="./css/patients.css" />
    <link rel="stylesheet" href="./css/home.css" />

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

        <ul class="mt-2 list-unstyled navbar-nav ps-0">
          <li
            data-tab-target="#dashboard"
            class="mt-3 px-4 w-100 mb-1 nav-item so_active tab"
          >
            <i class="fa fa-area-chart"></i>
            <a class="nav-link align-items-center"> Home </a>
          </li>
          <li data-tab-target="#patient" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-users"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Patients
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
          <li data-tab-target="#medicine" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-medkit" aria-hidden="true"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Medicines
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
          <li data-tab-target="#account" id="account_btn" class="px-4 w-100 mb-1 nav-item tab">
            <i class="fa fa-user-o" aria-hidden="true"></i>
            <div
              class="nav-link align-items-center"
              data-bs-toggle="collapse"
              data-bs-target="#home-collapse"
              aria-expanded="true"
            >
              Account
            </div>
          </li>
        </ul>
      </nav>
      <nav
        id="navigation"
        class="mynav px-3 navbar navbar-expand navbar-dark"
        style="z-index: 1"
      >
      <div class="logo navbar-brand m-0" href="#">
        <img src="./assets/QCUClinicLogo.png" alt="" />
        QCU Clinic
      </div>
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
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>

      <div class="content_wrapper">
      

        <!-- HOME PAGE -->
        <section id="dashboard" class="dashboard so_content so_active" data-tab-content>

          <div class="card_container">
            <div class="card">
              <div class="icon">
                <img src="./assets/nurse4.png"/>
              </div>
              <div class="card_content">
                <span class="number">220001</span>
                <span class="name">Jessica O. Bulleque</span>
                <span class="position">Position</span>
              </div>
              <div class="card_content_consultation">
                <span class="number">20</span>
                <span class="text">Consult Today</span>
              </div>
            </div>
          </div>

          <div class="left_container">
            <div class="calendar_card">
              <div class="month">
                <span class="time">3:33 AM</span><br>
                <span class="cal_month">August 2022</span>
              </div>
              <ul class="weekdays">
                <li>Sun</li>
                <li>Mon</li>
                <li>Tue</li>
                <li>Wed</li>
                <li>Thu</li>
                <li>Fri</li>
                <li>Sat</li>
              </ul>
              <ul class="days">
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li>9</li>
                <li>10</li>
                <li>11</li>
                <li>12</li>
                <li>13</li>
                <li>14</li>
                <li>15</li>
                <li>16</li>
                <li>17</li>
                <li>18</li>
                <li>19</li>
                <li>20</li>
                <li>21</li>
                <li>22</li>
                <li>23</li>
                <li>24</li>
                <li>25</li>
                <li>26</li>
                <li>27</li>
                <li>28</li>
                <li>29</li>
                <li>30</li>
              </ul>
            </div>
            <div class="logs_card">
              <div class="title">
                <span>Active Logs</span>
              </div>
              <div class="content">
                <span> Add New Patient Student 160123 </span>
              </div>
            </div>
            <div class="messages"> 
              <div class="row1">
                <div class="column1">
                  <span>Messages</span>
             
                  <div class="stdmsg">
                    <img src="./assets/nurse.jpg" alt="" id="stdimage">
                    <p class="message-content">Hi.</p>
                  </div>
                  <div class="stdmsg">
                    
                  </div>
                  <div class="stdmsg">
                    
                  </div>
                 </div>
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
          </div>

          <div class="action_details">
             <div class="row1">
                <div class="column1">
                  <span class="title">Quick Action</span>
                    <div class="container">
                      <span class="name">Fullname</span>
                      <span class="type">Appointment</span>
                      <span class="view">View</span>
                    </div>
                    <div class="container">
                      <span class="name">Fullname</span>
                      <span class="type">Enroll</span>
                      <span class="view">View</span>
                    </div>
                  </div>
             </div>
          </div>
        </section>



        <!-- PATIENTS -->
           
             <section id="patient" class="patient so_content" data-tab-content>
          <div class="fright">
            <div class="container mt-5">
              <button class="btn btn-primary" type="button" data-bs-target="#myModal" data-bs-toggle="modal">Add New Patient</button>
              <div class="modal" id="myModal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header text-white">
                            <input class="srch-bar" placeholder="Search Patient">
                              <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                          </div>
                          <div class="modal-body">
                            <hr>
                          </div>
                          <div class="modal-footer">
                              <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#secondModal" data-bs-dismiss="modal">Scan QR</button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal" id="secondModal">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header alert alert-success" style="background-color: white;">
                            <table class="ndmodal-table">
                                <tr>
                                  <th>Upload Image</th>
                                  <th>Capture Image</th>
                                  </tr>
                                </table>
                                  <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                <p>LOGONGQR</p>
                                Scan your QR Here
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur placeat odio officiis at dolorem nam ut in modi quos voluptas quod alias, tenetur fuga veniam ducimus delectus est. Impedit, totam.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam deserunt enim delectus dignissimos accusamus, ab nostrum veritatis esse illo a quisquam. Beatae, est nihil architecto dicta et eos repellat ad.


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
</div>
  


          <div class="filter_wrapper">
            <h3>Patients</h3>
            <div class="sort flex-grow-1">
              <span>Sort by</span>
              <input type="button" value="Recent"> 
            </div>
            
          </div>
          <div class="patient_table_details" >

            <div class="popup" id="popup-1">
              <div class="overlay"></div>
                <div class="content">
                  <div class="closebtn" onclick="togglePopup()">&times;
                  </div>
<!--View patient Details-->
<div class="patients-head">
<img src="./assets/nurse3.jpg">
                     <h4>22-001</h4>
                     <h6>Jessica O Bulleque</h6>
                     <p>Bachelor of Science in Information and Technology (BSIT)</p>
                     <p>jessice.ombao.bulleque@gmail.com</p>
                  <hr>
                  <h5>Emergency Contact</h5>
                  <div class="emergency-cont">
                    <br><br><br><br><br>
                    <hr>
                </div>
                
                <button class="consult-btn">New Consultation</button>

                
                <h5>Recent Consultation</h5>
                <div class="consul-patient">
                  <br><br>
<p class="no-rec">No Records</p>
<br><br>
<hr>
<h5>Medical History</h5>
<div class="consul-patient">
  <br><br>
<p class="no-rec">No Records</p>
<br><br>
<hr>
<h5>Medical Requirements</h5>
<table class="medreq-tbl">
  <tr>
  <td>Complete Blood Count (CBC)</td>
  <td class="patient-passed">Passed</td>
  <td>img</td>
  </tr>
  <tr>
    <td>Urinalysis</td>
    <td class="patient-passed">Passed</td>
    <td>img</td>
  </tr>
  <tr>
    <td>Chess X-Ray</td>
    <td class="patient-passed">passed</td>
    <td>img</td>
  </tr>
  <tr>
    <td>Medical Certificate</td>
    <td class="patient-inc">Incomplete</td>
    <td>Attach Image</td>
  </tr>
</table>

              </div>



              </div>


                </div>
              </div>



            <table>
             
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
              <tr class="container">
                <!--Patient info-->
                <td style="background-color: #5d8df9;"><span class="patient_id">17-1499</span></td>
                <td><img src="./assets/badang.jpg"/></td>
                <td><span class="name">Bulleque, Jessica Ombao</span></td>
                <td><span class="course">BSIT</span></td>
                <td><span class="year">4th Year</span></td>
                <td><span class="email">randomemailgenerator@gmail.com</span></td>
                <td><span class="status">Status</span></td>
                <td><button class="addpatient-btn" onclick="togglePopup()">View</button>  </td>

                
              </tr>
            


            </table>
            
           
            <div class="pagination">
              <a href="#">&laquo;</a>
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">6</a>
              <a href="#">&raquo;</a>
            </div>
            
          </div>
         
         
          
          
        </section>

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
            <div class="card">
              <img src="./assets/badang.jpg" alt="" />
              <div class="card_content">
                <span class="stud_id">17-1499</span>
                <span class="name">Jessica Bulleque</span>
                <span class="nurse">Nurse</span>
                <div class="card_footer">
                  <span class="date">M/W/F</span>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="./assets/nurse.jpg" alt="" />
              <div class="card_content">
                <span class="stud_id">17-1499</span>
                <span class="name">Jessica Bulleque</span>
                <span class="nurse">Nurse</span>
                <div class="card_footer">
                  <span class="date">M/W/F</span>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="./assets/nurse2.jpg" alt="" />
              <div class="card_content">
                <span class="stud_id">17-1499</span>
                <span class="name">Jessica Bulleque</span>
                <span class="nurse">Nurse</span>
                <div class="card_footer">
                  <span class="date">M/W/F</span>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="./assets/nurse3.jpg" alt="" />
              <div class="card_content">
                <span class="stud_id">17-1499</span>
                <span class="name">Jessica Bulleque</span>
                <span class="nurse">Nurse</span>
                <div class="card_footer">
                  <span class="date">M/W/F</span>
                  <i class="fa fa-info-circle" aria-hidden="true"></i>
                  <i class="fa fa-commenting" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </section>

      

         <!-- MESSAGES -->
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



        <!-- MEDICINES -->
        <section id="medicine" class="medicine so_content" data-tab-content>
          <div class="medicine_landing">
            <div class="medicine_header d-flex justify-content-between">
              <h3 class="m-0">MEDICINES</h3>
            </div>
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

        

  <!-- REPORTS -->
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



        <!-- ACCOUNT -->
        <section id="account" class="account so_content" data-tab-content>
          <div class="account_landing">
            <div class="account_header d-flex justify-content-between">
             
               <!-- nurse account section clicking my account  -->
          <div class="nurse_account_section">
            <h3>MANAGE MY ACCOUNT</h3>

            <div class="form_wrapper">

              <div class="profile_picture">
                <img src="./assets/badang.JPG" alt="">
                <div class="edit_icon"></div>
              </div>

              <div class="border">
                <span></span>
              </div>

              <form action="" class="l_form form">
                  <h4>Change Email</h4>
                  <div class="input_wrap">
                    <span>Old Email</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>New Email</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>Confirm Email</span>
                    <input type="text">
                  </div>
                  <button id="changeEmail" class="change">Change</button>
                  <span class="note"><span class="note_color">Note:</span>  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet</span>
              </form>

              <form action="" class="l_form form">
                  <h4>Change Password</h4>
                  <div class="input_wrap">
                    <span>Old Password</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>New Password</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>Confirm Password</span>
                    <input type="text">
                  </div>
                  <button id="changePass" class="change">Change</button>
                  <span class="note"><span class="note_color">Note:</span>  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet</span>
              </form>

            </div>
        </div>


        <!-- nurse_acctount otp modal-->
        <div class="confirmation_modal">
          <div class="confirmation">
            <h3>We have a confirmation of changes to the admin?</h3>
            <span>Waiting to approve...</span>
          </div>
        </div>

            </div>
          </div><br><br>
        </section> 

      </div>
    </div>
    <!-- custom js -->
    <script src="./js/app.js"></script>

    <!-- bootstrap js -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/modalSample.js"></script>
    <script src="./js/reportchart.js"></script>
    <script src="./js/line_graph.js"></script>
    <script src="./js/popup.js"></script>
    

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
     header("Location: indexNurse.php");
     exit();
}
 ?> 