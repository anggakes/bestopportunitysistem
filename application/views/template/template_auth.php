<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Best Opportunity System | Pendaftaran</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <!-- Bootstrap 3.3.4 -->
    <link href="<?= base_url() ?>theme/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?= base_url() ?>theme/plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?= base_url() ?>theme/plugins/ionicons/ionicons.min.css" rel="stylesheet" type="text/css" />    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
     <!-- jQuery 2.1.4 -->
    <script src="<?= base_url() ?>theme/plugins/jQuery/jQuery-2.1.4.min.js"></script>
 

    <style type="text/css">
    .navbar-no-bg {background: none;
        color:white;
        border:0;
    }
    .navbar-brand{
      color:#fff;
    }
    .text{
      background:white;
      margin-top: 50px;
    }
    .text h3{
      margin-bottom: 20px;
      padding-bottom: 15px;
    }
    label{
      font-weight: normal;
    }
    </style>

  </head>
  <body class="">
    <!-- Top menu -->
    <nav class="navbar navbar-inverse navbar-no-bg" role="navigation" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" style='color:white'>Best Opportunity</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
    
      </div>
    </nav>

        <!-- Top content -->
        <div class="top-content">
          
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 text">
                        

                          <?= $contents ?>  
                        

                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>



      <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url() ?>theme/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
     <!-- Slimscroll -->
    <script src="<?= base_url() ?>theme/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?= base_url() ?>theme/plugins/fastclick/fastclick.min.js'></script>
     <!-- FastClick full screen background -->
    <script src="<?= base_url() ?>theme/plugins/backstretch/jquery.backstretch.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){

    /*
        Fullscreen background
    */
    $.backstretch("<?= base_url() ?>theme/img/backgrounds/1.jpg");
    
    $('#top-navbar-1').on('shown.bs.collapse', function(){
      $.backstretch("resize");
    });
    $('#top-navbar-1').on('hidden.bs.collapse', function(){
      $.backstretch("resize");
    });


    });

    </script>
    
  </body>
</html>