define(["require", "exports", "../api-client", "../models/sign-in-request", "../shared/shared-auth", "../helper/helper"], function (require, exports, api_client_1, sign_in_request_1, shared_auth_1, helper_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SignInLogic = void 0;
    class SignInLogic {
        constructor(signInState) {
            this.signInState = signInState;
            this.apiClient = new api_client_1.ApiClient();
        }
        signIn(mail, password, rememberMe) {
            this.apiClient.signIn(new sign_in_request_1.SignInRequest(mail, password, rememberMe)).then((x) => {
                if (x.success) {
                    if (!helper_1.Helper.isNullOrEmpty(x.data?.url ?? "")) {
                        window.location.href = x.data.url ?? "";
                    }
                }
                else {
                    this.signInState.ErrorAPIMessage = x.errorMessage;
                    this.signInState?.StateChanged?.();
                }
            }).catch((error) => {
                this.signInState.ErrorAPIMessage = error.errorMessage;
                this.signInState?.StateChanged?.();
            });
        }
        stateChange(mail, password) {
            let disableSubmitButton = false;
            this.signInState.ErrorPasswordMessage = "";
            this.signInState.ErrorMailMessage = "";
            if (password.length < shared_auth_1.SharedAuth.passwordMin) {
                this.signInState.ErrorPasswordMessage = shared_auth_1.SharedAuth.passWorldMinErrorMessage;
                disableSubmitButton = true;
            }
            if (password.length > shared_auth_1.SharedAuth.passwordMax) {
                this.signInState.ErrorPasswordMessage = shared_auth_1.SharedAuth.passWorldMaxErrorMessage;
                disableSubmitButton = true;
            }
            if (!shared_auth_1.SharedAuth.mailRegex.test(mail)) {
                this.signInState.ErrorMailMessage = shared_auth_1.SharedAuth.mailValidateErrorMessage;
                disableSubmitButton = true;
            }
            this.signInState.DisableSubmitButton = disableSubmitButton;
            this.signInState?.StateChanged?.();
        }
    }
    exports.SignInLogic = SignInLogic;
});
//# sourceMappingURL=sign-in-logic.js.map