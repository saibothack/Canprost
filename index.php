<?php session_start();?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="icon" type="image/vnd.microsoft.icon" href="resources/img/favicon.ico">
  <link href="resources/script/jquery.alerts.css" rel="StyleSheet" type="text/css" />
  <script src="resources/script/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="resources/script/jquery.ui.draggable.js" type="text/javascript"></script>
  <script src="resources/script/jquery.alerts.mod.js" type="text/javascript"></script>
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="resources/css/index.css" rel="stylesheet" >
<body>
<div class="container-fluid">
  <header>
    <div class="row">
      <div class="col-md-2 text-center"> <img src="resources/img/logo-incan.png" alt="Logo INCAN" style="margin: 20px;"> </div>
      <div class="col-md-10 text-white background-blue">
        <h5 style="margin: 10px;">Canprost</h5>
        <h6 style="margin: 10px;">Registro Nacional de Cáncer de Próstata</h6>
      </div>
    </div>
  </header>
  <div class="d-flex justify-content-center h-75">
    <div class="card">
      <div class="card-header">
        <h3>Iniciar Sesión</h3>
      </div>
      <div class="card-body">
        <form method="post" action="app/php/valida_user.php">
          <div class="input-group form-group">
            <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-user"></i></span> </div>
            <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario" required="required">
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend"> <span class="input-group-text"><i class="fas fa-key"></i></span> </div>
            <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass" required="required">
          </div>
          <div class="form-group">
            <input type="submit" value="Ingresar" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links"> ¿No tiene una cuenta?<a href="#">Registrar</a> </div>
        <div class="d-flex justify-content-center links"> <a href="#">¿Olvido su contraseña?</a> </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
  if (isset($_SESSION["ERROR"])){
    if (!$_SESSION["ERROR"]) { 
      $_SESSION["ERROR"] = null; ?>
      <script type="text/javascript">
        jError('El usuario no es correcto');
      </script>
    <?php
    }
  }
?>
</body>
</html>
