<!DOCTYPE html>
 <html lang="en" class="color-sidebar sidebarcolor3 color-header headercolor2" >
   <!-- BEGIN: Head-->
   <head>

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
     <meta name="description" content="" />
     <meta name="keywords" content="" />
     <meta name="author" content="NIT" />
     @yield('title')
    <link rel="apple-touch-icon" href="{{asset(general()->favicon())}}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(general()->favicon())}}" />
    <!--plugins-->
    <link href="{{asset(assetLinkAdmin().'/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset(assetLinkAdmin().'/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{asset(assetLinkAdmin().'/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset(assetLinkAdmin().'/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset(assetLinkAdmin().'/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset(assetLinkAdmin().'/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset(assetLinkAdmin().'/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset(assetLinkAdmin().'/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset(assetLinkAdmin().'/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/header-colors.css')}}" />

    <style type="text/css">
       
    </style>

     @stack('css')
   </head>
   <!-- END: Head-->

   <!-- BEGIN: Body-->
   <body>
      <!--wrapper-->
	    <div class="wrapper">
    
        @include(adminTheme().'layouts.sidebar')
        
        @include(adminTheme().'layouts.header')
          <div class="page-wrapper">
              @yield('contents')
          </div>

          <div class="overlay toggle-icon"></div>
          <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
          @include(adminTheme().'layouts.footer')
      </div>
    
    <!-- Bootstrap JS -->
    <script src="{{asset(assetLinkAdmin().'/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset(assetLinkAdmin().'/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/js/index3.js')}}"></script>
    <!--app JS-->
    <script src="{{asset(assetLinkAdmin().'/assets/js/app.js')}}"></script>
    
     <script type="text/javascript">
      $( function() {
              $( ".sortable" ).sortable();
              $( ".sortable" ).disableSelection();
          } );
    </script>
     <script>
      $(document).ready(function(){
          

        $('#PrintAction').on("click", function () {
            $('.PrintAreaContact').printThis();
          });

        $('#PrintAction2').on("click", function () {
            $('.PrintAreaContact2').printThis();
          });

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          
          $(document).on('click','.showPassword',function(){
                $(this).toggleClass('active-show');
                if ($(this).hasClass('active-show')) {
                    $('input.password').prop('type','text');
                    $(this).empty().append('<i class="fa fa-eye"></i>');
                } else {
                    $('input.password').prop('type','password');
                    $(this).empty().append('<i class="fa fa-eye-slash"></i>');
                }
          });

          $("#division").on("change", function(){
                var id = $(this).val();
                  if(id==''){
                   $('#district').empty().append('<option value="">No District</option>');
                   $('#city').empty().append('<option value="">No City</option>');
                  }
                  var url ='{{url('geo/filter')}}' + '/'+id;
                  $.get(url,function(data){
                    $('#district').empty().append(data.geoData);
                    $('#city').empty().append('<option value="">No City</option>');
                  });   
            });

            $("#district").on("change", function(){
                var id = $(this).val();
                  if(id==''){
                   $('#city').empty().append('<option value="">No City</option>');
                  }
                  var url ='{{url('geo/filter')}}' + '/'+id;
                  $.get(url,function(data){
                    $('#city').empty().append(data.geoData);  
                  });   
            });

            $('.mediaDelete').click(function(e){
                e.preventDefault();

              var url =$(this).attr('href');

              if(confirm("Are you sure you want to delete this?")){
                
                $.ajax({
                  url : url,
                  type:'GET',
                  cache: false,
                  contentType: false,
                  dataType: 'json',
                  beforeSend: function()
                  {
                    
                  },
                  complete: function()
                  {
                      
                  },
                  }).done(function (data) {
                     
                     location.reload(true);
                    
                  }).fail(function () {
                      alert('fail');
                  });
                  
              }else{
                  return false;
              }

            });
          
      });
    </script>

    <script type="text/javascript">
      ///Check Box Select With Count show

          $(function() {
            $('.checkCounter').text('0');
            var generallen = $("input[name='checkid[]']:checked").length;
            if (generallen > 0) {
              $(".checkCounter").text('(' + generallen + ')');
            } else {
              $(".checkCounter").text(' ');
            }
            
          })
          
          function updateCounter() {
            var len = $("input[name='checkid[]']:checked").length;
            if (len > 0) {
              $(".checkCounter").text('(' + len + ')');
            } else {
              $(".checkCounter").text(' ');
            }
          }
          
          $("input:checkbox").on("change", function() {
            updateCounter();
          });

       
        $(document).ready(function(){
          $('#checkall').click(function() {
              var checked = $(this).prop('checked');
              $('input:checkbox').prop('checked', checked);
              updateCounter();
            });
        });
        
        ///Check Box Select With Count show
      </script>

      @stack('js')
   </body>
   <!-- END: Body-->
 </html>