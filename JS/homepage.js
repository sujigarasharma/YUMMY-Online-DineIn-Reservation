var i = 0;
var txt_cont = 'Get exclusive member rates & offers !';
var speed = 50;

function typeWriter() {
  if (i < txt_cont.length) {
    document.getElementById("offer_cont_txt").innerHTML += txt_cont.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
}typeWriter();
