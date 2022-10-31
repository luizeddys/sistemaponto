    <section class="content">

        <div class="button-options">
            <button onclick="window.location.href='<?= url ?>admin/usuarios'">Gerenciar Usuários</button>
            <button onclick="window.location.href='<?= url ?>admin/config'">Configurações</button>
            
            <br>

            <button onclick="window.location.href='<?= url ?>admin/logoff'">Sair</button>
        </div>

        <div class="dateTime">
            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
            <p>Data: <?= date('d/m/Y') ?></p>
            <p>Hora: <?= date('H:i:s', time()) ?></p>
        </div>
    </section>