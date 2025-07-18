    <?php require_once 'app/views/templates/headerPublic.php' ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <main role="main" class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <h3><i class="bi bi-box-arrow-in-right"></i> Login to Your Account</h3>
                    </div>
                    <div class="card-body">

                        <div class="text-center mb-4">
                            <span class="text-muted">🔐 Secure access to your dashboard</span>
                        </div>

                        <form action="/login/verify" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">👤 Username</label>
                                <input required type="text" class="form-control" name="username" placeholder="Enter your username">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">🔒 Password</label>
                                <input required type="password" class="form-control" name="password" placeholder="Enter your password">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-door-open"></i> Login
                                </button>
                            </div>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a href="/create" class="text-decoration-none"><i class="bi bi-person-plus"></i> Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'app/views/templates/footer.php' ?>
