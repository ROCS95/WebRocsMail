<?php require_once(APPPATH . 'views/common/header.php'); ?>
<body>
<div class="panel">
    <div class="panel-heading">
        <h4>RocsMail</h4>
    </div>
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p>

                        <a onclick="charge_mymoda(0,$username)" href="#" data-target="#myModal" data-toggle="modal" class="btn">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Nuevo Correo
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="container-table" class="table-responsive" >
                        <?php if ($emails != null) { ?>
                            <table id="grid" class="table table-bordered"  >
                                <thead>
                                    <tr>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>Asunto</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($emails as $app) {
                                        ?>

                                        <tr>
                                            <td><?php echo $app['remitente']; ?></td>
                                            <td><?php echo $app['destinatario']?></td>
                                            <td><?php echo $app['asunto']; ?></td>
                                            <td>
       <?php
       if ($state == 2 || $state == 3) {
echo '<a onclick="charge_mymodal(' . $app['id'] .',\'' . $app['remitente'] . '\''. ',\'' . $app['destinatario'] . '\''. ',\'' . $app['asunto'] . '\''. ',\''. $app['cuerpo'] .'\')" href="#" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
}else{
echo '<a onclick="charge_modal(' . $app['id'] .',\'' . $app['remitente'] . '\''. ',\'' . $app['destinatario'] . '\''. ',\'' . $app['asunto'] . '\''. ',\''. $app['cuerpo'] .'\')" href="#" data-target="#secModal" data-toggle="modal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>';
}
echo '<a href="../delete/' . $app['id'] . '" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td></tr>';
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        <?php } else { ?>

                            <center><h3>No hay emails</h3></center>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>      
<!-- Modal -->
<div id="myModal" class="modal fade in" tabindex="-1" data-backdrop="static"role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Correo</h4>
            </div>    
           <?php echo form_open('Email/save/'); ?>

                <div class="form-group col-xs-12">
                    <label for="remitente">Remitente</label>
                    <input id="remitente" name="remitente" type="email" readonly="readonly" class="form-control" value = "<?php echo $username; ?>">
                </div>
                <div class="form-group col-xs-12">
                    <label for="destinatario">Destinatario</label>
                    <input id="destinatario" name="destinatario" type="email" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="asunto">Asunto</label>
                    <input id="asunto" name="asunto" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="cuerpo">cuerpo</label>
                        <textarea id="cuerpo" name="cuerpo" type="text" rows="10" class="form-control"></textarea>
                    </div>

                </div>
                <div class="col-xs-12">
                       <select class="form-control" name="state" id="state">
                        <option value="2">Enviar</option>
                        <option value="3">Guardar</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id"/>

                    
                    <button type="submit" id="btnsend"class="btn" >Submit</button>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div id="secModal" class="modal fade in" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Correo</h4>
            </div>    
                <div class="form-group col-xs-12">
                    <label for="remit">Remitente</label>
                    <input id="remit" name="remit" type="email" readonly="readonly" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="dest">Destinatario</label>
                    <input id="dest" name="dest" type="email" readonly="readonly" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="asun">Asunto</label>
                    <input id="asun" name="asun" type="text" readonly="readonly" class="form-control">
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="cuer">cuerpo</label>
                        <textarea id="cuer" name="cuer" readonly="readonly" type="text" rows="10" class="form-control"></textarea>
                    </div>
                </div>              
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once(APPPATH . 'views/common/scripts.php'); ?>
<script type="text/javascript" src="<?php echo base_url("assets/email/index.js"); ?>"></script>