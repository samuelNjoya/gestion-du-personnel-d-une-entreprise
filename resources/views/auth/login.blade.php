<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>
  <link rel="stylesheet" href="{{asset('assets/styles/stylesLogin.css')}}">
</head>
<body>

  <div class="login-container">
    @include('_MessageES')
    <h2>Connexion</h2>
    <form action="" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Adresse Email</label>
        <input type="email" name="email" id="email" placeholder="ex: user@example.com" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="********" required>
      </div>
      <button type="submit" class="login-btn">Se connecter</button>
    </form>
  </div>

</body>
</html>
