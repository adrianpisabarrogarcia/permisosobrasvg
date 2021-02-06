<div class="sb-sidenav-menu-heading bg-primary text-light pt-3">General</div>

<!-- solucionar la ruta -->
<a class="nav-link enlace" href="<?php echo e(route('solicitarObra')); ?>">
    <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi mb-1 text-primary bi-journal-text" viewBox="0 0 16 16">
            <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
        </svg></div>
    Solicitud de Obra
</a>
<a class="nav-link enlace" href="<?php echo e(route('contacto')); ?>">
    <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill text-primary" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        </svg></div>
    Contacto
</a>
<div class="sb-sidenav-menu-heading bg-primary pt-3 text-white">Perfil</div>
<a class="nav-link enlace" href="#" onclick="
                    event.preventDefault();
                    document.getElementById('logout-form').submit();">
    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt text-primary"></i></div>
    <form id="logout-form" action="<?php echo e(route('portal.logout')); ?>" method="POST" style="display: none">
        <?php echo csrf_field(); ?>
    </form>
    Cerrar Sesión
</a>
<a class="nav-link enlace" href="<?php echo e(route('perfil')); ?>">
    <div class="sb-nav-link-icon"><i class="fas fa-user-circle text-primary"></i></div>
    Perfil
</a>
<?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/usuarios/menuUsuarios.blade.php ENDPATH**/ ?>