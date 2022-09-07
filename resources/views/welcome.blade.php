<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Alumni Tracker</title>

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="This is meta description">
   <meta name="author" content="Themefisher">

   <!-- plugins -->
   <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
   <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/bootstrap.min.css')}}">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

   <link rel="stylesheet" href="{{ asset('assets/plugins/themify-icons/themify-icons.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/plugins/slick/slick.css')}}">

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

   <!--Favicon-->
   <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
   <link rel="icon" href="{{ asset('assets/images/favicon.png')}}" type="image/x-icon">
</head>

<body>
<!-- navigation -->
<header class="sticky-top bg-white border-bottom border-default">
   <div class="container">

      <nav class="navbar navbar-expand-lg navbar-white">
         <a class="navbar-brand" href="index.html">
            <img class="img-fluid" width="150px" src="{{ asset('assets/images/logo.png')}}" alt="LogBook">
         </a>
         <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-menu"></i>
         </button>

         <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.home') }}">Home</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="{{ route('front.about') }}">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('front.events') }}">Events</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.gallery') }}">Gallery</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('alumnies.create') }}">Alumni Register</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Log in</a>
               </li>
               
               
            </ul>
            
            <select class="m-2 border-0" id="select-language">
               <option id="en" value="about/" selected>En</option>
               <option id="fr" value="fr/about/">Fr</option>
            </select>

            <!-- search -->
            <div class="search px-4">
               <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
               <div class="search-wrapper">
                  <form action="javascript:void(0)" class="h-100">
                     <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                  </form>
                  <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
               </div>
            </div>

         </div>
      </nav>
   </div>
</header>
<!-- /navigation -->

   @yield('content')

   <footer class="section-sm pb-0 border-top border-default">
      <div class="container">
         <div class="row justify-content-between">
            <div class="col-md-3 mb-4">
               <a class="mb-4 d-block" href="index.html">
                  <img class="img-fluid" width="150px" src="images/logo.png" alt="LogBook">
               </a>
               <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Quick Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                  <li><a href="privacy-policy.html">Privacy Policy</a></li>
                  <li><a href="terms-conditions.html">Terms Conditions</a></li>
               </ul>
            </div>

            <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Social Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="#">facebook</a></li>
                  <li><a href="#">twitter</a></li>
                  <li><a href="#">linkedin</a></li>
                  <li><a href="#">github</a></li>
               </ul>
            </div>

            <div class="col-md-3 mb-4">
               <h6 class="mb-4">Subscribe Newsletter</h6>
               <form class="subscription" action="javascript:void(0)" method="post">
                  <div class="position-relative">
                     <i class="ti-email email-icon"></i>
                     <input type="email" class="form-control" placeholder="Your Email Address">
                  </div>
                  <button class="btn btn-primary btn-block rounded" type="submit">Subscribe now</button>
               </form>
            </div>
         </div>
         <div class="scroll-top">
            <a href="javascript:void(0);" id="scrollTop"><i class="ti-angle-up"></i></a>
         </div>
         <div class="text-center">
            <p class="content">&copy; Design &amp; Develop By <a href="https://themefisher.com/" target="_blank">Raiyan Najia and Arni Sultana</a></p>
         </div>
      </div>
   </footer>


   <!-- JS Plugins -->
   <script src="{{ asset('assets/plugins/jQuery/jquery.min.js')}}"></script>
   <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js')}}" async></script>
   <script src="{{ asset('assets/plugins/slick/slick.min.js')}}"></script>

   <!-- Main Script -->
   <script src="js/script.js"></script>
</body>
</html>