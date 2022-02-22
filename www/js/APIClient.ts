export class APIClient
{
    constructor()
    {
    }

    SignIn(mail:string,password:string)
    {
        if(APIClient.IsNullOrEmpty(mail) || APIClient.IsNullOrEmpty(password))
        {
        }
    }
    private static IsNullOrEmpty(value:string): boolean
    {
        return value == "" || value == null;
    }
}