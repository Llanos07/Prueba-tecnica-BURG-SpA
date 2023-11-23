<div id="createUserForm" class="shadow mx-auto p-3 col-sm-8 row mb-3 rounded position-absolute top-50 start-50 translate-middle bg-primary bg-gradient">
        <form id="LogIn" action="#" method="post">
        <div class="row mb-3 mx-auto">
            <h1 class="col-sm-10 mx-auto text-light text-center">Crear Usuario</h1>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 mx-auto">
                <input type="text" id="username" class="form-control fs-1" placeholder="nombre de usuario">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10  mx-auto">
                <input type="password" id="password" class="form-control fs-1" placeholder="contraseña">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10  mx-auto">
                <input type="password" id="validPassword" class="form-control fs-1" placeholder="confirmar contraseña">
            </div>
        </div>
        <div class="row mb-3 col-6 mx-auto">
            <button onclick={userCreate} id="createUser" class="btn btn-info fs-2">Registrar</button>
        </div>
        </form>
    </div>
    <script src="<?= URL_PATH ?>/Assets/js/userCreate.js"></script>