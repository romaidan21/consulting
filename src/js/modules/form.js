

export default function formSent() {
  let form = document.getElementById('form');

  if (form){
    let popUp = form.querySelector('.sent-pop-up');

    form.addEventListener('wpcf7mailsent', e => {
      toggleDisabled();
    }, false);
    popUp.querySelector('.close').addEventListener('click',  e => toggleDisabled());

    function toggleDisabled() {
      popUp.classList.toggle('active')
    }
  }



}