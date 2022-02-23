export class SignInState
{
    public ErrorPasswordMessage:string;
    public ErrorMailMessage:string;
    public DisableSubmitButton:boolean;
    public ErrorAPIMessage:string
    public StateChanged: (() => void) | undefined;

    constructor()
    {
        this.ErrorPasswordMessage = "";
        this.ErrorMailMessage = "";
        this.DisableSubmitButton = false;
        this.ErrorAPIMessage = "";
    }
}