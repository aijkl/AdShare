import {SignInRequest} from "./models/sign-in-request";
import {SignUpRequest} from "./models/sign-up-request";
import {RedirectUrl} from "./models/redirect-url";

export class ApiClient
{
    private baseUrl : string = "/api";
    constructor()
    {
    }
    async signIn(signInRequest:SignInRequest): Promise<AdShareResponse<RedirectUrl>>
    {
        return  new Promise<AdShareResponse<RedirectUrl>>((resolve, reject) =>
        {
            fetch(`${this.baseUrl}/auth/sign-in`, {
                credentials: 'same-origin',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: JSON.stringify(signInRequest)
            }).then(value =>
            {
                value.json().then(json =>
                {
                    return resolve(json as AdShareResponse<RedirectUrl>);
                });
            });
        });
    }
    async signUp(signUpRequest:SignUpRequest): Promise<AdShareResponse<RedirectUrl>>
    {
        return  new Promise<AdShareResponse<RedirectUrl>>((resolve, reject) =>
        {
            fetch(`${this.baseUrl}/auth/sign-up`, {
                credentials: 'same-origin',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: JSON.stringify(signUpRequest)
            }).then(value =>
            {
                value.json().then(json =>
                {
                    return resolve(json as AdShareResponse<RedirectUrl>);
                });
            });
        });
    }
}