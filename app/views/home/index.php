<?php require_once 'app/views/templates/header.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(to right, #a1c4fd, #c2e9fb);
        font-family: 'Segoe UI', sans-serif;
    }

    .home-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 80vh;
    }

    .home-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 50px 40px;
        max-width: 500px;
        width: 100%;
        text-align: center;
    }

    .home-card h1 {
        font-size: 2.4rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #007bff;
    }

    .home-card p {
        font-size: 1.1rem;
        color: #4a5568;
        margin-bottom: 30px;
    }

    .logout-btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 12px 28px;
        font-size: 1rem;
        border-radius: 6px;
        transition: background 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .logout-btn:hover {
        background-color: #0056b3;
    }

    .emoji {
        font-size: 2.2rem;
        margin-right: 6px;
        vertical-align: middle;
    }
</style>

<div class="home-wrapper">
    <div class="home-card">
        <h1>
            <span class="emoji">👋</span>
            Welcome, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User' ?>
        </h1>
        <p><i class="far fa-calendar-alt me-1"></i><?= date("F jS, Y") ?></p>
        <a href="/logout" class="logout-btn"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
