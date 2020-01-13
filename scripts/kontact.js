var regexFirstname = /^[A-Za-z0-9äöüÄÖÜß \-'.]+$/;
var regexLastname = /^[A-Za-z0-9äöüÄÖÜß \-'.]+$/;
var regexMail = /\b[A-Za-z0-9!#$%&'*+-/=?^_`{|}~]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/;

function SomeInput() 
{
  var firstname = document.getElementById('firstname').value;
 var lastname = document.getElementById('lastname').value;
  var mail = document.getElementById('mail').value;



 if(regexFirstname.test(firstname)) 
{
	if (regexLastname.test(lastname))
	{
    		if(regexMail.test(mail)) 
		{
			alert("Anfrage abgeschickt!");
		}
    		else 
		{
      			alert("Überprüfe deine Mail nochmal!");
           	}
        }
      else 
	{
                if(regexMail.test(mail)) 
		{
      			alert("Überprüfe deinen Nachnamen nochmal!");
    		}
		else
		{
			alert("Überprüfe sowohl Nachname als auch Mail!");
		}
	}
}
else 
{
	if(regexMail.test(mail))
	{
		if(regexLastname.test(lastname))
		{
      			alert("Überprüfe deinen Vornamen nochmal!");
    		}
		else
		{
			alert("Überprüfe deinen Vornamen und den Nachnamen!");
  		}
	}
	else
	{	
		if(regexLastname.test(lastname))
		{	
			alert("Überprüfe deine Mail und deinen Vornamen!");
		}
		else
		{
			alert("Überprüfe alles nochmal!");
		}
	}
}
}