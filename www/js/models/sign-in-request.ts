import {Helper} from "../helper/helper";

export class SignInRequest
{
    public constructor(mail: string, password: string,rememberMe: boolean)
    {
        if(Helper.isNullOrEmpty(mail) || Helper.isNullOrEmpty(password))
        {
            throw Error("Null or Emptyにすることは出来ません");
        }
        this.mail = mail;
        this.password = password;
        this.rememberMe = rememberMe;
    }

    public mail:string;
    public password:string;
    public rememberMe:boolean;
}