<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/styleLogin.css" th:href="@{/css/index.css}">
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
                <form>
                    <div class="tittles">
                        <label class="tittless">Ingresa tu correo</label>
                    </div>
                    <br>
                    <div class="inputs">
                        <input class="inputss" type="email" placeholder="example@gmail.com">
                        
                    </div>
                    <div class="">
                        <span class="errores"></span>
                    </div>

                    <div class="tittles">
                        <label class="tittles">Ingresa tu password</label>
                    </div>
                    <br>
                    <div class="inputs">
                        <input class="inputss" type="password" placeholder="********">
                        
                    </div>
                    <div class="">
                        <span class="errores">ff</span>
                    </div>
                    <br>
                    <div class="btn">
                        <button type="submit" class="btn-summit"> Iniciar sesion
                    </div>
                    
                </form>
                <p class="info">Registrarse</p>
            </div>
        </div>
    </div>
</body>

</html>