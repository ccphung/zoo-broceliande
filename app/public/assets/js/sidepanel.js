function openNav() {
  if (window.innerWidth <= 992) {
      document.getElementById("mySidepanel").style.width = "100vw";
  } else {
      document.getElementById("mySidepanel").style.width = "30vw";
  }
}
  
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}