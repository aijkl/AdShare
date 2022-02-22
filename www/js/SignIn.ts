import {APIClient} from './APIClient'

let signInButton = document.getElementById("sign-in-button");
let mailText  = document.getElementById("mail");
let password = document.getElementById("password");
let apiClient = new APIClient();

signInButton.addEventListener("click", function ()
{
    apiClient.SignIn("d-itoh@mksc.jp","もちしんさん大好き");
})