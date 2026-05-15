<?php
function getMenu($page) {
    $menuItems = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];

    $html = '<div class="menu-container">';
    foreach ($menuItems as $key => $label) {
        $activeClass = ($page === $key) ? 'btn-red' : 'btn-blue';
        $html .= "<a href='index.php?page=$key' class='menu-btn $activeClass'>$label</a>";
    }
    $html .= '</div>';

    // Дополнительное меню сортировки для "Просмотр"
    if ($page === 'view') {
        $sort = $_GET['sort'] ?? 'id';
        $sortItems = ['id' => 'По порядку', 'last_name' => 'По фамилии', 'birthday' => 'По дате рождения'];
        
        $html .= '<div class="submenu-container">';
        foreach ($sortItems as $sKey => $sLabel) {
            $sActiveClass = ($sort === $sKey) ? 'btn-red' : 'btn-blue';
            $html .= "<a href='index.php?page=view&sort=$sKey' class='menu-btn btn-small $sActiveClass'>$sLabel</a>";
        }
        $html .= '</div>';
    }

    return $html;
}