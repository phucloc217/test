var modal1 = document.getElementById('modal1')
modal1.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
        // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-whatever')
    var modalTitle = modal1.querySelector('.modal-title')
    var modalBodyInput = modal1.querySelector('.modal-body input')
    var text = modal1.querySelector("p");
    text.innerText = "Bạn có chắc muốn xóa môn học " + recipient + " không ?"
    modalTitle.textContent = 'Xóa môn học ' + recipient + '?'
    modalBodyInput.value = recipient
    $("#deleteSubject").attr("href", "index.php?ctrl=Subject&func=delete&id=" + recipient);
})