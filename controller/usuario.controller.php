<?php
session_start();  //Apertura-hereda el manejo de variables de sesión
//Invocando modelo
require_once '../model/usuario.php';

//Si existe una operacion (INTENCIÓN DEL USUARIO)
if (isset($_GET['operacion'])){

  //Instancia clase Usuario
  $usuario = new Usuario();

  if ($_GET['operacion']== 'destroy'){
    session_destroy();  //elimina sesión
    session_unset();   //libera recursos
    header('Location: ../index.php');
  }

  if ($_GET['operacion'] == 'iniciarSesion'){

    //Arreglo asociativo
    $acceso = [
      "login"           => false,
      "nombreusuario"   => "",
      "nivelacceso"     => "",
      "mensaje"         => ""
    ];

    $data = $usuario->iniciarSesion($_GET['user']);
    $claveIngresada = $_GET['password']; //No está encriptada

    if ($data){
      if (password_verify($claveIngresada, $data["claveacceso"])){        
        //Registrar datos de acceso
        $acceso["login"] = true;
        $acceso["nombreusuario"] = $data["nombreusuario"];
        $acceso["nivelacceso"] = $data["nivelacceso"];
      }else{
        $acceso["mensaje"] = "Error en la contraseña";
      }
    }else{
      $acceso["mensaje"] = "Usuario no encontrado";
    }

    //Asignar el arreglo $acceso a la variable a la sesión
    $_SESSION['seguridad'] = $acceso;
    $_SESSION['inicio'] = date('c');
    $_SESSION['navegador'] = 'Google Chrome';
    //... otras variables de sesión ...


    //Enviar el objeto $acceso a la vista
    echo json_encode($acceso);

  } //Fin operacion = iniciarSesion

}

?>