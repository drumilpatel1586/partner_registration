<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum Network</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://crm.qntmnet.com/QN-CDN/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://crm.qntmnet.com/QN-CDN/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"  type="text/css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://crm.qntmnet.com/QN-CDN/css/login.css">
    <link rel="stylesheet" href="https://crm.qntmnet.com/QN-CDN/css/AdminLTE.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://partner.qntmnet.com/public/css/mobilecountrycode/intlTelInput.css"> 
    <link rel="icon" href="https://crm.qntmnet.com/QN-CDN/images/favicon.png" type="image/x-icon">

    @stack('push-style')
</head>
<body>
    
    @yield('content')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://crm.qntmnet.com/QN-CDN/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="https://crm.qntmnet.com/QN-CDN/js/bootstrap.min.js"></script>
    <script src="https://partner.qntmnet.com/public/js/main.js"></script>
    <script type="text/javascript">
        localStorage.clear();
    </script>


    <script src="https://partner.qntmnet.com/public/js/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script src="https://partner.qntmnet.com/public/js/mobilecountrycode/intlTelInput.js"></script>
    <!-- <script src="https://partner.qntmnet.com/public/js/mobilecountrycode/utils.js"></script> -->
    <!-- <script src="https://partner.qntmnet.com/public/js/mobilecountrycode/user.js"></script> -->

    
    <!-- here import js from public folder -->
   
    @stack('push-script')
</body>
</html>
