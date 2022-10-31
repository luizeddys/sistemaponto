<?= Sessao::mensagem('paginas');?>
<?php $infos = $dados["dadosUsuario"]; ?>
    <section class="content">
        <div class="funcCode">
            <h1>Histórico de Pontos</h1>
            <h2><?= $infos->nome; ?> - <?= $infos->cpf; ?></h2>

            <div class="table-users">
                <?php if($dados["historico"] == ""){ ?>
                    <h1>Não existe histórico</h1>
                <?php }else{ ?>
                    <table>
                        <tr>
                            <th>Tipo</th>
                            <th>Data</th>
                            <th>Hora</th>
                        </tr>
                        <?php foreach($dados['historico'] as $hist){ ?>
                            <tr>
                                <td><?= $hist->tipo ?></td>
                                <td style="text-align: center;"><?= date("d/m/Y", strtotime($hist->data)); ?></td>
                                <td style="text-align: center;"><?= $hist->hora ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
        </div>

        <div class="dateTime">
            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
            <p>Data: <?= date('d/m/Y') ?></p>
            <p>Hora: <?= date('H:i:s', time()) ?></p>
        </div>
    
    </section>