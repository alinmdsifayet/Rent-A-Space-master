let token = sessionStorage.getItem('userToken');

fetch("http://127.0.0.1:8000/api/user/logout", {
        method: "POST",
        headers: {
            Accept: "application/json, text/plain, */*",
            "Content-type": "application/json",
            "Authorization": "Bearer " + token
        },
    }).then((res) => {
        res.json()
    })
    .then(data => {
        if (data.res == 1) {
            console.log('logged out');
            window.location.href = "./index.html";
        }
    })