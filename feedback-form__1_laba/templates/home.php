<section class="form-container">
    <h2 class="form-title">Форма отправки</h2>
    <form action="https://httpbin.org/post" method="post" class="feedback-form">
        
        <div class="feedback-form__group">
            <label for="username" class="feedback-form__label">Имя</label>
            <input type="text" name="username" id="username" class="feedback-form__input" placeholder="Даниил" required minlength="2">
        </div>

        <div class="feedback-form__group">
            <label for="email" class="feedback-form__label">Почта</label>
            <input type="email" name="email" id="email" class="feedback-form__input" placeholder="example@mail.com" required minlength="10">
        </div>

        <div class="feedback-form__group">
            <label for="type" class="feedback-form__label">Тип обращения</label>
            <select id="type" name="type" class="feedback-form__input">
                <option value="complaint">Жалоба</option>
                <option value="offer">Предложение</option>
                <option value="gratitude">Благодарность</option>
            </select>
        </div>

        <div class="feedback-form__group">
            <label class="feedback-form__label">Вариант ответа:</label>
            <div class="feedback-form__radio-container">
                <label class="feedback-form__radio-label" for="sms_reciever">
                    <input type="radio" id="sms_reciever" name="reciever_type" value="sms" required checked> СМС
                </label>
                <label class="feedback-form__radio-label" for="email_reciever">
                    <input type="radio" id="email_reciever" name="reciever_type" value="email"> Почта
                </label>
            </div>
        </div>

        <div class="feedback-form__group">
            <label for="message" class="feedback-form__label">Текст обращения</label>
            <textarea 
                name="message" 
                id="message" 
                class="feedback-form__input feedback-form__textarea" 
                placeholder="Опишите подробно свою проблему" 
                required 
                rows="5"
            ></textarea>
        </div>

        <div class="feedback-form__actions">
            <button type="submit" class="feedback-form__submit">Отправить</button>
            <a href="./second.php" class="feedback-form__link">Перейти на 2 страницу</a>
        </div>
    </div>
    </form>
</section>