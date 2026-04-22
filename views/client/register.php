<style>
    form {
        max-width: 400px;
        margin: 40px auto;
        padding: 25px 30px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    form p {
        margin-bottom: 18px;
    }

    form label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
    }

    form input[type="text"],
    form input[type="password"],
    form input[type="email"] {
        width: 100%;
        padding: 10px 12px;
        font-size: 1rem;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }

    form input:focus {
        border-color: #007BFF;
        outline: none;
    }

    h1 {
        display: flex;
        justify-content: center;
        color: #333;
        margin-top: 20px;
    }

    form button {
        width: 100%;
        padding: 12px 0;
        font-size: 1.1rem;
        font-weight: 700;
        background-color: #28a745;
        border: none;
        border-radius: 6px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #218838;
    }

    .error-msg {
        color: red;
        font-size: 0.85rem;
        display: block;
        margin-top: 5px;
    }
</style>

<h1>Đăng ký tài khoản</h1>

<form action="<?= BASE_URL . '?action=register' ?>" method="post" onsubmit="return kiemloiRegister()">
    <p>
        <label for="reg_username">Tên đăng nhập</label>
        <input type="text" name="username" id="reg_username">
        <span id="reg_check_username" class="error-msg"></span>
    </p>
    <p>
        <label for="reg_password">Mật khẩu</label>
        <input type="password" name="password" id="reg_password">
        <span id="reg_check_password" class="error-msg"></span>
    </p>
    <p>
        <label for="reg_email">Email (chỉ Gmail)</label>
        <input type="email" name="email" id="reg_email">
        <span id="reg_check_email" class="error-msg"></span>
    </p>
    <button type="submit">Đăng ký</button>
</form>

<script>
    function kiemloiRegister() {
        var result = true;
        var username = document.getElementById('reg_username').value.trim();
        var password = document.getElementById('reg_password').value.trim();
        var email = document.getElementById('reg_email').value.trim();

        var check_username = document.getElementById('reg_check_username');
        var check_password = document.getElementById('reg_check_password');
        var check_email = document.getElementById('reg_check_email');

        if (username === '') {
            check_username.innerHTML = 'Tên đăng nhập không được để trống';
            result = false;
        } else if (username.length < 3 || username.length > 30) {
            check_username.innerHTML = 'Tên đăng nhập từ 3 - 30 kí tự';
            result = false;
        } else { check_username.innerHTML = ''; }

        if (password === '') {
            check_password.innerHTML = 'Mật khẩu không được để trống';
            result = false;
        } else if (password.length < 6 || password.length > 10) {
            check_password.innerHTML = 'Mật khẩu từ 6 - 10 kí tự';
            result = false;
        } else { check_password.innerHTML = ''; }

        var emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        if (email === '') {
            check_email.innerHTML = 'Email không được để trống';
            result = false;
        } else if (!emailRegex.test(email)) {
            check_email.innerHTML = 'Email phải là địa chỉ Gmail!';
            result = false;
        } else { check_email.innerHTML = ''; }

        return result;
    }
</script>