

export default function onScroll() {

  let scrollPos = 0;
  let menu = document.querySelector('.header');
  let body = document.querySelector('body');

  function hideHeaderOnScroll() {
    let scrolled;

    scrolled = window.pageYOffset;
    let bodyTopPos = body.getBoundingClientRect().top;

      if (scrolled < 99) {
        menu.classList.remove('scrolled')
      }
      if (scrolled > 1) {
        menu.classList.add('scrolled')
      }
    scrollPos = bodyTopPos;
  }
  hideHeaderOnScroll();


  window.onscroll = hideHeaderOnScroll;


}