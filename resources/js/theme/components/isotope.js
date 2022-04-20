/**
 * Filter & sort magical layouts
 * @requires https://isotope.metafizzy.co
 */

import Isotope from "isotope-layout";

/**
 * Easy selector helper function
 */
const select = (el, all = false) => {
    el = el.trim();
    if (all) {
        return [...document.querySelectorAll(el)];
    } else {
        return document.querySelector(el);
    }
};

/**
 * Easy event listener function
 */
const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all);
    if (selectEl) {
        if (all) {
            selectEl.forEach((e) => e.addEventListener(type, listener));
        } else {
            selectEl.addEventListener(type, listener);
        }
    }
};

const isotope = (() => {
    /**
     * Products isotope and filter
     */
    let productsSlidersContainer = document.querySelector(".products-sliders-container");
    if (productsSlidersContainer) {
        let productsIsotope = new Isotope(productsSlidersContainer, {
            itemSelector: ".products-slider",
            layoutMode: "fitRows",
            filter: ".category-0",
        });

        let productCategories = select("#product-categories li", true);

        on(
            "click",
            "#product-categories li",
            function (e) {
                e.preventDefault();

                productCategories.forEach(function (el) {
                    el.classList.remove("filter-active");
                });
                this.classList.add("filter-active");

                productsIsotope.arrange({
                    filter: this.getAttribute("data-filter"),
                });
            },
            true
        );
    }
})();

export default isotope;
