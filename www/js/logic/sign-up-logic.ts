import {SignUpState} from "../state/sign-up-state";
import {ApiClient} from "../api-client";
import {SignInRequest} from "../sign-in-request";

export class SignInLogic
{
    private mailRegex = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/;
    private passwordMin = 6;
    private passwordMax = 120;
    private mailValidateErrorMessage = "メールアドレスの形式が正しくありません";
    private passWorldMinErrorMessage = `パスワードは${this.passwordMin}以上にしてください`;
    private passWorldMaxErrorMessage = `パスワードは${this.passwordMax}以下にしてください`;

    private signInState:SignUpState
    private apiClient:ApiClient;

    public constructor(signInState:SignUpState)
    {
        this.signInState = signInState;
        this.apiClient = new ApiClient();
    }

    public signUp(mail:string,password:string,rememberMe:boolean)
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
        if(password.length >= this.passwordMin && password.length <= this.passwordMax)
        {
            this.signInState.ErrorPasswordMessage = "";
        }
        if (password.length < this.passwordMin)
        {
            this.signInState.ErrorPasswordMessage = this.passWorldMinErrorMessage;
            disableSubmitButton = true;
        }
        if (password.length > this.passwordMax)
        {
            this.signInState.ErrorPasswordMessage = this.passWorldMaxErrorMessage;
            disableSubmitButton = true;
        }

        this.signInState.ErrorMailMessage = !this.mailRegex.test(mail) ? this.mailValidateErrorMessage : "";
        this.signInState.DisableSubmitButton = disableSubmitButton;
        this.signInState?.StateChanged?.();
    }
}