export class Helper
{
    static isNullOrEmpty(value:string|null): boolean
    {
        return value == "" || value == null;
    }
}