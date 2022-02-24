import {SignUpState} from "../state/sign-up-state";
import {ApiClient} from "../api-client";
import {SharedAuth} from "../shared/shared-auth";
import {SignUpRequest} from "../models/sign-up-request";

export class SignUpLogic
{
    private signUpState:SignUpState
    private apiClient:ApiClient;

    public constructor(signInState:SignUpState)
    {
        this.signUpState = signInState;
        this.apiClient = new ApiClient();
    }

    public signUp(mail:string,password:string,name:string,rememberMe:boolean)
    {
        this.apiClient.signUp(new SignUpRequest(mail, password,name,rememberMe)).then((x)=>
        {
            this.signUpState.ErrorAPIMessage = x.errorMessage;
            this.signUpState?.StateChanged?.();
        }).catch((error)=>
        {
            this.signUpState.ErrorAPIMessage = error.errorMessage;
            this.signUpState?.StateChanged?.();
        });
    }

    public stateChange(mail:string,password:string,name:string)
    {
        let disableSubmitButton = false;
        this.signUpState.ErrorPasswordMessage = "";
        this.signUpState.ErrorNameMessage = "";

        if (password.length < SharedAuth.passwordMin)
        {
            this.signUpState.ErrorPasswordMessage = SharedAuth.passWorldMinErrorMessage;
            disableSubmitButton = true;
        }
        if (password.length > SharedAuth.passwordMax)
        {
            this.signUpState.ErrorPasswordMessage = SharedAuth.passWorldMaxErrorMessage;
            disableSubmitButton = true;
        }
        if(name.length < SharedAuth.nameMin)
        {
            this.signUpState.ErrorNameMessage = SharedAuth.nameMinErrorMessage;
            disableSubmitButton = true;
        }
        if(name.length > SharedAuth.nameMax)
        {
            this.signUpState.ErrorNameMessage = SharedAuth.nameMaxErrorMessage;
            disableSubmitButton = true;
        }

        this.signUpState.ErrorMailMessage = !SharedAuth.mailRegex.test(mail) ? SharedAuth.mailValidateErrorMessage : "";
        this.signUpState.DisableSubmitButton = disableSubmitButton;
        this.signUpState?.StateChanged?.();
    }
}