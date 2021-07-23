
// DONT USE THIS SCRIPT

body.style.overflowY = "hidden";

const includeHTML = () => {
    let tagname = document.getElementsByTagName("*");
    for (let i = 0; i < tagname.length; i++) {
        const element = tagname[i];
        let file = element.getAttribute('include-html');
        if(file) {
            const elementInnerHTML = element.innerHTML;
            
            fetch(file)
                .then(x => x.text())
                .then(data => {
                    const parser = new DOMParser();
                    const bodyHTML = parser.parseFromString(data, 'text/html').body.firstElementChild; 
                    const elementContent = bodyHTML.getElementsByTagName("content")[0];              
                    if(elementContent) {
                        elementContent.innerHTML = elementInnerHTML ;
                    }
                    const productHeaderToPass = element.getAttribute("product");
                    let productHeader = bodyHTML.getElementsByClassName('product__header')[0];
                    if(productHeader) {
                        productHeader.innerHTML = productHeaderToPass;
                    }             
                    element.replaceWith(bodyHTML) ;
                    includeHTML();
                          

                })
        }     
    }  
    return document.body.innerHTML;
}