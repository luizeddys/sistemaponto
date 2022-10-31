<?= Sessao::mensagem('login');?>
<section class="login-sec">
    <div class="login-box">
        <form action="<?= url ?>admin/autenticar" method="POST">
            <label for="login">Login: <input type="text" name="login" required placeholder="Login de acesso"></label>
            <label for="senha">Senha: <input type="password" name="senha" required></label>
            <input type="submit" name="enviar" value="Entrar">
        </form>
        <div class="clear"></div>
    </div>
</section>