define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SignInState = void 0;
    class SignInState {
        constructor() {
            this.ErrorPasswordMessage = "";
            this.ErrorMailMessage = "";
            this.DisableSubmitButton = false;
            this.ErrorAPIMessage = "";
        }
    }
    exports.SignInState = SignInState;
});
//# sourceMappingURL=sign-in-state.js.map