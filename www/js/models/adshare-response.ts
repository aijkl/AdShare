class AdShareResponse
{
    public success: boolean;
    public errorMessage: string;
    public data: any;

    constructor()
    {
        this.success = false;
        this.errorMessage = "";
        this.data = null;
    }
}