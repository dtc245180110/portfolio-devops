<?php
session_start();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (hash_equals((string)getenv('ADMIN_USER'), $_POST['u'] ?? '') &&
        hash_equals((string)getenv('ADMIN_PASS'), $_POST['p'] ?? '')) {
        session_regenerate_id(true);
        $_SESSION['admin'] = true;
        header('Location: index.php'); exit;
    }
    $err = 'Sai tài khoản hoặc mật khẩu';
}
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><title>Đăng nhập</title>
<style>body{font-family:Arial;max-width:320px;margin:80px auto}input{width:100%;padding:8px;margin:6px 0;box-sizing:border-box}</style></head><body>
<h2>Đăng nhập quản trị</h2>
<?php if ($err): ?><p style="color:red"><?= htmlspecialchars($err) ?></p><?php endif; ?>
<form method="post"><input name="u" placeholder="Tài khoản" required>
<input name="p" type="password" placeholder="Mật khẩu" required>
<button>Đăng nhập</button></form></body></html>
