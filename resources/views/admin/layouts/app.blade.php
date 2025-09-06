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

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/vendor/flatpickr/flatpickr.min.css')}}">
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/stylesheets/theme.min.css')}}" data-skin="default">
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/stylesheets/custom.css')}}">
    <link rel="stylesheet" href="{{asset(assetLinkAdmin().'/assets/css/tag-editor.css')}}" >

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
   <body class="default-skin pace-done">
      <!--wrapper-->
	    <div class="app">
    
        @include(adminTheme().'layouts.header')

        @include(adminTheme().'layouts.sidebar')
        
        <main class="app-main">
            <div class="wrapper">
              @yield('contents')
            </div>
            @include(adminTheme().'layouts.footer')
        </main>
      </div>
    <!-- BEGIN BASE JS -->
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/pace-progress/pace.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/stacked-menu/js/stacked-menu.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/vendor/chart.js/Chart.min.js')}}"></script> 
    <!-- END PLUGINS JS -->
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
    <script src="{{asset(assetLinkAdmin().'/assets/js/tag-editor.js')}}"></script>
    <!-- BEGIN THEME JS -->
    <script src="{{asset(assetLinkAdmin().'/assets/javascript/theme.min.js')}}"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{asset(assetLinkAdmin().'/assets/javascript/pages/dashboard-demo.js')}}"></script> 
    <!-- END PAGE LEVEL JS -->
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
          
        $(".sortable").sortable({
          handle: ".dragable"
        });
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