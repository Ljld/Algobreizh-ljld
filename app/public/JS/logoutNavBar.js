const initLogoutNavBar = () => {
  let logOutBtnNavBar = document.getElementById('logOutBtnNavBar');

  logOutBtnNavBar.addEventListener('click', (e) => {
    setTimeout(function() {
      document.location.reload();
    }, 100);

  });
}
