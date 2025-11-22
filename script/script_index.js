window.history.replaceState(null, null, ' ');

const navMenu = document.querySelector('#nav-menu');
const hiddenNavMenu = document.querySelector('#hidden-nav-menu');

let observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        !entry.isIntersecting ? hiddenNavMenu.removeAttribute('hidden') :
            hiddenNavMenu.setAttribute('hidden', 'true');
    })
}, {
    threshold: 1
})

observer.observe(navMenu);