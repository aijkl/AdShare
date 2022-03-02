import {AdviceState} from "./state/advice-state";
import {SearchLogic} from "./logic/search-logic";
import {CreateAdviceLogic} from "./models/create-advice";

let adviceTarget = document.getElementById("target") as HTMLInputElement;
let adviceTag = document.getElementById("tag") as HTMLInputElement;
let adviceBody  = document.getElementById("body") as HTMLInputElement
let submitButton = document.getElementById("advice-button") as HTMLButtonElement;

let targetValidateMessage = document.getElementById("target-validate-message") as HTMLElement;
let tagValidateMessage = document.getElementById("tag-validate-message") as HTMLElement;
let bodyValidateMessage = document.getElementById("body-validate-message") as HTMLElement;
let validateMessage = document.getElementById("validate-message") as HTMLElement;

let adviceState = new AdviceState();
let adviceLogic = new CreateAdviceLogic(adviceState);
adviceState.StateChanged = ()=>
{
    tagValidateMessage.innerText = adviceState.ErrorTagMessage;
    targetValidateMessage.innerText = adviceState.ErrorTargetMessage;
    bodyValidateMessage.innerText = adviceState.ErrorBodyMessage;
    validateMessage.innerText = adviceState.ErrorMessage;
};
submitButton.addEventListener("click",()=>
{
    submitButton.disabled = true;
    try
    {
        adviceLogic.stateChange(adviceTarget,adviceBody,adviceTag);

        if(adviceState.DisableSubmitButton)
        {
            return;
        }

        try
        {
             adviceLogic.execute(adviceTarget,adviceBody,adviceTag);
        }
        catch (e)
        {
            // todo ユーザーに通知する
            console.log(e);
        }
    }
    finally
    {
        submitButton.disabled = false;
    }
});
