define(["require", "exports"], function (require, exports) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.ApiClient = void 0;
    class ApiClient {
        constructor() {
            this.baseUrl = "/api";
        }
        async signIn(signInRequest) {
            return new Promise((resolve, reject) => {
                fetch(`${this.baseUrl}/auth/sign-in.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: JSON.stringify(signInRequest)
                }).then(value => {
                    value.json().then(json => {
                        return resolve(json);
                    });
                });
            });
        }
        async signUp(signUpRequest) {
            return new Promise((resolve, reject) => {
                fetch(`${this.baseUrl}/auth/sign-up.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: JSON.stringify(signUpRequest)
                }).then(value => {
                    value.json().then(json => {
                        return resolve(json);
                    });
                });
            });
        }
    }
    exports.ApiClient = ApiClient;
});
//# sourceMappingURL=api-client.js.map