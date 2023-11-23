const userForm = document.getElementById('createUserForm');
userForm.addEventListener('submit', (e)=> {
    e.preventDefault();
    userFormSubmit();
});

async function userFormSubmit() {
    validPassword = document.getElementById('validPassword').value;
    let user = {};
    user.username = document.getElementById('username').value;
    user.password = document.getElementById('password').value;
    user.validPassword = document.getElementById('validPassword').value;
    user.type = 1;
    let response = await fetch('http://localhost/BURG_SpA_API/Public/page/create', {
        method: 'POST',
        body: JSON.stringify(user),
    });
    let responseData = await response.json();
    console.log(responseData);
}