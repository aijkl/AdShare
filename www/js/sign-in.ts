import {SignInState} from "./state/sign-in-state";
import {SignInLogic} from "./logic/sign-in-logic";

let signInButton = document.getElementById("auth-button") as HTMLButtonElement;
let apiErrorText = document.getElementById("api-error") as HTMLButtonElement;
let mailText  = document.getElementById("mail") as HTMLInputElement
let passwordText = document.getElementById("password") as HTMLInputElement;
let mailValidateMessage = document.getElementById("mail-validate-message") as HTMLElement;
let passwordValidateMessage = document.getElementById("password-validate-message") as HTMLElement;
let rememberMe = document.getElementById("remember-me") as HTMLInputElement;

let signInState = new SignInState();
let signInLogic = new SignInLogic(signInState);

signInState.StateChanged = () =>
{
    apiErrorText.innerText = signInState.ErrorAPIMessage;
    passwordValidateMessage.innerText = signInState.ErrorPasswordMessage;
    mailValidateMessage.innerText = signInState.ErrorMailMessage;
};

signInButton.addEventListener("click", ()=>
{
    signInLogic.stateChange(mailText.value ?? "",passwordText.value ?? "");
    if(signInState.DisableSubmitButton)
    {
        return;
    }

    try
    {
        signInLogic.signIn(mailText.value,passwordText.value,rememberMe.checked);
    }
    catch (e)
    {
        console.log(e);
    }
})