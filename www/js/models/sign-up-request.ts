import {Helper} from "../helper/helper";

export class SignUpRequest
{
    public constructor(mail: string, password: string,name: string,rememberMe: boolean)
    {
        if(Helper.isNullOrEmpty(mail) || Helper.isNullOrEmpty(password))
        {
            throw Error("Null or Emptyにすることは出来ません");
        }
        this.mail = mail;
        this.password = password;
        this.rememberMe = rememberMe;
        this.name = name;
    }

    public mail:string;
    public password:string;
    public rememberMe:boolean;
    public name:string;
}