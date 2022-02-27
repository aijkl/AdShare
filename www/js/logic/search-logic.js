define(["require", "exports", "../api-client"], function (require, exports, api_client_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SearchLogic = void 0;
    class SearchLogic {
        constructor(searchState) {
            this.targetMax = 20;
            this.bodyMax = 20;
            this.tagMax = 20;
            this.baseUrl = "/search";
            this.targetMaxErrorMessage = `対象は${this.targetMax}以下にしてください`;
            this.bodyMaxErrorMessage = `${this.bodyMax}以下にしてください`;
            this.tagMaxErrorMessage = `タグは${this.tagMax}以下にしてください`;
            this.searchState = searchState;
            this.apiClient = new api_client_1.ApiClient();
        }
        generateUrl(target, body, tag) {
            return `${this.baseUrl}?target=${target}&body=${body}&tag=${tag}`;
        }
        stateChange(target, body, tag) {
            let disableSubmitButton = false;
            this.searchState.ErrorTagMessage = "";
            this.searchState.ErrorTargetMessage = "";
            this.searchState.ErrorBodyMessage = "";
            if (target.length > this.targetMax) {
                this.searchState.ErrorTargetMessage = this.targetMaxErrorMessage;
                disableSubmitButton = true;
            }
            if (body.length > this.bodyMax) {
                this.searchState.ErrorBodyMessage = this.bodyMaxErrorMessage;
                disableSubmitButton = true;
            }
            if (tag.length > this.tagMax) {
                this.searchState.ErrorTagMessage = this.tagMaxErrorMessage;
                disableSubmitButton = true;
            }
            this.searchState.DisableSubmitButton = disableSubmitButton;
            this.searchState?.StateChanged?.();
            return;
        }
    }
    exports.SearchLogic = SearchLogic;
});
//# sourceMappingURL=search-logic.js.map