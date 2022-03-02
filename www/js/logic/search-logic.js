define(["require", "exports", "../api-client", "../helper/helper"], function (require, exports, api_client_1, helper_1) {
    "use strict";
    Object.defineProperty(exports, "__esModule", { value: true });
    exports.SearchLogic = void 0;
    class SearchLogic {
        constructor(searchState) {
            this.targetMax = 20;
            this.bodyMax = 20;
            this.tagMax = 20;
            this.baseUrl = "/search/advice";
            this.targetMaxErrorMessage = `対象は${this.targetMax}以下にしてください`;
            this.bodyMaxErrorMessage = `${this.bodyMax}以下にしてください`;
            this.tagMaxErrorMessage = `タグは${this.tagMax}以下にしてください`;
            this.emptyErrorMessage = "検索条件を空白にすることはできません";
            this.searchState = searchState;
            this.apiClient = new api_client_1.ApiClient();
        }
        generateUrl(target, body, tag) {
            return `${this.baseUrl}?target=${target}&body=${body}&${helper_1.Helper.convertToQueryString(tag.replace("　", " ").split(" "), "tags")}`;
        }
        stateChange(target, body, tag) {
            let disableSubmitButton = false;
            this.searchState.ErrorTagMessage = "";
            this.searchState.ErrorTargetMessage = "";
            this.searchState.ErrorBodyMessage = "";
            this.searchState.ErrorMessage = "";
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
            if (!disableSubmitButton && helper_1.Helper.isNullOrEmpty(target) && helper_1.Helper.isNullOrEmpty(body) && helper_1.Helper.isNullOrEmpty(tag)) {
                this.searchState.ErrorMessage = this.emptyErrorMessage;
                disableSubmitButton = true;
            }
            this.searchState.DisableSubmitButton = disableSubmitButton;
            this.searchState?.StateChanged?.();
        }
    }
    exports.SearchLogic = SearchLogic;
});
//# sourceMappingURL=search-logic.js.map