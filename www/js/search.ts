import {SearchState} from "./state/search-state";
import {SearchLogic} from "./logic/search-logic";

let searchTarget = document.getElementById("search-target") as HTMLInputElement;
let searchTag = document.getElementById("search-tag") as HTMLInputElement;
let searchBody  = document.getElementById("search-body") as HTMLInputElement
let searchButton = document.getElementById("search-button") as HTMLButtonElement;

let targetValidateMessage = document.getElementById("target-validate-message") as HTMLElement;
let tagValidateMessage = document.getElementById("tag-validate-message") as HTMLElement;
let bodyValidateMessage = document.getElementById("body-validate-message") as HTMLElement;

let searchState = new SearchState();
let searchLogic = new SearchLogic(searchState);
searchState.StateChanged = ()=>
{
    tagValidateMessage.innerText = searchState.ErrorTagMessage;
    targetValidateMessage.innerText = searchState.ErrorTargetMessage;
    bodyValidateMessage.innerText = searchState.ErrorBodyMessage;
};
searchButton.addEventListener("click",()=>
{
    console.log("click");
    searchLogic.stateChange(searchTarget.value ?? "",searchBody.value ?? "",searchTag.value ?? "");
    if(searchState.DisableSubmitButton)
    {
        return;
    }

    try
    {
        let temp = searchLogic.generateUrl(searchTarget.value ?? "",searchTarget.value ?? "",searchTag.value ?? "");
        console.log(temp);
        return;
    }
    catch (e)
    {
        console.log(e);
        // todo ユーザーに通知する
    }
});
