<?php require_once(APPPATH . 'views/common/header.php'); ?>
<div class="panel">
    <div class="panel-heading">
        <h4>Estudiantes</h4>
    </div>
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <a href="<?php echo base_url("wa/Dashboard") ?>" class="btn">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                            Regresar
                        </a>

                        <a onclick="charge_modal()" href="#" data-target="#myModal" data-toggle="modal" class="btn">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            Nuevo Estudiante
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
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>correo</th>
                                        <th>Telefono</th>
                                        <th>Correo Alternativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($data as $app) {
                                        ?>

                                        <tr>
                                            <td><?php echo $app['name']; ?></td>
                                            <td><?php echo $app['last_name']?></td>
                                            <td><?php echo $app['email']; ?></td>
                                            <td><?php echo $app['other_email']; ?></td>
                                            <td><?php echo $app['Contraseña']; ?></td>
                                            <td>
                                                <?php
                                                echo '<a onclick="charge_modal(' . $app['id'] .',\'' . $app['name'] . '\''. ',\'' . $app['last_name'] . '\''. ',\'' . $app['birth_date'] . '\''. ',\'' . $app['other_email'] .'\'. ',\'' . $app['password'] .'\')" href="#" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        <?php } else { ?>

                            <center><h3>No hay estudiantes</h3></center>

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
                <h4 class="modal-title" id="myModalLabel">Usuarios</h4>
            </div>    
            <?php echo form_open('User/save/'); ?>
                <div class="form-group col-xs-12">
                    <label for="name">Nombre</label>
                    <input id="name" name="name" type="text" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="last_name">Apellidos</label>
                    <input id="last_name" name="last_name" type="text" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="date">Fecha de nacimiento</label>
                    <input id="birth_date" name="birth_date" type="date" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="mail">Email</label>
                    <input id="mail" name="mail" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="omail">Other Email</label>
                        <input id="omail" name="omail" type="numeric" class="form-control">
                    </div>
                    <div class="col-xs-6">
                        <label for="pass">Contraseña</label>
                        <input id="pass" name="pass" type="numeric" class="form-control">
                    </div>
                </div>              
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id"/>
                    <button type="submit" id="btnSave"class="btn" >Guardar</button>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
<?php require_once(APPPATH . 'views/common/scripts.php'); ?>