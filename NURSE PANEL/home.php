<?php 
// LOGIN
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {

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
          <li id="account_btn" class="px-4 w-100 mb-1 nav-item tab">
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
        <img src="./assets/badang.jpg" alt="" />
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
                <a
                  class="nav-link modal-trigger text-light"
                  data-toggle="modal"
                  data-target="#loginmodal"
                  href="logout.php"
                  >Logout</a
                >
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
      <div class="content_wrapper">
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
            </div>
        </div>
        <!-- nurse_acctount otp modal-->
        <div class="confirmation_modal">
          <div class="confirmation">
            <h3>We have a confirmation of changes to the admin</h3>
            <span>waiting to approve</span>
          </div>
        </div>


        <!-- dashboard -->
        <section
          id="dashboard"
          class="dashboard so_content so_active"
          data-tab-content
        >
          dashboard
        </section>

        <!-- student -->
        <section id="students" class="students so_content" data-tab-content>
          studens
        </section>
      
        <!-- nurses -->
        <section id="nurses" class="nurses so_content" data-tab-content>
          <!-- nurse dashboard -->
          <div class="nurse_landing">
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

          </div>
          <!-- add nurse -->
          <div class="add_nurse_section">
            <div class="wrap_add_nurse">
              <div class="l_nurse">
                <div class="a_n_title">
                  <h3>ADD NEW NURSE</h3>
                  <p><span class="note_color">Note:</span>Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <!-- nurse information -->
                <div class="basic_info">
                  <h3>Basic Information</h3>
                  <div class="info_and_id_wrap">
                    <form action="" class="basic_info_input">
                      <div class="b_i_input">
                        <span>Firstname*</span>
                        <input type="text">
                      </div>
                      <div class="b_i_input">
                        <span>Middlename</span>
                        <input type="text">
                      </div>
                      <div class="b_i_input surname">
                        <span>Surname*</span>
                        <input type="text">
                      </div>
                      <div class="b_i_input">
                        <span>Birthdate*</span>
                        <input type="date">
                      </div>
                      <div class="b_i_input radio">
                        <span>Gender*</span>
                        <div class="radio_wrap">
                          <input  name="male" id="Male" type="radio">
                          <label for="Male">Male</label>
                        </div>
                        <div class="radio_wrap">
                          <input name="female" id="Female" type="radio">
                          <label for="Female">Female</label>
                        </div>
                        <div name="other" class="radio_wrap">
                          <input id="Other" type="radio">
                          <label for="Other">Other</label>
                        </div>
                      </div>
                    </form>
                    <div class="nurse_id_wrapper">
                      <img src="./assets/badang.JPG" alt="">
                      <input type="file" id="files" class="hidden"/>
                      <label for="files">Attached Img</label>
                    </div>

                  </div>
                </div>
                <div class="contact_information">
                  <h3>Contact Information</h3>
                </div>
                <div class="emergency">
                  <h3>In Case of Emergency</h3>
                </div>
                <div class="attached_files">
                  <h3>Attached Files</h3>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  
                </div>
                <div class="set_schedule">
                  <h3>Set Schedule</h3>
                  <div class="schedule_wrapper">
                    <div data-target="tabs" class="tab">Monday</div>
                    <div data-target="tabs" class="tab">Tuesday</div>
                    <div data-target="tabs" class="tab">Wednesday</div>
                    <div data-target="tabs" class="tab">Thursday</div>
                    <div data-target="tabs" class="tab">Friday</div>
                    <div data-target="tabs" class="tab">Saturday</div>
                  </div>
                </div>
                <div class="add_nurse_btn">
                    <button class="btn cancel">Cancel</button>
                    <button class="btn add">Add Nurse</button>
                </div>

                <span class="border_px"></span>
              </div>
              <div class="l_nurse_id">
                <div class="title">
                  ID
                </div>
                <div class="id_box">
                  <div class="id_pic">

                  </div>
                  <div class="print_wrapper">
                    <button class="download">Download</button>
                    <button class="print">print</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- view nurse edit and create -->
          <div class="add_nurse_section nurse_info_section">
            <div class="wrap_add_nurse">
              <div class="l_nurse info">
                <div class="a_n_title">
                  <h3>Manage Nurse</h3>
                  <div class="edit_delete_btn d-flex">
                    <button class="remove">Remove</button>
                    <button class="edit">Edit</button>
                  </div>
                </div>
                <!-- nurse information -->
                <div class="basic_info">
                  <span class="number_nurse">22-0001</span>
                  <h4>JESSICA OMBAO BULLEQUE</h4>
                  <span>Female</span>
                  <span>06/08/2001</span>
                  <div class="sched">
                    <div>Schedule: </div>
                    <div class="day">Mon</div>
                    <div class="day">Tue</div>
                  </div>
                </div>
                <div class="contact_information">
                  <h3>Contact Information</h3>
                </div>
                <div class="emergency">
                  <h3>In Case of Emergency</h3>
                </div>
                <div class="attached_files">
                  <h3>Attached Files</h3>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  <div class="submission">
                    <span>Filename</span>
                    <span>Date of submission</span>
                    <div class="file">
                      <input type="file" id="files_att" class="hidden">
                      <label for="files_att">Attached Img</label>
                    </div>
                  </div>
                  
                </div>
              
                <span class="border_px"></span>
              </div>
              <div class="l_nurse_id">
                <div class="title">
                  ID
                </div>
                <div class="id_box">
                  <div class="id_pic">

                  </div>
                  <div class="print_wrapper">
                    <button class="download">Download</button>
                    <button class="print">print</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="delete_nurse_modal">
            <div class="delete_card">
              <div class="remove_trash">
                <i class="fa fa-trash" aria-hidden="true"></i>

              </div>
              <h3>ARE YOU SURE YOU WANT TO DELETE THIS NURSE?</h3>
              <span class="nurse_id">22-0001</span>
              <div class="button_wrap">
                <button>NO, I DONT</button>
                <button>YES, I WANT</button>
              </div>
              <i id="down" class="fa fa-chevron-circle-down" aria-hidden="true"></i>
              <p>Why do you want to remove this nurse</p>
              <select name="cars" id="cars">
                <option value="volvo">Retired</option>
                <option value="Issue">Issue</option>
              </select>
            </div>
          </div>
        </section>

        <!-- message -->
        <section id="messages" class="messages so_content" data-tab-content>
          message
        </section>

        <!-- reports -->
        <section id="reports" class="reports so_content" data-tab-content>
          reports
        </section>


        <!-- medicine -->
        <section id="medicine" class="medicine so_content" data-tab-content>
          medicine
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
  </body>
</html>




<?php 
// LOGOUT
}else{
     header("Location: index.php");
     exit();
}
 ?> 