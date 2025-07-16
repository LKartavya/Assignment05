<?php
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <style>
      body { padding-top: 70px; }
    </style>
</head>
<body>
<?php include 'app/views/templates/alert.php' ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/home">COSC 4806</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link<?= ($_SERVER['REQUEST_URI'] == '/home') ? ' active' : '' ?>" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= ($_SERVER['REQUEST_URI'] == '/reminders') ? ' active' : '' ?>" href="/reminders">My Reminders</a>
        </li>
        <?php if (isset($_SESSION['username']) && strtolower($_SESSION['username']) === 'admin'): ?>
        <li class="nav-item">
          <a class="nav-link<?= ($_SERVER['REQUEST_URI'] == '/reports') ? ' active' : '' ?>" href="/reports">Reports</a>
        </li>
        <?php endif; ?>
      </ul>
      <div class="d-flex align-items-center gap-2">
        <span class="fw-semibold text-secondary me-2">Logged in as <?= htmlspecialchars($_SESSION['username']) ?></span>
        <a href="/logout" class="btn btn-outline-danger btn-sm">Logout</a>
      </div>
    </div>
  </div>
</nav>