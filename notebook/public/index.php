<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';
require_once 'menu.php';
require_once 'viewer.php';
require_once 'add.php';
require_once 'edit.php';
require_once 'delete.php';

$page = $_GET['page'] ?? 'view';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="main-header">
        <?= getMenu($page) ?>
    </header>

    <main class="content-wrapper">
        <section class="form-container">
            <?php
            switch ($page) {
                case 'add':    echo getAddModule($conn); break;
                case 'edit':   echo getEditModule($conn); break;
                case 'delete': echo getDeleteModule($conn); break;
                default:       echo getViewerModule($conn); break;
            }
            ?>
        </section>
    </main>

    <footer class="main-footer">
        <h1 class="main-footer__text">Лабораторная работа: Записная книжка</h1>
    </footer>
</body>
</html>
3. menu.php (Модуль меню)