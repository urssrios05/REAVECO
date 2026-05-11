<!DOCTYPE html>
<head>
  <title>Reaveco/Admin</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="icon" href="../images/icono.ico">
  <link rel="stylesheet" href="../assets/css/login.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body>
  <div class="wrapper">
    <div class="title"><span>Reaveco/Admin</span></div>
      <?php if(isset($_GET['error'])): ?>
        <div class="login-error">
          <i class="fas fa-exclamation-circle"></i>
          Usuario o contraseña incorrectos
        </div>
      <?php endif; ?>
      <form action="actions/verificar.php" method="POST">

        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="usuario" placeholder="Usuario" required />
        </div>

        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Contraseña" required />
        </div>

        <div class="row button">
          <input type="submit" value="Login" />
        </div>

      </form>
  </div>
  <script src="../assets/js/login.js"></script>
</body>
</html>