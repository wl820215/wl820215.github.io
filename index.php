<?php
// 数据库配置
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'personal_site');

// 创建数据库连接
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 路由处理
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 包含头部
include 'views/header.php';

// 根据请求加载不同页面
switch ($page) {
    case 'bookmarks':
        include 'controllers/bookmarks.php';
        break;
    case 'blog':
        include 'controllers/blog.php';
        break;
    case 'post':
        include 'controllers/post.php';
        break;
    default:
        include 'controllers/home.php';
}

// 包含尾部
include 'views/footer.php';
?>
