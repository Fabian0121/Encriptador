<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/styleLogin.css" th:href="@{/css/index.css}">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Inicio de sesion</title>
   
</head>

<body>
    <div class="container-main">
        <div class="container-login">
            <div class="container-tittle">
                <div class="tittle">
                    <h1>Inicia sesion</h1>
                </div>
            </div>
            <div class="form-login">
                <form id="form1" name="form1">
                    <div class="tittles">
                        <label class="tittless">Ingresa tu correo</label>
                    </div>
                    <br>
                    <div class="inputs">
                        <input class="inputss" id = "correo" type="email" placeholder="example@gmail.com" name="correo" required>
                        
                    </div>
                    <div class="">
                        <span class="errores"></span>
                    </div>

                    <div class="tittles">
                        <label class="tittles">Ingresa tu password</label>
                    </div>
                    <br>
                    <div class="inputs">
                        <input class="inputss" id = "pass" type="password" placeholder="Solo letras" name="pass" required>
                        
                    </div>
                    <div class="">
                        <span class="errores" id="passError"></span>
                    </div>
                    <br>
                </form>
                 <div class="btn">
                        <button type="buttton" id = "btnEnviar" class=""> Iniciar sesion
                    </div>
                <p class="info"><a href="http://localhost/App-encriptador/index.php?controller=usuario&action=registrarseView">Registrarse</a></p>
            </div>
        </div>
    </div>
    <script src="public/Js/login.js"></script>

</body>

</html>