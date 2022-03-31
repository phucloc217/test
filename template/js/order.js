$(function() {
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var a = JSON.parse(getCookie("customer"));
    var availableTags = [];
    a.forEach(element => {
        availableTags.push(element['Sodt']);
    });
    document.cookie = "customer= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    $("#customer-phone").autocomplete({
        source: availableTags
    });
});