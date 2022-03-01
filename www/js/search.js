define(["require", "exports", "./state/advice-state", "./logic/search-logic"], function (require, exports, advice_state_1, search_logic_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    let searchTarget = document.getElementById("search-target");
    let searchTag = document.getElementById("search-tag");
    let searchBody = document.getElementById("search-body");
    let searchButton = document.getElementById("search-button");
    let targetValidateMessage = document.getElementById("target-validate-message");
    let tagValidateMessage = document.getElementById("tag-validate-message");
    let bodyValidateMessage = document.getElementById("body-validate-message");
    let validateMessage = document.getElementById("validate-message");
    let searchState = new advice_state_1.AdviceState();
    let searchLogic = new search_logic_1.SearchLogic(searchState);
    searchState.StateChanged = () => {
        tagValidateMessage.innerText = searchState.ErrorTagMessage;
        targetValidateMessage.innerText = searchState.ErrorTargetMessage;
        bodyValidateMessage.innerText = searchState.ErrorBodyMessage;
        validateMessage.innerText = searchState.ErrorMessage;
    };
    searchButton.addEventListener("click", () => {
        searchButton.disabled = true;
        try {
            searchLogic.stateChange(searchTarget.value ?? "", searchBody.value ?? "", searchTag.value ?? "");
            if (searchState.DisableSubmitButton) {
                return;
            }
            try {
                window.location.href = searchLogic.generateUrl(searchTarget.value ?? "", searchBody.value ?? "", searchTag.value ?? "");
            }
            catch (e) {
                // todo ユーザーに通知する
                console.log(e);
            }
        }
        finally {
            searchButton.disabled = false;
        }
    });
});
//# sourceMappingURL=search.js.map