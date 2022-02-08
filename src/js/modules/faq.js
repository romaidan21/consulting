

export default function openFaq() {
  let faqBtn = document.querySelectorAll('.click-sec');
  let headerMain = document.querySelector('header .header__nav');

  if (faqBtn.length){
    faqBtn.forEach(b => {
      b.addEventListener('click', function () {
        this.parentNode.classList.toggle('active')
      })
    });
  }

  //open header menu in front page if mobile device
  if (headerMain){
    headerMain.querySelectorAll('a').forEach(a => {
      a.addEventListener('click', function () {
        headerMain.parentNode.classList.remove('active')
      })
    });
  }



}