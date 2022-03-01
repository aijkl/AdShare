import {SignUpState} from "../state/sign-up-state";
import {ApiClient} from "../api-client";
import {SharedAuth} from "../shared/shared-auth";
import {SignUpRequest} from "../models/sign-up-request";
import {Helper} from "../helper/helper";

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
            if(x.success)
            {
                if(!Helper.isNullOrEmpty(x.data?.url ?? ""))
                {
                    window.location.href = x.data!.url ?? "";
                }
            }
            else
            {
                this.signUpState.ErrorAPIMessage = x.errorMessage;
                this.signUpState?.StateChanged?.();
            }
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
        this.signUpState.ErrorMailMessage = "";

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
        if(!SharedAuth.mailRegex.test(mail))
        {
            this.signUpState.ErrorMailMessage = SharedAuth.mailValidateErrorMessage;
            disableSubmitButton = true;
        }
        this.signUpState.DisableSubmitButton = disableSubmitButton;
        this.signUpState?.StateChanged?.();
    }
}