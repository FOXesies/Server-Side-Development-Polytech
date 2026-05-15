<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Серверная веб-разработка</title>
    <link rel="stylesheet" href="/assets/css/layout/header.css">
    <link rel="stylesheet" href="/assets/css/layout/footer.css">
    <link rel="stylesheet" href="/assets/css/home_style.css">
</head>
<body>
    <header class="main-header">
        <img class="main-header__logo" src="/assets/images/logo.svg" alt="logo">
        <h1 class="main-header__title"><?= $headerTitle ?? 'Пусто'?></h1>
    </header>
</body>
</html>