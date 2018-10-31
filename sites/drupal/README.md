### Hướng dẫn

* Đảm bảo máy đã chạy XAMPP, AMPP, MAMP các ứng dụng local host.

* Tạo một database với tên `kltn_db_drupal` trong phpMyAdmin. Import dữ liệu (database lấy trong file `database/drupal_data.mysql`), có thể bị lỗi trong quá trình import cái này lên mạng tìm cách sửa, sửa lỗi mất tầm 5p nên cũng nhanh.

* Chỉnh sửa file settings database (sites/drupal/sites/default/settings.php), sửa bắt đầu từ dòng `758`

* Chạy site và đăng nhập tại `/user/login`. tài khoản admin - 1231231231

* Truy cập `/product/phone-2`. Trong trường hợp không thấy được coral-talk hiển thị, đảm bảo server coral talk đã bật và địa chỉ server là `127.0.0.1:3000`, nếu vẫn k được truy cập `/admin/config/development/configuration/full/import`

* Tại mục `Configuration archive`, Chọn file `database/config-smartcellphone-drupal-2018-10-31-14-12.tar` và nhấn `upload`.

* Truy cập lại trang `/product/phone-2` và thử nghiệm.

