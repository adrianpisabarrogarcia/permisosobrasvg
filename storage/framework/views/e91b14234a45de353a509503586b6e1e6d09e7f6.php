<?php $__env->startSection('titulo','Ayuntamiento de Vitoria | Restablecer Contraseña'); ?>

<?php $__env->startSection('contenidologin'); ?>
    <div class="d-flex d-md-none pb-4 w-100 d-flex justify-content-center">
        <img src="/img/login/logo.png" class="img-fluid" width="55%" height="50%">
    </div>
    <div class="align-self-center login">
        <h2 class="fw-bold mb-5 mt-md-5">Código de Verificación</h2>
        <form class="mb-3" method="POST" action="<?php echo e(route('codigo.auth')); ?>">
            <?php echo csrf_field(); ?>
            <?php if(isset($error)): ?>
                <div class="mb-3">
                    <label for="codigo" class="form-label text-primary fw-bold">Introduce el codigo de verificación</label>
                    <input type="text" class="form-control border-0 p-0" id="codigo" name="codigo" required pattern="^[0-9]{5}">
                </div>
                <div class="alert alert-danger text-center " role="alert">
                    <?php echo e($error); ?>

                </div>
            <?php else: ?>
                <div class="mb-4">
                    <label for="codigo" class="form-label text-primary fw-bold">Introduce el codigo de verificación</label>
                    <input type="text" class="form-control border-0 p-0" id="codigo" name="codigo" required pattern="^[0-9]{5}">
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary w-100">Verificar cuenta</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('login.layouts.layoutlogincarrousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/login/codigo.blade.php ENDPATH**/ ?>