# Tổng quan
## Đề bài
Viết website tạo link rút gọn (shorten URL) cho phép người dùng có thể nhập URL bất kỳ và tạo một link redirect tương ứng.
## Tính năng
- Tạo link rút gọn nhanh nhất có thể
- Khi có người truy cập vào link rút gọn:
    - Tự động redirect sau một khoảng thời gian delay nhất định 
    - Thu thập càng nhiều thông tin về IP, thiết bị, … của khách truy cập càng tốt
- Thống kê lưu lượng truy cập của từng link rút gọn cho chủ sở hữu xem theo các thông số sau:
    - Số lượng truy cập
    - Kiểu thiết bị truy cập
    - Quốc gia truy cập
    - …
- Tìm cách anti-spam để tránh bị spam tạo link, spam traffic
## Yêu cầu
- Tự chọn giải pháp sao cho phù hợp nhất với các yêu cầu kể trên
- Push code lên một public github repo
- Deploy sản phẩm lên host/vps
- Cập nhật tiến độ liên tục trên discord
## Deadline
10 ngày, tính từ 12h30 ngày 15/11/2021 đến 12h30 ngày 24/11/2021.