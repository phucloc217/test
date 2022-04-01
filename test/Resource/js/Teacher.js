var modal1 = document.getElementById("modal1");
modal1.addEventListener("show.bs.modal", function(event) {
    var button = event.relatedTarget;
    var recipient = button.getAttribute("data-bs-whatever");
    var modalTitle = modal1.querySelector(".modal-title");
    var text = modal1.querySelector("p");
    text.innerText = "Bạn có chắc muốn xóa giảng viên " + recipient + " không ?";
    modalTitle.textContent = "Xóa giảng viên " + recipient + "?";
    $("#deleteSubject").attr(
        "href",
        "index.php?ctrl=Teacher&func=delete&id=" + recipient.split("-")[0]
    );
});

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
    modalTitle.textContent = "Thêm giảng viên";
    $("#name").val("");
    $("#phone").val("");
    $("#addr").val("");
    $('#save').attr('name', 'addTeacher');
    $("#TeacherForm").attr("action", "index.php?ctrl=Teacher&func=create");
    if (recipient != null) {
        modalTitle.textContent = "Sửa thông tin giảng viên";
        let x = getCookie('teachers')
        let teacher = null
        x = JSON.parse(x)['listTeacher']
        x.forEach(element => {
            if (element.id == recipient)
                teacher = element
        });
        $("#name").val(teacher.tengv);
        $("#phone").val(teacher.sdt);
        $("#addr").val(teacher.diachi);
        $('#save').attr('name', 'updateTeacher');
        $("#TeacherForm").attr(
            "action",
            "index.php?ctrl=Teacher&func=update&id=" + recipient
        );
    }
});