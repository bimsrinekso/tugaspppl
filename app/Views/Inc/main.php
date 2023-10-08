
<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Nirwanacloud</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="/assets/images/favicon.ico"> -->

        <!-- Bootstrap Css -->
        <link href="/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/assets/libs/toastr/build/toastr.min.css"> 
        <link rel="stylesheet" type="text/css" href="/assets/css/loadingSpin.css"> 
        <?php $this->renderSection('css');?>

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

        <?php include 'header.php'?>


            <!-- ========== Left Sidebar Start ========== -->
            <?php include 'sidebar.php'?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

            <?php $this->renderSection('isKonten');?>

                
            <?php include 'footer.php'?> 
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- JAVASCRIPT -->
        <script src="/assets/libs/jquery/jquery.min.js"></script>
        <script src="/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/libs/node-waves/waves.min.js"></script>

        <script src="/assets/js/app.js"></script>
        <!-- apexcharts -->
        <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard blog init -->
        <script src="/assets/js/pages/dashboard-job.init.js"></script>
        <script src="/assets/libs/toastr/build/toastr.min.js"></script>
        <script src="/assets/js/pages/toastr.init.js"></script>
        <script src="/assets/js/nirwanaHelper.js"></script>
        <?php if(session()->getFlashdata('sukses')):?>
        <script>
              toastr.success("<?= session()->getFlashData("sukses"); ?>");
        </script>
        <?php elseif(session()->getFlashdata('error')):?>
            <script>
                toastr.error("<?= session()->getFlashData("error"); ?>");
            </script>
        <?php endif?>

        <?php $this->renderSection('javascript');?>
    </body>

</html>
