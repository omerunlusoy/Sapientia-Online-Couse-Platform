<?php

include("connect.php");

if(isset($_POST['invite_instructor_button']))
{

    $instructor_name = $_POST['instructor_name'];
    $instructor_email = $_POST['instructor_email'];


    if($instructor_name=="" | $instructor_email=="")
    {
        echo "<script type='text/javascript'>alert('Fill all the fields!');</script>";
    }
    else
    {
        echo 'hello1';
        session_start();
        $CID = $_SESSION['CID'];
        $IID = $_SESSION['IID'];
        $IIID = 0;

        $sql = "select IID from Instructor where e_mail='$instructor_email' and name='$instructor_name'";
        if( $result = $con->query($sql)) {
            echo 'hello2';
            if ($result->num_rows == 1) {
                echo 'hello3';
                $row = mysqli_fetch_array($result);
                session_start();
                $IIID = $row['IID'];

                if($IIID == $IID){
                    echo "<script type='text/javascript'>alert('You cannot invite yourself!');</script>";
                }
                else
                {
                    echo 'hello4';
                    $sql = "INSERT INTO Teaches (IID, CID)
                    VALUES ('$IIID', '$CID');";

                    if( $result = $con->query($sql)) {
                        echo "<script type='text/javascript'>alert('Invited Instructor Added to the Course!');</script>";
                        header("location: add_course.php");
                    }
                    else
                    {
                        echo "<script type='text/javascript'>alert('Insertion failed!');</script>";
                    }


                }

            }
            else
            {
                echo 'hello5';
                echo "<script type='text/javascript'>alert('No Such Instructor!');</script>";
                header("Location:invite_instructor.php");
            }
        }
        else
        {
            echo 'hello6';
            echo "<script type='text/javascript'>alert('No Such Instructor!');</script>";
            header("Location:invite_instructor.php");
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
    <title>Invite Instructor</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Invite-Instructor.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.13.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">


    <script type="application/ld+json">{
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "",
            "url": "index.html",
            "logo": "images/SapientiaLogo.PNG"
        }</script>
    <meta property="og:title" content="Invite Instructor">
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
<section class="u-align-center u-clearfix u-section-1" id="sec-c4db">
    <h2 class="u-text u-text-1"><b>Invite Instructor</b>
    </h2>
    <div class="u-shape u-shape-svg u-text-palette-4-base u-shape-1">
        <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 160" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4a4f"></use></svg>
        <svg class="u-svg-content" viewBox="0 0 160 160" x="0px" y="0px" id="svg-4a4f" style="enable-background:new 0 0 160 160;"><path d="M151.7,132.5c-3.4,6-7.9,11.7-13.3,16.5c-29.2,26.1-54.1-2.3-88.2-3S0,109.5,0,91.6s14.8-31.3,25.3-45.3S33.4,11,51.8,3
	c15.3-6.6,33.6-0.4,51.6,0.7c11.2,0.7,28.8-3.8,38.2,0.4s11.8,15.4,9.2,22.8c-1.9,5.4-5.5,11.6-12.8,16.5
	c-9.3,10.1-4.7,22.9,3.7,33.4c7.8,9.7,17.7,11.7,18.3,23.5C160.4,110.8,157.6,122.2,151.7,132.5L151.7,132.5z"></path></svg>
    </div>
    <div class="u-shape u-shape-svg u-text-palette-4-base u-shape-2">
        <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 150" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7c7a"></use></svg>
        <svg class="u-svg-content" viewBox="0 0 160 150" x="0px" y="0px" id="svg-7c7a"><path d="M43.2,126.9c14.2,1.3,27.6,7,39.1,15.6c8.3,6.1,19.4,10.3,32.7,5.3c11.7-4.4,18.6-17.4,21-30.2c2.6-13.3,8.1-25.9,15.7-37.1
	c8.3-12.1,10.8-27.9,5.3-42.7C150.5,20.3,134.6,9,117,7.6C107.9,6.9,98.8,5,90.1,1.9C83-0.6,75-0.7,67.4,2.1
	c-9.9,3.7-17,11.6-20.1,21c-3.3,10.1-10.9,18-20.6,22.2c-0.1,0-0.1,0.1-0.2,0.1c-20.3,8.9-31,32-24.6,53.2
	C6.9,115.6,25.2,125.2,43.2,126.9z"></path></svg>
    </div>
    <div class="u-border-12 u-border-palette-4-light-2 u-container-style u-group u-white u-group-1">
        <div class="u-container-layout u-container-layout-1">
            <div class="u-form u-form-1">
                <form action="#" method="POST" >
                    <div class="u-form-group u-form-name">
                        <label for="name-6797" class="u-label">Instructor Name</label>
                        <input type="text" placeholder="Enter Instructor Name" id="name-6797" name="instructor_name" class="u-border-2 u-border-palette-4-base u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-email u-form-group u-form-group-2">
                        <label for="text-422d" class="u-label">Instructor Email</label>
                        <input type="email" placeholder="Enter Instructor Mail" id="text-422d" name="instructor_email" class="u-border-2 u-border-palette-4-base u-input u-input-rectangle">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                        <a href="invite_instructor.php" class="u-btn u-btn-round u-btn-submit u-button-style u-hover-palette-2-light-1 u-palette-2-light-2 u-radius-15 u-btn-1">Invite Instructor<br>
                        </a>
                        <input type="submit" name='invite_instructor_button' value="submit" class="u-form-control-hidden">
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>


<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-266b"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Wisdom is life...</p>
    </div></footer>

</body>
</html>