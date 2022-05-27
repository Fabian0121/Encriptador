<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/styleLogin.css" th:href="@{/css/index.css}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Registrarse</title>
</head>

<body>
    <div class="container-mainR">
        <div class="container-loginR">
            <div class="container-tittleR">
                <div class="tittle">
                    <h1>Ingresa tus datos</h1>
                </div>
            </div>
            <div class="form-login">
                <form>
                    <div class="tittles">
                        <label class="tittless">Nombre</label>
                    </div>
                    <div class="inputs">
                        <input class="inputss" name="nombre" id="nombre" type="text" placeholder="Daniel">
                    </div>
                    <div class="tittles">
                        <label class="tittless">Apellido Paterno</label>
                    </div>
                    <div class="inputs">
                        <input class="inputss" name="apellidoP" id="apellidoP" type="text" placeholder="Soto">
                    </div>
                    <div class="tittles">
                        <label class="tittless">Apellido Materno</label>
                    </div>
                    <div class="inputs">
                        <input class="inputss" name="apellidoM" id="apellidoM" type="text" placeholder="Soto">
                    </div>
                    <div class="tittles">
                        <label class="tittless">Ingresa tu correo</label>
                    </div>
                    <div class="inputs">
                        <input class="inputss" name="correo" id="correo" type="email" placeholder="example@gmail.com">
                    </div>
                    <div class="tittles">
                        <label class="tittles">Ingresa una password</label>
                    </div>
                    <div class="inputs">
                        <input class="inputss" name="pass1" id="pass1"type="password" placeholder="********"> 
                    </div>

                    <div class="tittles">
                        <label class="tittles">Confirma tu password</label>
                    </div>
                    <div class="inputs">
                        <input class="inputss" name="pass2" id="pass2" type="password" placeholder="********">
                    </div>
                    <div class="">
                        <span class="errores" id="passError"></span>
                    </div>
                    <br>                    
                </form>
                    <div class="btn">
                        <button type="buttton" id = "btnEnviar" class=""> Registrarse
                    </div>
                <p class="info">Tienes cuenta!!! <a href="http://localhost/App-encriptador/index.php?controller=usuario&action=loginView">Inicia sesion</a></p>
            </div>
        </div>
    </div>
    <script src="public/Js/registrarse.js"></script>
</body>

</html>