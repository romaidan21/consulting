

export default function changePath() {
  let expBlock = document.querySelectorAll('.experience');

  if (expBlock.length){
    expBlock.forEach(b => {
      let color = b.querySelector('.experience__title h3 path').getAttribute('fill');
      let lPath = b.querySelectorAll('.experience__desc .l-arr path');
      lPath.forEach(l => {
        l.style.fill = color;
      })
    });
  }

}