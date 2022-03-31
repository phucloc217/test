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