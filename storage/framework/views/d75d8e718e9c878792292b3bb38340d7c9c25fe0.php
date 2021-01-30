<?php $__env->startSection('archivosCSS'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container border-bottom border-secondary">
        <div class="row">
            <?php $__currentLoopData = $listasolicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitudes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $listausuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 mt-4 mt-lg-4">
                        <div class="datos bg-primary w-100"
                             style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                            <h5 class="text-white text-center pt-2">Datos del Solicitante</h5>
                            <div
                                class="card-footer datosusu ps-0 pe-0 container mb-4 card shadow d-flex align-items-center justify-content-center">
                                <span
                                    class="text-dark text-center"><small><b>Nombre: </b><?php echo e($usuarios->nombre); ?></small></span>
                                <span
                                    class="text-dark text-center"><small><b>Apellido: </b><?php echo e($usuarios->apellido); ?></small></span>
                                <span
                                    class="text-dark text-center"><small><b>Dni: </b><?php echo e($usuarios->dni); ?></small></span>
                                <span class="text-dark text-center"><small><b>Email: </b><?php echo e($usuarios->email); ?></small></span>
                                <span
                                    class="text-dark text-center"><small><b>Teléfono: </b><?php echo e($usuarios->telefono); ?></small></span>
                                <span
                                    class="text-dark text-center"><small><b>Dirección: </b><?php echo e($usuarios->calle); ?></small></span>
                                <span class="text-dark text-center"><small><b>Codigo Postal: </b><?php echo e($usuarios->codigo_postal); ?></small></span>
                                <span class="text-dark text-center"><small><b>Municipio: </b><?php echo e($usuarios->municipio); ?></small></span>
                                <span class="text-dark text-center"><small><b>Provincia: </b><?php echo e($usuarios->provincia); ?></small></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 mt-lg-4">
                    <div class="datos bg-primary" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <h5 class="text-white text-center pt-2">Datos de la Obra</h5>
                        <div class="card-footer datosusu ps-0 pe-0 container mb-4 card shadow">
                            <div class="d-flex justify-content-center flex-column align-items-center">
                                <?php $__currentLoopData = $tipo_edificio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoedi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="text-dark"><small><b>Tipo de edificio: </b><?php echo e($tipoedi->tipo); ?></small></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $tipo_obra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipobra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span
                                        class="text-dark"><small><b>Tipo de obra: </b><?php echo e($tipobra->tipo); ?></small></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <span class="text-dark text-center"><small><b>Fecha de Creación: </b><?php echo e($solicitudes->fecha_creacion); ?></small></span>
                                <?php if($solicitudes->fecha_ini !=null): ?>
                                    <span class="text-dark text-center"><small><b>Fecha de Incio: </b><?php echo e($solicitudes->fecha_ini); ?></small></span>
                                <?php endif; ?>
                                <?php if($solicitudes->fecha_fin != null): ?>
                                    <span class="text-dark text-center"><small><b>Fecha de Fin: </b><?php echo e($solicitudes->fecha_fin); ?></small></span>
                                <?php endif; ?>
                                <span class="text-dark text-center ps-1 pe-1"><small><b>Dirección: </b><?php echo e($solicitudes->calle); ?></small></span>
                                <span class="text-dark text-center"><small><b>Codigo Postal: </b><?php echo e($solicitudes->codigo_postal); ?></small></span>
                                <span
                                    class="text-dark text-center"><small><b>Portal: </b><?php echo e($solicitudes->numero); ?></small></span>
                                <span class="text-dark text-center">
                                             <?php if($solicitudes->piso != null): ?>
                                        <small><b>Piso: </b><?php echo e($solicitudes->piso); ?> </small>
                                    <?php endif; ?>
                                    <?php if($solicitudes->mano != null): ?>
                                        <small><b> Mano: </b><?php echo e($solicitudes->mano); ?></small>
                                    <?php endif; ?>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-4">
                    <div class="datos bg-primary w-100"
                         style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <h5 class="text-white text-center pt-2">Descripción</h5>
                        <div class="card-footer datosusu container mb-4 card shadow">
                            <span class="text-center text-dark"><small><?php echo $solicitudes->descrip; ?></small></span>
                            <div class="d-flex justify-content-center align-items-end mt-4">
                                <button class="alert alert-primary py-2 me-3 mb-2">
                                    <small><a class="text-dark" href="<?php echo e($solicitudes->plano); ?>" target="_blank"
                                              download><i class="fa fa-download"></i> Planos</a></small>
                                </button>
                                <?php switch($solicitudes->estado):
                                    case ("creado"): ?>
                                    <div class="alert alert-info py-2 mb-2" role="alert">
                                        <small><?php echo e($solicitudes->estado); ?></small>
                                    </div>
                                    <?php break; ?>
                                    <?php case ("pendiente"): ?>
                                    <div class="alert alert-warning py-2 mb-2" role="alert">
                                        <small><?php echo e($solicitudes->estado); ?></small>
                                    </div>
                                    <?php break; ?>
                                    <?php case ("aceptado"): ?>
                                    <div class="alert alert-success py-2 mb-2" role="alert">
                                        <small><?php echo e($solicitudes->estado); ?></small>
                                    </div>
                                    <?php break; ?>
                                    <?php default: ?>
                                    <div class="alert alert-danger py-2 mb-2" role="alert">
                                        <small><?php echo e($solicitudes->estado); ?></small>
                                    </div>
                                <?php endswitch; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-lg-2">
                    <div class="datos bg-primary" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <h5 class="text-white text-center pt-2">Mapa</h5>
                        <div class="card-footer datosusu container mb-4 card shadow p-0">
                            <input type="hidden" id="lat" value="<?php echo e($solicitudes->lat); ?>">
                            <input type="hidden" id="lng" value="<?php echo e($solicitudes->lng); ?>">
                            <input type="hidden" id="direccion" value="<?php echo e($solicitudes->calle); ?>">
                            <div id="map">

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php if(count($listacomentarios) > 0): ?>
        <div class="container">
            <div class="row">
                <h5 class="text-dark text-start pt-3 comentario">Comentarios</h5>
                <?php $__currentLoopData = $listacomentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 mt-2 mt-lg-2">
                        <div class="datos bg-primary"
                             style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                            <div class="card-footer text-dark datosusu container mb-2 card shadow">
                                <span><?php echo e($comentarios->descripcion); ?></span>
                                <div class="d-flex justify-content-end align-items-center mt-3">
                                    <?php if($comentarios->archivos != null): ?>
                                        <button class="alert alert-primary mb-0 py-2 me-3">
                                            <small><a class="text-dark" href="<?php echo e($comentarios->archivos); ?>"
                                                      target="_blank" download><i
                                                        class="fa fa-download"></i>Archivos</a></small>
                                        </button>
                                    <?php endif; ?>
                                    <span><?php echo e($comentarios->fecha_comentario); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="mt-4 d-flex justify-content-center paginacion">
                    <nav>
                        <?php echo e($listacomentarios->onEachSide(0)->links('pagination::bootstrap-4')); ?>

                    </nav>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(Session::get('rol') == "2"): ?>
        <?php if(count($listacomentarios) ==  0): ?>
            <div class="container mb-3 mt-3">
                <?php else: ?>
                    <div class="container mb-3">
                        <?php endif; ?>
                        <div class="row">
                            <h5 class="text-dark text-start comentario">Añadir Comentario</h5>
                            <div class="mt-2 col-12" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                                <div class="datos bg-primary"
                                     style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                                    <div class="card-footer datosusu container card shadow">
                                        <form method="POST" action="<?php echo e(route('solicitud.insert')); ?>"
                                              enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-floating">
                                                <textarea class="form-control p-2 card-footer anacomenta"
                                                          name="comentario" id="comentario" required
                                                          maxlength="250"></textarea>
                                            </div>
                                            <input type="file" name="archivos" class="mt-2 text-dark"
                                                   accept=".jpg,.jpeg,.png,.zip,.7z,.rar">
                                            <input type="hidden" name="fecha" id="fecha">
                                            <input type="hidden" name="idsoli"
                                                   value="<?php echo e($listasolicitudes[0]->id_obra); ?>">
                                            <button type="submit"
                                                    class="btn btn-primary botoncoment text-white w-100 mt-2">Añadir
                                                Comentario
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php endif; ?>
            </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/mapasolicitud.js"></script>
    <script src="/js/solicitudes.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal.layouts.estructuraPagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/solicitud.blade.php ENDPATH**/ ?>