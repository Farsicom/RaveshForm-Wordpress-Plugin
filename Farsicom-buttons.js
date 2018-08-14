
      
		

(function() {
 tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
 editor.addButton('my_mce_button', {
 //text: ' CRM ',
 icon: true,
 image:'http://tavafi.com/download/maj/CRM_logo_black.png',
 onclick: function() {
	 
	 
	  // Get the modal
        var modal = document.getElementById('myModal');
	  modal.style.display = "block";

        // Get the button that opens the modal
       // var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal 
        //btn.onclick = function () {
       //     modal.style.display = "block";
       // }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
	 
	 var domainName=document.getElementById('domainName');
		  
		  var serverAddres= document.getElementById('serverAddres');
		  var foemCode=document.getElementById('foemCode');
		  
		 var showType=document.getElementById('showType');
		 
		  var domain=document.getElementById('domain');
		  
		var cookie= document.cookie.split(';');
		//console.log(cookie.length);
		
		for(var i=0; i < cookie.length; i++){
			var cke = cookie[i].trim();
			//console.log(cke);
			if(cke.indexOf('server=') >= 0){				
				serverAddres.value=cke.split('=')[1].toString();
			
			}
			if(cke.indexOf('domain=') >= 0){				
				domainName.value=cke.split('=')[1].toString();
				
			}
			if(cke.indexOf('fromid=') >= 0){				
				foemCode.value=cke.split('=')[1].toString();
				
			}
			if(cke.indexOf('showType=') >= 0){				
				showType.value=cke.split('=')[1].toString();
				
			}
		}
		 
		
		 
		var btnCreateCode= document.getElementById('btnCreateCode');
	   btnCreateCode.onclick = function () {
		   
		 
		 
		  if(domainName.value.toString()=="")
		  {
			  alert("نام دامنه را وارد نمایید.");
			 domainName.focus();
		  }
		else if(serverAddres.value.toString()=="")
		  {
			  alert("آدرس سرور را  وارد نمایید. ");
			 serverAddres.focus();
		  }
			else if(foemCode.value.toString()=="")
		  {
			  alert("کد فرم را وارد نمایید. ");
			  foemCode.focus();
		  }
		  else{
		  editor.insertContent("[RaveshForm server="+ serverAddres.value.toString()
+" domain="+ domainName.value.toString()
+ " fromid="+foemCode.value.toString()+" showType="+showType.options[showType.selectedIndex].value.toString()+"]");	




document.cookie="server="+serverAddres.value.toString();
document.cookie="domain="+domainName.value.toString();
document.cookie="fromid="+foemCode.value.toString();
document.cookie="showType="+showType.options[showType.selectedIndex].value.toString();

			    modal.style.display = "none";
		  }  		 			 
        }
	 
 }
 });
 });
})();