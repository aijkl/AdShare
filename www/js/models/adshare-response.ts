class AdShareResponse<T>
{
    public success: boolean;
    public errorMessage: string;
    public data: T|null;

    constructor()
    {
        this.success = false;
        this.errorMessage = "";
        this.data = null;
    }
}