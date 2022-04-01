$("#table").DataTable({
    paging: true,
    language: {
        paginate: {
            previous: "Trang trước",
            next: "Trang sau",
        },
        search: "Tìm kiếm",
        lengthMenu: "Hiển thị _MENU_ mục",
        info: "_START_ đến _END_ của _TOTAL_ mục",
        infoEmpty: "Không có kết quả để hiển thị",
        zeroRecords: "Không có kết quả để hiển thị",
    },
});
URL = window.location.href
var newURL = URL.split('/');
newURL = newURL[newURL.length - 1]
let arr = $("a.nav-link").toArray()
arr.forEach(element => {
    let a = element.href.split('/')
    a = a[a.length - 1]
    console.log(a == newURL)
    if (a == newURL)
        element.classList.add("active");
});