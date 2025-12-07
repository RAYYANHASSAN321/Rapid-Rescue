<!-- navbar Section -->
<?php
        include "navbar.php";
        ?>
        <!-- Navbar End -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link
     rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.png">
    <link rel="stylesheet" href="jquery.js">
    <link rel="manifest" href="images/logo.png">
   
    <title>EAmbulance</title>

    <style>
    /* Emergency Contact Button (fixed at bottom right) */
 

        /* Popup Style */
        .popup {
            display: none; /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
            z-index: 1001;
            transition: all 1s;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            width: 90%;
            max-width: 400px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
            transition: all 1s;
        }

        .popup-content h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: red;
            transition: all 1s;
        }

        .popup-content p {
            margin-bottom: 20px;
            transition: all 1s;
        }

        .close-popup {
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 1s;
        }

        .close-popup:hover {
            background-color: darkred;
            transition: all 1s;
        }
    </style>
</head>

<body >
    
    <!-- Emergency Contact Button (always visible on bottom right) -->


<!-- Popup (appears when the user first visits) -->
<div class="popup" id="emergencyPopup">
    <div class="popup-content">
        <h2>Emergency Help Available</h2>
        <p>If you are facing a serious emergency, please call one of the following numbers:</p>
        <ul>
            <li><strong>Contact 1:</strong> +92-030-2246-3548</li>
            <li><strong>Contact 2:</strong> +92-033-7033-5983</li>
            <li><strong>Contact 3:</strong> +92-034-9183-3008</li>
            <!-- <li><strong>Contact 2:</strong> +92-033-7033-5983</li> -->
        </ul>
        <button class="close-popup" id="closePopup">Close</button>
    </div>
</div>
    <!-- HEADER SECTION Start -->
    
    <div style="margin-bottom:180px;" class="headerSectionBG">
        <img src="images/ban1.jfif" class="bgimg " alt="">
     
        <div class="container text-section">
            <div class="m-0 p-4 rounded-4 mt-5" style="background-color: #b71c1ccc;">
            <h1 class="text-white">24/7 Fast & Reliable  <br> Ambulance Service</h1>
            <p class="text-white">
            Quick help when you need it the most! Our ambulance service is ready 24/7 <br> providing the fastest and most reliable care – anytime, anywhere.
            </p>
            <a href="emergency_request.php"><button class="bookapp">Book an Ambulance</button></a>
            </div>
        </div>

    </div>


    
    <div class="secondSec bg-danger-subtle">
        
        <div class="container doctors py-5">
            <div class="row">
              

                <div class="col-lg-6 col-md-12 col-sm-12 ">
                    <div class="aboutSec">
                        <img src="images/ambsign.png" width="30" height="30" alt="">
                        <span class="textAbout">ABOUT US</span>
                        <h1>About Our Services</h1>
                        <p>Join us in the mission to provide rapid medical assistance in emergencies. Together, let's ensure quicker access to life-saving services. Stay informed, stay prepared, and let Rapid Rescue be your lifeline in times of need! </div>
                    <div class="container experiences rounded-4 p-5">
                        <div class="d-lg-flex d-md-flex d-sm-flex flex-lg-row flex-sm-column flex-md-column p-lg-3 p-sm-0">
                            <div class="">
                                <div class="d-flex">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <p class="ms-2 para fs-6 mt-1">Quick and Simple Booking</p>
                                </div>

                                <div class="d-flex mt-lg-5 mt-sm-0">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <p class="ms-2 para fs-6 mt-1"> Certified Medical Professionals</p>
                                </div>

                                <div class="d-flex mt-lg-5 mt-sm-0">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <p class="ms-2 para fs-6 mt-1">Emergency Contact on Homepage</p>
                                </div>
                            </div>

                            <div class="ms-lg-5 ms-sm-0">
                                <div class="d-flex">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <p class="ms-2 para fs-6 mt-1">24/7 Availability </p>
                                </div>

                                <div class="d-flex mt-lg-5 mt-sm-0">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <p class="ms-2 para fs-6 mt-1">Real-Time Tracking</p>
                                </div>

                                <div class="d-flex mt-lg-5 mt-sm-0">
                                    <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                    <p class="ms-2 para fs-6 mt-1">Instant Confirmation</p>
                                </div>
                            </div>
                        </div>

                        

                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
    <img class="img-fluid mt-5" src="images/amb_1.png" alt="" style="width: 100%; height: auto; max-height: 500px;">
