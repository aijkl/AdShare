import {SignInRequest} from "./sign-in-request";

export class ApiClient
{
    private baseUrl : string = "/api";
    constructor()
    {
    }
    async signIn(signInRequest:SignInRequest): Promise<AdShareResponse>
    {
        return  new Promise<AdShareResponse>((resolve, reject) =>
        {
            fetch(`${this.baseUrl}/auth/sign-in.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: JSON.stringify(signInRequest)
            }).then(value =>
            {
                value.json().then(json =>
                {
                    return resolve(json as AdShareResponse);
                });
            });
        });
    }
}