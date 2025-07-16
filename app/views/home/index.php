    <?php require_once 'app/views/templates/header.php' ?>
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
    }
    .home-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: #22223b;
    }
    .home-emoji {
        font-size: 2.2rem;
        vertical-align: middle;
        margin-right: 8px;
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
    </style>
    <div class="home-container">
        <div class="home-card">
            <div class="home-title">
                <span class="home-emoji">👋</span>
                Hey, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User' ?>
            </div>
            <div class="home-date">
                <?= date("F jS, Y") ?>
            </div>
            <a href="/logout" class="home-logout">Logout</a>
        </div>
    </div>
    <?php require_once 'app/views/templates/footer.php' ?>
