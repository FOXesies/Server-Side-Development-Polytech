<?php
function getEditModule($conn) {
    $html = "";
    $selectedId = $_GET['edit_id'] ?? null;

    // --- ЛОГИКА ОБНОВЛЕНИЯ (POST) ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
        $stmt = $conn->prepare("UPDATE contacts SET last_name=?, first_name=?, middle_name=?, gender=?, birthday=?, phone=?, address=?, email=?, comment=? WHERE id=?");
        $stmt->bind_param("sssssssssi", 
            $_POST['last_name'], $_POST['first_name'], $_POST['middle_name'], 
            $_POST['gender'], $_POST['birthday'], $_POST['phone'], 
            $_POST['address'], $_POST['email'], $_POST['comment'], $_POST['update_id']
        );
        
        if ($stmt->execute()) {
            $html .= "<p style='color:green; text-align:center;'>Данные обновлены успешно!</p>";
        } else {
            $html .= "<p style='color:red; text-align:center;'>Ошибка при обновлении</p>";
        }
    }

    // --- ПОЛУЧЕНИЕ СПИСКА ДЛЯ ВЫБОРА ---
    // Сортировка по фамилии, затем по имени согласно ТЗ
    $result = $conn->query("SELECT id, last_name, first_name FROM contacts ORDER BY last_name, first_name");
    
    $html .= '<div class="edit-links" style="margin-bottom: 20px; text-align: center;">';
    $firstId = null;
    $links = [];
    
    while ($row = $result->fetch_assoc()) {
        if (!$firstId) $firstId = $row['id'];
        $style = ($selectedId == $row['id']) ? 'style="border: 2px solid blue; padding: 2px;"' : '';
        $links[] = "<a href='index.php?page=edit&edit_id={$row['id']}' $style>{$row['last_name']} {$row['first_name']}</a>";
    }
    
    // Если запись не выбрана, по ТЗ считаем текущей первую в списке
    if (!$selectedId) $selectedId = $firstId;
    
    $html .= implode(" | ", $links);
    $html .= '</div>';

    // --- ФОРМА РЕДАКТИРОВАНИЯ ---
    if ($selectedId) {
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->bind_param("i", $selectedId);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_assoc();

        if ($data) {
            $html .= '
            <form method="post" class="feedback-form">
                <input type="hidden" name="update_id" value="'.$data['id'].'">
                
                <label class="feedback-form__label">Фамилия</label>
                <input type="text" name="last_name" value="'.htmlspecialchars($data['last_name']).'" required class="feedback-form__input">
                
                <label class="feedback-form__label">Имя</label>
                <input type="text" name="first_name" value="'.htmlspecialchars($data['first_name']).'" required class="feedback-form__input">
                
                <label class="feedback-form__label">Отчество</label>
                <input type="text" name="middle_name" value="'.htmlspecialchars($data['middle_name']).'" class="feedback-form__input">
                
                <label class="feedback-form__label">Пол</label>
                <select name="gender" class="feedback-form__input">
                    <option value="М" '.($data['gender'] == 'М' ? 'selected' : '').'>М</option>
                    <option value="Ж" '.($data['gender'] == 'Ж' ? 'selected' : '').'>Ж</option>
                </select>
                
                <label class="feedback-form__label">Дата рождения</label>
                <input type="date" name="birthday" value="'.$data['birthday'].'" required class="feedback-form__input">
                
                <label class="feedback-form__label">Телефон</label>
                <input type="text" name="phone" value="'.htmlspecialchars($data['phone']).'" class="feedback-form__input">
                
                <label class="feedback-form__label">Email</label>
                <input type="email" name="email" value="'.htmlspecialchars($data['email']).'" class="feedback-form__input">
                
                <label class="feedback-form__label">Комментарий</label>
                <textarea name="comment" class="feedback-form__input">'.htmlspecialchars($data['comment']).'</textarea>
                
                <button type="submit" class="feedback-form__submit">Сохранить изменения</button>
            </form>';
        }
    } else {
        $html .= "<p>Список контактов пуст.</p>";
    }

    return $html;
}
?>