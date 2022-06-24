<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- AppealLab script and css classes -->
        <link rel="icon" type="{{ asset('image/png') }}" sizes="16x16" href="{{ asset('AppealLab/images/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('AppealLab/js/ajax.js') }}">
        <link rel="stylesheet" href="{{ asset('AppealLab/vendor/chartist/css/chartist.min.css') }}">
        <link href="{{ asset('AppealLab/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link href="{{ asset('AppealLab/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('AppealLab/css/style.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

            <!--**********************************
            Main wrapper start
            ***********************************-->
            <div id="main-wrapper">


                    <!--**********************************
                    Nav header start
                    ***********************************-->
                    <div class="nav-header">
                        <a href="{{ url('dashboard') }}" class="brand-logo">
                            {{-- <img class="logo-abbr" src="{{ asset('AppealLab/images/logo1.png') }}" alt="">
                            <img class="logo-compact" src="{{ asset('AppealLab/images/logo-text1.png') }}" alt=""> --}}
                            <img class="brand-title" src="{{ asset('AppealLab/images/mz-logo-dark.png') }}" alt="">
                        </a>

                        <div class="nav-control">
                            <div class="hamburger">
                                <span class="line"></span><span class="line"></span><span class="line"></span>
                            </div>
                        </div>
                    </div>
                    <!--**********************************
                        Nav header end
                    ***********************************-->

                    <!--**********************************
                        Header start
                    ***********************************-->
                    <div class="header">
                        <div class="header-content">
                            <nav class="navbar navbar-expand">
                                <div class="collapse navbar-collapse justify-content-between">
                                    <div class="header-left">
                                        @if (auth()->user()->role_id == 1)
                                             <h1><b>Admin</b></h1>
                                        @endif
                                        @if (auth()->user()->role_id == 2)
                                             <h1><b>Teacher</b></h1>
                                        @endif
                                        @if (auth()->user()->role_id == 3)
                                             <h1><b>Student</b></h1>
                                        @endif
                                        <!-- <div class="dashboard_bar">
                                            <img src="{{ asset('AppealLab/images/logo1.jpg') }}" alt="">
                                            <img src="{{ asset('AppealLab/images/logo-text1.jpg') }}" alt="">
                                        </div> -->
                                    </div>
                                    <ul class="navbar-nav header-right">

                                        <li class="nav-item dropdown header-profile">
                                            <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                                <img src="{{ asset('AppealLab/images/ahtisham.jpg') }}" width="20" alt=""/>
                                                <div class="header-info">
                                                    <span class="text-black"><strong>{{ Auth::user()->name }}</strong></span>

                                                        <p class="fs-12 mb-0"> {{ Auth::user()->email }}</p>

                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">

                                                <a href="{{ url('user/profile') }}" class="dropdown-item ai-icon">
                                                    <span class="ml-2">Profile </span>
                                                </a>

                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!--**********************************
                        Header end ti-comment-alt
                    ***********************************-->

                    <!--**********************************
                        Sidebar start
                    ***********************************-->
                    <div class="deznav">
                        <div class="deznav-scroll">
                            <ul class="metismenu" id="menu">
                                @if (auth()->user()->role_id == 1)
                                    <li><a class="has-arrow ai-icon" href="{{ url('dashboard') }}" aria-expanded="false">
                                        <i class="flaticon-381-networking"></i>
                                        <span class="nav-text">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                        <i class="flaticon-381-network"></i>
                                        <span class="nav-text">Users</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ url('admin/user-registration') }}">Create User</a></li>
                                        <li><a href="{{ url('admin/') }}">Admin</a></li>
                                        <li><a href="{{ url('admin/teacher') }}">Teacher</a></li>
                                        <li><a href="{{ url('admin/student') }}">Student</a></li>
                                    </ul>
                                </li>

                                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                        <i class="flaticon-381-network"></i>
                                        <span class="nav-text">Courses</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ url('admin/courses') }}">View</a></li>
                                        <li><a href="{{ url('admin/create') }}">Create</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                        <i class="flaticon-381-network"></i>
                                        <span class="nav-text">Assign To Teacher</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ url('admin/course-assign-to-teacher') }}">view</a></li>
                                        <li><a href="{{ url('admin/create-course-assign-to-teacher') }}">Create</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                        <i class="flaticon-381-network"></i>
                                        <span class="nav-text">Assign To Student</span>
                                    </a>
                                    <ul aria-expanded="false">
                                        <li><a href="{{ url('admin/course-assign-to-student') }}">view</a></li>
                                        <li><a href="{{ url('admin/create-course-assign-to-student') }}">Create</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if (auth()->user()->role_id == 2)
                                    <li><a class="has-arrow ai-icon" href="{{ url('dashboard') }}" aria-expanded="false">
                                            <i class="flaticon-381-networking"></i>
                                            <span class="nav-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li><a class="has-arrow ai-icon" href="{{ url('teacher/Courses') }}" aria-expanded="false">
                                            <i class="flaticon-381-networking"></i>
                                            <span class="nav-text">Teacher Courses</span>
                                        </a>
                                    </li>
                                @endif

                                @if (auth()->user()->role_id == 3)
                                    <li><a class="has-arrow ai-icon" href="{{ url('dashboard') }}" aria-expanded="false">
                                            <i class="flaticon-381-networking"></i>
                                            <span class="nav-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li><a class="has-arrow ai-icon" href="{{ url('student/Courses') }}" aria-expanded="false">
                                            <i class="flaticon-381-networking"></i>
                                            <span class="nav-text">Courses</span>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <!--**********************************
                        Sidebar end
                    ***********************************-->


                    <!-- Page Headinge -->
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content -->
                    <main>

                    <!--**********************************
                    Content body start content-body"
                    ***********************************-->
                    <div>
                        <div class="min-h-screen bg-gray-100">
                            <div class="content-body">

                            {{ $slot }}

                            </div>
                        </div>
                    </div>
                    <!--**********************************
                        Content body end
                    ***********************************-->


                    </main>
            </div>
            <!--**********************************
            Main wrapper end
            ***********************************-->
        @stack('modals')

        @livewireScripts

    </body>
</html>

    <!--**********************************
    Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('AppealLab/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('AppealLab/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset('AppealLab/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('AppealLab/js/custom.min.js') }}"></script>
	<script src="{{ asset('AppealLab/js/deznav-init.js') }}"></script>
	<script src="{{ asset('AppealLab/vendor/owl-carousel/owl.carousel.js') }}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{ asset('AppealLab/vendor/peity/jquery.peity.min.js') }}"></script>

	<!-- Apex Chart -->
	<!-- <script src="{{ asset('AppealLab/vendor/apexchart/apexchart.js') }}"></script> -->

	<!-- Dashboard 1 -->
	<!-- <script src="{{ asset('AppealLab/js/dashboard/dashboard-1.js') }}"></script> -->
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},
					1200:{
						items:2
					},

					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});
	</script>
