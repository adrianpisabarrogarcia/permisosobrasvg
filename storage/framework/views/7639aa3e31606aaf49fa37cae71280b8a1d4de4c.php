<?php $__env->startSection("content"); ?>
    <div class="d-flex mt-5 justify-content-evenly align-items-start flex-wrap">
        <div class="card col-10 col-lg-4 p-0 border-0">
            <div class="datos bg-primary text-white" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                <h4 class="text-center font-weight-normal pt-2 pb-2 mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-cone-striped text-white" viewBox="0 0 16 16">
                        <path
                            d="M9.97 4.88l.953 3.811C10.158 8.878 9.14 9 8 9c-1.14 0-2.159-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.274 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098zm4.396 8.613a.5.5 0 0 1 .037.96l-6 2a.5.5 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l2.391-.598.565-2.257c.862.212 1.964.339 3.165.339s2.303-.127 3.165-.339l.565 2.257 2.391.598z"/>
                    </svg>
                    Añadir tipo de obra
                </h4>
                <div class="card-footer datosusu card shadow">
                    <h5 for="annadirobra" class="text-dark">Añadir obra:</h5>
                    <form action="<?php echo e(route("annadirObra")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="annadirobra" id="annadirobra" class="text-center card-footer border-0 rounded contacto p-1 col-11 col-md-12" required><br>
                        <button
                            class="btn btn-primary botoncoment text-white col-12 mt-1"
                            id="botonannadirobra">Añadir tipo de obra
                        </button>
                    </form>
                    <?php if($errorO != ''): ?>
                        <div class="alert mt-2 mb-2 alert-danger text-center" role="alert" id="errores">
                            <?php echo $errorO; ?>

                        </div>
                        <h5 class="text-dark">Lista de obras:</h5>
                    <?php else: ?>
                        <h5 class="text-dark mt-4">Lista de obras:</h5>
                    <?php endif; ?>
                    <ul class="list-group border-0 text-center">
                        <?php $__currentLoopData = $obras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item card-footer rounded col-11 col-md-12 text-dark"><?php echo e(ucfirst( $obra->tipo )); ?>

                                <a href="/annadirobraedificio/borrarobra/<?php echo e($obra->tipo); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                         class="bi bi-x"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card col-10 col-lg-4 p-0 border-0 mt-5 mt-lg-0">
            <div class="datos bg-primary text-white" style="border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px)">
                <h4 class="text-center font-weight-normal pt-2 pb-2 mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-building text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694L1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                        <path
                            d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                    </svg>
                    Añadir tipo de edificio
                </h4>
                <div class="card-footer datosusu card shadow">
                    <h5 for="annadiredificio" class="text-dark">Añadir edificio:</h5>
                    <form action="<?php echo e(route("annadirEdificio")); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="annadiredificio" id="annadiredificio" class="text-center card-footer border-0 rounded contacto p-1 col-11 col-md-12" required><br>
                        <button
                            class="btn btn-primary botoncoment text-white col-12 mt-1"
                            id="botonannadiredificio">Añadir tipo de edificio
                        </button>
                    </form>
                    <?php if($errorE != ''): ?>
                        <div class="alert mt-2 mb-2 alert-danger text-center" role="alert" id="errores">
                            <?php echo $errorE; ?>

                        </div>
                        <h5 class="text-dark">Lista de edificios:</h5>
                    <?php else: ?>
                        <h5 class="text-dark mt-4">Lista de edificios:</h5>
                    <?php endif; ?>

                    <ul class="list-group border-0 text-center">
                        <?php $__currentLoopData = $edificios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edificio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item card-footer rounded col-11 col-md-12 text-dark"><?php echo e(ucfirst($edificio->tipo)); ?>

                                <a href="/annadirobraedificio/borraredificio/<?php echo e($edificio->tipo); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                         class="bi bi-x"
                                         viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("principal.layouts.estructuraPagina", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/coordinador/annadirTObraTEdificio.blade.php ENDPATH**/ ?>