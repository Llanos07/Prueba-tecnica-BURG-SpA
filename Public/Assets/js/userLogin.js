
    const loginForm = document.getElementById('LogIn');
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let user = {};
        user.username = document.getElementById('username').value;
        user.password = document.getElementById('password').value;
        
        axios.post('http://localhost/BURG_SpA_API/Public/user/login', user)
            .then(function (response) {
                console.log(response.data);
                if (response.data.success) {
                    localStorage.setItem('token', response.data.token);
                    alert('Inicio de sesión exitoso');
                    
                    // Establecer la cabecera de autorización
                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');

                    window.location.href = 'http://localhost/BURG_SpA_API/Public/page/home';
                } else {
                    alert(response.data.message);
                }
            })
            .catch(function (error) {
                console.error(error);
                alert('Hubo un error al iniciar sesión. Por favor, inténtalo de nuevo.');
            });
    });
