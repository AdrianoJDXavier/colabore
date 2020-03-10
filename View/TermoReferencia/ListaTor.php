<?php
include_once('../Layout/principal.php');
$numpaginas = $_REQUEST['paginas'];

if (empty($_SESSION['tors'])) {
?>
        <section class="panel">
        <header class="panel-heading">
            TOR
        </header>
            <div class="panel-body">
                <h3>Você não possui termos de referencia no sistema!</h3>
            </div>
           <?
}else{
    ?>
        </section>
        <section class="panel">
        <header class="panel-heading">
            Termos de Referencia
        </header>
            <div>
                <a href="PessoaF"><button class="btn btn-primary" style="margin: 10px">Inserir TOR</button></a>
            </div>
        <div class="panel-body">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_key_alt"></i> ID </th>
                    <th><i class="icon_id"></i> Tipo</th>
                    <th><i class="icon_calendar"></i> Titulo</th>
                    <th><i class="icon_cog"></i> Ações</th>
                </tr>
                <?
                foreach($_SESSION['tors'] as $tor){
                    ?>
                    <tr>
                        <td><?=$tor->numTor?></td>
                        <td><?=$tor->tipo?></td>
                        <td><?=$tor->titulo?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="#"><i class="icon_pencil"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o cadastro de ?')" href="../../Controller/TORController.php?opcao=4&id=<?= $tor->numTor ?>"><i class="icon_trash_alt"></i></a>
                                <a class="btn btn-primary" href="{{route('print-pdf', $tor->numTor)}}" title="Visualizar PDF" target="_blank"><i class="icon_document"></i></a>
                            </div>
                        </td>
                    </tr>
                <?}?>
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
                                <a href="../../Controller/TORController.php?opcao=6&pagina=<?=$i?>" <?if($i == $pagina){echo "class='active'";}?> > <?=$i?> </a>
                                <?
                            }
                        }
                    }

                    ?>
                </ul>
            </center>
        </div>
    </section>
<?}?>
<?php
include_once('../Layout/rodape.php');
?>