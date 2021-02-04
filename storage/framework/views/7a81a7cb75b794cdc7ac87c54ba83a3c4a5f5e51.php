<?php $__env->startSection("content"); ?>
    <div class="align-self-center mt-5 p-3">
        <h2 class="text-center">Registro de usuarios, técnicos y coordinadores</h2>
        <form id="formulregi" method="POST" action="<?php echo e(route('creacionUsuarioSave')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-2">
                <label class="form-label text-primary fw-bold mb-0 d-flex justify-content-center">Selecciona el tipo de usuario que quieres
                    crear:</label>
                <div class="d-flex form-check form-check-inline d-flex justify-content-center align-items-center flex-row" required>
                    <input type="radio" id="usuario" name="tipousuario" value="3" required> <label
                        class="form-check-label m-3" for="usuario">Usuario normal</label><br>
                    <input type="radio" id="tecnico" name="tipousuario" value="2" checked required> <label
                        class="form-check-label m-3" for="tecnico" required>Técnico</label><br>
                    <input type="radio" id="coordinador" name="tipousuario" value="1"> <label
                        class="form-check-label m-3" for="coordinador">Coordinador</label><br>
                </div>
            </div>
            <div class="d-flex mb-2 flex-wrap">
                <div class="col-12 col-lg-6">
                    <div class="mb-2 row">
                        <div class="col-lg-6 col-12 ps-lg-0 pe-lg-0">
                            <label for="nombre" class="form-label text-primary fw-bold mb-0">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$" placeholder="Fran" required>
                        </div>
                        <div class="col-lg-6 col-12 mt-2 mt-lg-0">
                            <label for="ape" class="form-label text-primary fw-bold mb-0">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="ape"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?)+$" placeholder="Rodríguez" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-lg-6 col-12 ps-lg-0 pe-lg-0">
                            <label for="fecha_nac" class="form-label text-primary fw-bold mb-0">Fecha de
                                Nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nac" id="fecha_nac"
                                   required>
                        </div>
                        <div class="col-lg-6 col-12 mt-2 mt-lg-0">
                            <label for="lugar_nac" class="form-label text-primary fw-bold mb-0">Lugar de
                                Nacimiento</label>
                            <input type="text" class="form-control p-2" name="lugar_nac" id="lugar_nac"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Vitoria-Gasteiz" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-12 p-lg-0" style="padding-right: 12px !important;">
                            <label for="direccion" class="form-label text-primary fw-bold mb-0">Dirección</label>
                            <input type="text" class="form-control" name="calle" id="direccion"
                                   pattern="^[A-Za-zÀ-ÿ]+([A-Za-zÀ-ÿ]*[ ]?[-]?[0-9]*[º]?[ª]?[,]?)+$"
                                   placeholder="Francia, Nº5" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-lg-6 col-12 ps-lg-0 pe-lg-0">
                            <label for="municipio" class="form-label text-primary fw-bold mb-0">Municipio</label>
                            <input type="text" class="form-control" name="municipio" id="municipio"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Vitoria-Gasteiz" required>
                        </div>
                        <div class="col-lg-6 col-12 mt-2 mt-lg-0">
                            <label for="provincia" class="form-label text-primary fw-bold mb-0">Provincia</label>
                            <input type="text" class="form-control" name="provincia" id="provincia"
                                   pattern="^([A-Za-zÀ-ÿ]+[ ]?[-]?[/]?)+$" placeholder="Álava/Araba" required>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-12 p-lg-0" style="padding-right: 12px !important;">
                            <label for="codigopostal" class="form-label text-primary fw-bold mb-0">Código Postal</label>
                            <input type="text" class="form-control" name="codigopostal" id="codigopostal"
                                   pattern="^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$" placeholder="01000" required>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-2">
                        <label for="dni" class="form-label text-primary fw-bold mb-0">Dni</label>
                        <input type="text" class="form-control" name="dni" id="dni"
                               pattern="^[0-9]{8,8}[A-Za-z]$" placeholder="12345678A" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label text-primary fw-bold mb-0">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                               pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
                               placeholder="ejemplo@vitoria.org" required>
                    </div>
                    <div class="mb-2">
                        <label for="telefono" class="form-label text-primary fw-bold mb-0">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono"
                               pattern="^[9|8|7|6]\d{8}$" placeholder="600000000" required>
                    </div>
                    <div class="mb-2">
                        <label for="contra" class="form-label text-primary fw-bold mb-0">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="contra"
                               minlength="8" pattern="^[A-Za-z0-9]+$"
                               placeholder="8 carácteres" required>
                    </div>
                    <div class="mb-2">
                        <label for="repcontra" class="form-label text-primary fw-bold mb-0">Confirma Contraseña</label>
                        <input type="password" class="form-control" id="repcontra" minlength="8"
                               pattern="^[A-Za-z0-9]+$" placeholder="Repite la contraseña" required>
                    </div>
                </div>
            </div>
            <?php if(isset($errores)): ?>
                <div class="alert alert-danger text-center col-11 mx-auto" role="alert" id="errores">
                    <?php echo $errores; ?>

                </div>
            <?php endif; ?>
            <?php if(isset($hecho)): ?>
                <?php if($hecho != ''): ?>
                    <div class="alert alert-success text-center col-11 mx-auto" role="alert" id="hecho">
                        <?php echo $hecho; ?>

                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div id="erroresTypescript">
            </div>
            <button type="submit" class="rounded btn btn-primary botoncoment text-white col-11 ml-3 ml-lg-0 col-lg-12 mt-1">
                Registrarse
            </button>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="js/registro.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("principal.layouts.estructuraPagina", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/coordinador/creacionUsuarios.blade.php ENDPATH**/ ?>