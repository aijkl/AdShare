export class Helper
{
    static isNullOrEmpty(value:string|null): boolean
    {
        return value == "" || value == null;
    }

    static convertToQueryString(value:string[],keyName:string): string
    {
        let queryString = "";
        for (let i = 0; i<value.length;i++)
        {
            queryString += `${i != 0 ? "&" : ""}${keyName}[${i}]=${value[i]}`;
        }
        return queryString;
    }
}