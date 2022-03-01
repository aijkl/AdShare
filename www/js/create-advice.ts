import {AdviceState} from "./state/advice-state";
import {SearchLogic} from "./logic/search-logic";

let searchTarget = document.getElementById("search-target") as HTMLInputElement;
let searchTag = document.getElementById("search-tag") as HTMLInputElement;
let searchBody  = document.getElementById("search-body") as HTMLInputElement
let searchButton = document.getElementById("search-button") as HTMLButtonElement;

let targetValidateMessage = document.getElementById("target-validate-message") as HTMLElement;
let tagValidateMessage = document.getElementById("tag-validate-message") as HTMLElement;
let bodyValidateMessage = document.getElementById("body-validate-message") as HTMLElement;
let validateMessage = document.getElementById("validate-message") as HTMLElement;

let searchState = new AdviceState();
let searchLogic = new SearchLogic(searchState);
searchState.StateChanged = ()=>
{
    tagValidateMessage.innerText = searchState.ErrorTagMessage;
    targetValidateMessage.innerText = searchState.ErrorTargetMessage;
    bodyValidateMessage.innerText = searchState.ErrorBodyMessage;
    validateMessage.innerText = searchState.ErrorMessage;
};
searchButton.addEventListener("click",()=>
{
    searchButton.disabled = true;
    try
    {
        searchLogic.stateChange(searchTarget.value ?? "",searchBody.value ?? "",searchTag.value ?? "");

        if(searchState.DisableSubmitButton)
        {
            return;
        }

        try
        {
            window.location.href = searchLogic.generateUrl(searchTarget.value ?? "",searchBody.value ?? "",searchTag.value ?? "");
        }
        catch (e)
        {
            // todo ユーザーに通知する
            console.log(e);
        }
    }
    finally
    {
        searchButton.disabled = false;
    }
});
