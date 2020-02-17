<?
include_once("../Layout/principal.php");
$numpaginas = $_REQUEST['paginas'];

if(empty($_SESSION['participantes'])){
?>
        <section class="panel">
        <header class="panel-heading">
            Participantes
        </header>
            <div class="panel-body">
                <h3>Você não possui participantes no sistema!</h3>
            </div>
<?} else{?>
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
                foreach($_SESSION['participantes'] as $participantes){
                    ?>
                    <tr>
                        <td><?=$participantes->nome?></td>
                        <td><?=$participantes->matricula?></td>
                        <td><?=$participantes->cpf?></td>
                        <td><?=$participantes->rg?></td>
                        <td><?=$participantes->setor?></td>
                        <td><?=$participantes->cargo?></td>
                        <td><?=$participantes->funcao?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="../../Controller/ParticipanteController.php?opcao=3&id=<?=$participantes->idParticipante?>"><i class="icon_pencil"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o cadastro de <?=$participantes->nome?>?')" href="../../Controller/ParticipanteController.php?opcao=4&id=<?=$participantes->idParticipante?>"><i class="icon_trash_alt"></i></a>
                            </div>
                        </td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
            <center>
                        <ul class="pagination">
                            <?php
                            for ($i = 1; $i <= $numpaginas; $i++) {
                                ?>
                                <li><a href="../../Controller/ParticipanteController.php?opcao=6&pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php
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