var modal1 = document.getElementById('modal1')
modal1.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
        // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    var modalTitle = modal1.querySelector('.modal-title')
    var text = modal1.querySelector("p");
    text.innerText = "Bạn có chắc muốn giảng viên " + recipient + " không ?"
    modalTitle.textContent = 'Xóa giảng viên ' + recipient + '?'
    $("#deleteSubject").attr("href", "index.php?ctrl=Subject&func=delete&id=" + recipient);
})