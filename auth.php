<?php
require_once("templates/header.php");
?>
<div id="main-container" class="container-fluid">
  <div class="col-md-12">
    <div class="row" id="auth-row">
      <div class="col-md-4" id="login-container">
        <h2>Entrar</h2>
        <form action="<?= $BASE_URL ?>auth_proccess.php" method="POST">
          <input type="hidden" value="login" name="type">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Digite o seu Email">
          </div>
          <div class="form-group">
            <label for="password">Senha/Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua Senha">
          </div>
          <input type="submit" class="btn card-btn" value="Entrar">
        </form>
      </div>
      <div class="col-md-4" id="register-container">
        <h2>Criar Conta</h2>
        <form action="<?= $BASE_URL ?>auth_proccess.php" method="POST">
          <input type="hidden" value="register" name="type">
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Digite o seu Email">
          </div>
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite sua Nome">
          </div>
          <div class="form-group">
            <label for="lastname">SobreNome:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Digite sua SobreNome">
          </div>
          <div class="form-group">
            <label for="password">Senha/Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua Senha">
          </div>
          <div class="form-group">
            <label for="confirmpassword">Confirme a senha:</label>
            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Digite sua Senha novamente">
          </div>
          <input type="submit" class="btn card-btn" value="Registrar">
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require_once("templates/footer.php");
?>