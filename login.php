<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َAnimated Login Form</title>
    <link rel="stylesheet" href="login1.css" type="text/css">

  </head>

  <body>

    
    <input type="checkbox" id="btn-modal">
    <label for="btn-modal" class="lbl-modal">Terminos y condiciones</label>
    <div class="modal">
      <div class="conteiner">
      <header>     Terminos y condiciones</header>
      <label for="btn-modal">X</label>
      <div class="contenido">
        <br> 
        <input type="checkbox" name="term-cond" > Acepto los <a href="termsycon.php" target="_blank">terminos y condiciones</a> expuestos aqui<br><br>
        <input type="checkbox" name="pol-priv">Acepto la<a href="termsycon.php" target="_blank">politica de privacidad</a> que proporciona este sitio web<br>
        </div>
        <p>Para continuar presione los casilleros de arriba</p>
      </div>
      </div>
    </div>
<main>
<form class="box" action="logindatabase.php" method="POST">
  <h1>Login</h1>
  <input type="text" name="user" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" value="Login">
  <span>or <a href="register.php">Register</a></span>
</form>
</main>
  </body>
</html>
