define(["require", "exports", "../api-client", "../shared/shared-auth", "../models/sign-up-request", "../helper/helper"], function (require, exports, api_client_1, shared_auth_1, sign_up_request_1, helper_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SignUpLogic = void 0;
    class SignUpLogic {
        constructor(signInState) {
            this.signUpState = signInState;
            this.apiClient = new api_client_1.ApiClient();
        }
        signUp(mail, password, name, rememberMe) {
            this.apiClient.signUp(new sign_up_request_1.SignUpRequest(mail, password, name, rememberMe)).then((x) => {
                if (x.success) {
                    if (!helper_1.Helper.isNullOrEmpty(x.data?.url ?? "")) {
                        window.location.href = x.data.url ?? "";
                    }
                }
                else {
                    this.signUpState.ErrorAPIMessage = x.errorMessage;
                    this.signUpState?.StateChanged?.();
                }
            }).catch((error) => {
                this.signUpState.ErrorAPIMessage = error.errorMessage;
                this.signUpState?.StateChanged?.();
            });
        }
        stateChange(mail, password, name) {
            let disableSubmitButton = false;
            this.signUpState.ErrorPasswordMessage = "";
            this.signUpState.ErrorNameMessage = "";
            this.signUpState.ErrorMailMessage = "";
            if (password.length < shared_auth_1.SharedAuth.passwordMin) {
                this.signUpState.ErrorPasswordMessage = shared_auth_1.SharedAuth.passWorldMinErrorMessage;
                disableSubmitButton = true;
            }
            if (password.length > shared_auth_1.SharedAuth.passwordMax) {
                this.signUpState.ErrorPasswordMessage = shared_auth_1.SharedAuth.passWorldMaxErrorMessage;
                disableSubmitButton = true;
            }
            if (name.length < shared_auth_1.SharedAuth.nameMin) {
                this.signUpState.ErrorNameMessage = shared_auth_1.SharedAuth.nameMinErrorMessage;
                disableSubmitButton = true;
            }
            if (name.length > shared_auth_1.SharedAuth.nameMax) {
                this.signUpState.ErrorNameMessage = shared_auth_1.SharedAuth.nameMaxErrorMessage;
                disableSubmitButton = true;
            }
            if (!shared_auth_1.SharedAuth.mailRegex.test(mail)) {
                this.signUpState.ErrorMailMessage = shared_auth_1.SharedAuth.mailValidateErrorMessage;
                disableSubmitButton = true;
            }
            this.signUpState.DisableSubmitButton = disableSubmitButton;
            this.signUpState?.StateChanged?.();
        }
    }
    exports.SignUpLogic = SignUpLogic;
});
//# sourceMappingURL=sign-up-logic.js.map