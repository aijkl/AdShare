import {ApiClient} from "../api-client";
import {Helper} from "../helper/helper";
import {AdviceState} from "../state/advice-state";
import {CreateAdviceRequest} from "./create-advice-request";

export class CreateAdviceLogic
{
    private adviceState:AdviceState
    private apiClient:ApiClient;
    private readonly targetMax = 20;
    private readonly targetMin = 1;
    private readonly bodyMax = 300;
    private readonly bodyMin = 10;
    private readonly tagCountMax = 10;
    private readonly tagCountMin = 0;
    private readonly tagElementMax = 20;
    private readonly tagElementMin = 1;
    private readonly targetRequiredErrorMessage = "対象は必須項目です";
    private readonly bodyRequiredErrorMessage = "本文は必須項目です";
    private readonly targetMaxErrorMessage = `対象は${this.targetMax}以下にしてください`;
    private readonly targetMinErrorMessage = `対象は${this.targetMin}以上にしてください`;
    private readonly bodyMaxErrorMessage = `本文は${this.bodyMax}以下にしてください`;
    private readonly bodyMinErrorMessage = `本文は${this.bodyMin}以上にしてください`;
    private readonly tagCountMaxErrorMessage = `タグは${this.tagCountMax}個以下にしてください`;
    private readonly tagCountMinErrorMessage = `タグは${this.tagCountMax}個以上にしてください`;
    private readonly tagElementMaxErrorMessage = `タグは${this.tagElementMax}文字以下にしてください`;
    private readonly tagElementMinErrorMessage = `タグは${this.tagElementMin}文字以上にしてください`;

    public constructor(adviceState:AdviceState)
    {
        this.adviceState = adviceState;
        this.apiClient = new ApiClient();
    }

    public execute(targetElement:HTMLInputElement, bodyElement:HTMLInputElement, tagElement:HTMLInputElement)
    {
        this.apiClient.postAdvice(CreateAdviceLogic.convertToRequest(targetElement,bodyElement,tagElement)).then(x =>
        {
            if(x.success)
            {
                if(!Helper.isNullOrEmpty(x.data?.url ?? ""))
                {
                    window.location.href = x.data!.url ?? "";
                }
            }
            else
            {
                this.adviceState.ErrorAPIMessage = x.errorMessage;
                this.adviceState?.StateChanged?.();
            }
        }).catch((error)=>
        {
            this.adviceState.ErrorAPIMessage = error.errorMessage;
            this.adviceState?.StateChanged?.();
        });
    }

    public stateChange(targetElement:HTMLInputElement,bodyElement:HTMLInputElement,tagElement:HTMLInputElement)
    {
        let request = CreateAdviceLogic.convertToRequest(targetElement,bodyElement,tagElement);

        let disableSubmitButton = false;
        this.adviceState.ErrorTagMessage = "";
        this.adviceState.ErrorTargetMessage = "";
        this.adviceState.ErrorBodyMessage = "";
        this.adviceState.ErrorMessage = "";

        if(Helper.isNullOrEmpty(request.target))
        {
            this.adviceState.ErrorTargetMessage = this.targetRequiredErrorMessage;
            disableSubmitButton = true;
        }
        else if (request.target.length > this.targetMax)
        {
            this.adviceState.ErrorTargetMessage = this.targetMaxErrorMessage;
            disableSubmitButton = true;
        }
        else if(request.target.length < this.targetMin)
        {
            this.adviceState.ErrorTargetMessage = this.targetMinErrorMessage;
            disableSubmitButton = true;
        }

        if(Helper.isNullOrEmpty(request.body))
        {
            this.adviceState.ErrorBodyMessage = this.bodyRequiredErrorMessage;
            disableSubmitButton = true;
        }
        else if(request.body.length > this.bodyMax)
        {
            this.adviceState.ErrorBodyMessage = this.bodyMaxErrorMessage;
            disableSubmitButton = true;
        }
        else if(request.body.length < this.bodyMin)
        {
            this.adviceState.ErrorBodyMessage = this.bodyMinErrorMessage;
            disableSubmitButton = true;
        }

        if(request.tags.length != 0)
        {
            if(request.tags.length > this.tagCountMax)
            {
                this.adviceState.ErrorTagMessage = this.tagCountMaxErrorMessage;
                disableSubmitButton = true;
            }
            if(request.tags.length < this.tagCountMin)
            {
                this.adviceState.ErrorTagMessage = this.tagCountMinErrorMessage;
                disableSubmitButton = true;
            }
            request.tags.forEach(value =>
            {
                if(value.length > this.tagElementMax)
                {
                    this.adviceState.ErrorTagMessage = this.tagElementMaxErrorMessage;
                    disableSubmitButton = true;
                }
                if(value.length < this.tagElementMin)
                {
                    this.adviceState.ErrorTagMessage = this.tagElementMinErrorMessage;
                    disableSubmitButton = true;
                }
            });
        }

        this.adviceState.DisableSubmitButton = disableSubmitButton;
        this.adviceState?.StateChanged?.();
    }

    private static convertToRequest(targetElement:HTMLInputElement, bodyElement:HTMLInputElement, tagElement:HTMLInputElement): CreateAdviceRequest
    {
        let target = targetElement?.value;
        let body = bodyElement?.value;
        let tags = tagElement?.value?.split(/\s+/).filter(value => value.length > 0);
        return new CreateAdviceRequest(target,body,tags);
    }
}