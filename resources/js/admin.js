document.addEventListener('DOMContentLoaded', function() {
  const adminMenuButton = document.querySelector('.js-admin-menu-toggle');
  if(adminMenuButton){
    const adminMenu = document.querySelector('.js-admin-menu');
    if(adminMenu){
      adminMenuButton.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        adminMenu.classList.toggle('--show');
      });
    }
  }
}, false);
