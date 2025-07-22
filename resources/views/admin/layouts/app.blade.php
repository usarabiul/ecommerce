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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- loader-->
    <link href="{{asset(assetLinkAdmin().'/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset(assetLinkAdmin().'/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset(assetLinkAdmin().'/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset(assetLinkAdmin().'/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset(assetLinkAdmin().'/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset(assetLinkAdmin().'/assets/css/icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/header-colors.css')}}" />

    <style type="text/css">
      .card-title {
          margin: 0;
      }
      .card-header {
          background-color: rgb(0 0 0);
          color: white;
      }
      table tr td {
          vertical-align: middle;
      }
       ul.statuslist {
            text-align: right;
        }

        ul.statuslist li {
            display: inline-block;
        }

        ul.statuslist li a {
            border: 1px solid #d1cece;
            padding: 3px 6px;
            border-radius: 15px;
            display: inline-block;
            margin: 3px 1px;
            font-size: 12px;
        }

         .slugEditData{
            display:none;
            height: 30px;
            padding: 4px 10px;
        }
        .showPassword{
          cursor:pointer;
        }
        .bootstrap-select .dropdown-toggle:focus, .bootstrap-select>select.mobile-device:focus+.dropdown-toggle{
          outline: 5px auto #ebe3e3 !important;
        }
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
    <!-- Bootstrap-Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <!--app JS-->
    <script src="{{asset(assetLinkAdmin().'/assets/js/app.js')}}"></script>

    <script src="{{asset('tinymce/tinymce.min.js')}}"></script>
    
     <script>
      $(document).ready(function(){

        $('.selectpicker').selectpicker();

        $('.slugEdit').click(function(){
            $('.slugEditData').toggle();
             var span = $(this).find('span');
            var isCustom = span.text().trim() === 'Auto Slug';
            span.text(isCustom ? 'Custom Slug' : 'Auto Slug');
            var input = $('.slugEditData');
            if (isCustom) {
                input.attr('name', 'slug');
            } else {
                input.removeAttr('name');
            }
        });

        tinymce.init({
            selector: 'textarea.tinyEditor',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: 'lists advlist image link fullscreen advcode code',
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
            'bullist numlist outdent advlist | link image | preview media fullscreen  | code |' +
            'forecolor backcolor emoticons | fontsize',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                  var file = this.files[0];
                  var reader = new FileReader();
                  reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                  };
                  reader.readAsDataURL(file);
                };
                input.click();
              },
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            font_size_formats: '8px 10px 12px 14px 16px 18px 24px 36px 48px',
        });
          
        $( ".sortable" ).sortable();
        $( ".sortable" ).disableSelection();

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
                    $(this).empty().append('<i class="bx bx-show"></i>');
                } else {
                    $('input.password').prop('type','password');
                    $(this).empty().append('<i class="bx bx-hide"></i>');
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