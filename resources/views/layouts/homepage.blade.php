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
<header style="background:#FF6F61 !important; color:white" class="sticky-top border-bottom border-default">
   <div class="container">

      <nav class="navbar navbar-expand-lg navbar-white text-white">
         <a class="navbar-brand" href="{{ route('front.home') }}">
            <img class="img-fluid" width="100px" src="{{ asset('assets/images/logo.png')}}" alt="LogBook">
         </a>
         

         <div class="collapse navbar-collapse text-center" id="navigation">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('front.home') }}">Home</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-white" href="{{ route('front.about') }}">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link text-white" href="{{ route('front.events') }}">Events</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link text-white" href="{{ route('front.galleries') }}">Gallery</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link text-white" href="{{ route('front.trainings') }}">Training</a>
                </li>
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('front.alumnies.index') }}">Alumnies</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('front.jobs') }}">Job Opportunities</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('front.contact') }}">Contact</a>
               </li>

               @if(Auth::guard('staff')->user())
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('staff.dashboard') }}">{{ Auth::guard('staff')->user()->name }}</a>
               </li>
               @elseif(Auth::guard('alumni')->user())
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('alumni.dashboard') }}">{{ Auth::guard('alumni')->user()->name }}</a>
               </li>

               @elseif(Auth::user())
               <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">{{ Auth::user()->name }}</a>
               </li>

               @else
               <li class="nav-item dropdown">
                  <a class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">Login <i class="ti-angle-down ml-1"></i>
                  </a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="{{ route('login') }}">Admin Login</a>
                     <a class="dropdown-item" href="{{ route('staff.login') }}">Staff Login</a>
                     <a class="dropdown-item" href="{{ route('alumni.login') }}">Alumni Login</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">Register <i class="ti-angle-down ml-1"></i>
                  </a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="{{ route('staffs.create') }}">Staff Registration</a>
                     <a class="dropdown-item" href="{{ route('alumnies.create') }}">Alumni Registration</a>
                  </div>
               </li>
               @endif
               
            </ul>

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
            <h6 class="mb-4">Address</h6>
               <p>University of Information Technology and Sciences (UITS), Holding 190, Road 5, Block J, Baridhara, Maddha, Naya Nagar Rd, Dhaka 1212.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-6 mb-4">
               <h6 class="mb-4">About Alumni Tracking</h6>
               <p>The proposed system will be on-line so it can be accessed by alumni anywhere. It will enable quick and easy communication. Each user will be responsible for the updating their own information. Each user will also have the option to maintain their privacy.</p>
            </div>

            <div class="col-lg-4 col-md-4 col-6 mb-4">
               <h6 class="mb-4">Quick Menu</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="{{ route('front.home') }}">Home</a></li>
                  <li><a href="{{ route('front.about') }}">About</a></li>
                  <li><a href="{{ route('front.contact') }}">Contact</a></li>
                  <li><a href="{{ route('front.events') }}">Events</a></li>
               </ul>
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
   @yield('script')
</body>
</html>