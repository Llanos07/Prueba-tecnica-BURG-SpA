const loginForm = document.getElementById('LogIn');

loginForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let user = {};
    user.username = document.getElementById('username').value;
    user.password = document.getElementById('password').value;

    // Envía una solicitud POST a la API
    axios.post('http://localhost/BURG_SpA_API/Public/user/login', user)
        .then(function (response) {
            console.log(response.data);
            if (response.data.success) {
                alert('Inicio de sesión exitoso');
                // Guarda el token en localStorage
                localStorage.setItem('token', response.data.token);
                window.location.href = 'http://localhost/BURG_SpA_API/Public/page/login';
            } else {
                alert(response.data.message);
            }
        })
        .catch(function (error) {
            console.error(error);
            alert('Hubo un error al iniciar sesión. Por favor, inténtalo de nuevo.');
        });
});