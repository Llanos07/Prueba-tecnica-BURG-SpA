const logoutButton = document.getElementById('logout');

logoutButton.addEventListener('click', function(e) {
    e.preventDefault();

    // Obtiene el token de localStorage
    const token = localStorage.getItem('token');

    axios.post('http://localhost/BURG_SpA_API/Public/user/logout', { token: token })
        .then(function (response) {
            console.log(response.data);
            if (response.data.success) {
                alert('Cierre de sesión exitoso');
                localStorage.removeItem('token');
                window.location.href = 'http://localhost/BURG_SpA_API/Public/page/login';
            } else {
                alert(response.data.message);
            }
        })
        .catch(function (error) {
            console.error(error);
            alert('Hubo un error al cerrar la sesión. Por favor, inténtalo de nuevo.');
        });
});