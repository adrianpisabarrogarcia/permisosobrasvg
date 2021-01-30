<nav class="sb-sidenav accordion sb-sidenav-light rounded-top shadow" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link enlace" href="<?php echo e(route('portal.index')); ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-house-user text-primary"></i></div>
                Inicio
            </a>
        <?php switch(Session::get("rol")):
            case ("1"): ?>
            <?php echo $__env->make("principal.coordinador.menuCoordinador", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php break; ?>
            <?php case ("2"): ?>
            <?php echo $__env->make("principal.tecnico.menuTecnico", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php break; ?>
            <?php default: ?>
            <!--menu usuario normal-->
                <?php echo $__env->make("principal.usuarios.menuUsuarios", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endswitch; ?>
        </div>
    </div>
    <?php echo $__env->make("principal.layouts.footerMenu", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</nav>
<?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/layouts/menuDesplegable.blade.php ENDPATH**/ ?>