export class SignUpState
{
    public ErrorPasswordMessage:string;
    public ErrorMailMessage:string;
    public ErrorNameMessage:string;
    public DisableSubmitButton:boolean;
    public ErrorAPIMessage:string
    public StateChanged: (() => void) | undefined;

    constructor()
    {
        this.ErrorPasswordMessage = "";
        this.ErrorMailMessage = "";
        this.ErrorNameMessage = "";
        this.DisableSubmitButton = false;
        this.ErrorAPIMessage = "";
    }
}