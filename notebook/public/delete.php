<?php
function getDeleteModule($conn) {
    $html = "";

    // --- ЛОГИКА УДАЛЕНИЯ ---
    if (isset($_GET['del_id'])) {
        $id = (int)$_GET['del_id'];
        
        // Сначала узнаем фамилию для сообщения
        $stmt = $conn->prepare("SELECT last_name FROM contacts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        
        if ($res) {
            $lastName = $res['last_name'];
            $conn->query("DELETE FROM contacts WHERE id = $id");
            $html .= "<p style='color:blue; text-align:center; font-weight:bold;'>Запись с фамилией $lastName удалена</p>";
        }
    }

    // --- СПИСОК НА УДАЛЕНИЕ ---
    $result = $conn->query("SELECT id, last_name, first_name, middle_name FROM contacts ORDER BY last_name");
    
    $html .= '<div class="delete-list" style="display: flex; flex-direction: column; gap: 10px; align-items: center;">';
    $html .= '<h3>Выберите запись для удаления:</h3>';
    
    while ($row = $result->fetch_assoc()) {
        // Формируем инициалы
        $f = mb_substr($row['first_name'], 0, 1) . ".";
        $m = $row['middle_name'] ? mb_substr($row['middle_name'], 0, 1) . "." : "";
        
        $nameDisplay = "{$row['last_name']} $f $m";
        
        $html .= "<a href='index.php?page=delete&del_id={$row['id']}' 
                     style='color: red; text-decoration: none; padding: 5px; border: 1px solid #ccc; width: 200px; text-align: center;'
                     onclick='return confirm(\"Вы уверены?\")'>
                     Удалить: $nameDisplay
                  </a>";
    }
    
    if ($result->num_rows == 0) {
        $html .= "<p>Нет записей для удаления.</p>";
    }
    
    $html .= '</div>';

    return $html;
}
?>