import {SignInState} from "../state/sign-in-state";
import {ApiClient} from "../api-client";
import {SignInRequest} from "../models/sign-in-request";
import {SharedAuth} from "../shared/shared-auth";
import {RedirectUrl} from "../models/redirect-url";
import {Helper} from "../helper/helper";

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
            if(x.success)
            {
                if(!Helper.isNullOrEmpty(x.data?.url ?? ""))
                {
                    window.location.href = x.data!.url ?? "";
                }
            }
            else
            {
                this.signInState.ErrorAPIMessage = x.errorMessage;
                this.signInState?.StateChanged?.();
            }
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
        this.signInState.ErrorMailMessage = "";
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
        if(!SharedAuth.mailRegex.test(mail))
        {
            this.signInState.ErrorMailMessage = SharedAuth.mailValidateErrorMessage;
            disableSubmitButton = true;
        }
        this.signInState.DisableSubmitButton = disableSubmitButton;
        this.signInState?.StateChanged?.();
    }
}