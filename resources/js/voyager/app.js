require("../bootstrap");

window.Vue = require("vue").default;
import { createApp } from "vue";

if (document.querySelector("#product-attributes")) {
    const productAttributes = createApp({

    });

    productAttributes.component(
        "attributes-form",
        require("./components/AttributesForm.vue").default
    );
    productAttributes.component(
        "options-form",
        require("./components/OptionsForm.vue").default
    );

    productAttributes.mount("#product-attributes");
}

if (document.querySelector("#attribute-options")) {
    const attributeOptions = createApp({});

    attributeOptions.component(
        "options-form",
        require("./components/OptionsForm.vue").default
    );

    attributeOptions.mount("#attribute-options");
}

