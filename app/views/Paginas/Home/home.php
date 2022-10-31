<?= Sessao::mensagem('paginas');?>
    <section class="content">

        <div class="button-options">
            <button onclick="window.location.href='<?= url ?>paginas/pontoEntrada'">Ponto de Entrada</button>
            <button onclick="window.location.href='<?= url ?>paginas/pontoIntervaloSaida'">Ponto de Intervalo - Saída</button>
            
            <br>

            <button onclick="window.location.href='<?= url ?>paginas/pontoSaida'">Ponto de Saída</button>
            <button onclick="window.location.href='<?= url ?>paginas/pontoIntervaloEntrada'">Ponto de Intervalo - Entrada</button>

            <br>

            <button onclick="window.location.href='<?= url ?>paginas/saidaJustificada'">Saída Justificada</button>
        </div>

        <div class="dateTime">
            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
            <p>Data: <?= date('d/m/Y') ?></p>
            <p>Hora: <?= date('H:i:s', time()) ?></p>
        </div>
    
    </section>