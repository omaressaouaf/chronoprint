/**
 * Tooltip
 * @requires https://getbootstrap.com
 * @requires https://popper.js.org/
*/
import Tooltip from 'bootstrap/js/dist/tooltip'

const tooltip = (() => {

  let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));

  let tooltipList = tooltipTriggerList.map((tooltipTriggerEl) => new Tooltip(tooltipTriggerEl, { trigger: 'hover' }));

})();

export default tooltip;
