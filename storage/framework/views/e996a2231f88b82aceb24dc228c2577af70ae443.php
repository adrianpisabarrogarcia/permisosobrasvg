<!--MENU DESPLEGABLE-->

<!--MAIN-->
<?php $__env->startSection("content"); ?>
    <div class="jumbotron jumbotron-fluid w-100 m-0 p-0 bg-transparent border-bottom border-secondary col-11 mx-auto d-flex align-items-center h-auto">
        <div class="container-fluid row justify-content-between py-5 w-100">
            <div class="h-auto py-5 col-12 col-lg-6 d-flex flex-column align-items-center">
                <img src="img/principal/logo-claro.png" class="logo w-50 h-75 mr-5">
                <p class="lead w-50 m-0 ml-5">Obras y reformas Vitoria-Gasteiz.</p>
            </div>
            <?php switch(Session::get('rol')):
                case ('1'): ?>
                <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                    <a href="solicitudpendiente" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Solicitudes Pendientes</a>
                    <a href="comprobarsolicitud" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Comprobar Solicitudes</a>
                </div>
                <?php break; ?>
                <?php case ('2'): ?>
                <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                    <a href="asignarsolicitudes" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Asignar Solicitudes</a>
                    <a href="graficos" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent text-dark d-flex align-items-center justify-content-center text-decoration-none text-center">Gráficos</a>
                </div>
                <?php break; ?>
                <?php default: ?>
                <div class="col-12 col-lg-6 h-auto row mt-3 ml-4 ml-lg-0 pl-5 float-end align-items-center justify-content-around">
                    <a href="<?php echo e(route('solicitarObra')); ?>" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 ml-sm-0 border-5 rounded d-flex align-items-center text-dark justify-content-center text-decoration-none text-center">Solicitar Obra</a>
                    <a href="contacto" class="h-25 text-white enlaceprin col-4 col-md-4 col-lg-5 py-4 mr-5 border-2 rounded border-transparent d-flex align-items-center text-dark justify-content-center text-decoration-none text-center">Contacto</a>
                </div>
                <?php break; ?>
            <?php endswitch; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php if(count($listasolicitudes) > 0): ?>
                <div class="col-12 dropdown mt-3">
                    <div class="nav-item dropdown" id="menu">
                        <a class="nav-link col-3 mb-2 text-center col-sm-3 col-md-2 col-xl-1 filtrar border border-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginmenu()">
                            Filtrar
                        </a>
                        <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown" id="submenu">
                            <a class="nav-link dropdown-item p-0 ps-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginsubmenu()">
                                Estados
                            </a>
                            <div class="dropdown-menu listmenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item filtro" href="#" id="creado">Creado</a>
                                <a class="dropdown-item filtro" href="#" id="pendiente">Pendiente</a>
                                <a class="dropdown-item filtro" href="#" id="aceptado">Aceptado</a>
                                <a class="dropdown-item filtro" href="#" id="rechazado">Rechazado</a>
                                <form id="form-estado" action="<?php echo e(route('portal.ajax')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="estado" id="estado">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $__currentLoopData = $listasolicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitudes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 mt-2">
                        <a class="text-decoration-none" href="<?php echo e(route('solicitud.show',$solicitudes->id_obra)); ?>">
                            <div class="container mb-4 solicitudes text-white card shadow card-solicitud d-flex align-items-center justify-content-center">
                                <div class="w-100 mt-3">
                                    <?php $__currentLoopData = $tipo_obra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($tipo->id_tipobra == $solicitudes->id_tipo_obra): ?>
                                            <span class="card-title text-dark h5 clearfix"><?php echo e($tipo->tipo); ?>:</span>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <?php $__currentLoopData = $listausuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($usuario->id_usu == $solicitudes->id_usuario): ?>
                                                <span class="text-dark"><small>Creado por: <span class="text-primary font-weight-bold"><?php echo e($usuario->nombre); ?></span></small></span>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="my-2 mt-3 card-footer border text-dark text-break"><?php echo substr($solicitudes->descrip,0,40); ?></div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <p><small class="text-dark fecha"><?php echo e($solicitudes->fecha_creacion); ?></small></p>
                                        </div>
                                        <?php switch($solicitudes->estado):
                                            case ("creado"): ?>
                                            <div class="alert alert-info py-2" role="alert">
                                                <small><?php echo e($solicitudes->estado); ?></small>
                                            </div>
                                            <?php break; ?>
                                            <?php case ("pendiente"): ?>
                                            <div class="alert alert-warning py-2" role="alert">
                                                <small><?php echo e($solicitudes->estado); ?></small>
                                            </div>
                                            <?php break; ?>
                                            <?php case ("aceptado"): ?>
                                            <div class="alert alert-success py-2" role="alert">
                                                <small><?php echo e($solicitudes->estado); ?></small>
                                            </div>
                                            <?php break; ?>
                                            <?php default: ?>
                                            <div class="alert alert-danger py-2" role="alert">
                                                <small><?php echo e($solicitudes->estado); ?></small>
                                            </div>
                                        <?php endswitch; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-4 mt-3 d-flex justify-content-center paginacion">
                    <nav>
                        <?php echo e($listasolicitudes->onEachSide(0)->links('pagination::bootstrap-4')); ?>

                    </nav>
                </div>
            <?php else: ?>
                <?php if(isset($estado)): ?>
                    <div class="col-12 dropdown mt-3">
                        <div class="nav-item dropdown" id="menu">
                            <a class="nav-link col-3 mb-2 text-center col-sm-3 col-md-2 col-xl-1 filtrar border border-primary dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginmenu()">
                                Filtrar
                            </a>
                            <div class="dropdown-menu dropright" aria-labelledby="navbarDropdown" id="submenu">
                                <a class="nav-link dropdown-item p-0 ps-4 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="marginsubmenu()">
                                    Estados
                                </a>
                                <div class="dropdown-menu listmenu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item filtro" href="#" id="creado">Creado</a>
                                    <a class="dropdown-item filtro" href="#" id="pendiente">Pendiente</a>
                                    <a class="dropdown-item filtro" href="#" id="aceptado">Aceptado</a>
                                    <a class="dropdown-item filtro" href="#" id="rechazado">Rechazado</a>
                                    <form id="form-estado" action="<?php echo e(route('portal.ajax')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="estado" id="estado">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="mt-3 text-center">No hay solicitudes realizadas</span>
                <?php else: ?>
                    <span class="mt-3 text-center">No hay solicitudes realizadas</span>
                <?php endif; ?>
            <?php endif; ?>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("principal.layouts.estructuraPagina", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/portal.blade.php ENDPATH**/ ?>