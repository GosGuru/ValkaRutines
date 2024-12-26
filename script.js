document.addEventListener('click', function (event) {
    const menu = document.getElementById('menu');
    const menuIcon = document.querySelector('.nav__menu');
    const menuSecondIcon = document.querySelector('.nav__menu--second');

    if (!menu.contains(event.target) && event.target !== menuIcon && event.target !== menuSecondIcon) {
        menu.classList.remove('active');
        window.location.hash = '';
    }
});


document.addEventListener('DOMContentLoaded', function () {
    let alerta = document.getElementById('mensaje');


    // Cerrar el mensaje de alerta al hacer clic en otra parte de la pantalla
    document.addEventListener('click', function (event) {
        if (event.target !== alerta) {
            alerta.style.display = 'none';
        }
    });
});
