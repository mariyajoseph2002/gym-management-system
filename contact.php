
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Contact </title>

    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
  </head>
  <body>
<!--header-->
<header id="site-header" class="fixed-top">
  <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
          <h1> <a class="navbar-brand" href="index.php">
               <i>K&M</i>
              </a></h1>
          <!-- if logo is image enable this   
  <a class="navbar-brand" href="#index.html">
      <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
  </a> -->
          <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
              data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
              <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item @@home__active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item @@home__active">
                      <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item @@about__active">
                      <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item @@classes__active">
                      <a class="nav-link" href="classes.php">Services</a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                  
                  </div>
</ul>
          </div>
          
      </nav>
  </div>
</header>
<!--/header-->
<section class="w3l-breadcrumb">
    <div class="breadcrumb-bg breadcrumb-bg-contact py-5">
        <div class="container py-lg-5 py-md-3">
            <h3 class="title-big text-center">Contact Us</h3>
            <p class="mt-3">Join the Best GYM in Your Town!</p>
        </div>
    </div>
</section>
<!-- contact form -->
<section class="w3l-contacts-12 py-5" id="contact">
	<div class="container py-md-3">
		<div class="contacts12-main">
			<div class="title-section">
                <h3 class="main-title-w3 mb-3"><span class="lnr lnr-map-marker"></span> Palarivattom, near burger lounge , eranakulam </h3>
                <h3 class="main-title-w3 mb-5">Lets talk <span class="lnr ml-2 lnr-phone-handset"></span><a href="tel:"+91 9786543213 >+91 9786543213</a></h3>
			</div>
			<form action="https://sendmail.w3layouts.com/submitForm" method="post" class="">
				<div class="main-input">
					<input type="text" name="w3lName" placeholder="Enter your name" class="contact-input" required="" />
					<input type="email" name="w3lSender" placeholder="Enter your mail" class="contact-input" required="" />
					<input type="number" name="w3lPhone" placeholder="Your phone number" class="contact-input" required="" />
					<textarea class="contact-textarea contact-input" name="w3lMessage" placeholder="Enter your message"
						required=""></textarea>
				</div>
				<div class="text-right">
					<button class="btn-primary btn btn-style">Submit</button>
				</div>
			</form>
		</div>
	</div>
