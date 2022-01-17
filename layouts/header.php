<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Project Managagement Application">
    <meta name="keywords" content="oyo state, project management, timelines, ibadan">
    <meta name="author" content="Cloudware">
    <title>Oyo State Project Management App</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/unslider.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/calendars/clndr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/meteocons/style.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->

    <style type="text/css">
       .custom-input-style{
                font-size: 1rem;
    line-height: 1.25;

    display: block;

    width: 100%;
    height: -webkit-calc(2.75rem + 2px);
    height:    -moz-calc(2.75rem + 2px);
    height:         calc(2.75rem + 2px);
    padding: .75rem 1rem;

    -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
       -moz-transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
         -o-transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out; 

    color: #4e5154;
    border: 1px solid #adb5bd;
    border-radius: .21rem;
    background-color: #fff;
    background-clip: padding-box;

       }


    #mapCanvas {
        width: 100%;
        height: 650px;
    }

       
    </style>


  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="#">
              <img class="brand-logo" alt="robust admin logo" src="app-assets/images/logo/logo-light-sm.png">
                <h3 class="brand-text">Project MGT.</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
               <!-- there was a mega menu here -->
            </ul>
            <ul class="nav navbar-nav float-right">         
             
           
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">Samuel Adebunmi</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="logout"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ///////////////////////////////////////////////////////////////////////////SIDEBAR STARTS/-->
    <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    
           <li class=" nav-item"><a href="home"><i class="icon-basket-loaded"></i><span class="menu-title" data-i18n="nav.page-checkout">Dashboard</span></a>
          </li>

          <li class=" nav-item"><a href="zones"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Zones</span></a>
          </li>

          <li class=" nav-item"><a href="display_project_markers"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Project Markers</span></a>
          </li>

           <li class=" nav-item"><a href="project_phases"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Project Phases</span></a>
          </li>

           <li class=" nav-item"><a href="mdas"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View MDAs</span></a>
          </li>

           <li class=" nav-item"><a href="users"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Users</span></a>
          </li>

           <!-- <li class=" nav-item"><a href="#"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Assigned Users</span></a>
          </li>
           <li class=" nav-item"><a href="#"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Unassigned Users</span></a>
          </li> -->

           <li class=" nav-item"><a href="contractors"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Contractors</span></a>
          </li>
           
           <li class=" nav-item"><a href="departments"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Departments</span></a>
          </li>

          <li class=" nav-item"><a href="projects"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Projects</span></a>
          </li>

         <!--  <li class=" nav-item"><a href="#"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">View Milestones</span></a>
          </li> -->

   
          

          <li class=" nav-item"><a href="#"><i class="icon-screen-tablet"></i><span class="menu-title" data-i18n="nav.templates.main">System Setup</span></a>

            <ul class="menu-content">
                <li class=" nav-item"><a href="add_project_phase"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create Phase</span></a>
                </li>
                <li class=" nav-item"><a href="add_zone"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create Zone</span></a>
                </li>
                <li class=" nav-item"><a href="add_mda"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create MDA</span></a>
                </li>
                <li class=" nav-item"><a href="add_user"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create User</span></a>
                </li>
               <!--  <li class=" nav-item"><a href="assign_user"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Assign Users</span></a>
                </li>
                <li class=" nav-item"><a href="unassign_user"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Unassign Users</span></a> -->
                </li>
                <li class=" nav-item"><a href="add_contractor"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create Contractor</span></a>
                </li>
                <li class=" nav-item"><a href="add_project"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create Project</span></a>
                </li>
                 <li class=" nav-item"><a href="add_project_docs"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Project Docs</span></a>
                </li>
                 <li class=" nav-item"><a href="manage_milestones"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Manage Milestones</span></a>
                </li>
                <li class=" nav-item"><a href="add_department"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create Department</span></a>
                </li>
               <!--   <li class=" nav-item"><a href="add_milestones"><i class="icon-notebook"></i><span class="menu-title" data-i18n="nav.page-pricing">Create Milestone</span></a>
                </li> -->
            </ul>

          </li>

          <li class=" nav-item"><a href="logout"><i class="icon-support"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Logout</span></a>
          </li>
       
        </ul>
      </div>
    </div>