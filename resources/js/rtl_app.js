
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start();


// const leftNav = document.querySelector('.left-nav');
// const bodyContainer = document.querySelector('.body-container');
// const navState = document.querySelector('.nav-state');
// const listItems = document.querySelectorAll('.list-item');
// const navState_close = '<i class="fas fa-arrow-alt-to-right"></i>';
// const navState_open = '<i class="fas fa-arrow-alt-from-right"></i>';
// const mediaQuery = window.matchMedia("(min-width: 600px)");
// const btnFile = document.querySelector('.btn-file');
// const textFile = document.querySelector('.text-file');
// const file = document.querySelector('.file');


// btnFile?.addEventListener('click', _ => {
//     file.click();
// });
// file?.addEventListener('change', e => {
//     if (file.value) {
//         textFile.textContent = ((file.value).split('\\')).pop();
//     } else {
//         textFile.textContent = "No Image Chosen";
//     }
// });

// navState?.addEventListener('click', _ => toggleNavigation());

// listItems?.forEach(item => {

//     item.addEventListener('click', e => {
//         if (e.target.nextElementSibling?.classList.contains('list__extend--open')) {
//             openNavigation();
//             return;
//         }
//         if (e.target.nextElementSibling?.classList.contains("list__extend")) {
//             openNavigation();
//             e.target.parentElement.classList.toggle('list__item--open');
//             e.target.nextElementSibling.classList.toggle('list__extend--open');
//         }

//     });
// });


// window.addEventListener('resize', _ => closeNavigation());

// function toggleNavigation() {
//     leftNav.classList.toggle('left-nav--open');
//     bodyContainer.classList.toggle('body__nav--open');
//     clearOpenedNavList();
//     switchNavStateIcon();
// }
// function closeNavigation() {
//     leftNav.classList.add('left-nav--open');
//     bodyContainer.classList.add('body__nav--open');
//     clearOpenedNavList();
//     switchNavStateIcon();
// }
// function openNavigation() {
//     leftNav.classList.remove('left-nav--open');
//     bodyContainer.classList.remove('body__nav--open');
//     clearOpenedNavList();
//     switchNavStateIcon();
// }
// function clearOpenedNavList() {
//     const list1 = document.querySelectorAll('.list__extend--open');
//     const list2 = document.querySelectorAll('.list__item--open');
//     [...list1, ...list2].forEach(item => {
//         item.classList.add('list__extend--open');
//         item.classList.add('list__item--open');
//     });
// }

// function switchNavStateIcon() {
//     if (leftNav.classList.contains('left-nav--open'))
//         navState.innerHTML = navState_close;
//     else
//         navState.innerHTML = navState_open;
// }

const leftNav = document.querySelector('.left-nav');
const bodyContainer = document.querySelector('.body-container');
const navState = document.querySelector('.nav-state');
const listItems = document.querySelectorAll('.list-item');
const navState_close = '<i class="fas fa-arrow-alt-to-right"></i>';
const navState_open = '<i class="fas fa-arrow-alt-from-right"></i>';
const mediaQuery = window.matchMedia("(min-width: 600px)");
const btnFile = document.querySelector('.btn-file');
const textFile = document.querySelector('.text-file');
const file = document.querySelector('.file');


btnFile?.addEventListener('click', _ => {
    file.click();
});
file?.addEventListener('change', e => {
    if (file.value) {
        textFile.textContent = ((file.value).split('\\')).pop();
    } else {
        textFile.textContent = "No Image Chosen";
    }
});

navState?.addEventListener('click', _ => toggleNavigation());

listItems?.forEach(item => {

    item.addEventListener('click', e => {
        if (e.target.nextElementSibling?.classList.contains('list__extend--open')) {
            openNavigation();
            return;
        }
        if (e.target.nextElementSibling?.classList.contains("list__extend")) {
            openNavigation();
            e.target.parentElement.classList.toggle('list__item--open');
            e.target.nextElementSibling.classList.toggle('list__extend--open');
        }

    });
});


window.addEventListener('resize', _ => closeNavigation());

function toggleNavigation() {
    leftNav.classList.toggle('left-nav--open');
    bodyContainer.classList.toggle('body__nav--open');
    clearOpenedNavList();
    switchNavStateIcon();
}
function closeNavigation() {
    leftNav.classList.remove('left-nav--open');
    bodyContainer.classList.remove('body__nav--open');
    clearOpenedNavList();
    switchNavStateIcon();
}
function openNavigation() {
    leftNav.classList.add('left-nav--open');
    bodyContainer.classList.add('body__nav--open');
    clearOpenedNavList();
    switchNavStateIcon();
}
function clearOpenedNavList() {
    const list1 = document.querySelectorAll('.list__extend--open');
    const list2 = document.querySelectorAll('.list__item--open');
    [...list1, ...list2].forEach(item => {
        item.classList.remove('list__extend--open');
        item.classList.remove('list__item--open');
    });
}

function switchNavStateIcon() {
    if (leftNav.classList.contains('left-nav--open'))
        navState.innerHTML = navState_open;
    else
        navState.innerHTML = navState_close;
}
