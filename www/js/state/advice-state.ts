export class AdviceState
{
    public ErrorTargetMessage:string;
    public ErrorBodyMessage:string;
    public ErrorTagMessage:string;
    public ErrorMessage:string;
    public ErrorAPIMessage:string;
    public DisableSubmitButton:boolean;
    public StateChanged: (() => void) | undefined;

    public constructor()
    {
        this.ErrorBodyMessage = "";
        this.ErrorTargetMessage = "";
        this.ErrorTagMessage = "";
        this.ErrorMessage = "";
        this.ErrorAPIMessage = "";
        this.DisableSubmitButton = false;
    }
}