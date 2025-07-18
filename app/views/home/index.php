<?php require_once 'app/views/templates/header.php' ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

<style>
    .home-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 70vh;
        background: #f8fafc;
    }
    .home-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 48px 40px 32px 40px;
        max-width: 480px;
        width: 100%;
        text-align: center;
        margin-top: 40px;
        animation: fadeIn 0.6s ease-in-out;
    }
    .home-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: #22223b;
    }
    .home-icon {
        font-size: 2.2rem;
        vertical-align: middle;
        margin-right: 8px;
        color: #4a4e69;
    }
    .home-date {
        color: #4a5568;
        font-size: 1.1rem;
        margin-bottom: 24px;
    }
    .home-logout {
        display: inline-block;
        margin-top: 24px;
        padding: 10px 24px;
        background: #22223b;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        text-decoration: none;
        transition: background 0.2s;
    }
    .home-logout:hover {
        background: #4a4e69;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="home-container">
    <div class="home-card">
        <div class="home-title">
            <i class="bi bi-person-circle home-icon"></i>
            Welcome, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User' ?>
        </div>
        <div class="home-date">
            📅 <?= date("l, F jS, Y") ?>
        </div>
        <a href="/logout" class="home-logout">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>
