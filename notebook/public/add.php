<?php
function getAddModule($conn) {
    $msg = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $conn->prepare("INSERT INTO contacts (last_name, first_name, middle_name, gender, birthday, phone, address, email, comment) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $_POST['last_name'], $_POST['first_name'], $_POST['middle_name'], $_POST['gender'], $_POST['birthday'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['comment']);
        
        if ($stmt->execute()) $msg = "<p style='color:green'>Запись добавлена</p>";
        else $msg = "<p style='color:red'>Ошибка: запись не добавлена</p>";
    }

    return $msg . '
    <form method="post" class="feedback-form">
        <input type="text" name="last_name" placeholder="Фамилия" required class="feedback-form__input">
        <input type="text" name="first_name" placeholder="Имя" required class="feedback-form__input">
        <select name="gender" class="feedback-form__input"><option value="М">М</option><option value="Ж">Ж</option></select>
        <input type="date" name="birthday" required class="feedback-form__input">
        <input type="text" name="phone" placeholder="Телефон" class="feedback-form__input">
        <input type="email" name="email" placeholder="E-mail" class="feedback-form__input">
        <textarea name="comment" placeholder="Комментарий" class="feedback-form__input"></textarea>
        <button type="submit" class="feedback-form__submit">Сохранить</button>
    </form>';
}