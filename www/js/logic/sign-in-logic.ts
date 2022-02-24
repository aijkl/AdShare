import {SignInState} from "../state/sign-in-state";
import {ApiClient} from "../api-client";
import {SignInRequest} from "../models/sign-in-request";
import {SharedAuth} from "../shared/shared-auth";

export class SignInLogic
{
    private signInState:SignInState
    private apiClient:ApiClient;

    public constructor(signInState:SignInState)
    {
        this.signInState = signInState;
        this.apiClient = new ApiClient();
    }

    public signIn(mail:string,password:string,rememberMe:boolean)
    {
        this.apiClient.signIn(new SignInRequest(mail, password,rememberMe)).then((x)=>
        {
            this.signInState.ErrorAPIMessage = x.errorMessage;
            this.signInState?.StateChanged?.();
        }).catch((error)=>
        {
            this.signInState.ErrorAPIMessage = error.errorMessage;
            this.signInState?.StateChanged?.();
        });
    }

    public stateChange(mail:string,password:string)
    {
        let disableSubmitButton = false;
        this.signInState.ErrorPasswordMessage = "";
        if (password.length < SharedAuth.passwordMin)
        {
            this.signInState.ErrorPasswordMessage = SharedAuth.passWorldMinErrorMessage;
            disableSubmitButton = true;
        }
        if (password.length > SharedAuth.passwordMax)
        {
            this.signInState.ErrorPasswordMessage = SharedAuth.passWorldMaxErrorMessage;
            disableSubmitButton = true;
        }

        this.signInState.ErrorMailMessage = !SharedAuth.mailRegex.test(mail) ? SharedAuth.mailValidateErrorMessage : "";
        this.signInState.DisableSubmitButton = disableSubmitButton;
        this.signInState?.StateChanged?.();
    }
}