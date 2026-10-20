# Đề 13 - Website Portfolio

Website portfolio cá nhân có trang admin, triển khai bằng Docker Compose.

## Chạy hệ thống
1. `cp .env.example .env` rồi đổi mật khẩu trong `.env`
2. `docker compose up -d --build`

## Truy cập
- Website (qua Nginx): http://localhost:8081
- Trang admin: http://localhost:8081/admin/login.php
- phpMyAdmin: http://localhost:8080