</div>


            </div>
        </div>

    </div>
        
      
    </div>
    <br><br><br>
    <div class="container departments">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 d-flex">
                <!-- <img src="images/about.svg" width="50" alt=""> -->
                <span class="textdepartment"></span>
                <h1>Ambulance  <span class="text-danger"> Services</span></h1>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 text-lg-center text-md-cetext-lg-center text-sm-start">
                <p>An ambulance is a specialized vehicle designed to provide immediate medical assistance and transport patients to healthcare facilities. It is commonly used in emergency situations where patients need urgent medical care. Equipped with advanced medical equipment and staffed by trained medical personnel, ambulances play a critical role in saving lives. They are utilized not only for serious emergencies but also for routine check-ups and patient transfers. The features associated with ambulances, such as sirens and flashing lights, help clear traffic and ensure prompt arrival at the destination. </div>
        </div>

        <br><br><br>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-sm-5">
                <div style=" height: 370px;" class="mainDiv bg-danger-subtle text-start mt-4 rounded-4 p-5">
                    <div class="midDiv">
                        <div class=" shadow">
                            
                        </div>
                    </div>
                    <div class="fourthDiv">
                        <a style="cursor: default;" class="headingsDepartment">
                            Lower risk of spreading the corona virus
                        </a>
                        <p style="font-size: 14px;">
                            Getting vaccinated against covid 19 can lower your risk of getting an spreading <br> the virus that causes COVID-19 Vaccines.  
                        </p>                    
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-sm-5">
                <div style=" height: 370px;" class="mainDiv bg-danger-subtle text-start mt-4 rounded-4 p-5">
                    <div class="midDiv">
                        <div class=" shadow">
                            
                        </div>
                    </div>
                    <div class="fourthDiv">
                        <a style="cursor: default;" class="headingsDepartment">
                            Build immunity against the viruses
                        </a>
                        <p style="font-size: 14px;">
                            While all the above mention tips will definitely help.the need of the hour is a quick boosts to your immunity system to keep it fighting it.
                        </p>
                        
                        <br>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-sm-5">
                <div style=" height: 370px;" class="mainDiv bg-danger-subtle text-start mt-4 rounded-4 p-5">
                    <div class="midDiv">
                        <div class=" shadow">
                            
                        </div>
                    </div>
                    <div class="fourthDiv">
                        <a style="cursor: default;" class="headingsDepartment">
                            Vaccines will help you to keep healthy 
                        </a>
                        <p style="font-size: 14px;">
                            Vaccinations throughout your life to pro-tech against many infections.If you skip vaccines, you leave yourself to illnesses many more critical diseases. 
                        </p>
                        
                        <br>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

       
    </div>




 

    

   

   
    

    <!-- ARTICLES Section -->
    <div class="divOURBLOG bg-danger-subtle">
        <div class="container">
            <div class="text-center">
                <img src="images/about.svg" alt=""><span>OUR BLOG</span><img src="images/about.svg" alt="">
                <h1>OUR Articles Related Medical</h1>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div style="height: 450px;" class="Ourblog rounded-4">
                        <!-- <img style="height: 250px;" class="img-fluid rounded-4" src="images/articles1.jpg" alt=""> -->
                        <div class="p-3">
                            <a class="headingsDepartment" href="#">
                                <h5 class="mt-3">Potential treatment for an Inflammatory blood disease</h5>
                            </a><br>
                            <div class="calendericons mt-3">
                                <img src="images/calenderblue.svg" alt=""><span>MAY 14, 2022</span><br><br>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div style="height: 450px;" class="Ourblog rounded-4">
                        <!-- <img style="height: 250px;" class="img-fluid rounded-4" src="images/articles3.jpg" alt=""> -->
                        <div class="p-3">
                            <a class="headingsDepartment" href="#">
                                <h5 class="mt-3">Simvastatin Improves Outcomes for Severely Ill COVID-19 Patients</h5>
                            </a><br>
                            <div class="calendericons mt-3">
                                <img src="images/calenderblue.svg" alt=""><span>APRIL 12, 2021</span><br><br>
                                <!-- <a class="readmoreBtn" href="#">+ READMORE</a> -->
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div style="height: 450px;" class="Ourblog rounded-4">
                        <!-- <img style="height: 250px;" class="img-fluid rounded-4" src="images/articles2.jpg" alt=""> -->
                        <div class="p-3">
                            <a class="headingsDepartment" href="#">
                                <h5 class="mt-3">Nasal Vax for COVID-19 Has Encouraging Early Clinical Results as U.S. Pumps $18.5M in Nasal Vaccine Research</h5>
                            </a>
                            <div class="calendericons mt-3">
                                <img src="images/calenderblue.svg" alt=""><span>APRIL 24, 2022</span><br><br>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>


<!-- JavaScript to control the popup -->
<script>
    // Show the popup when the page loads
    window.onload = function() {
        document.getElementById("emergencyPopup").style.display = "block";
    };

    // Close the popup when the close button is clicked
    document.getElementById("closePopup").onclick = function() {
        document.getElementById("emergencyPopup").style.display = "none";
    };

   
</script>



    <!-- Footer Section Start -->

    <?php
    include "footer.php";
    ?>

    <!-- Footer Section End -->

    
    <script src="js/bootstrap.bundle.js"></script>
    
</body>

</html>