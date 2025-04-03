    <!-- Vendor -->
    <script src="/teamplate/admin/js/jquery.min.js"></script>
    <script src="/teamplate/admin/js/bootstrap.bundle.min.js"></script>
    <script src="/teamplate/admin/js/simplebar.min.js"></script>
    <script src="/teamplate/admin/js/waves.min.js"></script>
    <script src="/teamplate/admin/js/jquery.waypoints.min.js"></script>
    <script src="/teamplate/admin/js/jquery.counterup.min.js"></script>
    <script src="/teamplate/admin/js/feather.min.js"></script>

    <!-- knob plugin -->
    <script src="/teamplate/admin/js/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="/teamplate/admin/js/morris.min.js"></script>
    <script src="/teamplate/admin/js/raphael.min.js"></script>

    <!-- Dashboar init js-->
    <script src="/teamplate/admin/js/dashboard.init.js"></script>

    <!-- App js-->
    <script src="/teamplate/admin/js/app.js"></script>



    <script>
    function ChangeToSlug() {
        var slug;

        // Lấy giá trị từ ô nhập liệu "title"
        slug = document.getElementById("name").value;

        // Chuyển đổi thành chữ thường
        slug = slug.toLowerCase();

        // Thay thế các ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');

        // Xóa các ký tự đặc biệt
        slug = slug.replace(/[^a-z0-9-\s]/gi, '');

        // Thay thế khoảng trắng thành dấu gạch ngang
        slug = slug.replace(/\s+/g, '-');

        // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
        slug = slug.replace(/^-+|-+$/g, '');

        // Gán slug vào ô input "convert_slug"
        document.getElementById('convert_slug').value = slug;
    }

</script>


<script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // Khởi tạo DataTable với cấu hình chung
        const config = {
            language: {
                search: "Tìm kiếm:",
                lengthMenu: "Hiển thị _MENU_ mục mỗi trang",
                zeroRecords: "Không tìm thấy dữ liệu",
                info: "Đang hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ mục",
                infoEmpty: "Không có dữ liệu để hiển thị",
                infoFiltered: "(lọc từ _MAX_ mục)",
                paginate: {
                    first: "Đầu",
                    last: "Cuối",
                    next: "Sau",
                    previous: "Trước"
                }
            }
        };

        // Áp dụng DataTables cho từng bảng
        $('#category').DataTable(config);     // category
        $('#movietap').DataTable(config);   
        $('#genrelist').DataTable(config); 
    });
</script>   



@yield('footer')