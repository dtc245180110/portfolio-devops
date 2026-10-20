<?php
session_start();
require __DIR__ . '/../inc/db.php';
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$pdo = db();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = $_POST['action'] ?? '';
    if ($a === 'profile') {
        $pdo->prepare('UPDATE profile SET full_name=?, title=?, about=?, email=? WHERE id=1')
            ->execute([$_POST['full_name'], $_POST['title'], $_POST['about'], $_POST['email']]);
    } elseif ($a === 'add') {
        $pdo->prepare('INSERT INTO projects(name,description,link) VALUES(?,?,?)')
            ->execute([$_POST['name'], $_POST['description'], $_POST['link']]);
    } elseif ($a === 'delete') {
        $pdo->prepare('DELETE FROM projects WHERE id=?')->execute([(int)$_POST['id']]);
    }
    header('Location: index.php'); exit;
}
$p = $pdo->query('SELECT * FROM profile WHERE id=1')->fetch();
$projects = $pdo->query('SELECT * FROM projects ORDER BY id DESC')->fetchAll();
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><title>Quản trị</title>
<style>body{font-family:Arial;max-width:800px;margin:30px auto;padding:0 16px}
input,textarea{width:100%;padding:8px;margin:4px 0;box-sizing:border-box}
.card{border:1px solid #ddd;border-radius:8px;padding:10px 14px;margin:10px 0}</style></head><body>
<h1>Trang quản trị</h1>
<p><a href="/">Xem website</a> | <a href="logout.php">Đăng xuất</a></p>
<h2>Thông tin cá nhân</h2>
<form method="post"><input type="hidden" name="action" value="profile">
<input name="full_name" value="<?= h($p['full_name']) ?>" placeholder="Họ tên">
<input name="title" value="<?= h($p['title']) ?>" placeholder="Chức danh">
<input name="email" value="<?= h($p['email']) ?>" placeholder="Email">
<textarea name="about" rows="4"><?= h($p['about']) ?></textarea>
<button>Lưu</button></form>
<h2>Thêm dự án</h2>
<form method="post"><input type="hidden" name="action" value="add">
<input name="name" placeholder="Tên dự án" required>
<textarea name="description" rows="2" placeholder="Mô tả"></textarea>
<input name="link" placeholder="Liên kết (nếu có)">
<button>Thêm</button></form>
<h2>Danh sách dự án</h2>
<?php foreach ($projects as $pr): ?>
<div class="card"><b><?= h($pr['name']) ?></b><br><?= h($pr['description']) ?>
<form method="post" style="margin-top:6px"><input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?= (int)$pr['id'] ?>"><button>Xóa</button></form></div>
<?php endforeach; ?>
</body></html>
