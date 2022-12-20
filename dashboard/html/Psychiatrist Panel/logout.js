let token = sessionStorage.getItem('docToken');

fetch("http://127.0.0.1:8000/api/doc/logout", {
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
            window.location.href = "../User Panel/index.html";
        }
    })