<?php
function getViewerModule($conn) {
    $sort = $_GET['sort'] ?? 'id';
    $limit = 10;
    $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
    $offset = ($page - 1) * $limit;

    $allowedSort = ['id', 'last_name', 'birthday'];
    if (!in_array($sort, $allowedSort)) $sort = 'id';

    $res = $conn->query("SELECT * FROM contacts ORDER BY $sort ASC LIMIT $limit OFFSET $offset");
    
    $html = '<table class="data-table"><tr><th>Фамилия</th><th>Имя</th><th>Телефон</th><th>Email</th></tr>';
    while ($row = $res->fetch_assoc()) {
        $html .= "<tr><td>{$row['last_name']}</td><td>{$row['first_name']}</td><td>{$row['phone']}</td><td>{$row['email']}</td></tr>";
    }
    $html .= '</table>';

    // Пагинация
    $total = $conn->query("SELECT COUNT(*) as cnt FROM contacts")->fetch_assoc()['cnt'];
    $pages = ceil($total / $limit);
    
    $html .= '<div class="pagination">';
    for ($i = 1; $i <= $pages; $i++) {
        $activeP = ($i == $page) ? 'style="font-weight:bold; color:red;"' : '';
        $html .= "<a href='index.php?page=view&sort=$sort&p=$i' $activeP>$i</a>";
    }
    $html .= '</div>';

    return $html;
}