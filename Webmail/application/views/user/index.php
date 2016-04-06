<?php require_once(APPPATH . 'views/common/header.php'); ?>
<body>
<div class="panel">
    <div class="panel-heading">
        <h4>Rocsmail</h4>
    </div>
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <a onclick="charge_modal()" href="#" data-target="#myModal" data-toggle="modal" class="btn">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Nuevo Usuario
                        </a>

                        <a onclick="charge_modal()" href="#" data-target="#myModal2" data-toggle="modal" class="btn">
                            <span class="glyphicon glyphicon glyphicon-off" aria-hidden="true"></span>
                            Login
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
                                            <td><?php echo $app['password']; ?></td>
                                            <td>
                                                <?php
                                                echo '<a onclick="charge_modal(' . $app['id'] .',\'' . $app['name'] . '\''. ',\'' . $app['last_name'] . '\''. ',\'' . $app['email'] . '\''. ',\'' . $app['other_email'] .'\''. ',\'' . $app['password'] .'\')" href="#" data-target="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
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
                    <label for="mail">Email</label>
                    <input id="mail" name="mail" type="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="omail">Other Email</label>
                        <input id="omail" name="omail" type="email" class="form-control">
                    </div>
                    <div class="col-xs-6">
                        <label for="pass">Contraseña</label>
                        <input id="pass" name="pass" type="password" class="form-control">
                    </div>
                    <div class="col-xs-6">
                        <label for="pass">Repetir Contraseña</label>
                        <input id="passw" name="passw" type="password" class="form-control">
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

    <div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Usuarios</h4>
            </div>    
            <?php echo form_open('User/login/'); ?>
                <div class="form-group col-xs-12">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" class="form-control">
                </div>
                <div class="form-group col-xs-12">
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password" class="form-control">
                </div>          
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id"/>
                    <button type="submit" id="btnlog"class="btn" >Login</button>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</body>
<?php require_once(APPPATH . 'views/common/scripts.php'); ?>
<script type="text/javascript" src="<?php echo base_url("assets/user/index.js"); ?>"></script>