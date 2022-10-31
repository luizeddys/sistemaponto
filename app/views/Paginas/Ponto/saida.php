<?= Sessao::mensagem('paginas');?>
    <section class="content">

        <div class="funcCode">
            <h1>Insira o Código de Funcionário</h1>
            <form action="<?= url ?>paginas/computarSaida" method="post">
                <input type="text" name="funcionarioCode" id="funcCode" autofocus>
                <input type="submit" value="Continuar">
            </form>
        </div>

        <div class="dateTime">
            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
            <p>Data: <?= date('d/m/Y') ?></p>
            <p>Hora: <?= date('H:i:s', time()) ?></p>
        </div>
    
    </section>