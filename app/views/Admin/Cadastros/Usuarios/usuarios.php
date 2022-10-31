<?= Sessao::mensagem('usuarios');?> 
    <section class="content">

        <button class="btn-new" onclick="window.location.href='<?= url ?>admin/novoUsuario'">Novo</button>

        <div class="clear"></div>

        <div class="table-users">
            <?php if($dados["usuarios"] == ""){ ?>
                <h1>Nenhum cadastro</h1>
            <?php }else{ ?>
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach($dados['usuarios'] as $usr){ ?>
                        <tr>
                            <td><?= $usr->nome ?></td>
                            <td><?= $usr->cpf ?></td>
                            <td><button class="btn-new" onclick="window.location.href='<?= url ?>admin/getHistorico/<?= $usr->id ?>'">Relatório</button> <button class="btn-new" onclick="window.location.href='<?= url ?>admin/editarUsuario/<?= $usr->id ?>'">Editar</button></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>

        <div class="dateTime">
            <?php date_default_timezone_set('America/Sao_Paulo'); ?>
            <p>Data: <?= date('d/m/Y') ?></p>
            <p>Hora: <?= date('H:i:s', time()) ?></p>
        </div>
    </section>