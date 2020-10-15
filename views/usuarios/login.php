<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <title>Document</title>
</head>
<body>
    
    
    <div class="wrapper">
      <form class="login" action="main.php" method="POST">
            <p class="title">Bienvenido a SISO</p>
                 <input type="text" placeholder="Ingrese usuario" autofocus/>
                    <i class="fa fa-user"></i>
                 <input type="password" placeholder="ingrese Password" />
                   <i class="fa fa-key"></i>
                <a href="#">Olvidente tu contraseña?</a>
            <button>
            <i class="spinner"></i>
            <span class="state">Ingresar al sistema</span>
            <a class="dropdown-item" href="<?php echo constant('URL'); ?>main">Productos</a>
            </button>
     </form>
  <footer><a target="blank" href="http://boudra.me/">HRD version 1.0</a></footer>
  </p>
</div>

    
    
    <script>
                    var working = false;
                    $('.login').on('submit', function(e) {
                    e.preventDefault();
                    if (working) return;
                    working = true;
                    var $this = $(this),
                        $state = $this.find('button > .state');
                    $this.addClass('loading');
                    $state.html('Authenticating');
                    setTimeout(function() {
                        $this.addClass('ok');
                        $state.html('Welcome back!');
                        setTimeout(function() {
                        $state.html('Log in');
                        $this.removeClass('ok loading');
                        working = false;
                        }, 4000);
                    }, 3000);
                    });

    </script>

</body>
</html>