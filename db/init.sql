SET NAMES utf8mb4;
CREATE TABLE IF NOT EXISTS profile (
  id INT PRIMARY KEY,
  full_name VARCHAR(100), title VARCHAR(100), about TEXT, email VARCHAR(100)
) CHARACTER SET utf8mb4;
CREATE TABLE IF NOT EXISTS projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL, description TEXT, link VARCHAR(255)
) CHARACTER SET utf8mb4;
INSERT INTO profile VALUES (1,'Nguyễn Văn A','Sinh viên Công nghệ thông tin','Xin chào! Đây là website portfolio cá nhân của tôi.','email@example.com');
INSERT INTO projects (name,description,link) VALUES
('Website Portfolio','Triển khai bằng Docker Compose với Nginx, MySQL, Grafana, Loki.','#'),
('Quản lý bán hàng và kho','Bài tập nhóm: backend + frontend, SQL Server.','#');
