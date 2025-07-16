    <?php
    if (isset($_SESSION['auth']) == 1) {
        header('Location: /home');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <style>
          body { padding-top: 70px; }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">COSC 4806</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavPublic" aria-controls="navbarNavPublic" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavPublic">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link<?= ($_SERVER['REQUEST_URI'] == '/login') ? ' active' : '' ?>" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link<?= ($_SERVER['REQUEST_URI'] == '/create') ? ' active' : '' ?>" href="/create">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>