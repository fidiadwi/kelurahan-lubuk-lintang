const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const toggleBtn = document.querySelector('.toggle-btn');

toggleBtn.addEventListener('click', function () {

    sidebar.classList.toggle('closed');
    mainContent.classList.toggle('expand');

});