 <style>
   .border-bottom1 {
     border-bottom: 0.0625rem solid #f21ee0a0 !important;
   }

   .iconos {
     font-size: x-large;
     margin-left: 20px;
     color: #f21ee0a0;
   }
 </style>
 <?php if ($_SESSION['role'] == "administrador") { ?>
   <footer class="footer">
     <div class="container-fluid">
       <ul class="nav">
         <li class="nav-item">
           <a href="javascript:void(0)" class="nav-link">
             Blessed Trading AcademY
           </a>
         </li>

       </ul>
       <div class="copyright">
         ©
         2023 Hecho por
         programmersJJ para Blessed
       </div>
     </div>
   </footer>
 <?php } else { ?>
  <footer class=" foo d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
      <img src="view/page/img/uplogo.PNG" alt="" style="width:200px;">
      </a>
      <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="https://www.youtube.com/@jkiguaran"><i class="bib bi bi-youtube"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="https://www.instagram.com/jkiguaran/?hl=es-la"><i class="bib bi bi-instagram"></i></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><i class="bib bi bi-discord"></i></a></li>
    </ul>
  </footer>
 <?php } ?>

 </div>
 </div>
 <style>
  .bib{
    font-size: x-large;
    margin-left: 5px;
  }
  .foo{
    width: 95%;
    margin: auto;
  }
</style>

 <!--   Core JS Files   -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="public/assets/js/script.js"></script>
 <script src="public/assets/js/core/jquery.min.js"></script>
 <script src="public/assets/js/core/popper.min.js"></script>
 <script src="public/assets/js/core/bootstrap.min.js"></script>
 <script src="public/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
 <!--  Google Maps Plugin    -->
 <!-- Place this tag in your head or just before your close body tag. -->
 <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!-- Chart JS -->
 <script src="public/assets/js/plugins/chartjs.min.js"></script>
 <!--  Notifications Plugin    -->
 <script src="public/assets/js/plugins/bootstrap-notify.js"></script>
 <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="public/assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
 <script src="public/assets/demo/demo.js"></script>

 <script>
   $(document).ready(function() {
     $().ready(function() {
       $sidebar = $('.sidebar');
       $navbar = $('.navbar');
       $main_panel = $('.main-panel');

       $full_page = $('.full-page');

       $sidebar_responsive = $('body > .navbar-collapse');
       sidebar_mini_active = true;
       white_color = false;

       window_width = $(window).width();

       fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



       $('.fixed-plugin a').click(function(event) {
         if ($(this).hasClass('switch-trigger')) {
           if (event.stopPropagation) {
             event.stopPropagation();
           } else if (window.event) {
             window.event.cancelBubble = true;
           }
         }
       });

       $('.fixed-plugin .background-color span').click(function() {
         $(this).siblings().removeClass('active');
         $(this).addClass('active');

         var new_color = $(this).data('color');

         if ($sidebar.length != 0) {
           $sidebar.attr('data', new_color);
         }

         if ($main_panel.length != 0) {
           $main_panel.attr('data', new_color);
         }

         if ($full_page.length != 0) {
           $full_page.attr('filter-color', new_color);
         }

         if ($sidebar_responsive.length != 0) {
           $sidebar_responsive.attr('data', new_color);
         }
       });

       $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
         var $btn = $(this);

         if (sidebar_mini_active == true) {
           $('body').removeClass('sidebar-mini');
           sidebar_mini_active = false;
           blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
         } else {
           $('body').addClass('sidebar-mini');
           sidebar_mini_active = true;
           blackDashboard.showSidebarMessage('Sidebar mini activated...');
         }

         // we simulate the window Resize so the charts will get updated in realtime.
         var simulateWindowResize = setInterval(function() {
           window.dispatchEvent(new Event('resize'));
         }, 180);

         // we stop the simulation of Window Resize after the animations are completed
         setTimeout(function() {
           clearInterval(simulateWindowResize);
         }, 1000);
       });

       $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
         var $btn = $(this);

         if (white_color == true) {

           $('body').addClass('change-background');
           setTimeout(function() {
             $('body').removeClass('change-background');
             $('body').removeClass('white-content');
           }, 900);
           white_color = false;
         } else {

           $('body').addClass('change-background');
           setTimeout(function() {
             $('body').removeClass('change-background');
             $('body').addClass('white-content');
           }, 900);

           white_color = true;
         }


       });

       $('.light-badge').click(function() {
         $('body').addClass('white-content');
       });

       $('.dark-badge').click(function() {
         $('body').removeClass('white-content');
       });
     });
   });
 </script>
 <script>
   $(document).ready(function() {
     // Javascript method's body can be found in assets/js/demos.js
     demo.initDashboardPageCharts();

   });
 </script>
 <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
 <script>
   window.TrackJS &&
     TrackJS.install({
       token: "ee6fab19c5a04ac1a32a645abde4613a",
       application: "black-dashboard-free"
     });
 </script>
 </body>

 </html>