<?php
echo '<div class="contacts">
    <div class="form-success">Спасибо за предоставленные данные!</div>
    <div class="contact-form">
        <form action="#" method="post">
            <span>Contact</span>
            <div class="form-item">
                <input type="text" class="form-field user_name" name="user_name" placeholder="Your Name">
                <label class="user_name_error"></label>
            </div>

            <div class="form-item">
                <input type="email" class="form-field user_email" name="user_email" placeholder="Your Email">
                <label class="user_email_error"></label>
            </div>

            <div class="form-item">
                <input type="text" class="form-field phone" name="phone" placeholder="phone number">
                <label class="phone_error"</label>
            </div>

            <div class="form-item message">
                <textarea id="user_msg" class="form-field" rows="7" name="user_msg" placeholder="Message"></textarea>
            </div>
            <input type="hidden" id="date" name="datetime">
            <button type="submit" class="btn-send">Send</button>
        </form>
    </div>
    <div class="map" id="map">
    </div>
</div>';