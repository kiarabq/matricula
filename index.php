
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!--BS5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/login.css">

</head>
<body>

  <div class="login-box">
    <div class="login-header">
      <header>Acceso al Sistema</header>
    </div>
    <div class="input-box">
      <input type="text" class="input-field" id="user" placeholder="Usuario" autocomplete="off" require>
    </div>
    <div class="input-box">
      <input type="password" class="input-field" id="password" placeholder="Contraseña" autocomplete="off" require>
    </div>
    <div class="input-submit">
      <button class="submit-btn" id="iniciar-sesion"></button>
      <label for="submit">Iniciar sesión</label>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script>
    $(document).ready(function (){

      function login(){
        const datos = {
          "operacion"   : "iniciarSesion",
          "user"        : $("#user").val(),
          "password"    : $("#password").val()
        };

        $.ajax({
          url: 'controller/usuario.controller.php',
          type: 'GET',
          data: datos,
          dataType: 'JSON',
          success: function (result){
            console.log(result);
            if (result.login){
              alert(`Bienvenida: ${result.nombreusuario}`);
              window.location.href = `view/sistema.view.php`;
            }else{
              alert(result.mensaje);  
            }
          }
        });
      }

      $("#iniciar-sesion").click(login);
      
      $("#password").keypress(function (evt) {
        if (evt.keyCode == 13){
          login();
        }
      });

    });
  </script>
  
  
</body>
</html>

