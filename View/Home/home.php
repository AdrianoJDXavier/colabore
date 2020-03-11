<?php
include_once('../Layout/principal.php');
$contratos = $_SESSION['contratos_vencer'];
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Meus Contratos
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-inline" role="form" action="filtraContrato">
                                <div class="form-group">
                                    <label>Por Número</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="por_numero" name="por_numero">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label>Por Data</label>
                                    <div class="input-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" id="data_ini" name="data_ini">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" class="form-control" id="data_fim" name="data_fim">
                                            </div>
                                        </div>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Contratos a Vencer
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Objeto</th>
                                    <th>Restam</th>
                                    <th>Data de Vencimento</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                foreach($contratos as $contrato){
                                    ?>
                                <tr>
                                    <td><?=$contrato->numContrato?></td>
                                    <td><?=$contrato->Objeto_contrato?></td>
                                    <?php 
                                    $data_atual = strtotime(date("Y-m-d"));
                                    $data_fim = strtotime($contrato->data_fim);
                                    $diferença = (int)(($data_fim - $data_atual)/86400);
                                    ?>
                                    <td><?=$diferença?> dias</td>
                                    <td><?=date( 'd/m/Y' , strtotime($contrato->data_fim))?></td>
                                </tr>
                                <?}?>
                                </tbody>
                            </table>


                        </div>
                    </section>
                </div>
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Feeds
                        </header>
                        <div class="panel-body">
                        </div>
                    </section>
                </div>
            </div>
<?
include_once("../Layout/rodape.php")
?>