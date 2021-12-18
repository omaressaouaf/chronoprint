require("../bootstrap");

window.Vue = require("vue").default;
import { createApp } from "vue";

/**
 * Vue and packages Config
 */
const attributeOptions = createApp({});

/**
 * Component global registration_
 */
attributeOptions.component(
    "options-form",
    require("./components/OptionsForm.vue").default
);

if (document.querySelector("#attribute-options")) {
    attributeOptions.mount("#attribute-options");
}
