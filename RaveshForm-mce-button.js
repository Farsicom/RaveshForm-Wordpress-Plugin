(function () {
    tinymce.PluginManager.add('my_mce_button', function (editor, url) {
        editor.addButton('my_mce_button', {
            icon: true,
            title: 'افزودن فرم',
            image: '../wp-content/plugins/RaveshFormBuilder/RaveshForm-logo.png',
            onclick: function () {
                var modal = document.getElementById('RvcModal');
                var txtServerUrl = document.getElementById('rvcServerUrl');
                var txtDomain = document.getElementById('rvcDomain');
                var txtFormId = document.getElementById('rvcFormId');
                var drdShowType = document.getElementById('rvcShowType');
                var txtLinkTitle = document.getElementById('rvcLinkTitle');
                var btnCreateCode = document.getElementById('rvcCreateCode');
                modal.style.display = "block";


                var btnClose = document.getElementsByClassName("rvc-close")[0];
                btnClose.onclick = function () {
                    modal.style.display = "none";
                }


                window.onclick = function (ev) {
                    if (ev.target === modal) {
                        modal.style.display = "none";
                    }
                }


                var cookie = document.cookie.split(';');
                for (var i = 0; i < cookie.length; i++) {
                    var cke = cookie[i].trim();
                    if (cke.indexOf('server=') >= 0) {
                        txtServerUrl.value = cke.split('=')[1].toString();
                    }
                    if (cke.indexOf('domain=') >= 0) {
                        txtDomain.value = cke.split('=')[1].toString();
                    }
                }


                btnCreateCode.onclick = function () {
                    if (txtDomain.value.toString() == "") {
                        alert("نام دامنه را وارد نمایید.");
                        txtDomain.focus();
                    }
                    else if (txtServerUrl.value.toString() == "") {
                        alert("آدرس سرور را  وارد نمایید. ");
                        txtServerUrl.focus();
                    }
                    else if (txtFormId.value.toString() == "") {
                        alert("کد فرم را وارد نمایید. ");
                        txtFormId.focus();
                    }
                    else {
                        editor.insertContent(
                            '[RaveshForm ' +
                            'server="' + txtServerUrl.value.toString() + '" ' +
                            'domain="' + txtDomain.value.toString() + '" ' +
                            'formid="' + txtFormId.value.toString() + '" ' +
                            'type="' + drdShowType.options[drdShowType.selectedIndex].value.toString() + '" ' +
                            'title="' + txtLinkTitle.value.toString() + '" ' +
                            ']');

                        document.cookie = "server=" + txtServerUrl.value.toString();
                        document.cookie = "domain=" + txtDomain.value.toString();
                        modal.style.display = "none";
                    }
                }

            }
        });
    });
})();