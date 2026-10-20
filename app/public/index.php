<?php
require __DIR__ . '/inc/db.php';
$pdo = db();
$p = $pdo->query('SELECT * FROM profile WHERE id=1')->fetch();
$projects = $pdo->query('SELECT * FROM projects ORDER BY id DESC')->fetchAll();
?>
<!doctype html>
<html lang="vi"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= h($p['full_name']) ?> - Portfolio</title>
<style>
body{font-family:Arial,sans-serif;max-width:800px;margin:40px auto;padding:0 16px;color:#222}
h1{margin-bottom:0}.sub{color:#555;margin-top:4px}
.card{border:1px solid #ddd;border-radius:8px;padding:12px 16px;margin:12px 0}
a{color:#0b5ed7}
</style></head><body>
<h1><?= h($p['full_name']) ?></h1>
<p class="sub"><?= h($p['title']) ?> | <?= h($p['email']) ?></p>
<h2>Giới thiệu</h2><p><?= nl2br(h($p['about'])) ?></p>
<h2>Dự án</h2>
<?php foreach ($projects as $pr): ?>
<div class="card"><b><?= h($pr['name']) ?></b><p><?= h($pr['description']) ?></p>
<?php if ($pr['link'] && $pr['link'] !== '#'): ?><a href="<?= h($pr['link']) ?>">Xem thêm</a><?php endif; ?></div>
<?php endforeach; ?>
<p><a href="/admin/">Trang quản trị</a></p>
</body></html>
