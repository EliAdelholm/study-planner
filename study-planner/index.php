<?php
    session_start();
    $sLoggedIn = "";
    $sLoggedInAdmin = "";
    $sNotLoggedIn = "";

    // DETERMIN INITIAL VIEW
    if( isset( $_SESSION['sUserName'] ) ) {
        if ($_SESSION['sUserRole'] == "user") {
            // SHOW USER DASHBOARD
            $sLoggedIn  = "show";
        } else if ($_SESSION['sUserRole'] == "admin") {
             // SHOW ADMIN DASHBOARD
             $sLoggedInAdmin  = "show";
        }
    } else {
        // show the login page
        $sNotLoggedIn = "show";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap v4 styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    
    <!-- Font awesome styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- System styles -->
    <link rel="stylesheet" href="style.css">

    <title>Study Planner</title>
</head>

<body>

    <!-- NAV FOR NOT LOGGED IN VISITORS -->
    <div id="navLogin" style="margin-bottom: 70px;" class="topNav container-fluid <?php echo $sNotLoggedIn; ?>">
        <div class="navHeader row"></div>
        <div class="navOptions row">
            <div class="navItem btnPage active col-4 col-sm-3 col-md-2 col-lg-1" style="border-left: none;" data-goTo="pageVisitorHome">Home</div>
            <div class="navItem btnPage col-4 col-sm-3 col-md-2 col-lg-1" data-goTo="pageLogin">Log in</div>
            <div class="navItem btnPage col-4 col-sm-3 col-md-2 col-lg-1" data-goTo="pageSignup">Sign up</div>
            <div class="navItem d-none d-sm-block col-sm-3 col-md-6 col-lg-9"></div>
        </div>
    </div>

    <!-- DISPLAY VISITOR LANDING PAGE -->
    <div id="pageVisitorHome" class="page container-fluid <?php echo $sNotLoggedIn; ?>">
            <div class="row justify-content-sm-center">
                <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-lg-4 contentBox">
                    <h2>Study planner</h2><br/>
                    <p>Study planner is your new favourite tool to keep track of your various project.</p>
                    <p>Add projects for your different courses, keep track of deadlines, and enjoy our statistics overview of how you are doing</p>
                    <p>Log in or sign up to get started!</p>
                </div>
            </div>
    </div>

    <!-- DISPLAY LOGIN PAGE -->
    <div id="pageLogin" class="page container-fluid">
        <div class="row justify-content-sm-center">
            <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-lg-4 contentBox">
                <h2>Login</h2>
                <form id="frmLogin">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="txtUserEmail">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtUserPassword" placeholder="Password">
                    </div>
                    <p id="errorMessageLogin" class="text-danger"></p>
                    <button id="btnLogin" type="button" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- DISPLAY SIGNUP PAGE -->
    <div id="pageSignup" class="page container-fluid">
        <div class="row justify-content-sm-center">
            <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-lg-4 contentBox">
                <h2>Sign up</h2>
                <form id="frmSignup">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="txtUserName" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="txtUserEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtUserPassword" placeholder="Set password">
                    </div>
                    <div class="form-group">
                        <label>Profile Picture</label>
                        <input type="file" class="form-control-file" name="fileUserImg">
                    </div>
                    <p id="errorMessageSignup" class="text-danger"></p>
                    <button id="btnSignup" type="button" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>

    <!-- NAV FOR LOGGED IN USERS -->
    <div id="navMain" class="topNav container-fluid <?php echo $sLoggedIn; ?>">
        <div class="navHeader row">
        </div>
        <div class="navOptions row">
            <div class="navItem btnPage active col-4 col-sm-3 col-md-2 col-lg-1" style="border-left: none;" data-goTo="pageUserHome">Home</div>
            <div class="navItem btnPage col-4 col-sm-3 col-md-2 col-lg-1" data-goTo="pageCurrentProjects">Projects</div>
            <div class="navItem btnPage col-4 col-sm-3 col-md-2 col-lg-1" data-goTo="pageArchive">Archive</div>
            <div class="navItem d-none d-sm-block col-sm-3 col-md-6 col-lg-9"></div>
        </div>
    </div>
    
    <!-- DISPLAY USER DASHBOARD -->
    <div id="pageUserHome" class="page container-fluid <?php echo $sLoggedIn; ?>">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnLogout btn btn-primary float-right" style="margin-left: 5px;">Log out</button>
                <button class="btnPage btn btn-primary float-right" style="margin-left: 5px;" data-goto="pageUserOptions">Settings</button>
                <button class="btnPage btn btn-primary float-right" data-goto="pageAddAppointment">New appointment</button>
            </div>
        </div>

        <div class="row">
            <div class="userTimeline col-12">
                <div class="contentBox">
                    <h2 style="display: inline-block;">Timeline</h2>
                    <select id="weekSelect" class="form-control-sm" style="display: inline-block;">
                        <option>Week 40</option>
                        <option>Week 42</option>
                    </select>
                                    
                    <table class="table table-bordered table-responsive table-inverse text-center">
                        <thead>
                            <tr>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                                <th>Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="weekTable">
                                <!-- THIS PART SHOULD BE DYNAMICALLY REPLACED WHEN SHIFTING BETWEEN WEEKS -->
                                <td></td>
                                <td class="bg-danger text-light">2017-10-02<p>Exam project</p></td>
                                <td class="bg-warning text-light">2017-10-02</td>
                                <td>2017-10-02</td>
                                <td>2017-10-02</td>
                                <td>2017-10-02</td>
                                <td>2017-10-02</td>
                                <td class="bg-success text-light">2017-10-02</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="contentBox">
                    <h2 class="text-left">Appointments</h2>
                    <div id="boxAppointments"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- DISPLAY CURRENT PROJECTS -->
    <div id="pageCurrentProjects" class="page container-fluid">
       <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageAddProject">Add Project</button>
            </div>
        </div>
        <div id="boxCurrentProjects" class="row"></div>
    </div>

    <!-- DISPLAY ADD PROJECT FORM -->
    <div id="pageAddProject" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageCurrentProjects">Cancel</button>
            </div>
        </div>
        <div class="row justify-content-sm-center">
            <div class="col-12 col-sm-8 col-sm-offset-2 col-md-6 col-lg-4 contentBox">
                <h2>Add Project</h2>
                <form id="frmAddProject">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="txtTitle" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Course</label>
                        <input type="text" class="form-control" name="txtCourse" placeholder="Course">
                    </div>
                    <div class="form-group">
                        <label>Project Type</label>
                        <input type="text" class="form-control" name="txtType" placeholder="Project type">
                    </div>
                    <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" class="form-control" name="txtDeadline">
                    </div>
                    <div class="form-group">
                        <label>Trello</label>
                        <input type="url" class="form-control" name="txtTrello" placeholder="Link to Trello Board">
                    </div>
                    <p id="errorMessageAddProject" class="text-danger"></p>
                    <button id="btnAddProject" type="button" class="btn btn-primary">Create Project</button>
                </form>
            </div>
        </div>
    </div>

    <!-- DISPLAY ARCHIVE -->
    <div id="pageArchive" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageCurrentProjects">Cancel</button>
            </div>
        </div>
        <div id="tableArchive" class="row">
            <div class="col-12">
                <table class="table table-responsive table-inverse table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Type</th>
                            <th>Created</th>
                            <th>Deadline</th>
                            <th>Archived</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody id="boxArchivedProjects">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DISPLAY POPUP -->
    <div id="popupOverlay"></div>
    <div id="popupProjectActions" class="popupBox">
        <div class="popupHeader">
            <i class="btnClosePopup fa fa-times-circle"></i>
            <h2>Manage Project</h2>
        </div>
        <div id="popupContent"></div>
    </div>

    <!-- DISPLAY ADD APPOINTMENT -->
    <div id="pageAddAppointment" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageUserHome">Cancel</button>
            </div>
        </div>
        <div class="row justify-content-sm-center">
            <div id="map" class="col-12 col-sm-6 col-md-6 col-lg-4 contentBox">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4 contentBox">
                <h2>Add Appointment</h2>
                <form id="frmAddAppointment">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="txtTitle">
                    </div>
                    <div class="form-group">
                        <label>Appointment Type</label>
                        <input type="text" class="form-control" name="txtType">
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" id="txtAddress" name="txtAddress" readonly>
                        <small>Please pick your location on the map</small>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="txtDate">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" class="form-control" name="txtTime">
                    </div>
                    
                    <p id="errorMessageAddAppointment" class="text-danger"></p>
                    <button id="btnAddAppointment" type="button" class="btn btn-primary">Create Appointment</button>
                </form>
            </div>
        </div>
    </div>

    <!-- DISPLAY USER OPTIONS -->
    <div id="pageUserOptions" class="page container-fluid">
       <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageUserHome">Back to dashboard</button>
            </div>
        </div>
        <div id="" class="row">
            <div class="col-12 col-sm-6">
                <div class="settingsColumn">
                    <h2>Account</h2><br/>
                    <form id="frmEditUser">
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="settingsColumn">
                    <h2>Subscriptions</h2><br/>
                    <form >
                        <div class="form-group">
                            <label>Notifications</label>
                            <p>If you activate push notifications, we will send you a reminder when a deadline draws near.</p>
                        </div>
                        <button id="btnActivateNotifications" type="button" class="btn btn-primary">Activate notifications</button>
                    </form>

                    <br/><br/>

                    <form id="frmNewsletter">
                        <div class="form-group">
                            <label>Newsletter</label>
                            <div id="newsletterSubscription"></div>
                            <p>Sign up to our newsletter if you want to stay updated on new features and receive inspiration for optimising your workflow.</p>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Email address">
                        </div>
                        <button id="btnSubscribe" type="button" class="btn btn-primary">Sign up for newsletter</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- NAV FOR LOGGED IN ADMINS -->
    <div id="navAdmin" class="topNav container-fluid <?php echo $sLoggedInAdmin; ?>">
        <div class="navHeader row">
        </div>
        <div class="navOptions row">
            <div class="navItem btnPage active col-5 col-sm-4 col-md-3 col-lg-2" style="border-left: none;" data-goTo="pageAdminHome">Dashboard</div>
            <div class="navItem btnPage col-5 col-sm-4 col-md-3 col-lg-2" data-goTo="pageManageAdmins">Admins</div>
            <div class="navItem col-2 col-sm-4 col-md-6 col-lg-8"></div>
        </div>
    </div>

    <!-- DISPLAY ADMIN DASHBOARD -->
    <div id="pageAdminHome" class="page container-fluid <?php echo $sLoggedInAdmin; ?>">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnLogout btn btn-primary float-right" data-goto="pageUserOptions" style="margin-left: 5px;">Log out</button>
            </div>
        </div>
        <div class="row adminOverview">
            <!-- <div class="col-12">
                <div class="contentBox" style="padding-bottom: 15px;">
                    <h2>Overview</h2>
                </div>
            </div> -->
           <div class="col-12 col-sm-6 col-md-4">
               <div class="contentBox">
                    <h3>Registered Users</h3>
                    <h4 id="noTotalUsers"></h4>
                    <label>Avg. projects per user</label>
                    <h5 id="noAvgPerUser"></h5>
                    <button class="btnPage btn btn-primary" data-goto="pageManageUsers">Manage users</button>
               </div>
           </div>
           <div class="col-12 col-sm-6 col-md-4">
               <div class="contentBox">
                    <h3>Created Projects</h3>
                    <h4 id="noTotalProjects"></h4>
                    <label>Active Projects</label>
                    <h5 id="noActiveProjects"></h5>
                    <label>Archived Projects</label>
                    <h5 id="noArchivedProjects"></h5>
                    <button class="btnPage btn btn-primary" data-goto="pageManageProjects">Manage projects</button>
               </div>
           </div>
           <div class="col-12 col-sm-12 col-md-4">
               <div class="contentBox">
                    <h3>Newsletter Subscriptions</h3>
                    <h4 id="noTotalSubscribers"></h4>
                    <label>Newsletters Sent</label>
                    <h5 id="noNewslettersSent"></h5>
                    <button class="btnPage btn btn-primary" data-goto="pageManageNewsletters">Manage newsletters</button>
               </div>
           </div>
        </div>
    </div>

    <!-- DISPLAY MANAGE USERS -->
    <div id="pageManageUsers" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
            <button class="btnPage btn btn-primary float-right" data-goto="pageAdminHome" style="margin-left: 5px;">Back to dashboard</button>
            </div>
        </div>
        <div id="tableUsers" class="row">
            <div class="col-12">
                <table class="table table-responsive table-inverse table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Active projects</th>
                            <th>Archived projects</th>
                            <th>Total projects</th>
                        </tr>
                    </thead>
                    <tbody id="boxTableUsers">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DISPLAY MANAGE PROJECTS -->
    <div id="pageManageProjects" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
            <button class="btnPage btn btn-primary float-right" data-goto="pageAdminHome" style="margin-left: 5px;">Back to dashboard</button>
            </div>
        </div>
        <div id="tableProjects" class="row">
            <div class="col-12">
                <table class="table table-responsive table-inverse table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Deadline</th>
                        </tr>
                    </thead>
                    <tbody id="boxTableProjects">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- DISPLAY MANAGE NEWSLETTERS -->
    <div id="pageManageNewsletters" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageAdminHome" style="margin-left: 5px;">Back to dashboard</button>
            </div>
        </div>
        <div class="row manageProjects">
           <div class="col-12 col-md-8 col-lg-7">
               <div class="contentBox">
                    <h3>Write Newsletter</h3>
                    <form id="frmSendNewsletter">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="txtTitle" placeholder="Enter username">
                        </div>
                        
                        <div class="form-group">
                            <label>Content</label>
                            <p>The name of the recipient will be automatically added when you send the newsletter to all the subscribers.</p>
                            <textarea class="form-control" name="txtContent"></textarea>
                        </div>
                        <p id="errorMessageSendNewsletter" class="text-danger"></p>
                        <button id="btnSendNewsletter" type="button" class="btn btn-primary">Send now</button>
                    </form>
               </div>
           </div>
        </div>
        <div class="row">
           <div class="col-12 col-sm-6">
               <div class="contentBox">
                    <h3>Sent Newsletters</h3>
                    <div id="boxNewsletters"></div>
               </div>
           </div>
           <div class="col-12 col-sm-6">
               <div class="contentBox">
                    <h3>Subscribers</h3>
                    <div id="boxSubscribers"></div>
               </div>
           </div>
        </div>
        
    </div>

    <!-- DISPLAY MANAGE ADMINS -->
    <div id="pageManageAdmins" class="page container-fluid">
        <div class="pageOptions row">
            <div class="col-12">
                <button class="btnPage btn btn-primary float-right" data-goto="pageAdminHome" style="margin-left: 5px;">Back to dashboard</button>
            </div>
        </div>
        <div class="row manageAdmins">
           <div class="col-12 col-md-6">
               <div class="contentBox">
                    <h3>Registered Admins</h3>
                    <div id="boxAdmins"></div>
               </div>
           </div>
           <div class="col-12 col-sm-8 col-md-6">
               <div class="contentBox">
               <h3>Register new admin</h3><br/>
               <form id="frmAddAdmin">
                   <div class="form-group">
                       <label>Username</label>
                       <input type="text" class="form-control" name="txtName" placeholder="Enter username">
                   </div>
                   <div class="form-group">
                       <label>Email address</label>
                       <p>An email will be sent to this address with a link to create a password.</p>
                       <input type="email" class="form-control" name="txtEmail" placeholder="Enter email">
                   </div>
                   <p id="errorMessageAddAdmin" class="text-danger"></p>
                   <button id="btnAddAdmin" type="button" class="btn btn-primary">Register</button>
               </form>
               </div>
           </div>
        </div>
    </div>

    <!-- BOOTSTRAP 4 -->
    <!-- <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script> -->

    <!-- TRELLO EMBED SCRIPT -->
    <script src="https://p.trellocdn.com/embed.min.js"></script>

    <!-- MOMENT JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <!-- GOOGLE MAPS -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlktTwWzz4hzAYQ4yaq1LQ3IDWiWmJ5fA&callback=initMap"></script>

    <!-- SYSTEM FUNCTIONS -->
    <script>

        // GLOBAL VARIABLES
        var iTotalProjects = 0;

        // GET SESSION VARIABLES
        var isLoggedIn = "<?php 
            if(isset($_SESSION['sUserId'])) { 
                echo $_SESSION['sUserId'];} ?>";

        var isUserName = "<?php 
            if(isset($_SESSION['sUserName'])) { 
                echo $_SESSION['sUserName'];} ?>";

        var isUserRole = "<?php 
            if(isset($_SESSION['sUserRole'])) { 
                echo $_SESSION['sUserRole'];} ?>";
        
        
        
        
        // DETERMINE WHAT DATA TO FETCH
        if(isLoggedIn) {
            getUserData();
            
            if(isUserRole == "admin") {
                getProjects();
                getSubscribers();
                getNewsletters();
                getAdmins();
                getUsers();
            } else {
                initTimeline();
                getAppointments();
                getCurrentProjects();
                getArchivedProjects();
                getNewsletterSubscription();
            }

        } 

        function getDate(day, week) {
            return moment().day(day).week(week).format("MMM Do YYYY");
        }

        // INITIALIZE TIMELINE
        function initTimeline() {
            // Get number of weeks in year
            var weeks = moment().isoWeeksInYear();
            // Get current week
            var currentWeek = moment().isoWeek();
            // console.log(currentWeek);
            var test = moment().day("Monday").week(currentWeek).format("MMM DD");
            console.log(getDate("Monday", currentWeek));

            // Loop through weeks and add options
            var sWeekOptions = '';
            for (var i = 0; i < weeks; i++) {
                var w = i + 1;
                if(w !== currentWeek) {
                    sWeekOptions += '<option>Week '+ w +'</option>';
                } else {
                    sWeekOptions += '<option selected>Week '+ w +'</option>';
                }
            }

            // Show current week by default - "deadlines" are hardcoded to show how they should look
            var sWeekDates = '  <td class="bg-danger text-light">'+ getDate("Monday", currentWeek) +'<p>Exam project</p></td>\
                                <td class="bg-warning text-light">'+ getDate("Tuesday", currentWeek) +'</td>\
                                <td>'+ getDate("Wednesday", currentWeek) +'</td>\
                                <td>'+ getDate("Thursday", currentWeek) +'</td>\
                                <td>'+ getDate("Friday", currentWeek) +'</td>\
                                <td>'+ getDate("Saturday", currentWeek) +'</td>\
                                <td class="bg-success text-light">'+ getDate("Sunday", currentWeek+1) +'</td>';

            weekSelect.innerHTML = sWeekOptions;
            weekTable.innerHTML = sWeekDates;
        }

        // TODO: MAP DEADLINES TO TIMELINE

        weekSelect.addEventListener("change", function() {
            // Get week number from string value - the "+" makes it an integer
            var currentWeek = +weekSelect.value.replace( /^\D+/g, '');
            
            // Show new week
            var sWeekDates = '  <td>'+ getDate("Monday", currentWeek) +'</td>\
                                <td>'+ getDate("Tuesday", currentWeek) +'</td>\
                                <td>'+ getDate("Wednesday", currentWeek) +'</td>\
                                <td>'+ getDate("Thursday", currentWeek) +'</td>\
                                <td>'+ getDate("Friday", currentWeek) +'</td>\
                                <td>'+ getDate("Saturday", currentWeek) +'</td>\
                                <td>'+ getDate("Sunday", currentWeek+1) +'</td>';

            weekTable.innerHTML = sWeekDates;
        })

        // GET LOGGED IN USER
        function getUserData() {
            doAjax("GET", "api/get-user.php?id="+isLoggedIn, null, function(sResponse) {
                var jUser = JSON.parse(sResponse);
                // console.log(jUser);

                var userDiv = ' <div class="form-group">\
                                    <label>Username</label>\
                                    <input type="text" class="form-control" name="txtUserName" value="'+ jUser.name +'" placeholder="Username">\
                                </div>\
                                <div class="form-group">\
                                    <label>Email</label>\
                                    <input type="email" class="form-control" name="txtEmail" value="'+ jUser.email +'" placeholder="Email address">\
                                </div>\
                                <div class="form-group">\
                                    <label>Current Password</label>\
                                    <input type="password" class="form-control" name="txtPassword" value="'+ jUser.password +'" placeholder="Current password">\
                                </div>\
                                <div class="form-group">\
                                    <label>New Password</label>\
                                    <input type="password" class="form-control" name="txtNewPassword" placeholder="New password">\
                                </div>\
                                <p id="errorMessageEditUser" class="text-danger"></p>\
                                <button id="btnEditUser" type="button" class="btn btn-primary">Save changes</button>\
                                <button id="btnConfirmDeleteUser" type="button" class="btn btn-danger">Delete account</button>';
                
                frmEditUser.innerHTML = userDiv;

            })
        }

        // GET ALL USERS
        function getUsers() {
            doAjax("GET", "api/get-users.php", null, function (sResponse) {
                var ajUsers = JSON.parse(sResponse);
                console.log(ajUsers);

                // Create HTML elements
                var jUser;
                var sDivUser = '';
                var iTotalUsers = ajUsers.length;
                var iAvgPerUser = iTotalProjects / iTotalUsers;
                console.log(iTotalProjects, iAvgPerUser);

                for (var i = 0; i < ajUsers.length; i++) {
                    jUser = ajUsers[i];
                    console.log(jUser);
                
                    sDivUser += '<tr>\
                            <td>'+ jUser.name + '</td>\
                            <td>'+ jUser.email +'</td>\
                            <td>'+ jUser.activeProjects +'</td>\
                            <td>'+ jUser.archivedProjects +'</td>\
                            <td>'+ jUser.totalProjects +'</td>\
                        </tr>';
                }
                boxTableUsers.innerHTML = sDivUser;
                noTotalUsers.innerHTML = iTotalUsers;
                noAvgPerUser.innerHTML = iAvgPerUser;
            });
        }

        // GET ADMINS
        function getAdmins() {
            doAjax("GET", "api/get-admins.php", null, function (sResponse) {
                var ajAdmins = JSON.parse(sResponse);
                // console.log(ajAdmins);

                // Create HTML elements
                var jAdmin;
                var sDivAdmin = '';

                for (var i = 0; i < ajAdmins.length; i++) {
                    jAdmin = ajAdmins[i];
                
                    sDivAdmin += '  <br/><label>'+ jAdmin.name + '</label>\
                                    <p>'+ jAdmin.email +'</p>';

                    if(jAdmin.id !== "1") {
                        sDivAdmin += '<button class="btnRemoveAdmin btn btn-danger" data-id="'+ jAdmin.id +'">Remove</button>';
                    } else {
                        sDivAdmin += '<button class="btn btn-danger" disabled>Remove</button>';
                    }
                }
                boxAdmins.innerHTML = sDivAdmin;
            });
        }

        // ADD ADMIN
        btnAddAdmin.addEventListener("click", function() {
            var frmData = new FormData(frmAddAdmin);

            doAjax("POST", "api/add-admin.php", frmData, function(sResponse) {
                var jResponse = JSON.parse(sResponse);
                if (jResponse.status == "OK") {
                    getAdmins();
                    frmAddAdmin.reset();
                }
            })
        })

        // GET SENT NEWSLETTERS
        function getNewsletters() {
            doAjax("GET", "api/get-newsletters.php", null, function (sResponse) {
                var ajNewsletters = JSON.parse(sResponse);
                // console.log(ajNewsletters);

                // Create HTML elements
                var jNewsletter;
                var sDivNewsletter = '';
                var iTotalNewsletters = ajNewsletters.length;

                for (var i = 0; i < ajNewsletters.length; i++) {
                    jNewsletter = ajNewsletters[i];
                
                    sDivNewsletter += ' <label>'+ jNewsletter.title +'</label>\
                                        <p>Sent '+ jNewsletter.sentDate +' - <span class="text-success">'+ jNewsletter.recipients.length +' recipients</span></p>';
                }
                // console.log(sDivNewsletter);
                boxNewsletters.innerHTML = sDivNewsletter;
                noNewslettersSent.innerHTML = iTotalNewsletters;
            });
        }

        // GET ALL NEWSLETTER SUBSCRIBERS
        function getSubscribers() {
            doAjax("GET", "api/get-subscribers.php", null, function (sResponse) {
                var ajSubscribers = JSON.parse(sResponse);
                // console.log(ajSubscribers);

                // Create HTML elements
                var jSubscriber;
                var sDivSubscriber = '';
                var iTotalSubscribers = ajSubscribers.length;
                var no = 0;

                for (var i = 0; i < ajSubscribers.length; i++) {
                    jSubscriber = ajSubscribers[i];
                    no++;
                
                    sDivSubscriber += ' <br/><label>'+ no +'. '+ jSubscriber.userName +' - </label>\
                                        <span>'+ jSubscriber.email +'</span>';
                }
                // console.log(sDivSubscriber);
                boxSubscribers.innerHTML = sDivSubscriber;
                noTotalSubscribers.innerHTML = iTotalSubscribers;
            });
        }

        // GET NEWSLETTER SUBSCRIPTIONS
        function getNewsletterSubscription() {
            doAjax("GET", "api/get-newsletter-subscription.php?id="+isLoggedIn, null, function(sResponse) {
                var aSubscriptions = JSON.parse(sResponse);
                console.log(aSubscriptions);

                var newsletterDiv = '';
                for (var i = 0; i < aSubscriptions.length; i++) {
                    newsletterDiv += '<button class="btnUnsubscribe btn btn-sm btn-danger" type="button" data-id="'+ aSubscriptions[i].id +'" style="margin-bottom: 5px; display: block;">Unsubscribe '+ aSubscriptions[i].email +'</button>'
                }
                newsletterSubscription.innerHTML = newsletterDiv;
            })
        }

        // SUBSCRIBE TO NEWSLETTER
        btnSubscribe.addEventListener("click", function() {
            var frmData = new FormData(frmNewsletter);
            frmData.append("txtId", isLoggedIn);
            frmData.append("txtName", isUserName);

            doAjax("POST", "api/add-newsletter-subscription.php", frmData, function(sResponse) {
                var jResponse = JSON.parse(sResponse);
                if (jResponse.status == "OK") {
                    getNewsletterSubscription();
                }
            })
        })

        // SEND NEWSLETTER
        btnSendNewsletter.addEventListener("click", function() {
            var frmData = new FormData(frmSendNewsletter);

            doAjax("POST", "api/send-newsletter.php", frmData, function(sResponse) {
                var jResponse = JSON.parse(sResponse);
                if (jResponse.status == "OK") {
                    getNewsletters();
                    frmSendNewsletter.reset();
                }
            })
        })

        // GET ALL PROJECTS
        function getProjects() {
            doAjax("GET", "api/get-projects.php", null, function (sResponse) {
                var ajProjects = JSON.parse(sResponse);
                // console.log(ajProjects);

                // Create HTML elements
                var jProject;
                var sDivProject = '';
                iTotalProjects = ajProjects.length;
                var iArchived = 0;
                var iActive = 0;

                for (var i = 0; i < ajProjects.length; i++) {
                    //console.log(ajProducts[i]);
                    jProject = ajProjects[i];

                    if(jProject.status == "active") {
                        iActive++;
                    } else {
                        iArchived++;
                    }
                
                    sDivProject += '<tr>\
                            <td>'+ jProject.title + '</td>\
                            <td>'+ jProject.course +'</td>\
                            <td>'+ jProject.status +'</td>\
                            <td>'+ jProject.type + '</td>\
                            <td>'+ jProject.createdDate +'</td>\
                            <td>'+ jProject.deadline + '</td>\
                        </tr>';

                }
                boxTableProjects.innerHTML = sDivProject;
                noTotalProjects.innerHTML = iTotalProjects;
                noActiveProjects.innerHTML = iActive;
                noArchivedProjects.innerHTML = iArchived;
            });
        }

        // GET CURRENT PROJECTS
        function getCurrentProjects() {
            doAjax("GET", "api/get-current-projects.php?id="+isLoggedIn, null, function (sResponse) {
                var ajProjects = JSON.parse(sResponse);
                // console.log(ajProjects);

                // Create HTML elements
                var jProject;
                var sDivProject = '';
                var trello;
                var now = new Date();
                var deadline = null;
                var timeDiff = null;
                var diffDays = null;
                var timeColor = "text-primary";

                for (var i = 0; i < ajProjects.length; i++) {
                    //console.log(ajProducts[i]);
                    jProject = ajProjects[i];
                    trello = jProject.trello;
                    deadline = new Date(jProject.deadline);
                    timeDiff = (deadline.getTime() - now.getTime());
                    diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                    // console.log(deadline, diffDays);

                    if (diffDays <= 0) {
                        timeColor = "text-danger";
                    } else if (diffDays <= 7) {
                        timeColor = "text-warning";
                    } else if (diffDays > 7) {
                        timeColor = "text-success";
                    }
                    
                    sDivProject += '<div class="colProject col-12 col-sm-6 col-lg-4">\
                                        <div class="currentItem">\
                                            <i class="fa fa-cog btnOpenPopup" data-id="'+ jProject.id + '" aria-hidden="true"></i>\
                                            <h3>'+ jProject.title + '</h3>\
                                            <p><span class="type">'+ jProject.type + '</span> for <span class="course">' + jProject.course + '</span></p>\
                                            <p><i class="fa fa-calendar-o"></i> Active since '+ jProject.createdDate + '\
                                            <p><i class="fa fa-clock-o"></i> Deadline '+ jProject.deadline + '\
                                            <span class="'+ timeColor +'"> '+ diffDays +' days left</span></p>';
                                            
                    if(trello) {
                        sDivProject += '<blockquote class="trello-board-compact">\
                                                <a href="'+ trello +'">Trello Board</a>\
                                            </blockquote>';
                    }

                    sDivProject += '</div></div>';

                }
                //console.log(sDivProduct);
                boxCurrentProjects.innerHTML = sDivProject;
                window.TrelloBoards.load(document, { allAnchors: false });
            });
        }

        // GET ARCHIVED PROJECTS
        function getArchivedProjects() {
            doAjax("GET", "api/get-archived-projects.php?id="+isLoggedIn, null, function (sResponse) {
                var ajProjects = JSON.parse(sResponse);
                // console.log(ajProjects);

                // Create HTML elements
                var jProject;
                var sDivProject = '';
                var grade;

                for (var i = 0; i < ajProjects.length; i++) {
                    //console.log(ajProducts[i]);
                    jProject = ajProjects[i];
                    grade = jProject.grade ? jProject.grade : "none";
                
                    sDivProject += '<tr>\
                            <td>'+ jProject.title + '</td>\
                            <td>'+ jProject.course +'</td>\
                            <td>'+ jProject.type + '</td>\
                            <td>'+ jProject.createdDate +'</td>\
                            <td>'+ jProject.deadline + '</td>\
                            <td>'+ jProject.archiveDate +'</td>\
                            <td>'+ grade +'</td>\
                        </tr>';

                }
                //console.log(sDivProduct);
                boxArchivedProjects.innerHTML = sDivProject;
            });
        }

        // ADD PROJECT
        btnAddProject.addEventListener("click", function () {
            var frmData = new FormData(frmAddProject);
            doAjax("POST", "api/add-project.php", frmData, function (sResponse) {
                var jResponse = JSON.parse(sResponse);

                if (jResponse.status == "OK") {
                    getCurrentProjects();
                    navigateTo('pageCurrentProjects');
                }
            })
        })

        // ACTIVATE NOTIFICATIONS
        btnActivateNotifications.addEventListener("click", function() {
            // Let's check whether notification permissions have already been granted
            if (Notification.permission === "granted") {
                // If it's okay let's create a notification
                displayNotification("enabled");
            }

            // Otherwise, we need to ask the user for permission
            else if (Notification.permission !== 'denied') {
                Notification.requestPermission(function (permission) {
                    // If the user accepts, let's create a notification
                    if (permission === "granted") {
                        displayNotification("enabled");
                    }
                });
            }
        })
        
        // DISPLAY PUSH NOTIFICATIONS WITH SOUND
        // Prepare sound file
        var oSound = new Audio('notification.mp3');

        function displayNotification(type) {
            if(type == "enabled") {
                var notification = new Notification("Study Planner", {"body": "Notifications are enabled!"});
                oSound.play();
            } else if (type == "archived") {
                var notification = new Notification("Study Planner", {"body": "Congratulations on finishing your project!"});
                oSound.play();
            }
            
        }
    

        // DYNAMIC EVENT LISTENERS
        document.addEventListener("click", function (e) {

            // EDIT USER
            if (e.target.id == 'btnEditUser') {
                var frmData = new FormData(frmEditUser);
                frmData.append("txtId", isLoggedIn)
                doAjax("POST", "api/edit-user.php", frmData, function(sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    if (jResponse.status == "OK") {
                        getUserData();
                    }
                })
            }

            // CONFRIM DELETE USERP
            if (e.target.id == 'btnConfirmDeleteUser') {
                var sConfirmDelete = '  <p>Are you sure you want to delete your profile?</p>\
                                        <p>This will destroy all of your data beyond recovery.</p>\
                                        <button type="button" id="btnDeleteUser" class="btn btn-danger">Delete</button>\
                                        <button type="button" id="btnCancelDeleteUser" class="btn btn-primary">Cancel</button>';

                frmEditUser.innerHTML = sConfirmDelete;
            }

            // CANCEL DELETE USER
            if(e.target.id == 'btnCancelDeleteUser') {
                getUserData();
            }

            // REMOVE ADMIN
            if (e.target.classList.contains('btnRemoveAdmin')) {
                var sAdminId = e.target.getAttribute('data-id');
                doAjax("GET", "api/delete-user.php?id=" + sAdminId, null, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        getAdmins();
                    }
                })
            }

            // DELETE USER
            if (e.target.id == 'btnDeleteUser') {
                doAjax("GET", "api/delete-user.php?id=" + isLoggedIn, null, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        navigateTo("pageVisitorHome");
                        navMain.style.display = "none";
		  	            navLogin.style.display = "block";
                    }
                })
            }

            // UNSUBSCRIBE FROM NEWSLETTER
            if (e.target.classList.contains('btnUnsubscribe')) {
                var sSubscriptionId = e.target.getAttribute('data-id');
                doAjax("GET", "api/delete-newsletter-subscription.php?id=" + sSubscriptionId, null, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        getNewsletterSubscription();
                    }
                })
            }

            // OPEN POPUP
            if (e.target.classList.contains('btnOpenPopup')) {
                var projectId = e.target.getAttribute('data-id');
                doAjax("GET", "api/get-project.php?id=" + projectId, null, function (sResponse) {
                    var jProject = JSON.parse(sResponse);
                    console.log(jProject);

                    var sProjectForm = '<form id="frmEditProject">\
                                            <div class="form-group">\
                                                <label>Title</label>\
                                                <input type="text" class="form-control" name="txtTitle" placeholder="Title" value="'+ jProject.title +'">\
                                            </div>\
                                            <div class="form-group">\
                                                <label>Course</label>\
                                                <input type="text" class="form-control" name="txtCourse" placeholder="Course" value="'+ jProject.course +'">\
                                            </div>\
                                            <div class="form-group">\
                                                <label>Project Type</label>\
                                                <input type="text" class="form-control" name="txtType" placeholder="Project type" value="'+ jProject.type +'">\
                                            </div>\
                                            <div class="form-group">\
                                                <label>Deadline</label>\
                                                <input type="date" class="form-control" name="txtDeadline" value="'+ jProject.deadline +'">\
                                            </div>\
                                            <div class="form-group">\
                                                <label>Trello</label>\
                                                <input type="url" class="form-control" name="txtTrello" placeholder="Link to Trello Board" value="'+ jProject.trello +'">\
                                            </div>\
                                            <p id="errorMessageAddProject" class="text-danger"></p>\
                                            <button type="button" class="btnEditProject btn btn-primary" data-id="'+ jProject.id + '">Save</button>\
                                            <button type="button" class="btnShowArchiveProject btn btn-primary" data-id="'+ jProject.id + '">Archive</button>\
                                            <button type="button" class="btnConfirmDeleteProject btn btn-primary" data-id="'+ jProject.id + '">Delete</button>\
                                        </form>';

                    popupContent.innerHTML = sProjectForm;

                })
                popupOverlay.style.display = "block";
                popupProjectActions.style.display = "block";
            }

            // CLOSE POPUP
            if (e.target.classList.contains('btnClosePopup')) {
                closePopup();
            }

            function closePopup() {
                popupOverlay.style.display = "none";
                popupProjectActions.style.display = "none";
            }

            // EDIT PROJECT
            if (e.target.classList.contains('btnEditProject')) {
                var projectId = e.target.getAttribute('data-id');
                var frmData = new FormData(frmEditProject);
                frmData.append("txtId", projectId);

                doAjax("POST", "api/edit-project.php?", frmData, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        getCurrentProjects();
                        closePopup();
                    }
                })
            }

            // SHOW ARCHIVE PROJECT
            if (e.target.classList.contains('btnShowArchiveProject')) {
                var projectId = e.target.getAttribute('data-id');

                var sArchive = '<br/>\
                                <p>Are you sure you want to archive this project?</p>\
                                <p>This will remove the project from the PROJECTS-tab and you will no longer be able to edit it, but all of the data will remain in the system and figure in your stats.</p>\
                                <p>If the project was graded, you can add the grade here.</p>\
                                <form id="frmArchiveProject">\
                                    <div class="form-group">\
                                        <label>Grade</label>\
                                        <input type="text" class="form-control" name="txtGrade" placeholder="Grade">\
                                    </div>\
                                    <button type="button" class="btnArchiveProject btn btn-primary" data-id="'+ projectId + '">Archive</button>\
                                    <button type="button" class="btnOpenPopup btn btn-primary" data-id="'+ projectId + '">Cancel</button>\
                                </form>';

                popupContent.innerHTML = sArchive;
            }

            // ARCHIVE PROJECT
            if (e.target.classList.contains('btnArchiveProject')) {
                var projectId = e.target.getAttribute('data-id');
                var frmData = new FormData(frmArchiveProject);
                frmData.append("txtId", projectId);

                doAjax("POST", "api/archive-project.php?", frmData, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        getCurrentProjects();
                        closePopup();
                        displayNotification("archived");
                    }
                })
            }

            // CONFRIM DELETE PROJECT
            if (e.target.classList.contains('btnConfirmDeleteProject')) {
                var projectId = e.target.getAttribute('data-id');

                var sConfirmDelete = '  <p>Are you sure you want to delete this project.</p>\
                                        <p>This will remove all of its data and you will not be able to recover it.</p>\
                                        <button type="button" class="btnDeleteProject btn btn-primary" data-id="'+ projectId + '">Delete</button>\
                                        <button type="button" class="btnOpenPopup btn btn-primary" data-id="'+ projectId + '">Cancel</button>';

                popupContent.innerHTML = sConfirmDelete;
            }

            // DELETE PROJECT
            if (e.target.classList.contains('btnDeleteProject')) {
                var projectId = e.target.getAttribute('data-id');
                doAjax("DELETE", "api/delete-project.php?id=" + projectId, null, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        getCurrentProjects();
                        closePopup();
                    }
                })
            }

            // GO TO NEW PAGE
            if (e.target.classList.contains( "btnPage" )) {
                //console.log("X")
                var sPageId = e.target.getAttribute("data-goto");
                navigateTo(sPageId);

                if(e.target.classList.contains( "navItem" )) {
                    var aNavItems = document.getElementsByClassName("navItem");
                    for (var i = 0; i < aNavItems.length; i++) {
                        // console.log("x");
                        aNavItems[i].classList.remove("active");
                    }
                    e.target.classList.add("active");
                }
            };

            // LOG OUT
            if (e.target.classList.contains('btnLogout')) {
                doAjax("GET", "api/logout.php", null, function(sResponse) {
                    var jResponse = JSON.parse(sResponse);

                    if (jResponse.status == "OK") {
                            navigateTo("pageVisitorHome");
                            navMain.style.display = "none";
                            navAdmin.style.display = "none";
                            navLogin.style.display = "block";
                    }
                })
            }
        })

        // SIGN UP
        btnSignup.addEventListener("click", function() {
            var frmData = new FormData(frmSignup);
            doAjax("POST", "api/signup.php", frmData, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    // console.log(jResponse);

                    if (jResponse.status == "OK") {
                        navigateTo("pageCurrentProjects");
                        navMain.style.display = "block";
		  	            navLogin.style.display = "none";
                    } else {
                        errorMessageSignup.innerHTML = jResponse.message;
                    }
                })
        })

        // LOG IN
        btnLogin.addEventListener("click", function() {
            console.log("X");
            var frmData = new FormData(frmLogin);
            doAjax("POST", "api/login.php", frmData, function (sResponse) {
                    var jResponse = JSON.parse(sResponse);
                    console.log(jResponse);

                    if (jResponse.status == "OK") {
                        isLoggedIn = jResponse.userId;
                        getUserData();

                        if (jResponse.userRole == "user") {
                            initTimeline();
                            getAppointments();
                            getCurrentProjects();
                            getArchivedProjects();
                            getNewsletterSubscription();
                            navigateTo("pageUserHome");
                            navMain.style.display = "block";
                        } else {
                            getProjects();
                            getSubscribers();
                            getNewsletters();
                            getAdmins();
                            getUsers();
                            navigateTo("pageAdminHome");
                            navAdmin.style.display = "block";
                        }
                        
		  	            navLogin.style.display = "none";
                    } else {
                        errorMessageLogin.innerHTML = jResponse.message;
                    }
                })
        })

        // INITIALIZE GOOGLE MAP
        var jMarkerPos = {};
        function initMap() {
            var jLygten = {
                lat: 55.703935,
                lng: 12.537669
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: jLygten
            });

            var marker = new google.maps.Marker({
                map: map
            });

            var geocoder = new google.maps.Geocoder();

            var address;

            map.addListener('click', function (e) {
                // console.log(e);
                jMarkerPos.lng = e.latLng.lng();
                jMarkerPos.lat = e.latLng.lat();
                // console.log(jMarkerPos); // INCREDIBLE
                marker.setPosition(jMarkerPos);

                geocoder.geocode({
                    'latLng': e.latLng
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            address = results[0].formatted_address;
                            // console.log(address);
                            txtAddress.value = address;
                        }
                    }
                });
            });
        }

        // ADD APPOINTMENT
        btnAddAppointment.addEventListener("click", function () {
            var jFrmData = new FormData(frmAddAppointment);
            jFrmData.append("txtLng", jMarkerPos.lng);
            jFrmData.append("txtLat", jMarkerPos.lat);

            doAjax("POST", "api/add-appointment.php", jFrmData, function (sResponse) {
                // console.log(sResponse);
                var jResponse = JSON.parse(sResponse);
                    if (jResponse.status == "OK") {
                        frmAddAppointment.reset();
                        getAppointments();
                        navigateTo("pageUserHome");
                    }
                })
        })

        // GET APPOINTMENTS
        function getAppointments() {
            doAjax("GET", "api/get-appointments.php", null, function (sResponse) {
                var jResponse = JSON.parse(sResponse);
                console.log(jResponse);

                var sDiv = '';
                for (var i = 0; i < jResponse.length; i++) {
                    sDiv += '<div style="margin: 30px 0px 10px 0px;">\
                                <label>'+ jResponse[i].title+'</label>\
                                <p>'+ jResponse[i].location.address+'</p>\
                                <p>'+jResponse[i].date +' ' + jResponse[i].time+'</p>\
                             </div>'
                }

                boxAppointments.innerHTML = sDiv;
            })
        }

        // PAGE NAVIGATION
        function navigateTo(sPageId) {
            var aPages = document.getElementsByClassName("page");
            for (var i = 0; i < aPages.length; i++) {
                // console.log("x");
                aPages[i].style.display = "none";
            }
            document.getElementById(sPageId).style.display = "block";

            // We need to initialize the google map after the page is displayed
            // Otherwise it will still think that display is none - and it won't show
            if (sPageId == 'pageAddAppointment') {
                initMap();
            }
        }

        // REUSABLE AJAX
        function doAjax(sMethod, sUrl, frmData, callback) {
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var sDataFromServer = this.responseText;
                    callback(sDataFromServer);
                    // console.log("AJAX request are: " + aAjax.length);
                }
            }
            ajax.open(sMethod, sUrl, true);
            if (frmData !== null) {
                ajax.send(frmData);
            } else {
                ajax.send();
            }
        }
    </script>
</body>

</html>