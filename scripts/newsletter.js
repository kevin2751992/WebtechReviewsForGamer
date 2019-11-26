var regexName = /^[A-Za-z0-9äöüÄÖÜß \-'.]+$/;
var regexMail = /\b[A-Za-z0-9!#$%&'*+-/=?^_`{|}~]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/;

function testInput() {
  var name = document.getElementById('name').value;
  var email = document.getElementById('mail').value;
  if(regexName.test(name)) {
    if(regexMail.test(email)) {
      alert("Newsletter erfolgreich abonniert!");
    }
    else {
      alert("Bitte überprüfe deine E-Mail nochmal!");
    }
  }
  else {
    if(regexMail.test(email)) {
      alert("Bitte überprüfe deinen Namen nochmal!");
    }
    else {
      alert("Bitte überprüfe deinen Namen und deine E-Mail nochmal!");
    }
  }
}