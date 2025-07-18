<?php require_once 'app/views/templates/headerPublic.php'?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
   
<style>
    body {
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            font-family: 'Segoe UI', sans-serif;
        }

        .form-card {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-card h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #007bff;
        }

        .form-group label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .alert {
            margin-top: 15px;
        }
    </style>

    <main role="main" class="container">
        <div class="form-card">
            <h1><i class="fas fa-user icon me-2"></i>Page Title Here</h1>

            <?php if (isset($_SESSION['some_error'])): ?>
                <div class="alert alert-danger"><?php echo $_SESSION['some_error']; unset($_SESSION['some_error']); ?></div>
            <?php endif; ?>

            <?php if (isset($_SESSION['some_success'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['some_success']; unset($_SESSION['some_success']); ?></div>
            <?php endif; ?>

            <form action="/your/form/handler" method="post">
                <div class="form-group mb-3">
                    <label for="field1"><i class="fas fa-envelope me-1"></i>Email</label>
                    <input required type="email" class="form-control" name="field1" placeholder="Enter your email">
                </div>

                <div class="form-group mb-3">
                    <label for="field2"><i class="fas fa-lock me-1"></i>Password</label>
                    <input required type="password" class="form-control" name="field2" placeholder="Enter password">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check me-2"></i>Submit</button>
                </div>
            </form>

            <a href="/back"><i class="fas fa-arrow-left me-1"></i>Back</a>
        </div>
    </main>

<?php require_once 'app/views/templates/footer.php' ?>