define(["require", "exports", "./state/search-state", "./logic/search-logic"], function (require, exports, search_state_1, search_logic_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    let searchTarget = document.getElementById("search-target");
    let searchTag = document.getElementById("search-tag");
    let searchBody = document.getElementById("search-body");
    let searchButton = document.getElementById("search-button");
    let targetValidateMessage = document.getElementById("target-validate-message");
    let tagValidateMessage = document.getElementById("tag-validate-message");
    let bodyValidateMessage = document.getElementById("body-validate-message");
    let searchState = new search_state_1.SearchState();
    let searchLogic = new search_logic_1.SearchLogic(searchState);
    searchState.StateChanged = () => {
        tagValidateMessage.innerText = searchState.ErrorTagMessage;
        targetValidateMessage.innerText = searchState.ErrorTargetMessage;
        bodyValidateMessage.innerText = searchState.ErrorBodyMessage;
    };
    searchButton.addEventListener("click", () => {
        console.log("click");
        searchLogic.stateChange(searchTarget.value ?? "", searchBody.value ?? "", searchTag.value ?? "");
        if (searchState.DisableSubmitButton) {
            return;
        }
        try {
            let temp = searchLogic.generateUrl(searchTarget.value ?? "", searchTarget.value ?? "", searchTag.value ?? "");
            console.log(temp);
            return;
        }
        catch (e) {
            console.log(e);
            // todo ユーザーに通知する
        }
    });
});
//# sourceMappingURL=search.js.map