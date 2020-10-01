<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    
    <div class="wrapper">
    <form class="login">
    <p class="title">Login</p>
    <input type="text" placeholder="Username" autofocus/>
    <i class="fa fa-user"></i>
    <input type="password" placeholder="Password" />
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a>
    <button>
      <i class="spinner"></i>
      <span class="state">Log in</span>
    </button>
  </form>
  <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
  </p>
</div>

    
    <?php require 'views/footer.php'; ?>
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