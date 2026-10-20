# Đề 13 - Website Portfolio

Website portfolio cá nhân có trang admin, triển khai bằng Docker Compose.

## Chạy hệ thống
1. `cp .env.example .env` rồi đổi mật khẩu trong `.env`
2. `docker compose up -d --build`

## Truy cập
- Website (qua Nginx): http://localhost:8081
- Trang admin: http://localhost:8081/admin/login.php
- phpMyAdmin: http://localhost:8080

## Giám sát (Prometheus + Grafana)
1. Tạo user cho mysqld-exporter trong MySQL, rồi tạo `monitoring/mysqld-exporter.cnf` từ file `.example`
2. Thêm `GRAFANA_ADMIN_PASSWORD` vào `.env`
3. `docker compose up -d --build`
4. Grafana: http://localhost:3000 (user `admin`), dashboard "Portfolio - Giám sát hệ thống"
5. Prometheus chỉ mở trong VM: http://127.0.0.1:9090
