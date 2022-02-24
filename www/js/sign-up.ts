import {SignUpState} from "./state/sign-up-state";
import {SignUpLogic} from "./logic/sign-up-logic";

let authButton = document.getElementById("auth-button") as HTMLButtonElement;
let apiErrorText = document.getElementById("api-error") as HTMLButtonElement;
let mailText  = document.getElementById("mail") as HTMLInputElement
let nameText  = document.getElementById("name") as HTMLInputElement
let passwordText = document.getElementById("password") as HTMLInputElement;
let mailValidateMessage = document.getElementById("mail-validate-message") as HTMLElement;
let nameValidateMessage = document.getElementById("name-validate-message") as HTMLElement;
let passwordValidateMessage = document.getElementById("password-validate-message") as HTMLElement;
let rememberMe = document.getElementById("remember-me") as HTMLInputElement;

let signUpState = new SignUpState();
let signInLogic = new SignUpLogic(signUpState);

signUpState.StateChanged = () =>
{
    apiErrorText.innerText = signUpState.ErrorAPIMessage;
    passwordValidateMessage.innerText = signUpState.ErrorPasswordMessage;
    nameValidateMessage.innerText = signUpState.ErrorNameMessage;
    mailValidateMessage.innerText = signUpState.ErrorMailMessage;
};

authButton.addEventListener("click", ()=>
{
    signInLogic.stateChange(mailText.value ?? "",passwordText.value ?? "",nameText.value ?? "");
    if(signUpState.DisableSubmitButton)
    {
        return;
    }

    try
    {
        signInLogic.signUp(mailText.value,passwordText.value,nameText.value,rememberMe.checked);
    }
    catch (e)
    {
        console.log(e);
    }
})