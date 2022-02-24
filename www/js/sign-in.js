define(["require", "exports", "./state/sign-in-state", "./logic/sign-in-logic"], function (require, exports, sign_in_state_1, sign_in_logic_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    let signInButton = document.getElementById("auth-button");
    let apiErrorText = document.getElementById("api-error");
    let mailText = document.getElementById("mail");
    let passwordText = document.getElementById("password");
    let mailValidateMessage = document.getElementById("mail-validate-message");
    let passwordValidateMessage = document.getElementById("password-validate-message");
    let rememberMe = document.getElementById("remember-me");
    let signInState = new sign_in_state_1.SignInState();
    let signInLogic = new sign_in_logic_1.SignInLogic(signInState);
    signInState.StateChanged = () => {
        apiErrorText.innerText = signInState.ErrorAPIMessage;
        passwordValidateMessage.innerText = signInState.ErrorPasswordMessage;
        mailValidateMessage.innerText = signInState.ErrorMailMessage;
    };
    signInButton.addEventListener("click", () => {
        signInLogic.stateChange(mailText.value ?? "", passwordText.value ?? "");
        if (signInState.DisableSubmitButton) {
            return;
        }
        try {
            signInLogic.signIn(mailText.value, passwordText.value, rememberMe.checked);
        }
        catch (e) {
            console.log(e);
        }
    });
});
//# sourceMappingURL=sign-in.js.map