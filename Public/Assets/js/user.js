async function userList() {
    let response = await fetch('http://localhost/BURG_SpA_API/Public/user/list');
    let responseData = await response.json();
    if (responseData.sucess) {
        const userTableBody = document.getElementById('userTable');
        responseData.result.forEach(item => {
            userTableBody.innerAdjacentHTML('beforebegin', `<tr>
            <td> ${item.id} </td>
            <td> ${item.username} </td>
            <td> ${item.type} </td>
            </tr>`);
        })
    }
}

userList();