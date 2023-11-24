document.addEventListener('DOMContentLoaded', (event) => {
    const logoutButton = document.getElementById('logout');

    if (logoutButton) {
        logoutButton.addEventListener('click', function(e) {
            e.preventDefault();

            const token = localStorage.getItem('token');

            if (!token) {
                alert('No se encontró el token. Por favor, inicia sesion.');
                window.location.href = 'http://localhost/BURG_SpA_API/Public/page/login';
                return;
            }

            axios.post('http://localhost/BURG_SpA_API/Public/user/logout', { token: token } )
                
                .then(function (response) {
                    console.log(response);
                    if (response.data.success) {
                        alert('Sesion cerrada exitosamente');
                        localStorage.removeItem('token');
                        window.location.href = 'http://localhost/BURG_SpA_API/Public/page/login';
                    } else {
                        alert(response.data.message);
                    }
                })
                .catch(function (error) {
                    console.error(error);
                    alert('No se pudo cerrar la sesion. Por favor, inténtalo de nuevo.');
                });
        });
    }
});