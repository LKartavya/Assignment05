    <?php require_once 'app/views/templates/headerPublic.php'?>
    <?php if (isset($_SESSION['login_error'])): ?>
      <div style="position:relative; z-index:1080; margin-top:70px; display:flex; justify-content:center;">
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
          <div class="d-flex">
            <div class="toast-body">
              <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var toastElList = [].slice.call(document.querySelectorAll('.toast'));
          toastElList.forEach(function(toastEl) {
            var toast = new bootstrap.Toast(toastEl, { delay: 2000 });
            toast.show();
          });
        });
      </script>
    <?php endif; ?>
    <main role="main" class="container">
        <div class="page-header" id="banner">
            <div class="row">
                <div class="col-lg-12">
                    <h1>You are not logged in</h1>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-sm-auto">
            <form action="/login/verify" method="post" >
            <fieldset>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" class="form-control" name="password">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Login</button>
            </fieldset>
            </form> 
            <br>
            <a href="/create" class="btn-secondary">Sign Up</a>
        </div>
    </div>
        <?php require_once 'app/views/templates/footer.php' ?>
