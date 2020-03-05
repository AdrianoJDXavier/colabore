<?php
include_once('../Layout/principal.php');
$numpaginas = $_REQUEST['paginas'];
if (empty($_SESSION['contratos'])) {
?>
    <section class="panel">
        <header class="panel-heading">
            Contratos
        </header>
        <div class="panel-body">
            <h3>Você não possui contratos no sistema!</h3>
        </div>
    <? } else { ?>
    </section>
    <section class="panel">
        <header class="panel-heading">
            Contratos
        </header>
        <div class="panel-body">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
                        <th><i class="icon_check_alt2"></i> Número do Contrato</th>
                        <th><i class="arrow_carrot-right_alt"></i> Objeto</th>
                        <th><i class="icon_calendar"></i> Data Inicio</th>
                        <th><i class="icon_calendar"></i> Data Fim</th>
                        <th><i class="icon_calendar"></i> Documentos</th>
                        <th><i class="icon_cog"></i> Ações</th>
                    </tr>
                    <?
                    foreach ($_SESSION['contratos'] as $contrato) {
                    ?>
                        <tr>
                            <td><?= $contrato->numContrato ?></td>
                            <td><?= $contrato->Objeto_contrato ?></td>
                            <td><?= date('d/m/Y', strtotime($contrato->data_inicio)) ?></td>
                            <td style="background-color: <?php if ($contrato->situacao == "Vencido") echo "#8B0000";
                                                            else echo ""; ?>; color: <?php if ($contrato->situacao == "Vencido") echo "white";
                                                                                        else echo ""; ?>"><?= date('d/m/Y', strtotime($contrato->data_fim)) ?></td>
                            <td><a href='arquivo?id={{$contrato->numContrato}}'><?= $contrato->documentos ?></a></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" href="../../Controller/ContratoController.php?opcao=3&id=<?= $contrato->id ?>"><i class="icon_pencil"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o contrato nº <?= $contrato->numContrato ?>?')" href="../../Controller/ContratoController.php?opcao=4&id=<?= $contrato->id ?>"><i class="icon_trash_alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    <? } ?>
                </tbody>
            </table>
            <style>
                .pagination a {
                    color: black;
                    border: 1px solid;
                    margin: 1px;
                    padding: 8px 16px;
                    text-decoration: none;
                    transition: background-color .3s;
                }

                /* Style the active/current link */
                .pagination a.active {
                    background-color: red;
                    color: white;
                }

                /* Add a grey background color on mouse-over */
                .pagination a:hover:not(.active) {
                    background-color: #DDD;
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
                    if($pagina == 1){
                        $inicio = 1;
                        $limite = 1;
                    }else{
                    $inicio = $pagina - $links_laterais;
                    $limite = $pagina + $links_laterais;    
                    }
                    
                    for ($i = $inicio; $i <= $limite; $i++) {
                        if ($i == $pagina) {
                            echo " <strong>" . $i . "</strong> ";
                        } else {
                            if ($i >= 1 && $i <= $total) {
                                echo " <a href=\"../../Controller/ContratoController.php?opcao=6&pagina=" . $i . "\">" . $i . "</a> ";
                            }
                        }
                    }

                    ?>
                </ul>
            </center>
        </div>
    </section>
<?php
}
include_once('../Layout/rodape.php');
?>