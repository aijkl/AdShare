define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SharedAuth = void 0;
    class SharedAuth {
    }
    exports.SharedAuth = SharedAuth;
    SharedAuth.mailRegex = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
    SharedAuth.passwordMin = 6;
    SharedAuth.passwordMax = 120;
    SharedAuth.nameMin = 4;
    SharedAuth.nameMax = 10;
    SharedAuth.nameMinErrorMessage = `名前は${SharedAuth.nameMin}以上にしてください`;
    SharedAuth.nameMaxErrorMessage = `名前は${SharedAuth.nameMax}以下にしてください`;
    SharedAuth.mailValidateErrorMessage = "メールアドレスの形式が正しくありません";
    SharedAuth.passWorldMinErrorMessage = `パスワードは${SharedAuth.passwordMin}以上にしてください`;
    SharedAuth.passWorldMaxErrorMessage = `パスワードは${SharedAuth.passwordMax}以下にしてください`;
});
//# sourceMappingURL=shared-auth.js.map