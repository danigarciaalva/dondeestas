<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Migraciones</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	<link type="text/css" href="<?=base_url();?>/css/bootstrap.css" rel="stylesheet">
	<link type="text/css" href="<?=base_url();?>/css/signin.css" rel="stylesheet">
	<link href="<?=base_url();?>/css/starter-template.css" rel="stylesheet">
</head>
<body>
    <div class="container">
      <form class="form-signin" action="<?=base_url()?>index.php/principal" method="POST">
        <h2 class="form-signin-heading text-center">Iniciar Sesión</h2><br/>
        <input type="text" class="form-control" placeholder="Usuario" required autofocus><br/>
        <input type="password" class="form-control" placeholder="Contraseña" required><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar | Registrarse</button>
      </form>
    </div>
</body>
</html>
