// TOGGLE NAVIGATION

const body = document.querySelector("body")

const toggleMobileNav = (variant) => {
    const MobileNavContainer = document.querySelector(".mobile-nav__container");
    const blackOverlay = document.querySelector(".black-overlay");
    if(variant === "close") {
        MobileNavContainer.classList.remove("w-72");
        blackOverlay.classList.remove("block")
        body.style.overflowY = "";
    } else {
        MobileNavContainer.classList.add("w-72");
        blackOverlay.classList.add("block")
        body.style.overflowY = "hidden";
    } 
    toggleMobileCategory('close');
}

const toggleMobileCategory = (variant) => {
    const MobileCategory = document.querySelector(".mobile-category");
    MobileCategory.style.width = variant === "close" ? "" : "18rem";
}

const toggleNavSearch = (variant) => {
    const NavSearch = document.querySelector(".nav-search__container");
    NavSearch.style.height = variant=== "close" ?  '' : '100vh';
    body.style.overflowY = variant=== "close" ? "" : "hidden";
}

// MODAL
const toggleModal = (id, variant) => {
    const modals = document.querySelectorAll(".modal__container")
    modals.forEach((modal) => {
        const modalId = modal.getAttribute('id');
        if(variant === 'close'){
            modal.style.display = "";
            body.style.overflowY = '';
        } else if(modalId === id){
            toggleMobileNav('close');
            modal.style.display = "flex";
            body.style.overflowY = 'hidden';
        }
    })
}

// copy-tooltip
const copyInput = () => {
    var copyText = document.getElementById("copyInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
    var tooltip = document.getElementById("copyTooltip");
    tooltip.innerHTML = "Link Copied"
}

const outFunc = () => {
    var tooltip = document.getElementById("copyTooltip");
    tooltip.innerHTML = "Copy to clipboard";
}


const useThisScripts = () => {

    // LEFTNAV MENU
    const leftNavMenu = document.querySelectorAll(".left-nav__menu");
    const path = window.location.pathname.split("/").pop();

    const leftNavMenuActivator = (menus) => {
        menus.forEach((menu)=> {
            const getHref = (element) => element.getAttribute("href") && element.getAttribute("href").replace("./", "");   
            if (getHref(menu) === path) {
                menu.classList.add("left-nav__menu--active");
            }
        })
    }
    leftNavMenuActivator(leftNavMenu)

    // LEFTNAV2ACTIVATOR
    const leftNavMenuSmall = document.querySelectorAll(".left-nav__menu--small")
    leftNavMenuSmall.forEach(element => {
        if(element.classList.contains("left-nav__menu--active")){
            const panel = element.parentElement;
            panel.style.maxHeight = panel.scrollHeight + "px";
            const acc = panel.previousElementSibling;
            acc.classList.add("left-nav__accordion--active");
            const chevron = acc.children[1];
            chevron.classList.add("left-nav__accordion--active__chevron");
        }
    });   

    //ACCORDION
    const leftNavAccordions = document.querySelectorAll(".left-nav__accordion")    
    leftNavAccordions.forEach((accordion) => {
        const chevron = accordion.children[1];
        const panel = accordion.nextElementSibling;  
        accordion.addEventListener("click", () => {
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                chevron.classList.toggle('left-nav__accordion--active__chevron');
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                chevron.classList.toggle("left-nav__accordion--active__chevron");
            } 
        });
    })

    // TABS
    const NavTabs = document.querySelectorAll(".nav__tab") 
    const tabsContent = document.querySelectorAll(".tab__content") 
    
    const activateTabs = (tabs, navClass, contentClass) => {
        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                tabs.forEach(tab2 => {
                    tab2.classList.remove(navClass);
                });
                tab.classList.add(navClass);
                const contentToShow = tab.getAttribute("contentId")
                getTabsContent(contentToShow, contentClass)
            })
        });
    }

    const getTabsContent = (contentId, activeClass) => {
        tabsContent.forEach(tabContent => {
            tabContent.classList.remove(activeClass)
            const tabContentId = tabContent.getAttribute("id")
            tabContentId === contentId && tabContent.classList.add(activeClass)
        })
    }
    activateTabs(NavTabs, "nav__tab--active", "tab__content--active")

    // LOADING
    const loading = document.getElementById('loading');
    loading.style.height = 0;
    body.style.overflowY = "auto";

    // PRODUCT productCAROUSEL
    const productCarousels = document.querySelectorAll('.product-carousel')
    for (let i = 0; i < productCarousels.length; i++) {
        $(document).ready(function(){
            const productCarousel = productCarousels[i];
            const productCarouselPrev = productCarousel.parentElement.querySelector('.prev')
            const productCarouselNext = productCarousel.parentElement.querySelector('.next');
            $(productCarousel).slick({
                infinite: false,
                slidesToShow: 6,
                slidesToScroll: 1,
                prevArrow: $(productCarouselPrev),
                nextArrow: $(productCarouselNext),
                responsive: [
                    {
                      breakpoint: 1440,
                      settings: {
                        slidesToShow: 6,
                        dots:false,
                      }
                    },
                    {
                      breakpoint: 1024,
                      settings: {
                        slidesToShow: 4,
                        dots:false,
                      }
                    },
                    {
                      breakpoint: 768,
                      settings: {
                        slidesToShow: 3,
                        dots: true,
                      }
                    },
                    {
                      breakpoint: 640,
                      settings: {
                        slidesToShow: 2,
                        dots: true,
                      }
                    },

                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                  ]
            });
        });
    }
}


