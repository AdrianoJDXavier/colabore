<?
include_once("../Layout/principal.php");
$numpaginas = $_REQUEST['paginas'];

if (empty($_SESSION['participantes'])) {
?>
    <section class="panel">
        <header class="panel-heading">
            Participantes
        </header>
        <div class="panel-body">
            <h3>Você não possui participantes no sistema!</h3>
        </div>
    <? } else { ?>
    </section>
    <section class="panel">
        <header class="panel-heading">
            Participantes
        </header>
        <div class="panel-body">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_contacts_alt"></i> Nome</th>
                        <th><i class="icon_id"></i> Matricula</th>
                        <th><i class="icon_calendar"></i> CPF</th>
                        <th><i class="icon_calendar"></i> RG</th>
                        <th><i class="icon_calendar"></i> Setor</th>
                        <th><i class="icon_calendar"></i> Cargo</th>
                        <th><i class="icon_calendar"></i> Função</th>
                        <th><i class="icon_cog"></i> Ações</th>
                    </tr>
                    <?
                    foreach ($_SESSION['participantes'] as $participantes) {
                    ?>
                        <tr>
                            <td><?= $participantes->nome ?></td>
                            <td><?= $participantes->matricula ?></td>
                            <td><?= $participantes->cpf ?></td>
                            <td><?= $participantes->rg ?></td>
                            <td><?= $participantes->setor ?></td>
                            <td><?= $participantes->cargo ?></td>
                            <td><?= $participantes->funcao ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" href="../../Controller/ParticipanteController.php?opcao=3&id=<?= $participantes->idParticipante ?>"><i class="icon_pencil"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o cadastro de <?= $participantes->nome ?>?')" href="../../Controller/ParticipanteController.php?opcao=4&id=<?= $participantes->idParticipante ?>"><i class="icon_trash_alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
            <style>
                .pagination {
                    display: inline-block;
                }

                .pagination a {
                    font-weight: bold;
                    font-size: 12px;
                    color: black;
                    padding: 8px 16px;
                    text-decoration: none;
                    border-radius: 5px;
                    border: 1px solid black;
                }

                .active {
                    background-color: #009900;
                }

                .pagination a:hover:not(.active) {
                    background-color: #d4d5d2;
                }
            </style>
            <center>
                <ul class="pagination">
                    <?php
                    // total de páginas
                    $total = 50;

                    // número máximo de links da paginação
                    $max_links = 10;


                    // página corrente
                    $pagina = $_GET['pagina'];

                    // calcula quantos links haverá à esquerda e à direita da página corrente
                    // usa-se ceil() para assegurar que o número será inteiro
                    $links_laterais = ceil($max_links / 2);

                    // variáveis para o loop
                    $inicio = $pagina - $links_laterais;
                    $limite = $pagina + $links_laterais;

                    for ($i = $inicio; $i <= $limite; $i++) {
                        if ($i == $pagina) {
                            echo " <strong>" . $i . "</strong> ";
                        } else {
                            if ($i >= 1 && $i <= $total) {
                                ?>
                                <a href="../../Controller/ParticipanteController.php?opcao=6&pagina=<?=$i?>" <?if($i == $pagina){echo "class='active'";}?> > <?=$i?> </a>
                                <?
                            }
                        }
                    }

                    ?>
                </ul>
            </center>
        </div>
    </section>

<?
}
include_once("../Layout/rodape.php");
?>