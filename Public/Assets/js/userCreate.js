const userForm = document.getElementById('createUserForm');

let user = {};
    user.username = document.getElementById('username').value;
    user.password = document.getElementById('password').value;
    user.type = 1;


const userCreate = async () => {
    try {
        const url = 'http://localhost/BURG_SpA_API/Public/user/create';
        const body = {
            username: user.username,
            password: user.password,
            type: user.type
        }

        const response = await axios.post(url, body);
        console.log(response);
        
    } catch (error) {
        console.error(error);
    }
};

/*
axios({
    method: 'post',
    url: 'http://localhost/BURG_SpA_API/Public/user/create',
    data: {
      firstName: 'Fred',
      lastName: 'Flintstone'
    }
  });

async function userFormSubmit() {
    validPassword = document.getElementById('validPassword').value;
    let user = {};
    user.username = document.getElementById('username').value;
    user.password = document.getElementById('password').value;
    user.validPassword = document.getElementById('validPassword').value;
    user.type = 1;
    let response = await fetch('http://localhost:3306/BURG_SpA_API/Public/page/create', {
        method: 'POST',
        body: JSON.stringify(user),
    });
    let responseData = await response.json();
    console.log(responseData);
}
*/