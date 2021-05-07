<?php

include("connect.php");

if(isset($_POST['e_mail']))
{
    $e_mail = $_POST['e_mail'];
    $password = $_POST['password'];


    if($e_mail=="" | $password=="")
    {
        echo "<script type='text/javascript'>alert('Fill all the fields!');</script>";
    }
    else
    {
        $sql = "select SID from Student where e_mail='$e_mail' and password='$password'";
        if( $result = $con->query($sql))
        {

            if($result->num_rows==1)
            {
                session_start();
                $_SESSION['login_user'] = $e_mail;
                $_SESSION['login_pass'] = $password;
                header("location: student_main.php");
            }
            else
            {
                $sql = "select IID from Instructor where e_mail='$e_mail' and password='$password'";
                if( $result = $con->query($sql))
                {
                    if($result->num_rows==1)
                    {
                        session_start();
                        $_SESSION['login_user'] = $e_mail;
                        $_SESSION['login_pass'] = $password;
                        header("location: instructor_main_courses.php");
                    }
                    echo "<script type='text/javascript'>alert('Invalid E-mail or Password!');</script>";
                }
                echo "<script type='text/javascript'>alert('Invalid E-mail or Password!');</script>";
            }
        }
        else
        {
            header("Location:index.php");
        }

    }
}
?>




<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Learn Everyday, Join online courses today, Train Your Brain Today!, Learn to enjoyevery minute of your life., Online Learning, Innovations in Online Learning, Education and Learning, 01, 02, 03, 04, Contact Us">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Login</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Login.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.13.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">


    <script type="application/ld+json">{
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "url": "index.html",
            "logo": "images/SapientiaLogo.PNG"
        }</script>
    <meta property="og:title" content="Login">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
</head>
<body class="u-body"><header class="u-clearfix u-header u-header" id="sec-85c8"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="521" data-image-height="202">
            <img src="images/SapientiaLogo.PNG" class="u-logo-image u-logo-image-1" data-image-width="196.129">
        </a>
    </div></header>
<section class="u-clearfix u-image u-valign-top u-section-1" id="sec-832e">
    <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
                <div class="u-align-left u-container-style u-layout-cell u-size-29 u-layout-cell-1">
                    <div class="u-container-layout u-container-layout-1">
                        <h5 class="u-custom-font u-font-pt-sans u-text u-text-1">online learning</h5>
                        <h1 class="u-text u-text-2">Sapientia</h1>
                        <h1 class="u-text u-text-3">Login for Wisdom</h1>
                        <div class="u-form u-form-1">
                            <form method="POST" action="#">
                                <div class="u-form-group u-form-name">
                                    <label for="name-4921" class="u-form-control-hidden u-label">Name</label>
                                    <input type="email" id="user" name="e_mail" placeholder="Enter Your Email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                                </div>
                                <div class="u-form-email u-form-group">
                                    <label for="email-4921" class="u-form-control-hidden u-label">Email</label>
                                    <input type="password" type="password" id="pass" name="password" placeholder="Enter Your ID as Password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                                </div>
                                <div class="u-align-left u-form-group u-form-submit">
                                    <a href="#" class="u-btn u-btn-submit u-button-style">Login<br>
                                    </a>
                                    <input type="submit" name ="loginButton" value="submit" class="u-form-control-hidden">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="u-align-right u-container-style u-image u-layout-cell u-size-31 u-image-1">
                    <div class="u-container-layout u-valign-bottom u-container-layout-2"></div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-266b"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Wisdom is life...</p>
    </div></footer>

</body>
</html>





