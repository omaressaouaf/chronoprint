require("../bootstrap");

window.Vue = require("vue").default;
import { createApp } from "vue";

if (document.querySelector("#product-attributes")) {
    const productAttributes = createApp({});

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

if (document.querySelector("#product-allowed-quantities")) {
    const productAllowedQuantities = createApp({});

    productAllowedQuantities.component(
        "quantities-form",
        require("./components/QuantitiesForm.vue").default
    );

    productAllowedQuantities.mount("#product-allowed-quantities");
}

if (document.querySelector("#attribute-options")) {
    const attributeOptions = createApp({});

    attributeOptions.component(
        "options-form",
        require("./components/OptionsForm.vue").default
    );

    attributeOptions.mount("#attribute-options");
}

if (document.querySelector("#notifications-dropdown")) {
    const notificationsDropdown = createApp({});

    notificationsDropdown.component(
        "notifications-list",
        require("./components/NotificationsList.vue").default
    );

    notificationsDropdown.mount("#notifications-dropdown");
}
