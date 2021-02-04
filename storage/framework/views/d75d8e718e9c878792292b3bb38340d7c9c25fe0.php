<?php $__env->startSection('archivosCSS'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5 border-bottom border-secondary">
        <div class="row mb-4">
            <?php $__currentLoopData = $listasolicitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitudes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $listausuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="datos w-100 shadow bg-primary border border-primary p-0" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <div class="card-footer datosusu container">
                            <div class="row">
                                <div class="col-lg-4 col-11 pb-2 d-flex align-col-center justify-content-center flex-column">
                                    <h5 class="text-dark text-center">Datos del Solicitante</h5>
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
                                <div class="col-lg-4 col-11 mt-2 mt-lg-0">
                                    <h5 class="text-dark text-center pt-lg-2">Datos de la Obra</h5>
                                    <div class="d-flex justify-content-center flex-column align-items-center">
                                        <?php $__currentLoopData = $tipo_edificio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoedi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="text-dark"><small><b>Tipo de edificio: </b><?php echo e(ucfirst($tipoedi->tipo)); ?></small></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $tipo_obra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipobra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span
                                                class="text-dark"><small><b>Tipo de obra: </b><?php echo e(ucfirst($tipobra->tipo)); ?></small></span>
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
                                <div class="col-lg-4 mt-lg-0 mt-2 d-flex flex-column">
                                    <h5 class="text-dark text-center pt-2">Descripción</h5>
                                    <span class="text-center text-dark"><small><?php echo $solicitudes->descrip; ?></small></span>
                                    <div class="d-flex justify-content-center align-items-end mt-4">
                                        <a class="text-dark planos" href="<?php echo e($solicitudes->plano); ?>" target="_blank"
                                            download>
                                            <button class="alert alert-primary py-2 me-3 mb-2">
                                                <small><i class="fa fa-download"></i> Planos</small>
                                            </button>
                                        </a>

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
                                    <?php if(Session::get('rol') == "2" && $solicitudes->estado != "finalizado"): ?>
                                        <h5 class="text-dark text-center pt-2 mt-lg-2">Resolver Solicitud</h5>
                                        <form action="<?php echo e(route('cambioestado')); ?>" method="post" class="text-center">
                                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                            <input type="radio" name="resolucion" value="aceptado" required><span class="text-dark"> Aceptar</span>
                                            <br />
                                            <input type="radio" name="resolucion" value="rechazado" required><span class="text-dark"> Rechazar</span>
                                            <br />
                                            <input type="hidden" name="idsoli" value="<?php echo e($listasolicitudes[0]->id_obra); ?>">
                                            <input type="hidden" name="fechahoy" id="fechahoy">
                                            <button type="submit" class="mt-3 btn btn-primary botoncoment text-white">Enviar Resolución</button>
                                        </form>
                                    <?php else: ?>
                                        <?php if(Session::get('rol') == "1" && $solicitudes->estado != "finalizado"): ?>
                                            <h5 class="text-dark text-center pt-2 mt-lg-2">Asignar técnico</h5>
                                            <form action="<?php echo e(route('asignartecnico.update')); ?>" method="post" class="d-flex align-items-center flex-column">
                                                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                                <select name="tecnico" class="form-select pt-1 mt-2 card-footer col-9 col-md-7 rounded text-center" style="text-align-last: center">
                                                    <?php $__currentLoopData = $listatecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tecnicos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($tecnicos->id_usu); ?>"><?php echo e($tecnicos->nombre); ?> <?php echo e($tecnicos->apellido); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <input type="hidden" name="idsoli" value="<?php echo e($listasolicitudes[0]->id_obra); ?>">
                                                <button class="btn btn-primary botoncoment text-white col-9 mt-2 col-md-7">Asignar técnico</button>
                                            </form>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mt-2 bg-primary border border-primary p-0" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                        <div class="card-footer datosusu container card shadow p-0">
                            <h5 class="text-dark text-center pt-2">Mapa</h5>
                            <input type="hidden" id="lat" value="<?php echo e($solicitudes->lat); ?>">
                            <input type="hidden" id="lng" value="<?php echo e($solicitudes->lng); ?>">
                            <input type="hidden" id="direccion" value="<?php echo e($solicitudes->calle); ?>">
                            <div id="map">
                            </div>
                        </div>
                    </div>
                    <?php if($solicitudes->estado == "aceptado" && Session::get('rol') == "2" && $solicitudes->estado != "finalizado"): ?>
                        <form action="<?php echo e(route('finalizarobra')); ?>" method="post" class="mt-4 p-0">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <div class="bg-primary col-12 p-0">
                                <input type="hidden" name="idsoli" value="<?php echo e($solicitudes->id_obra); ?>">
                                <input type="hidden" name="fechafin" id="fechafin">
                                <input type="hidden" name="email" value="<?php echo e($listausuarios[0]->email); ?>">
                                <button type="submit" class="card-footer datosusu finalizarobra px-5 py-2 col-12 p-0 text-primary border border-primary">Finalizar Obra</button>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
                <?php if(count($listacomentarios) > 0): ?>
                    <div class="container mb-5 mt-2">
                        <div class="row">
                            <h5 class="text-dark text-start comentario">Comentarios</h5>
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
                            <div class="container" style="margin-bottom: 80px">
                                <?php endif; ?>
                                <div class="row">
                                    <h5 class="text-dark text-start comentario">Añadir Comentario</h5>
                                    <div class="mt-2 col-12" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                                        <div class="datos bg-primary"
                                             style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                                            <div class="card-footer datosusu container card shadow">
                                                <form method="POST" action="<?php echo e(route('solicitud.insert')); ?>" enctype="multipart/form-data">
                                                    <?php echo csrf_field(); ?>
                                                    <div class="form-floating">
                                                        <textarea class="form-control p-2 card-footer anacomenta"
                                                                  name="comentario" id="comentario" required
                                                                  maxlength="250"></textarea>
                                                    </div>
                                                    <label for="archivos" class="mt-3"><a class="px-5 py-2 border border-primary botonfile text-primary rounded" style="cursor: pointer !important;"><i class="fas fa-file-archive"></i> Adjuntar Archivos</a></label>
                                                    <input type="file" name="archivos" id="archivos" class="d-none" accept=".jpg,.jpeg,.png,.zip,.7z,.rar">
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
                                <div class="mb-5"></div>
                            </div>
                        <?php endif; ?>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/mapasolicitud.js"></script>
    <script src="/js/solicitudes.js"></script>
    <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('principal.layouts.estructuraPagina', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/solicitud.blade.php ENDPATH**/ ?>