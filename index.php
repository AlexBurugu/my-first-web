<?php 
// echo "hello";
include_once "optichat/php/config.php";
//services
if(isset($_POST['services-send-btn']))
{
//take user input

$email = mysqli_real_escape_string($conn, $_POST['email']);
$service = mysqli_real_escape_string($conn, $_POST['service']);
$compose = mysqli_real_escape_string($conn, $_POST['compose']);

//validate user input
if(!empty($email) && !empty($service) && !empty($compose))
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $ins1 = "INSERT INTO services (email, service, compose) VALUES ('{$email}','{$service}','{$compose}')";
        $sql1 = mysqli_query($conn,$ins1);
        if(!$sql1)
        {
            echo "alert('error')";
        }
    }
    else{
        echo "alert('$email is not a valid email address')";
    }
    
}
}

//take user input
if(isset($_POST['submitBtn']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $ref = mysqli_real_escape_string($conn, $_POST['ref']);
    $compose = mysqli_real_escape_string($conn, $_POST['compose']);
    
    //validate user input
    if(!empty($email) && !empty($ref) && !empty($compose))
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $ins1 = "INSERT INTO contact (email, ref, compose) VALUES ('{$email}','{$ref}','{$compose}')";
            $sql1 = mysqli_query($conn,$ins1);
            if(!$sql1)
            {
                echo "alert('success')";
            }
        }
        else{
            echo "alert('$email is not a valid email address')";
        }
        
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>optilex</title>
    <link rel="stylesheet" href="index.css">
    <!--font awesome link-->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <script src="https://kit.fontawesome.com/5bea88a2f9.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body onload="loaderSpin()" oncontextmenu="return true">
    <!--loader-->
    <div class="loader-site" id="loader-site">
        <div class="loader-icon"></div>
        <h5>Please wait...</h5>
    </div>

    <div class="main-web-code" id="main-web-code">
        <!--homepage-->
        <section>
            <div class="navbar" id="home-page-navbar">
                <!--<a href="#" style="float: left;margin-top: -7px;"><i class="fa fa-buysellads" aria-hidden="true"></i><span class="webLogo">  WEB-LOGO</span></a>-->
                <a href="#home-page"><i class="fa-solid fa-house"></i>HOME</a>
                <a href="#about-page"><i class="fa-solid fa-address-card"></i> ABOUT</a>
                <a href="#services-page"><i class="fa-brands fa-servicestack"></i> SERVICES</a>
                <a href="#info-page"> INFO</a>
                <a href="#like-comment-page"><i class="fa-solid fa-thumbs-up"></i> LIKE</a>
                <a href="optichat/signchat.php">OPTICHAT</a>
                <a href="#contact-page"> CONTACT</a>
                <div class="dropdown">
                    <a href="#" style="float: right;"> <i class="fa-brands fa-reacteurope" style="color: blue;font-size:24px;font-weight:bold;"></i><span
                            class="dropdown-icon"></span></a>
                    <div class="dropdowncontent">
                        <a href="#team-page"><i class="fa-solid fa-user-plus"></i> TEAM</a>
                        <a href="#about-page"><i class="fa-solid fa-address-card"></i> ABOUT</a>
                        <a href="#info-page"> INFO</a>
                        <a href="optichat/signchat.php">OPTICHAT</a>
                        <a href="#service-page"><i class="fa-brands fa-servicestack"></i> SERVICES</a>


                    </div>
                </div>
                <div class="scroll-indicator-container">
                    <div class="scroll-indicator-container-content" id="scroll-bar"></div>
                </div>
            </div>

            <div class="navbars" id="home-page-navbars">
                <a href="javascript:void()" id="crossBtn" class="crossbtn" onclick="myCrossBtn()">&times;</a>
                <a href="#home-page">HOME</a>
                <a href="#about-page">ABOUT</a>
                <a href="#team-page">TEAM</a>
                <a href="#services-page">SERVICES</a>
                <a href="#contact-page">CONTACTS</a>
                <a href="#like-comment-page">LIKE</a>
                <a href="optichat/signchat.php">OPTICHAT</a>
                <a href="#video-page">VIDEOGRAPHY</a>
                <a href="javascript:void()" id="crossBtn" class="crossbtn2" onclick="myCrossBtn()">&times;</a>
            </div>
            <div class="nav-button">
                <a href="javascript:void(0)" onclick="openNAv()" class="openBtn" id="openBtn">&#9776;</a>
            </div>
        </section>
        <div class="web-margin">
            <section class="home-page" id="home-page">
                <div class="home-page-content">
                    <h2 class="welcome-txt">welcome</h2><span>
                        <h4 id="desc">It's on a</h4>
                        <h4 id="date-time"></h4>
                        <h5 id="fun-txt">
                            /*Do what u love and love what u do*/
                        </h5>
                </div>

                <div class="home-page-icons">
                    <a href="#home-page">
                        <div class="icon-text" style="padding: 10px;">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <div class="text">
                                    Home
                                </div>
                            </button>                        
                        </div>
                    </a>
                    
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#about-page">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-address-card" style="color: #448A98;"></i>
                                </div>
                                <div class="text">
                                    About
                                </div>
                            </button>
                        </a>
                        

                    </div>
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#team-page">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-user-plus" style="color: darkslateblue;"></i>
                                </div>
                                <div class="text" >
                                    Team
                                </div>
                            </button>
                        </a>
                        
                        
                    </div>
                    <div class="icon-text" style="padding: 10px;">
                        <a href="optichat/signchat.php">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-comment-sms" style="color: black;" ></i>
                                </div>
                                <div class="text">
                                    Optichat
                                </div>
                            </button>
                        </a>
                        
                        
                    </div>
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#contact-page">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-user-group" ></i>
                                </div>
                                <div class="text">
                                    Contacts
                                </div>
                            </button>
                        </a>
                        
                        
                    </div>
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#like-comment-page">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-thumbs-up" style="color: red;"></i>
                                </div>
                                <div class="text">
                                    Like
                                </div>
                            </button>
                        </a>
                        
                        
                    </div>
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#services-page">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-gears" style="color: #f10e8b;"></i>
                                   
                                </div>
                                <div class="text">
                                    services
                                </div>
                            </button>
                        </a>                        
                        
                    </div>
                    
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#video-page">
                            <button style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-video" style="color: #50A8F0;"></i>
                                </div>
                                <div class="text">
                                    Videography
                                </div>
                            </button>
                        </a>

                        
                    </div>
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#timeline-page">
                            <button  onclick="techUsedPage()" style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-solid fa-code"></i>
                                </div>
                                <div class="text">
                                    Tech
                                </div>
                            </button>
                        </a>                       
                        
                    </div>
                   
                    <div class="icon-text" style="padding: 10px;">
                        <a href="#qoutes-page" >
                            <button onclick="quotePage()" style="background-color: transparent; border: none;" id="homepage-youtube-btn">
                                <div class="icon">
                                    <i class="fa-brands fa-buffer"></i>                                 
                                </div>
                                <div class="text">
                                    Qoutes
                                </div>
                               
                            </button>
                        </a>                       
                        
                    </div>
                   
                </div>
                <div class="goto-bottom-btn">
                    <button><a href="#info-page"><i class="fa-solid fa-circle-arrow-down"></i></a></button>
                </div>
            </section>



            <!--about page.....................................................................................................................-->
            <section id="about-page" class="about-page">
                <div class="about-page-heading">
                    <span class="first-line"></span>
                    <span class="page-name">ABOUT</span>
                    <span class="second-line"></span>
                </div>
                <div class="about-page-container">
                    <div class="about-page-content">
                        <h4 class="content-text">
                            This website is build by a self taught front-end web developer and back-end web developer(Alex).The
                            <br> aim is to design and develop interactive front-end and back-end website that runs across modern broswer such<br> a
                            <span class="blue-text">GOOGLE CHROME</span> and others.This is accompained by providing clean and error-free <br>codes.Also  designing and developing responsive website that makes the website accessible and available to any user
                            regardless of their devices in-hand.
                        </h4>
                        <div class="img-container-about-page">
                            <img src="Artificial-Intelligence-5.jpg" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <!--team page.....................................................................................................................-->
            <section class="team-page" id="team-page">
                <div class="team-page-heading">
                    <span class="first-line"></span>
                    <span class="page-name">TEAM</span>
                    <span class="second-line"></span>
                </div>
                <div class="team-page-content">
                    <div class="row-1">
                        <div class="col">
                            <div class="img-container-team-page">
                                <img src="web app des.jpg" alt="">
                            </div>
                            <h4 class="profession">Web application developer</h4>
                            <p class="get-intouch">Get-in-touch with me</p>
                            <div class="btn-get-in-touch">
                                <a href="https://wa.link/vtlqqd" target="_blank"><button class="card-btn">Click
                                        Here</button></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-container-team-page">
                                <img src="soft eng.jpg" alt="">
                            </div>
                            <h4 class="profession">Software developer</h4>
                            <p class="get-intouch">Get-in-touch with me</p>
                            <div class="btn-get-in-touch">
                                <a href="https://wa.link/wc3lp4" target="_blank"><button class="card-btn">Click
                                        Here</button></a>
                            </div>
                        </div>

                    </div>
                    <div class="row-2">
                        <div class="col">
                            <div class="img-container-team-page">
                                <img src="net engg.jpg" alt="">
                            </div>
                            <h4 class="profession">Networking engineer</h4>
                            <p class="get-intouch">Get-in-touch with me</p>
                            <div class="btn-get-in-touch">
                                <a href="https://wa.link/2w5lf8" target="_blank"><button class="card-btn">Click
                                        Here</button></a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="img-container-team-page">
                                <img src="cyber ces.jpg" alt="">
                            </div>
                            <h4 class="profession">Cyber security engineer</h4>
                            <p class="get-intouch">Get-in-touch with me</p>
                            <div class="btn-get-in-touch">
                                <a href="https://wa.me/2w5lf8" target="_blank"><button class="card-btn">Click
                                        Here</button></a>
                            </div>
                        </div>
                    </div>

            </section>

            <!--services page.....................................................................................................................-->

            <section id="services-page" class="services-page">
                <div class="service-page-heading">
                    <span class="first-line"></span>
                    <span class="page-name">SERVICES-:</span>
                    <span class="second-line"></span>
                </div>
                <div class="slider-container">
                    <div class="slider-card-track">

                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="web hosting.jpg" alt="">
                            </div>
                            <h4 class="profession">web hosting</h4>
                            <p class="get-intouch">
                                Get-in-touch
                            </p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a
                                        href="https://www.webhostkenya.co.ke/" target="_blank">Click Here</a></button>
                            </div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="R.jpg" alt="">
                            </div>
                            <h4 class="profession">Electronics repair</h4>
                            <p class="get-intouch">
                                Get-in-touch
                            </p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a
                                        href="https://wa.link/2w5lf8" target="_blank">Click Here</a></button>
                            </div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="Web-Application.jpg" alt="">
                            </div>
                            <h4 class="profession">Web applications</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/wc3lp4"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="download.jpg" alt="">
                            </div>
                            <h4 class="profession">Server administration</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/2w5lf8"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="Network-systems.jpg" alt="">
                            </div>
                            <h4 class="profession">Computer networking</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/2w5lf8"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="net admin.jpg" alt="">
                            </div>
                            <h4 class="profession">Network administration</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/2w5lf8"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="web dev.jpg" alt="">
                            </div>
                            <h4 class="profession">Web development</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/wc3lp4"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="images2.jpg" alt="">
                            </div>
                            <h4 class="profession">Concurrent programming</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/vtlqqd"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="download (5).jpg" alt="">
                            </div>
                            <h4 class="profession">Cryptography</h4>
                            <p style="text-align: center;">(secure your communication)</p>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/2w5lf8"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="net sec.jpg" alt="">
                            </div>
                            <h4 class="profession">Network security</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/2w5lf8"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="Web-Application.jpg" alt="">
                            </div>
                            <h4 class="profession">Web applications</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/vtlqqd"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="web dev.jpg" alt="">
                            </div>
                            <h4 class="profession">Web development</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/vtlqqd"
                                        target="_blank">Click Here</a></button></div>
                        </div>

                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="data admin.jpg" alt="">
                            </div>
                            <h4 class="profession">Database administration</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/2w5lf8"
                                        target="_blank">Click Here</a></button></div>
                        </div>

                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="software archi.png" alt="">
                            </div>
                            <h4 class="profession">software architectural design</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/wc3lp4"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                        <div class="slider-card-content">
                            <div class="img-container-services-page">
                                <img src="softwarw dev.jfif" alt="">
                            </div>
                            <h4 class="profession">software development</h4>
                            <p class="get-intouch">Get-in-touch...</p>
                            <div class="btn-get-in-touch"><button class="card-btn"><a href="https://wa.link/wc3lp4"
                                        target="_blank">Click Here</a></button></div>
                        </div>
                    </div>
                    <!--<div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>-->
                </div>
                <div class="interested-part">
                    <span class="interested-text">Interested with our services?</span>
                    <div class="interested-part-content">
                        <span class="interested-arrow"></span>
                        <span class="interested-arrow"></span>
                        <span class="interested-arrow"></span>
                        <span class="interested-btn"><button onclick="serviceForm()"  id="service-form-page">Click
                                here</button></span>
                    </div>
                </div>
                <div class="services-form" id="services-form">
                    <h3 class="first-head-tag">To get our services</h3>
                    <h3 class="services-third-tag">or</h3>
                    <div class="services-form-container">
                        <div class="services-form-container-icon">
                            <h3>Contact us via:</h3>
                            <div class="services-form-container-icon-text-content-left">
                                <div class="services-icon-text">
                                    <div class="service-page-whatsapp-icon">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </div>
                                    <div class="left-text-content" style="padding-top: 20px;">
                                        <a href="https://wa.link/vtlqqd" target="_blank">click this text to open whatsapp</a>
                                    </div>
                                </div>
                                <div class="services-icon-text phone">
                                    <div class="service-page-phone-icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="left-text-content" style="padding-top: 20px;">
                                        0700503417
                                    </div>
                                </div>
                                <div class="services-icon-text message">
                                    <div class="service-page-message-icon">
                                        <i class="fa-solid fa-messages"></i>
                                    </div>
                                    <div class="service-page-message-icon-desc" style="padding-top: 20px;">
                                        0700503417
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="services-form-container-content">
                            <h3>Email us:</h3>

                            <form action="#" class="service-form" method="POST">
                            <!--<div class="error-text">
                                Error message
                            </div>-->
                                <p>
                                    <input type="email" placeholder="Enter your Email" id="inputemail" name="email"  required>
                                </p>
                                <p></p>
                                <input type="text" placeholder="specify the service" id="inputserve" name="service"  required>
                                </p>
                                <p><textarea type="text" placeholder="Compose" id="composed" name="compose"  required></textarea>
                                </p>
                                <div class="ripple-send-btn"><button class="services-send-btn" name="services-send-btn">Send</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--info page,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,-->
            <section id="info-page" class="info-page">
                <div class="service-page-heading">
                    <span class="first-line"></span>
                    <span class="page-name">INFO-:</span>
                    <span class="second-line"></span>
                </div>
                <div class="info-container">
                    <div class="mission-container">
                        <div class="mission-content">
                            <div class="mission-img-container">
                                <img src="mission.jpg" alt="">
                                <h2 class="info-head-three">Mission</h2>
                            </div>
                            <p>Were are committed to empower every individual and every organization in this modern technology to achieve more in real life.<br>This includes...</p>
                            <p>Improving customer interactions.</p>
                            <p>Build a brand reputation websites.</p>
                            <p>Designing website with a user-friendly design and in an interactive format and delight them with product or service offerings beyond their expectations.</p>

                        </div>
                    </div>

                    <div class="vission containerrrr">
                        <div class="vission-contentttt">
                            <div class="vission-img-container">
                                <img src="vision.jpg" alt="">
                                <h2 class="info-head-three">Vission</h2>
                            </div>
                            <p>Consistently work on development process to provide an informative, user-friendly and effective strategy to provide companies with the message or goal they are hoping to accomplish. This development process is to meet the needs
                                of small, medium and large size businesses and enterprises.
                            </p>
                        </div>
                    </div>

                    <div class="core-values-container">
                        <div class="core-values-content">
                            <div class="core-values-img-container">
                                <img src="corevalues.jpg" alt="">
                                <h2 class="info-head-three">Corevalues</h2>
                            </div>
                            <p>
                                Responsibility,hardwork and trust is the key to our development process in order to provide<br>useful and reliable products to our clients

                            </p>

                        </div>
                    </div>

                </div>


            </section>
            <!--like-comment-page...............................................................................................-->
            <section id="like-comment-page" class="like-comment-page">
                <div class="like-comment-page-heading">
                    <span class="first-line"></span>
                    <span class="page-name">LIKE $ COMMENT</span>
                    <span class="second-line"></span>
                </div>
                <div class="like-comment-page-container">
                    <div class="like-comment-page-container-content">

                        <div class="like-comment-page-img-container">
                            <img src="web icon.jpg">
                        </div>
                        <div class="like-comment-page-img-container-text-head">
                            <h2>@alex</h2>
                            <h3>I'do love web programming technology</h3>
                            <div class="like-comment-page-img-container-icon-text">
                                <div class="like-comment-icon-and-input">
                                    <button class="like-comment-thumbs-up" id="like-comment-thumbs-up" onclick="clickFun(this)">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                    </button>
                                    <input type="number" id="input-like" value="211">
                                </div>
                                <div class="like-comment-icon-and-input">
                                    <button class="like-comment-thumbs-down" id="like-comment-thumbs-down" onclick="clickFun(this)">
                                        <i class="fa-solid fa-thumbs-down"></i>
                                    </button>
                                    <input type="number" id="input-dislike" value="12">
                                </div>
                                <div class="like-comment-icon-and-input">
                                    <button class="like-comment-heart-icon" id="like-comment-heart-icon" onclick="clickFun(this)">
                                        <i class="fa-solid fa-heart-circle-check"></i>
                                    </button>
                                    <input type="number" id="input-heart" value=111>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comment-container">
                    <h2>Comments</h2>
                    <form id="comment-form" class="comment-form">
                        <input type="text" class="input" id="input" placeholder="Enter your comment" autocomplete="on">

                        <ul class="todos" id="todos"></ul>
                    </form>
                </div>
            </section>

            <!--qoutex-page.......................................................................................................................-->

            <section class="qoutes-page" id="qoutes-page">
                <div class="service-page-heading ">
                    <span class="first-line "></span>
                    <span class="page-name "><q>Qoutes</q></span>
                    <span class="second-line "></span>
                </div>
                <div class="qoutes-page-container">
                    <div class="qoutes-page-container-content">
                        <div class="qoute-slide">
                            <q>The only thing standing between u and ur goal is the bullsh*t story u keep telling urself as to why u can't achieve it.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>Do what you can, with what you have, where you are.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>Be yourself; everyone else is already taken.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>If opportunity doesn’t knock, build a door.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>Believe you can and you’re halfway there.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>The difference between ordinary and extraordinary is that little extra.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>I haven’t failed. I’ve just found 10,000 ways that won’t work.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>Life has no limitations, except the ones you make.</q>
                        </div>
                        <div class="qoute-slide">
                            <q>You miss 100% of the shots you don’t take..</q>
                        </div>

                        <a class="prev" onclick="plusSlides(-1)"><b>&laquo;</b></a>
                        <a class="next" onclick="plusSlides(1)"><b>&raquo;</b></a>
                    </div>
                    <div class="qoutes-dots-container">
                        <span class="dot" onclick="currentSlideDot(1)"></span>
                        <span class="dot" onclick="currentSlideDot(2)"></span>
                        <span class="dot" onclick="currentSlideDot(3)"></span>
                        <span class="dot" onclick="currentSlideDot(4)"></span>
                        <span class="dot" onclick="currentSlideDot(5)"></span>
                        <span class="dot" onclick="currentSlideDot(6)"></span>
                        <span class="dot" onclick="currentSlideDot(7)"></span>
                        <span class="dot" onclick="currentSlideDot(8)"></span><br>
                        <span class="dot" onclick="currentSlideDot(9)"></span>
                        <small style="color: white; font-size: 11px;" id="small-text">Click one of the circle</small>
                    </div>
                </div>
            </section>
            <!--others webpages................................timele.......................................................................-->
            <section class="timeline-page" id="timeline-page">
                <div class="Tech-lang-heading ">
                    <span class="first-line "></span>
                    <span class="page-name ">Tech lang Used</span>
                    <span class="second-line "></span>
                </div>
                <div class="timeline-page-container">
                    <div class="timeline-page-container-content">
                        <div class="timeline">

                            <div class="container left">
                                <p class="diff-arrow"></p>
                                <div class="content" id="content-1">

                                    <h1 style="text-align: center;">HTML 5</h1>
                                    <div class="timeline-content-img-container">
                                        <img src="img_html.jpg" alt="">
                                    </div>
                                    <p style="text-align: center;color: white;">The language for building web pages.</p>
                                </div>
                            </div>

                            <div class="container right">
                                <div class="content" id="content-2">

                                    <h1 style="text-align: center;">CSS</h1>
                                    <div class="timeline-content-img-container">
                                        <img src="img_css.jpg" alt="">
                                    </div>
                                    <p style="text-align: center; color: white;">The language for styling web pages</p>
                                </div>
                            </div>

                            <div class="container left">
                                <p class="diff-arrow"></p>

                                <div class="content" id="content-3">

                                    <h1 style="text-align: center;">B4</h1>
                                    <div class="timeline-content-img-container">
                                        <img src="img_bootstrap.png" alt="">
                                    </div>
                                    <p style="text-align: center;color: white;font-style: verdana;padding: 20px;">Bootstrap 4 is a version of Bootstrap, which is the most popular HTML, CSS, and JavaScript framework for developing responsive, mobile-first websites.</p>
                                </div>
                            </div>

                            <div class="container right">
                                <div class="content" id="content-4">

                                    <h1 style="text-align: center;">JS</h1>
                                    <div class="timeline-content-img-container">
                                        <img src="img_js.png" alt="">
                                    </div>
                                    <p style="text-align: center;color: white;">Language used for progamming web pages.</p>
                                </div>
                            </div>
                            <div class="container left">
                                <p class="diff-arrow"></p>

                                <div class="content" id="content-5" style="background-color: green;border-radius: 10px;
                            opacity: 1;padding: 20px; margin-left: 10px; transition: 0.5s;">

                                    <h1 style="text-align: center;">PHP</h1>
                                    <div class="timeline-content-img-container">
                                    <i class="fa-brands fa-php" style="color: white;font-size: 45px;"></i>
                                        <!--<img src="img_bootstrap.png" alt="">-->
                                    </div>
                                    <p style="text-align: center;color: white;font-style: verdana;padding: 20px;">A server side programming language.</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </section>
            <!--video-page............................................................................................................-->

            <section class="video-page" id="video-page">
                <div class="service-page-heading ">
                    <span class="first-line "></span>
                    <span class="page-name ">VIDEOGRAPH</span>
                    <span class="second-line "></span>
                </div>
                <div class="video-page-container ">
                    <div class="video-page-container-content ">
                        <div class="video-page-container-content-text ">
                            <q>
                                Today,You have the potential to showcase your talent and get a thousands,hundreds of
                                thousands or even <span>Millions of audience</span> for free.<br>this has never been
                                possible before throughout world history
                            </q>
                            <h4>
                                <a href="https://www.youtube.com/channel/UCXo47HqX3ooFrOSTh8JUi2Q " target="_blank ">Click here</a> to see a humbled and a talented spoken word artist and aslo a content creator.
                            </h4>
                            <div class="video-page-container-content-btn ">
                                <a href="https://www.youtube.com/channel/UCXo47HqX3ooFrOSTh8JUi2Q " target="_blank "><button>Kenta kenya youtube</button></a>
                            </div>
                        </div>
                        <div class="video-page-container-content-video ">
                            <h4>One of the artist's track.</h4>
                            <div class="video-page-container-content-video-container ">
                                <video controls loop autoplay muted src="VID-20220107-WA0004.mp4 "></video>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="contact-page" class="contact-page">
                <div class="contact-page-heading ">
                    <span class="first-line "></span>
                    <span class="page-name ">CONTACT</span>
                    <span class="second-line "></span>
                </div>
                <div class="contact-page-container ">
                    <h3>Get-in-touch</h3>
                    <h3 class="contact-page-container-h3 ">or</h3>
                    <div class="contact-page-container-content ">
                        <div class="contact-page-container-content-text-side ">
                            <h3>via:</h3>
                            <div class="contact-page-container-icon-text-content-left ">
                                <div class="contact-icon-text ">
                                    <div class="contact-page-whatsapp-icon ">
                                        <i class="fa-brands fa-whatsapp "></i>
                                    </div>
                                    <div class="contact-page-whatsapp-icon-text ">
                                        <a href="https://wa.link/vtlqqd"target="_blank">click this text to open whatsapp</a>
                                    </div>
                                </div>
                                <div class="contact-icon-text phone ">
                                    <div class="contact-page-phone-icon ">
                                        <i class="fa-solid fa-phone "></i>
                                    </div>
                                    <div class="contact-page-phone-icon-text ">
                                        0700503417
                                    </div>
                                </div>
                                <div class="contact-icon-text message ">
                                    <div class="contact-page-message-icon ">
                                        <i class="fa-solid fa-messages "></i>
                                    </div>
                                    <div class="contact-page-messsage-icon-text ">
                                        0700503417
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="contact-form-container-content ">
                            <h3 class="contact-form-container-content-h3 ">or</h3>
                            <h3>Email us:</h3>

                            <form action="#" class="form2" id="contact-form" method="post">
                            <!--<div class="error-text">
                                Error message
                            </div>-->
                                <p><input type="email" id="inputemail" name="email" onkeyup="isEmpty()" placeholder="Your Email" required>
                                </p>
                                <p><input type="text " id="inputserve" name="ref" onkeyup="isEmpty()" placeholder=" REF:"  required>
                                </p>
                                <p><textarea type="text " id="composed" name="compose" onkeyup="isEmpty()" placeholder=" Compose"  required></textarea>
                                </p>
                                <div class="contact-form-container-content-btn"><button class="submitBtn" name="submitBtn">submit</button></div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <section class="git-account">
                <div class="git-account-container">
                    <div class="git-account-container-content">
                        <h3 id="text">Starting...</h3>
                    </div>
                </div>
                <div class="tooltip-container">
                    <input id="url" value="optilex-000webhost.com">

                    <div class="tooltip-container-content">
                        <button onclick="copyText()" onmouseout="mouseOut()">
                            <span class="tooltip-content" id="tooltip-text">Copy URL</span>
                            <i class="fa-solid fa-paperclip"></i></button>
                    </div>

                </div>
            </section>
            <!--click image.........................fas fa-heart...........................................................................................-->
            <section class="imageclick">
                <div class="image-click-container">
                    <div class="likeMe"></div>
                    <div class="image-click-container-text">
                        <h3 style="color: white; padding: 20px;">Double click on the image to <i class="fa-solid fa-thumbs-up" style="color: red;"></i> it</h3>
                        <small style="color: whitesmoke;">You liked it <span id="times">0</span> times</small>
                    </div>
                </div>
                <a href="#home-page">
                    <p class="top-link">&#10095;</p>
                </a>


            </section>

            <!--footer page..................................................................................-->

            <section class="footer-page" id="footer-page">
                <div class="footer-page-container">
                    <div class="footer-page-container-content">

                        <div class="col-1">
                            <h5 style="text-decoration: underline; color: white;padding-top: -1px;">SOCIAL MEDIA</h5>
                            <div class="footer-icon-text">
                                <div class="footer-whatsapp">
                                    <div class="footer-icon">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </div>
                                    <div class="footer-text" style="color: white; margin-left: 10px;">
                                    <a href="https://wa.link/vtlqqd" target="_blank">Whatsapp</a>                                        
                                    </div>
                                </div>
                                <div class="footer-github">
                                    <!--<div class="footer-icon">
                                        <i class="fa-brands fa-telegram"></i>
                                    </div>
                                    <div class="footer-text" style="color: white;margin-left: 10px;">
                                        Telegram
                                    </div>-->
                                </div>                       
                            </div>
                        </div>

                        <div class="col-center">
                            <h5 style="text-decoration: underline; color: white;">OUR LOCATIONS</h5>
                            <div class="col-center-content">

                                <h3 style="color: #064BFB; padding: 10px;">Kenya-Kutus</h3>
                                <h3 style="color: #064BFB; padding: 10px;">Kirinyaga county</h3>
                            </div>
                        </div>
                        <div class="col-end">
                            <h5 style="text-decoration: underline;color: white;">LICENCE</h5>
                            <div class="col-end-content">

                                <p>This website is licensed and secured to be used by <br> anyone anywhere and contains legal information <br> to any web visitor</p>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text">
                        <p><i class="fa-solid fa-copyright"></i> 2022 <span style="color: white;">front-end dev</span>.All Rights reserved.</p>
                    </div>
                </div>
            </section>
            </div>
        </div>


        <script type="text/javascript " src="index.js "></script>

</body>

</html>