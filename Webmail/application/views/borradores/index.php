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

                        <a onclick="charge_modal()" href="#" data-target="#myModal" data-toggle="modal" class="btn">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Nuevo Correo
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="container-table" class="table-responsive" >
                        <?php if ($data != null) { ?>
                            <table id="grid" class="table table-bordered"  >
                                <thead>
                                    <tr>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>correo</th>
                                        <th>Asunto</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $app) {
                                        ?>

                                        <tr>
                                            <td><?php echo $app['remitente']; ?></td>
                                            <td><?php echo $app['destinatario']?></td>
                                            <td><?php echo $app['asunto']; ?></td>
                                            <td>
                                                <?php
                                                echo '<a onclick="charge_modal(' . $app['remitente'] .',\'' . $app['destinatario'] . '\''. ',\'' . $app['asunto'] . '\''. ',\'' . $app['cuerpo'] .'\')" href="#" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        <?php } else { ?>

                            <center><h3>No hay usuarios</h3></center>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div> 
<!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Correo</h4>
            </div>    
            <?php echo form_open('User/save/'); ?>
                <div class="form-group col-xs-12">
                    <label for="remitente">Remitente</label>
                    <input id="remitente" name="remitente" type="text" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="destinatario">Destinatario</label>
                    <input id="destinatario" name="destinatario" type="text" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="asunto">Asunto</label>
                    <input id="asunto" name="asunto" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="cuerpo">Cuerpo</label>
                        <textarea id="cuerpo" name="cuerpo" type="email" class="form-control"></textarea> 
                    </div>
                </div>              
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id"/>
                    <button type="submit" id="btnsned"class="btn" >Enviar</button>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
<?php require_once(APPPATH . 'views/common/scripts.php'); ?>
<script type="text/javascript" src="<?php echo base_url("assets/user/index.js"); ?>"></script>