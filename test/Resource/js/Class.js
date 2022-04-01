$(document).ready(function() {
    $("#addClass").click(function() {
        if ($("#subject").val() == "") {
            $("#subject-warning").text("Bạn phải chọn môn học")
            $("#subject-warning").css("color", "red")

        }
        if ($("#teacher").val() == "") {
            $("#teacher-warning").text("Bạn phải chọn môn giảng viên")
            $("#teacher-warning").css("color", "red")
            return
        }
        $("#subject-warning").text("")
        $("#teacher-warning").text("")
        $("#ClassForm").submit(); // Submit the form
    });
});
// Example starter JavaScript for disabling form submissions if there are invalid fields



var modal1 = document.getElementById("modal1");
modal1.addEventListener("show.bs.modal", function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute("data-bs-whatever");
    var modalTitle = modal1.querySelector(".modal-title");
    var text = modal1.querySelector("p");
    text.innerText = "Bạn có chắc muốn xóa lớp" + recipient.split("/")[1] + " không ?";
    modalTitle.textContent = "Xóa lớp " + recipient.split("/")[1] + "?";
    $("#deleteSubject").attr(
        "href",
        "index.php?ctrl=Class&func=delete&id=" + recipient.split("/")[0]
    );
});
var select_box_element = document.querySelector("#teacher");
var select_box_element1 = document.querySelector("#subject");

dselect(select_box_element, {
    search: true,
});

dselect(select_box_element1, {
    search: true,
});