<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Construction</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../assets/images/logo/building.svg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="/assets/css/landingPage.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
        <div class="hero-logo">
          <img class="" src="../assets/images/logo/building.svg" alt="Construction" width="100vw">
        </div>
        <h1 id="big_title"><span>C</span>ONSTRUCTION <span>H</span>ome <span>R</span>enovation</h1>
        <h2>NOUS SOMMES SPÉCIALISÉS DANS <span class="typed" data-typed-items="LES INFRASTRUCTURES, LA RENOVATION, LE GÉNIE CIVIL" id="animateSpan"></span></h2>
        <div class="actions">
          <a href="#" class="btn-get-started">Administration</a>
          <a href="{{route('client.login')}}" class="btn-services">Utilisateur</a>
        </div>
    </div>
  </section><!-- End Hero -->
  <!-- Vendor JS Files -->
  <script src="/assets/typed.js/typed.min.js"></script>

  <script>
  document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  const typedElement = document.querySelector('.typed');
  if (typedElement) {
    const typedStrings = typedElement.getAttribute('data-typed-items').split(',');
    // Initialise l'effet de frappe avec Typed.js
    new Typed('.typed', {
      strings: typedStrings,
      loop: true,
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 2000
    });
  }
});
  </script>

</body>

</html>
