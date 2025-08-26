# TEST INTERVIEW

Đây là project demo được tạo ra nhằm mục đích **bài test phỏng vấn** cho vị trí Fullstack Developer.  
Project sử dụng **WordPress Sage theme** kết hợp với **Laravel/Acorn** để hiển thị danh sách trận đấu bóng đá.

---

## Yêu cầu

- PHP >= 8.0
- Composer
- Node.js >= 20
- Docker >= 28.3.2
- Docker compose >= 2.38.0

---

## Cài đặt

### 1. Clone repository

```bash
git clone https://github.com/npdung/test-interview.git test-interview
cd test-interview
```

### 2. Cấu hình môi trường

- Copy file `.env.example` thành `.env`:

```bash
cp .env.example .env 
```

- Mở file `.env` và chỉnh sửa các thông số theo nhu cầu của bạn, ví dụ: 

```
APP_ENV: là biến môi trường dùng để xác định môi trường chạy ứng dụng. Thường có hai giá trị chính:

1. 'dev' 
Mục đích: chạy ứng dụng trên máy local để phát triển và debug.
Tính năng:
- Bật xdebug để debug PHP.
- Sử dụng php.ini-development, bật các cảnh báo, hiển thị lỗi.
- Thường không tối ưu về hiệu năng.

2. 'prod'
Mục đích: chạy ứng dụng trên server thực tế cho người dùng.
Tính năng:
- Không cài xdebug để tránh tốn tài nguyên và lộ thông tin debug.
- Sử dụng php.ini-production, tắt hiển thị lỗi, tối ưu hiệu năng.
- Bật opcache, caching,…

NODE_VERSION: version của NodeJs trong Docker image

DOCKER_NGINX_PORT: port của nginx được mount từ container ra host

DOCKER_DB_PORT: port của DB được mount từ container ra host
```

- Copy file `docker-compose.override.yml.example` thành `docker-compose.override.yml`:

```bash
cp docker-compose.override.yml.example docker-compose.override.yml 
```
> **Lưu ý:** Bạn có thể sử dụng file `docker-compose.override.yml` để ghi đè cấu hình, giúp thay đổi cục bộ mà không ảnh hưởng đến các thành viên khác trong nhóm.

### 3. Build Docker image

Xây dựng Docker image của ứng dụng:

```bash
docker compose build
```

### 4. Chạy Docker

Khởi chạy container của ứng dụng:

```bash
docker compose up -d
```

### 5. Setup Wordpress

```bash
# Vào container app
docker compose exec php sh

# Cài đặt wordpress (bạn phải đợi đến khi composer install xong, nếu không sẽ bị lỗi wp: not found)
wp core install --url="http://localhost:8080" --title="Test Interview" --admin_user="admin" --admin_password="mat_khau" --admin_email="email@domain.com"

# Kích hoạt theme Sage
wp theme activate sage

# Compose rebuild autoload Sage theme
cd web/app/themes/sage/
composer dump-autoload

# Chạy migrate DB
wp acorn migrate

# Tạo dữ liệu demo
wp acorn db:seed
```

### 6. Truy cập ứng dụng

Mở trình duyệt và truy cập ứng dụng qua địa chỉ: http://localhost:8080

> **Lưu ý:** Port 8080 được map từ container sang host. Nếu đã thay đổi `DOCKER_NGINX_PORT` trong `.env` lúc build docker image, hãy sử dụng port tương ứng.

### 7. Sử dụng WP Acorn

Sau khi container chạy, bạn có thể truy cập shell của container để chạy các lệnh **WP Acorn**:

```bash
# Vào container app
docker compose exec php sh

# Ví dụ một số lệnh WP Acorn phổ biến:
wp acorn list             # Liệt kê tất cả lệnh artisan
wp acorn migrate          # Chạy migration
wp acorn db:seed          # Seed dữ liệu
