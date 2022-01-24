require("./bootstrap");
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

document.addEventListener("alpine:init", () => {
    require("./alpine");
});

require("./theme");
