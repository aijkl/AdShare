define(["require", "exports", "../helper/helper"], function (require, exports, helper_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SignUpRequest = void 0;
    class SignUpRequest {
        constructor(mail, password, name, rememberMe) {
            if (helper_1.Helper.isNullOrEmpty(mail) || helper_1.Helper.isNullOrEmpty(password)) {
                throw Error("Null or Emptyにすることは出来ません");
            }
            this.mail = mail;
            this.password = password;
            this.rememberMe = rememberMe;
            this.name = name;
        }
    }
    exports.SignUpRequest = SignUpRequest;
});
//# sourceMappingURL=sign-up-request.js.map