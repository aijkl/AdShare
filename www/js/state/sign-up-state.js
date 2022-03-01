define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SignUpState = void 0;
    class SignUpState {
        constructor() {
            this.ErrorPasswordMessage = "";
            this.ErrorMailMessage = "";
            this.ErrorNameMessage = "";
            this.DisableSubmitButton = false;
            this.ErrorAPIMessage = "";
        }
    }
    exports.SignUpState = SignUpState;
});
//# sourceMappingURL=sign-up-state.js.map