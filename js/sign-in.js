let signInButton = document.getElementById("sign-in-button");
signInButton.addEventListener("click", function () {
    // test code
    await fetch("auth/sign-in.php",{
        method: "POST",
        body: JSON.stringify({
            "mail": "hello@word.com",
            "password": "password",
            "headers":{
                'Content-Type': 'application/json;charset=utf-8'
            }
        })
    });
})