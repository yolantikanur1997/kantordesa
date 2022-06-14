
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="style/css/style.css" rel="stylesheet">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>
       <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="style/css/custom.min.css" rel="stylesheet">

    <link href="style/css/style.css" rel="stylesheet">

    <link href="style/css/jquery-confirm.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style/css/datatables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">

  </head>

<body class="LoginForm">
	  <div class="container container-login">
      <div class="card">
        <div class="card-header">
           <i class="fa fa-users mr-auto"></i> Form Login<br><br>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
              </nav>
        </div>
        <div class="card-body">
          <form action="config/_login.php" method="POST">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <label for="username">NIK</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user"></i></span>
        </div>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" aria-describedby="inputGroupPrepend" required="required">
      	</div>
        </div>
           <div class="col-lg-12 col-md-12 col-sm-12">
		      <label for="Password">Password</label>
		      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-key"></i></span>
        </div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="inputGroupPrepend" required="required">
      </div>
            </div>

       <div class="col-lg-12 col-md-12 col-sm-12 mt-4 mb-4" align="center">
        <button class="btn btn-outline-primary btn-md">Login</button>
        <button type="reset" class="btn btn-outline-danger btn-md">Reset</button>
       </div>
           
          </div>
           </form>
         </div>
       </div>
     </div>
</body>


<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="style/js/jquery-confirm.js"></script>
    <script src="style/js/jquery.validate.min.js"></script>
    <script src="style/js/datatables.min.js"></script>

    <!-- Custom Theme Scripts -->
   
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>

</html>