</section>

 <!-- footers 20 -->
 <section class="w3l-footers-20">
   <div class="footers20">
     <div class="container">
       <div class="footers20-content">
         <div class="d-grid grid-col-4 grids-content">
           <div class="column">
             <h4>Address</h4>
             <p class="contact-para3">Palarivattom, near burger lounge, eranakulam</p>
             
               
           </div>
           <div class="column">
             <h4>Get in touch</h4>
             <p>Join the Best GYM in Your Town!</p>
             <a href="tel:"+91 9786543213>
               <p class="contact-phone mt-2"><span class="lnr lnr-phone-handset"></span> +91 9786543213
               </p>
             </a>
             <a href="mailto:mail@example.com">
               <p class="contact-mail mt-1"><span class="lnr lnr-envelope"></span> km@gmail.com</p>
             </a>
           </div>
           <div class="column">
             <h4>Opening hours</h4>
             <p>We are working on</p>
             <p class="mt-1"><span class="lnr lnr-clock"></span> <strong>Mon - Fri</strong> : 7am to 9pm</p>
             <p class="mt-1"><span class="lnr lnr-clock"></span> <strong>Sat - Sun</strong> : 10 am to 8 pm
             </p>
           </div>
         </div>
         <div class="d-grid grid-col-3 grids-content1 bottom-border">
           
           <div class="columns text-lg-right social-grid">
             <ul class="social">
               <li><a href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
               <li><a href="#url"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>
               <li><a href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
             </ul>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- move top -->
   <button onclick="topFunction()" id="movetop" title="Go to top">
     &#10548;
   </button>
   <script>
     // When the user scrolls down 20px from the top of the document, show the button
     window.onscroll = function () {
       scrollFunction()
     };

     function scrollFunction() {
       if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
         document.getElementById("movetop").style.display = "block";
       } else {
         document.getElementById("movetop").style.display = "none";
       }
     }

     // When the user clicks on the button, scroll to the top of the document
     function topFunction() {
       document.body.scrollTop = 0;
       document.documentElement.scrollTop = 0;
     }
   </script>
   <!-- /move top -->
 </section>


 <script src="assets/js/jquery-3.3.1.min.js"></script>

 <script src="assets/js/theme-change.js"></script><!-- theme switch js (light and dark)-->

 <!-- libhtbox -->
 <script src="assets/js/lightbox-plus-jquery.min.js"></script>

 <script src="assets/js/owl.carousel.js"></script>
 <!-- script for banner slider-->
 <script>
   $(document).ready(function () {
     $('.owl-one').owlCarousel({
       loop: true,
       margin: 0,
       nav: false,
       responsiveClass: true,
       autoplay: false,
       autoplayTimeout: 5000,
       autoplaySpeed: 1000,
       autoplayHoverPause: false,
       responsive: {
         0: {
           items: 1,
           nav: false
         },
         480: {
           items: 1,
           nav: false
         },
         667: {
           items: 1,
           nav: true
         },
         1000: {
           items: 1,
           nav: true
         }
       }
     })
   })
 </script>
 <!-- //script -->

 <!-- script for tesimonials carousel slider -->
 <script>
   $(document).ready(function () {
     $(".owl-two").owlCarousel({
       loop: true,
       margin: 20,
       nav: false,
       responsiveClass: true,
       responsive: {
         0: {
           items: 1,
           nav: false
         },
         768: {
           items: 2,
           nav: false
         },
         1000: {
           items: 3,
           nav: false,
           loop: false
         }
       }
     })
   })
 </script>
 <!-- //script for tesimonials carousel slider -->

 <script>
   $(document).ready(function () {
     $('.owl-carousel-posts').owlCarousel({
       loop: true,
       margin: 0,
       responsiveClass: true,
       autoplay: true,
       autoplayTimeout: 2000,
       autoplaySpeed: 1000,
       autoplayHoverPause: true,
       responsive: {
         0: {
           items: 2,
           nav: false
         },
         480: {
           items: 3,
           nav: true,
           margin: 0
         },
         736: {
           items: 4,
           nav: true,
           margin: 0
         },
         1000: {
           items: 5,
           nav: true,
           margin: 0
         }
       }
     })
   })
 </script>
 <!-- /slider -->

 <!-- script for teams1-->
 <script>
   $(document).ready(function () {
     $('.owl-carousel').owlCarousel({
       loop: true,
       margin: 0,
       responsiveClass: true,
       responsive: {
         0: {
           items: 1,
           nav: true
         },
         400: {
           items: 2,
           nav: true,
           margin: 20
         },
         1000: {
           items: 4,
           nav: true,
           loop: true,
           margin: 25
         }
       }
     })
   })
 </script>
 <!-- //script for teams1-->


 <!-- stats number counter-->
 <script src="assets/js/jquery.waypoints.min.js"></script>
 <script src="assets/js/jquery.countup.js"></script>
 <script>
   $('.counter').countUp();
 </script>
 <!-- //stats number counter -->

 <!-- disable body scroll which navbar is in active -->
 <script>
   $(function () {
     $('.navbar-toggler').click(function () {
       $('body').toggleClass('noscroll');
     })
   });
 </script>
 <!-- disable body scroll which navbar is in active -->

 <!--/MENU-JS-->
 <script>
   $(window).on("scroll", function () {
     var scroll = $(window).scrollTop();

     if (scroll >= 80) {
       $("#site-header").addClass("nav-fixed");
     } else {
       $("#site-header").removeClass("nav-fixed");
     }
   });

   //Main navigation Active Class Add Remove
   $(".navbar-toggler").on("click", function () {
     $("header").toggleClass("active");
   });
   $(document).on("ready", function () {
     if ($(window).width() > 991) {
       $("header").removeClass("active");
     }
     $(window).on("resize", function () {
       if ($(window).width() > 991) {
         $("header").removeClass("active");
       }
     });
   });
 </script>
 <!--//MENU-JS-->

 <script src="assets/js/bootstrap.min.js"></script>

 </body>

 </html>