   <style>

        /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 99999; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 432px;
            height: 377px;
        }

/* The Close Button */
.close {
    color: #aaa;
    float: left;
    
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
        .tblcell {
            width: 325px;
            font-family: Arial, Helvetica, sans-serif;
             font-size: small; font-weight: bold; color: black;
        }
      
      
    </style>
	
	<div id="myModal" class="Modal" dir="rtl">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p style="font-family:tahoma, Arial, Helvetica, sans-serif; font-size: large; font-weight: bold;">فرم ساز <span style="font-family: tahoma,Arial, Helvetica, sans-serif; color: blue">رَوش</span></p>
      <p style="font-family: Arial, Helvetica, sans-serif; font-size: large; font-weight: bold; color: #808080;">افزونه‌ی اتصال وردپرس به فرم ساز روش</p>
        <table style="width: 100%; height: 279px;">
             <tr>
                  <td class="tblcell">آدرس سرور</td>
                  <td>  <span><input style="width: 189px;"  id="serverAddres" /></span></td>
              </tr>
			 <tr>
                  <td class="tblcell">نام دامنه</td>
                  <td>  <span><input style="width: 189px;"    id="domainName" /></span></td>
              </tr>
            
            <tr>
                  <td class="tblcell">شناسه فرم</td>
                  <td>  <span><input style="width: 189px;"  id="foemCode" /></span></td>
              </tr>
            <tr>
                  <td class="tblcell">نحوه نمایش</td>
                  <td>  <span><select id="showType"  style="font-family: Arial, Helvetica, sans-serif;
             font-size: small; font-weight: bold;width: 189px; color: black;">
                          <option value="dialog"> <span >نمایش پنجره</span></option>
                          <option value="fab"> <span >دکمه شناور</span></option>
                          <option value="link"> <span >link</span></option>
                      <option value="script"> <span >script</span></option>
                      </select></span></td>
              </tr>
            <tr>
                  <td class="tblcell">&nbsp;</td>
                  <td style="text-align: center">  
                      <input id="btnCreateCode" style="font-family: Arial, Helvetica, sans-serif;
             font-size: x-small;width: 61px; font-weight: bold; color: black;" type="button" value="ایجاد" /></td>
              </tr>
      </table>
   

  </div>

</div>