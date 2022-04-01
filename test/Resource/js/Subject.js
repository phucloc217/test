var modal1 = document.getElementById('modal1')
modal1.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
        // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    var modalTitle = modal1.querySelector('.modal-title')
    var text = modal1.querySelector("p");
    text.innerText = "Bạn có chắc muốn xóa môn học " + recipient + " không ?"
    modalTitle.textContent = 'Xóa môn học ' + recipient + '?'
    $("#deleteSubject").attr("href", "index.php?ctrl=Subject&func=delete&id=" + recipient);
})

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
var modal = document.getElementById("addModal");
modal.addEventListener("show.bs.modal", function(event) {
    var button = event.relatedTarget;
    var modalTitle = modal.querySelector(".modal-title");
    var recipient = button.getAttribute("data-bs-whatever");
    modalTitle.textContent = "Thêm môn học";
    $("#code").val("");
    $("#name").val("");
    $("#credits").val(1);
    $('#save').attr('name', 'addSubject');
    $("#SubjectForm").attr("action", "index.php?ctrl=Subject&func=create");
    if (recipient != null) {
        modalTitle.textContent = "Sửa thông tin môn học";
        let x = getCookie('subject')
        let subject = null
        x = JSON.parse(x)['listSubject']
        x.forEach(element => {
            if (element.mamh == recipient)
                subject = element
        });
        $("#code").val(subject.mamh);
        $("#name").val(subject.tenmh);
        $("#credits").val(subject.stc);
        $('#save').attr('name', 'updateSubject');
        $("#SubjectForm").attr(
            "action",
            "index.php?ctrl=Subject&func=update&id=" + recipient
        );
    }
});