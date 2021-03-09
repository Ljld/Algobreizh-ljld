const initLogout = () => {
  let logOutBtn = document.getElementById('logOutBtn');

  logOutBtn.addEventListener('click', (e) => {
    setTimeout(function() {
      document.location.reload();
    }, 100);

  });
}
