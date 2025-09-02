

const btn = document.getElementById('menu-btn');
const menu = document.getElementById('mobile-menu');

btn.addEventListener('click', () => {
    menu.classList.toggle('d-none');  // toggle show/hide
});


// Gallery 
function filterProjects(category) {
    const items = document.querySelectorAll('.gallery');

    items.forEach(item => {
        const itemCategory = item.getAttribute('data-category');

        if (category === 'all' || itemCategory === category) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
}
// Add fade-in animation via CSS
// Place this in your CSS file:
// .fade-in {
//   animation: fadeIn 0.5s;
// }
// @keyframes fadeIn {
//   from { opacity: 0; }
//   to { opacity: 1; }
// }

// owl-carousel
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
});
// $('.owl-carousel').owlCarousel({
//   items: 1,
//   loop: true,
//   margin: 10,
//   nav: true,
//   dots: true,
//   autoplay: true,
//   autoplayTimeout: 4000
// });