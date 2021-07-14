// TOGGLE NAVIGATION



const body = document.querySelector("body")
const toggleMobileNav = () => {
    const mobileNav = document.querySelector(".mobile-nav")
    const blackOverlay = document.querySelector(".black-overlay");
    mobileNav.style.width = mobileNav.style.width === "" ? "18rem" : "";
    blackOverlay.style.display = blackOverlay.style.display === "" ? "block" : "";
    body.style.overflowY = body.style.overflowY === '' ? 'hidden' : '';
}

const toggleMobileCategory = () => {
    const toggleMobileCategory = document.querySelector(".mobile-category")
    toggleMobileCategory.style.width = toggleMobileCategory.style.width === "" ? "100%" : "";
}

const useThisScripts = () => {

    const leftNavMenu = document.querySelectorAll(".left-nav__menu") 
    const location = document.location.pathname.replace("/public", ".");
    
    const leftNavMenuActivator = (menu) => {
        for (let i = 0; i < menu.length; i++) {
            if (menu[i].getAttribute("href") === location) {
                menu[i].classList.add("left-nav__menu--active")
            }
        }
    }

    leftNavMenuActivator(leftNavMenu)

    //ACCORDION
    const leftNavAccordion = document.querySelectorAll(".left-nav__accordion")

    for (let i = 0; i < leftNavAccordion.length; i++) {
        const element = leftNavAccordion[i];
        element.addEventListener("click", () => {
            const chevron = element.children[1];
            const panel = element.nextElementSibling;        
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                chevron.classList.toggle('left-nav__accordion--active__chevron')
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                chevron.classList.toggle("left-nav__accordion--active__chevron")
            } 
        });
        element.click()
    }

    // LEFTNAV2ACTIVATOR
    const leftNavMenuSmall = document.querySelectorAll(".left-nav__menu--small")
    leftNavMenuSmall.forEach(element => {
        if(element.classList.contains("left-nav__menu--active")){
            const panel = element.parentElement;
            panel.style.maxHeight = panel.scrollHeight + "px";
            const acc = panel.previousElementSibling;
            acc.classList.add("left-nav__accordion--active");
            const chevron = acc.children[1];
            chevron.classList.add("left-nav__accordion--active__chevron")
        }
    });   

    
}



// DONT USE THIS SCRIPT

const GeneralLayoutHtml = document.querySelector("#GeneralLayout").innerHTML;

document.addEventListener('DOMContentLoaded', function () {

    const includeHTML = () => {
        let z = document.getElementsByTagName("*");
        for (let i = 0; i < z.length; i++) {
            const element = z[i];
            let file = element.getAttribute('include-html');
            if(file) {
                let xhr = new XMLHttpRequest(); 
                xhr.onload = function () {
                    element.innerHTML = this.responseText;
                    element.removeAttribute('include-html')
                    includeHTML()
                    const content = document.getElementById("content")
                    if(content.innerHTML.length === 0) {
                        content.innerHTML += GeneralLayoutHtml 
                    }
                    useThisScripts();
                    toggleMobileCategory();
                };
                xhr.open('GET', file, true);
                xhr.send();
            }     
        }
    }

    includeHTML()

}, false);