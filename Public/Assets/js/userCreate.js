const userForm = document.getElementById('createUserForm');

userForm.addEventListener('submit', function(e) {
    e.preventDefault();

    let user = {};
    user.username = document.getElementById('username').value;
    user.password = document.getElementById('password').value;
    user.type = 1;

    // Envía una solicitud POST a la API
    axios.post('http://localhost/BURG_SpA_API/Public/user/create', user)
        .then(function (response) {
            console.log(response.data);
            if (response.data.success) {
                alert('Usuario creado exitosamente');
                setTimeout(function() {
                    window.location.href = 'http://localhost/BURG_SpA_API/Public/page/home';
                }, 2000); // Redirige después de 2 segundos
            } else {
                alert(response.data.message);
            }
        })
        .catch(function (error) {
            console.error(error);
            alert('Hubo un error al crear el usuario. Por favor, inténtalo de nuevo.');
        });
    });