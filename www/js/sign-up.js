define(["require", "exports", "./state/sign-up-state", "./logic/sign-up-logic"], function (require, exports, sign_up_state_1, sign_up_logic_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    let authButton = document.getElementById("auth-button");
    let apiErrorText = document.getElementById("api-error");
    let mailText = document.getElementById("mail");
    let nameText = document.getElementById("name");
    let passwordText = document.getElementById("password");
    let mailValidateMessage = document.getElementById("mail-validate-message");
    let nameValidateMessage = document.getElementById("name-validate-message");
    let passwordValidateMessage = document.getElementById("password-validate-message");
    let rememberMe = document.getElementById("remember-me");
    let signUpState = new sign_up_state_1.SignUpState();
    let signInLogic = new sign_up_logic_1.SignUpLogic(signUpState);
    signUpState.StateChanged = () => {
        apiErrorText.innerText = signUpState.ErrorAPIMessage;
        passwordValidateMessage.innerText = signUpState.ErrorPasswordMessage;
        nameValidateMessage.innerText = signUpState.ErrorNameMessage;
        mailValidateMessage.innerText = signUpState.ErrorMailMessage;
    };
    authButton.addEventListener("click", () => {
        signInLogic.stateChange(mailText.value ?? "", passwordText.value ?? "", nameText.value ?? "");
        if (signUpState.DisableSubmitButton) {
            return;
        }
        try {
            signInLogic.signUp(mailText.value, passwordText.value, nameText.value, rememberMe.checked);
        }
        catch (e) {
            console.log(e);
        }
    });
});
//# sourceMappingURL=sign-up.js.map