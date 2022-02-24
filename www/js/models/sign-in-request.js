define(["require", "exports", "../helper/helper"], function (require, exports, helper_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SignInRequest = void 0;
    class SignInRequest {
        constructor(mail, password, rememberMe) {
            if (helper_1.Helper.isNullOrEmpty(mail) || helper_1.Helper.isNullOrEmpty(password)) {
                throw Error("Null or Emptyにすることは出来ません");
            }
            this.mail = mail;
            this.password = password;
            this.rememberMe = rememberMe;
        }
    }
    exports.SignInRequest = SignInRequest;
});
//# sourceMappingURL=sign-in-request.js.map