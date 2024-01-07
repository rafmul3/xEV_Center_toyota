<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK9 4CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        {{-- <script type="text/javascript" src="instascan.min.js"></script> --}}
    @livewireStyles
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
        
        
        <style>
            
            .widget {
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 50px;
                display: inline-block;
                margin-right: 20px;
            }

            .widget p {
                padding-left: 20px;
                color: #1076a1;
                font-weight: bolder;
                font-size: 59px;
                margin: 0;
                text-align: left;
            }

            .widget .widget-title {
                padding-left: 20px;
                font-size: 20px;
                font-weight: bolder;
                text-align: center;
            }

            /* .card {
                width: 400px;
                height: 225px;
                display: block;
                justify-content: center;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                display: inline-block;
                margin: 0 auto;
            } */

            .percentage-global {
                position: relative;
                font-size: 16px;
            }

            ul.ui-autocomplete.ui-menu {
                z-index: 9999;
            }
            .tokenfield .token {
            background-color: #37c2fd;
            color: white;
            border: 1px solid grey;
            }
            .token .close {
                color: white;
            }

            main {

            }
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .dashboard {
                display: flex;
            }

            .sidebar {
                background-color: #1076a1;
                color: #ffffff;
                padding: 20px;
                width: 350px;
                min-height: 100vh;
            }

            .sidebar-logo {
                text-align: center;
                margin-bottom: 20px;
            }

            .sidebar-logo img {
                max-width: 80%;
                height: auto;
            }

            .sidebar a img {
                width: 30px;
                height: 30px;
                margin-right: 10px;
            }

            .sidebar ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            .sidebar li {
                margin-bottom: 10px;
            }

            .sidebar a {
                color: #ffffff;
                text-decoration: none;
                font-size: 20px;
                font-weight: 600;
                display: flex;
                align-items: center;
            }
            
            .main-content {
                flex-grow: 1;
                margin-left: 20px;
                background-color: #ffffff;
            }

            .navbar {
                padding: 25px;
                display: flex;
                border: none;
                border-radius: 0;
                margin-bottom: 0;
                background-color: #1076a1;
                position: fixed;

                justify-content: flex-end;
                align-items: center;
            }

            .navbar .user img {
                max-width: 8%;
                height: auto;
                padding-left: 91%;
            }

            /* .navbar .dropdown {
                position: relative;
                display: list-item;
            }

            .navbar .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 100px;
                box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.1);
                z-index: 2;
            }

            .navbar .dropdown:hover .dropdown-content {
                display: block;
            } */

            /* Dropdown Button */
            .dropbtn {
                background-color: ;
                color: ;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

            /* The container <div> - needed to position the dropdown content */
            .dropdown {
                position: relative;
                display: inline-block;
                
            }

            /* Dropdown Content (Hidden by Default) */
            .dropdown-content {
                position: absolute;
                    top: 100%;
                    left: 0;
                    z-index: 1000;
                    display: none;
                    float: left;
                    min-widht: 15rem;
                    max-width: 100px;
                    padding: 0.5rem 0;
                    /* margin: 0.125rem 0 0; */
                    color: #373a3c;
                    text-align: left;
                    list-style: none;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid rgba(0, 0, 0, 0.15);
                    border-radius: 0.17rem;
            }
            .dropdown-content-right {
                right: 0;
                left: auto;
            }

            /* Links inside the dropdown */
            .dropdown-content a {
                color: black;
                padding: 10px 14px;
                text-decoration: none;
                font-size: 12px;
                display: block;

            }

            /* Change color of dropdown links on hover */
            .dropdown-content a:hover {
                background-color: #ddd;
            }

            /* Show the dropdown menu on hover */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            /* Change the background color of the dropdown button when the dropdown content is shown */
            /* .dropdown:hover .dropbtn {
                background-color: #3e8e41;
            } */

            h1 {
                text-align: left;
                font-size: 64px;
                font-weight: 1000;
                padding-left: 20px;
                text-decoration: underline;
                margin-bottom: 20px;
            }

            /* Responsive Styles */

            @media (max-width: 1920px) {
                .dashboard {
                    display: flex;
                }

                .sidebar {
                    width: 250px;
                }

                .main-content {
                    flex-grow: 1;
                    margin-top: 50px;
                }

                .navbar {
                    position: fixed;
                    top: 0;
                    left: 250px;
                    right: 0;
                    z-index: 1;
                }

                /* .b {
                    padding-top: 80px;
                } */
            }

            @media (max-width: 1366px) {
                .dashboard {
                    display: flex;
                    flex-wrap: wrap;
                }

                .sidebar {
                    width: 200px;
                }

                .main-content {
                    flex-grow: 1;
                    margin-left: 50px;
                }

                .navbar {
                    position: fixed;
                    top: 0;
                    left: 200px;
                    right: 0;
                    z-index: 1;
                }

                /* .b {
                    padding-top: 80px;
                } */
            }
        </style>
    </head>
    <body>
        <div class="dashboard">
            <div class="sidebar">
                <div class="sidebar-logo">
                    <img
                        src="https://drive.google.com/uc?export=view&id=1HN1WxsHtxIP0LUSI9_h35PiUGntddTlM"
                        alt="Logo"
                    />
                </div>
                <ul>
                    <li>
                        <a href="/dashboard"
                            ><img
                                src="https://drive.google.com/uc?export=view&id=1zrmuCroVPET0GUZ-d7mAO0HOAqYe3UMz"
                                alt=""
                            />Data Visitor</a
                        >
                    </li>
                    <li><hr /></li>
                    <li>
                        <a href="/registrationDashboard"
                            ><img
                                src="https://drive.google.com/uc?export=view&id=1DKGqkvcJYwyaI0OtrBqoA3t4bDQUVkFj"
                                alt=""
                            />Registration</a
                        >
                    </li>
                    <li><hr /></li>
                    <li>
                        <a href="/checkinDashboard"
                            ><img
                                src="https://drive.google.com/uc?export=view&id=1_5EWea_avVnmFOpZp0-9QX_kp_RRG5LT"
                                alt=""
                            />Check In</a
                        >
                    </li>
                    <li><hr /></li>
                    
                    <li>
                        <a href="/feedbackDashboard"
                            ><img
                                src="https://drive.google.com/uc?export=view&id=14NxswrSCE-9fBJ8pXp87Ar53v3KGQ3NL"
                                alt=""
                            />Feedback</a
                        >
                    </li>
                    <li><hr /></li>
                    <li>
                        <a href="/setting"
                            ><img
                                src="https://drive.google.com/uc?export=view&id=1JaP9KAlNaYqGqzF0BTAw19jq3q7_IUPp"
                                alt=""
                            />Settings</a
                        >
                    </li>
                    <li><hr /></li>
                </ul>
            </div>
            <div class="">
                <nav class="navbar bg-body-tertiary" style="opacity: 54%">
                    <div class="navbar">
                        <div
                            class="profile-container"
                            style="display: flex; gap: 10px"
                        >
                        <div class="dropdown">
                            <div class="dropdown dropdown-toggle" type="button" data-toggle="dropdown">
                                <img
                                    src="https://drive.google.com/uc?export=view&id=1EUoNNoqYk2jeEuIfdN0msdil2_Kcs4fg"
                                    alt=""
                                    width="40"
                                    height="40"
                                />
                            </div>
                            <ul class="dropdown-content">
                                <li><a href="/pengunjung">View Site</a></li>
                                <li><a href="/logout">Log Out</a></li>
                            </ul>
                        </div>
                            <!-- <div class="drpbtn">
                                <img
                                    src="https://drive.google.com/uc?export=view&id=1EUoNNoqYk2jeEuIfdN0msdil2_Kcs4fg"
                                    alt=""
                                    width="40"
                                    height="40"
                                />
                            </div>
                            <div class="dropdown" style="position: relative">
                                <img
                                    style="
                                        position: absolute;
                                        top: 50%;
                                        left: 50%;
                                        transform: translate(-50%, -50%);
                                    "
                                    src="https://drive.google.com/uc?export=view&id=1aRHWJ2IAsFkq5gVqI-bTKxqXoPx8Pvi4"
                                    alt=""
                                    width="10"
                                    height="10"
                                />
                                <div
                                    class="dropdown-content"
                                    style="position: relative"
                                >
                                    <a href="#">My Site</a>
                                    <a href="#">Log out</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </nav>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 100px;">
                    {{-- @include('komponen.pesan') --}}
                    

                    @yield('content')
                </main>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        
        @livewireScripts
    </body>

</html>
