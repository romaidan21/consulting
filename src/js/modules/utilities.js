// Detect browser
const { detect } = require('detect-browser');
const browser = detect();

// Add browser to html class
document.getElementsByTagName("html")[0].classList.add(browser ? browser.name : "");

// Detect webp support && add class to body
document.addEventListener('DOMContentLoaded', () => {
  var i=new Image;i.onload=i.onerror=function(){document.body.classList.add(i.height==1?"webp":"no-webp")};i.src="data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
});