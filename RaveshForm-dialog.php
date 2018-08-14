<style>
    .rvc-modal {display: none;position: fixed;z-index: 99999;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgba(0, 0, 0, 0.4);}
    .rvc-modal-content {background-color: #fefefe;margin: 15% auto;padding: 20px;border: 1px solid #888;width: 330px;font-family: tahoma;}
    .rvc-close {color: #aaa;float: left;font-size: 28px;font-weight: bold;}
    .rvc-close:hover, .rvc-close:focus {color: black;text-decoration: none;cursor: pointer;}
    .rvc-table-td-title {width: 200px;font-weight: bold;color: black;font-size: 12px;padding: 15px 0;}
</style>

<div id="RvcModal" class="rvc-modal" dir="rtl">
    <div class="rvc-modal-content">
        <span class="rvc-close">&times;</span>
        <div style="font-size: 16px;margin-bottom: 5px;font-weight: bold;">فرم‌ساز <span style="color: #03a9f4">رَوش</span></div>
        <div style="color: #808080;margin-bottom: 25px;">افزونه‌ی اتصال وردپرس به فرم‌ساز رَوش</div>
        <table style="width: 100%;">
            <tr>
                <td class="rvc-table-td-title">آدرس سرور</td>
                <td><input type="text" style="width: 200px;" id="rvcServerUrl"/></td>
            </tr>
            <tr>
                <td class="rvc-table-td-title">نام دامنه</td>
                <td><input type="text" style="width: 200px;" id="rvcDomain"/></td>
            </tr>
            <tr>
                <td class="rvc-table-td-title">شناسه فرم</td>
                <td><input type="text" style="width: 200px;" id="rvcFormId"/></td>
            </tr>
            <tr>
                <td class="rvc-table-td-title">نحوه نمایش</td>
                <td>
                    <select id="rvcShowType" style="width: 200px;">
                        <option value="inline">اسکریپت</option>
                        <option value="link">لینک</option>
                        <option value="dialog">نمایش پنجره</option>
                        <option value="fab">دکمه شناور</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="rvc-table-td-title">عنوان</td>
                <td><input type="text" style="width: 200px;" id="rvcLinkTitle" value="مشاهده‌ی فرم"/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input id="rvcCreateCode" style="margin-top:10px" type="button" class="button button-primary button-large" value="ایجاد"/>
                </td>
            </tr>
        </table>
    </div>
</div>