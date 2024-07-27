<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title') | client</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link href="/assets/images/logo/building.svg" rel="icon">
       <!-- bootstrap css -->

       <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

       <link href="/assets/css/clientglobal.css"  rel="stylesheet">
       <link href="/assets/css/font-awesome.min.css"  rel="stylesheet">
       <link rel="stylesheet" href="/assets/css/pricing.css" />
       <link rel="stylesheet" href="/assets/css/pricing-responsive.css" />

      <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">



   </head>
   <body>
    <main>
        <div class="container">
            <div class="row" style="margin-bottom: 15vh;">
                <nav  class="navbar navbar-expand-lg  fixed-top rounded"  aria-label="Thirteenth navbar example" id="navigation">
                    <div class="container-fluid">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                        <h2 id="nav_titre" class="navbar-brand col-lg-3 me-0" href="#"><img src="/assets/images/logo/building.svg" alt="logo" width="75vw"/>C H R</h2>
                        <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                          <li class="nav-item">
                            <a class="nav-link  " aria-current="page" href="#">Home</a>

                          </li>
                          <li class="nav-item ">
                            <a class="nav-link" href="#">Link</a>
                          </li>
                        </ul>
                        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                            <button class="btn btn-outline-warning d-inline-flex align-items-center" type="button">
                                Deconnection &nbsp;&nbsp;
                                <i class="fa fa-external-link-square fa-2x "></i>
                              </button>
                        </div>
                      </div>
                    </div>
                  </nav>
            </div>
          @yield('content')


        </div>



        <div style="height: 60vh">

        </div>
      </main>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
