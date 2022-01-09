/**
 * Change tabs with radio buttons
*/

import Card from "card";

const creditCard = (() => {

  let selector = document.querySelector('.credit-card-form');

  // if (selector === null) return;

  let card = new Card({
    form: selector,
    container: '.credit-card-wrapper'
  });
})();

export default creditCard;
