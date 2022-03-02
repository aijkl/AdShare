export class CreateAdviceRequest
{
    public target:string;
    public body:string;
    public tags:string[];

    public constructor(target:string, body:string, tags:string[])
    {
        this.target = target;
        this.body = body;
        this.tags = tags;
    }
}