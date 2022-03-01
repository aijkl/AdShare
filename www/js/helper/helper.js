define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.Helper = void 0;
    class Helper {
        static isNullOrEmpty(value) {
            return value == "" || value == null;
        }
        static convertToQueryString(value, keyName) {
            let queryString = "";
            for (let i = 0; i < value.length; i++) {
                queryString += `${i != 0 ? "&" : ""}${keyName}[${i}]=${value[i]}`;
            }
            return queryString;
        }
    }
    exports.Helper = Helper;
});
//# sourceMappingURL=helper.js.map