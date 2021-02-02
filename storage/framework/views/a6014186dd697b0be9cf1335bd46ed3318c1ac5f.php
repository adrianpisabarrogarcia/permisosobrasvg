<?php $__env->startSection('titulo','Ayuntamiento de Vitoria | Restablecer Contraseña'); ?>

<?php $__env->startSection('contenidologin'); ?>
    <div class="d-flex d-md-none pb-4 w-100 d-flex justify-content-center">
        <img src="/img/login/logo.png" class="img-fluid" width="55%" height="50%">
    </div>
    <div class="align-self-center login">
        <h2 class="fw-bold mb-5 mt-md-5">Reestablecer Contraseña</h2>
        <form class="mb-3" method="POST" action="<?php echo e(route('restablecer.auth')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(isset($error)): ?>
                <div class="mb-3">
                    <label for="correo" class="form-label text-primary fw-bold">Correo Electrónico</label>
                    <input type="email" class="form-control border-0 p-0" id="correo" name="correo" required>
                </div>
                <div class="alert alert-danger text-center " role="alert">
                    <?php echo e($error); ?>

                </div>
            <?php else: ?>
                <div class="mb-4">
                    <label for="correo" class="form-label text-primary fw-bold">Correo Electrónico</label>
                    <input type="email" class="form-control border-0 p-0" id="correo" name="correo" required>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary w-100">Obtener una nueva contraseña</button>
        </form>
    </div>
    <div class="text-center px-lg-5 pb-lg-2 p-2 w-100">
        <p class="d-inline-block mb-0">¿Ya tienes una cuenta?</p>
        <a href="<?php echo e(route('login.home')); ?>" class="text-primary fw-bold text-decoration-none">Inicia Sesión</a>
        <br />
        <p class="d-inline-block mb-0">¿Todavía no tienes una cuenta?</p>
        <a href="<?php echo e(route('registro.index')); ?>" class="text-primary fw-bold text-decoration-none">Regístrate</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('login.layouts.layoutlogincarrousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/login/restablecercontra.blade.php ENDPATH**/ ?>