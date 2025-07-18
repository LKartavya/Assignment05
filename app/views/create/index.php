<?php require_once 'app/views/templates/headerPublic.php' ?>
<main role="main" class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3><i class="bi bi-person-plus-fill"></i> Create Your Account</h3>
                </div>
                <div class="card-body">

                    <?php if (isset($_SESSION['register_error'])): ?>
                        <div class="alert alert-danger"><?php echo $_SESSION['register_error']; unset($_SESSION['register_error']); ?></div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['register_success'])): ?>
                        <div class="alert alert-success"><?php echo $_SESSION['register_success']; unset($_SESSION['register_success']); ?></div>
                    <?php endif; ?>

                    <form action="/create/register" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">👤 Username</label>
                            <input required type="text" class="form-control" name="username" placeholder="Enter username">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">🔒 Password</label>
                            <input required type="password" class="form-control" name="password" placeholder="Create a password">
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">🔒 Confirm Password</label>
                            <input required type="password" class="form-control" name="confirm_password" placeholder="Re-enter password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i> Register
                            </button>
                        </div>
                    </form>

                    <hr>
                    <div class="text-center">
                        <a href="/login" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'app/views/templates/footer.php' ?>
</main>
