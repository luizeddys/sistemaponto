    <header class="main-header">
        <div class="main-bar">
            <div class="main-logo">
                <img src="<?= url ?>/public/img/system/logo.png" alt="" onclick="window.location.href='<?= url ?>'">
            </div>

            <div class="site-name">
                <p><?= app_nome ?></p>
            </div>
        </div>

        <div class="main-menu">
            <?php 
                if(isset($_SESSION['admin_id'])){
            ?>
                <nav>
                    <ul>
                        <li onclick="window.location.href='<?= url ?>admin/home'">Home</li>
                        <li onclick="window.location.href='<?= url ?>admin/usuarios'">Usuários</li>
                        <li onclick="window.location.href='<?= url ?>admin/config'">Configurações</li>
                        <li onclick="window.location.href='<?= url ?>admin/logoff'">Sair</li>
                    </ul>
                </nav>
            <?php
                }else{
            ?>
                <nav>
                    <ul>
                        <li onclick="window.location.href='<?= url ?>'">Início</li>
                        <li onclick="window.location.href='<?= url ?>paginas/consultarHistorico'">Consultar Histórico</li>
                        <li onclick="window.location.href='<?= url ?>admin/'">Painel Administrativo</li>
                    </ul>
                </nav>
            <?php
                }
            ?>
        </div>
    </header>