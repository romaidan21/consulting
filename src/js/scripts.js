import all from "./modules/utilities";
import formSent from "./modules/form";
import openFaq from "./modules/faq";
import changePath from "./modules/change-path";
import onScroll from "./modules/onscroll";


document.addEventListener('DOMContentLoaded', e => {

    formSent();
    openFaq();
    changePath();
    onScroll();

    const anchor = $('a[href^="#"]');
    anchor.on( 'click', function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 500);
        return false;
    });

    const searchLink = document.querySelector('span.str');
    if (searchLink){
        searchLink.addEventListener('click', function () {
            let url = 'http://'+ window.location.hostname + '/#search';
            window.location.replace(url);
        })
    }


    // open/close lang
    let lang = document.querySelector('.lang-wrap');
    lang.addEventListener('click', e=>{
        lang.classList.toggle('active')
    });
    document.addEventListener('click', function(e) {
        if (!lang.contains(e.target)) lang.classList.remove('active');
    });


    //pagination
    let homePage = document.getElementById('welcome');
    const pagination = () => {
        let count = 0;
        const dataIndex = document.querySelectorAll('section[id], footer[id]'),
            currentSectionPos = (window.innerHeight/2 + 100) ,
            dots = document.querySelectorAll('.header__nav a');

        const pagination = () => {
            const lastOne = Array.from(dataIndex).reverse().findIndex((d) => d.getBoundingClientRect().top < currentSectionPos);
            if (count !== lastOne){
                dots.forEach(d => d.classList.remove('active'));
                dots[dataIndex.length  - lastOne -1 ].classList.add('active');
            }
            count = lastOne;
        };

        pagination();
        window.addEventListener('scroll', pagination);
    };

    if (homePage) setTimeout(e=>{pagination()}, 300)


});