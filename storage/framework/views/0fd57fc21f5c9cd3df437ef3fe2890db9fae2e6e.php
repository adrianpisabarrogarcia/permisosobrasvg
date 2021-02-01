<?php $__env->startSection("archivosCSS"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.23.1/apexcharts.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.23.1/apexcharts.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="card w-75 mx-auto">
        <div class="card-header text-center text-white bg-primary"> <h4 class="font-weight-normal">Graficos</h4></div>
        <div class="card-body">
            <select id="selector">
                <option value="estado">Estado</option>
                <option value="temporada">Temporada</option>
                <option value="tipo">Tipo</option>
                <option value="trabajo">Carga de Trabajo</option>
            </select>
            <div id="graficos"></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("scripts"); ?>
    <script src="/js/Librerias/jquery-3.5.1.min.js"></script>
    <script src="/js/graficos.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("principal.layouts.estructuraPagina", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/coordinador/graficos.blade.php ENDPATH**/ ?>