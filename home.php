<?php session_start();
    if ($_SESSION['ID_USUARIO'] == "" and $_REQUEST["ind"] == "") {
        header('Location: index.html');
    }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>.:: CANPROST ::.</title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="resources/img/favicon.ico">
</head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--Fontawesome CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link href="resources/css/home.css" rel="stylesheet" >
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
    <?php
    if ($_SESSION['ID_USUARIO'] > "") {
    ?>
    <table class="text-center table-menu">
        <tr>
            <td>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto" style="width: 100% !important;">
                            <li class="nav-item active" style="width: 100% !important;">
                                <a class="nav-link" href="principal.html" target="frmGlobal" style="width: 100% !important;">
                                    <i class="fas fa-home"></i> INICIO
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
            <td>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto" style="width: 100% !important;">
                            <li class="nav-item dropdown" style="width: 100% !important;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important;">
                                    <i class="fas fa-database"></i> REGISTROS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100% !important;">
                                    <a class="dropdown-item" href="app/registros/agregar.php" target="frmGlobal"> <i class="fas fa-plus"></i> Nuevo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="app/registros/consultar.php" target="frmGlobal"> <i class="fas fa-folder-open"></i> Registros</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
            <?php if ($_SESSION["TIPO"] == 1) { ?>
            <td>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto" style="width: 100% !important;">
                            <li class="nav-item dropdown" style="width: 100% !important;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important;">
                                    <i class="far fa-hospital"></i> HOSPITALES
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100% !important;">
                                    <a class="dropdown-item" href="app/hospitales/agregar.php" target="frmGlobal"> <i class="fas fa-plus"></i> Nuevo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="app/hospitales/consultar.php" target="frmGlobal"> <i class="fas fa-folder-open"></i> Registros</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
            <td>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto" style="width: 100% !important;">
                            <li class="nav-item dropdown" style="width: 100% !important;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100% !important; color: black">
                                    <i class="fas fa-user-md"></i> COLEGAS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100% !important;">
                                    <a class="dropdown-item" href="app/usuarios/agregar.php" target="frmGlobal"> <i class="fas fa-plus"></i> Nuevo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="app/usuarios/consultarAut.php" target="frmGlobal"> <i class="fas fa-users"></i> Autorizado</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="app/usuarios/consultarNoAuto.php" target="frmGlobal"> <i class="fas fa-exclamation-triangle"></i> No Autorizado</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
            <?php } ?>
            <td>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto" style="width: 100% !important;">
                            <li class="nav-item active" style="width: 100% !important;">
                                <a class="nav-link" style="width: 100% !important; color: black" href="app/usuarios/agregar.php?ind=1" target="frmGlobal">
                                    <i class="fas fa-user-cog"></i> PERFIL
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
            <td>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto" style="width: 100% !important;">
                            <li class="nav-item active" style="width: 100% !important;">
                                <a class="nav-link" href="app/php/cerrar_sesion.php" style="width: 100% !important; color: black">
                                    <i class="fas fa-power-off"></i> SALIR
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </td>
        </tr>
    </table>
    <iframe src="principal.html" frameborder="0" id="frmGlobal" name="frmGlobal">
    </iframe>
    <?php } ?>
</div>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
    function setLoading() {
        "use strict";
        $("#dLoading").show();
    }

    function endLoading () {
        "use strict";
        $("#dLoading").hide();
    }

    var defaulHeight = (window.innerHeight - 155);
    console.log(defaulHeight);

    var frm = document.getElementById("frmGlobal");
    frm.height = defaulHeight + "px";

    function resize() {
        "use strict";

        var frm = document.getElementById("frmGlobal");
        var h = frm.contentWindow.document.body.scrollHeight;

        if (defaulHeight < h) {
            frm.style.height = h + "px";
        }

    }

    resize(document.getElementById("frmGlobal"))
</script>
</body>
</html>