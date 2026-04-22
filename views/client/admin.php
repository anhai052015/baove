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
    form input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        font-size: 1rem;
        border: 1.5px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        /* Giúp input không bị tràn viền */
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
        background-color: #007BFF;
        border: none;
        border-radius: 6px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #0056b3;
    }

    .error-msg {
        color: red;
        font-size: 0.85rem;
        display: block;
        margin-top: 5px;
    }
</style>

<h1>Đăng nhập tư cách Admin</h1>

<form action="<?= BASE_URL . '?action=admin' ?>" method="post" onsubmit="return kiemloiform()">
    <p>
        <label for="adminname">Tên đăng nhập</label>
        <input type="text" name="adminname" id="adminname">
        <span id="check_adminname" class="error-msg"></span>
    </p>
    <p>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password">
        <span id="check_password" class="error-msg"></span>
    </p>
    <button type="submit">Đăng nhập</button>
</form>

<script>
    function kiemloiform() {
        var result = true;
        var adminname = document.getElementById('adminname').value.trim();
        var password = document.getElementById('password').value.trim();

        var check_adminname = document.getElementById('check_adminname');
        var check_password = document.getElementById('check_password');

        // Kiểm tra Tên đăng nhập
        if (adminname === '') {
            check_adminname.innerHTML = 'Tên đăng nhập không được để trống';
            result = false;
        } else if (adminname.length < 3 || adminname.length > 30) {
            check_adminname.innerHTML = 'Tên đăng nhập phải từ 3 - 30 kí tự';
            result = false;
        } else {
            check_adminname.innerHTML = '';
        }

        // Kiểm tra Mật khẩu
        if (password === '') {
            check_password.innerHTML = 'Mật khẩu không được để trống';
            result = false;
        } else if (password.length < 6 || password.length > 10) {
            check_password.innerHTML = 'Mật khẩu phải từ 6 - 10 kí tự';
            result = false;
        } else {
            check_password.innerHTML = '';
        }

        return result;
    }
</script>