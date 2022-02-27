import {SignInState} from "../state/sign-in-state";
import {ApiClient} from "../api-client";
import {SignInRequest} from "../models/sign-in-request";
import {SharedAuth} from "../shared/shared-auth";
import {RedirectUrl} from "../models/redirect-url";
import {Helper} from "../helper/helper";
import {SearchState} from "../state/search-state";

export class SearchLogic
{
    private searchState:SearchState
    private apiClient:ApiClient;
    private readonly targetMax = 20;
    private readonly bodyMax = 20;
    private readonly tagMax = 20;
    private readonly baseUrl = "/search";
    private readonly targetMaxErrorMessage = `対象は${this.targetMax}以下にしてください`;
    private readonly bodyMaxErrorMessage = `${this.bodyMax}以下にしてください`;
    private readonly tagMaxErrorMessage = `タグは${this.tagMax}以下にしてください`;
    private readonly emptyErrorMessage = "検索条件を空白にすることはできません";

    public constructor(searchState:SearchState)
    {
        this.searchState = searchState;
        this.apiClient = new ApiClient();
    }

    public generateUrl(target:string,body:string,tag:string):string
    {
        return `${this.baseUrl}?target=${target}&body=${body}&tag=${tag}`;
    }

    public stateChange(target:string,body:string,tag:string)
    {
        let disableSubmitButton = false;
        this.searchState.ErrorTagMessage = "";
        this.searchState.ErrorTargetMessage = "";
        this.searchState.ErrorBodyMessage = "";
        this.searchState.ErrorMessage = "";

        if(target.length > this.targetMax)
        {
            this.searchState.ErrorTargetMessage = this.targetMaxErrorMessage;
            disableSubmitButton = true;
        }
        if(body.length > this.bodyMax)
        {
            this.searchState.ErrorBodyMessage = this.bodyMaxErrorMessage;
            disableSubmitButton = true;
        }
        if(tag.length > this.tagMax)
        {
            this.searchState.ErrorTagMessage = this.tagMaxErrorMessage;
            disableSubmitButton = true;
        }

        if(!disableSubmitButton && Helper.isNullOrEmpty(target) && Helper.isNullOrEmpty(body) && Helper.isNullOrEmpty(tag))
        {
            this.searchState.ErrorMessage = this.emptyErrorMessage;
            disableSubmitButton = true;
        }

        this.searchState.DisableSubmitButton = disableSubmitButton;
        this.searchState?.StateChanged?.();
    }
}