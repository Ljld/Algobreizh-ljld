//import Swup from 'swup';

// Fonction init pour reload le js lors du chargement de la page en ajax avec swup
function init() {
  if (document.querySelector('#sign-up-form')) {
      initForm();
  }
  if (document.querySelector('#logOutBtn')) {
    initLogout();
  }

  if (document.querySelector('#logOutBtnNavBar')) {
    initLogoutNavBar();
  }

  if (document.querySelector('#new-order-products-list')) {
    initCart();
  }

  if (document.querySelector('#cart-products')) {
    initCartPage();
  }
}

const options = {
  linkSelector: 'a',
  containers: ["#content"]
}

const swup = new Swup(options);

// run once
init();

// this event runs for every page view after initial load
swup.on('contentReplaced', init);
