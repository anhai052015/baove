<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HaiAn Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #e4e5e6;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav {
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link {
            padding: 10px 15px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background-color: #0d6efd;
            color: white !important;
            border-radius: 5px;
        }

        .nav-logo {
            height: 35px;
            margin-right: 8px;
            border-radius: 50%;
            transition: filter 0.3s ease;
        }

        .navbar-nav .nav-item:hover .nav-logo {
            filter: brightness(0) saturate(100%) invert(36%) sepia(100%) saturate(1300%) hue-rotate(201deg) brightness(93%) contrast(101%);
        }

        .btn-outline-primary {
            transition: 0.3s;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }

        .welcome {
            margin: 10px;
            color: green;
            font-weight: 500;
        }

        .full-width-banner {
            width: 100%;
            margin: 0;
            padding: 0;
            display: block;
        }

        .full-width-banner img {
            width: 100%;
            height: auto;
            display: block;
        }

        .container-content {
            flex: 1 0 auto;
            margin-top: 20px;
            margin-bottom: 50px;
            width: 100%;
        }

        .custom-footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            color: #555;
            font-size: 14px;
            margin-top: auto;
            width: 100%;
        }

        .footer-top-bar {
            background-color: #222;
            color: white;
            font-weight: bold;
            padding: 12px 0;
            border-top: 4px solid #dc3545;
            letter-spacing: 1px;
        }

        .footer-social-bar {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
            text-align: center;
            background-color: #f1f2f3;
        }

        .footer-social-bar a {
            display: inline-block;
            margin: 0 15px;
            color: #666;
            font-size: 24px;
            transition: 0.3s;
        }

        .footer-social-bar a:hover {
            color: #0d6efd;
            transform: scale(1.1);
        }

        .footer-main {
            padding: 40px 0;
        }

        .footer-col h6 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
            letter-spacing: 0.5px;
        }

        .footer-col p,
        .footer-col ul {
            margin-bottom: 12px;
            line-height: 1.8;
            list-style: none;
            padding-left: 0;
        }

        .footer-col a {
            color: #555;
            text-decoration: none;
            transition: 0.2s;
        }

        .footer-col a:hover {
            color: #0d6efd;
            text-decoration: underline;
        }

        .footer-bottom {
            background-color: #e9ecef;
            padding: 15px 0;
            border-top: 1px solid #ddd;
            font-size: 13px;
            color: #777;
        }

        .bct-logo {
            width: 140px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-xxl bg-light justify-content-between">
        <div class="container mp-4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <img src="assets/uploads/img_ao/loogoo.jpg" alt="Logo HaiAn Store" class="nav-logo">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>Trang Chủ</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="<?= BASE_URL . '?action=into_admin' ?>"><b>Quản trị</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="<?= BASE_URL . '?action=lienhe' ?>"><b>Liên hệ</b></a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <?php
                $cart_count = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $cart_count += $item['quantity'];
                    }
                }
                ?>
                <a href="<?= BASE_URL . '?action=cart' ?>" class="btn btn-outline-dark position-relative fw-bold me-3">
                    <i class="fas fa-shopping-cart"></i> Giỏ hàng
                    <?php if ($cart_count > 0): ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?= $cart_count ?>
                        </span>
                    <?php endif; ?>
                </a>

                <div class="btn-group" role="group">
                    <?php if (isset($_SESSION['user'])) { ?>
                        <p class="welcome">Chào mừng <?= $_SESSION['user'] ?></p>
                        <a href="<?= BASE_URL . '?action=logout' ?>" class="btn btn-outline-danger ms-3">Đăng xuất</a>
                    <?php } else { ?>
                        <a href="<?= BASE_URL . '?action=login' ?>" class="btn btn-outline-primary">Đăng nhập</a>
                        <a href="<?= BASE_URL . '?action=register' ?>" class="btn btn-outline-success ms-2">Đăng ký</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="full-width-banner">
        <a href="#">
            <img src="<?= BASE_URL ?>assets/uploads/banner.jpg" alt="Sale Đỉnh Nóc">
        </a>
    </div>

    <div class="container container-content">
        <?php if (isset($message)) { ?>
            <div class="alert alert-info mt-3 text-center"><?= $message ?></div>
        <?php } ?>

        <?php if (isset($_SESSION['msg'])) { ?>
            <div class="alert alert-warning mt-3 text-center fw-bold">
                <?= $_SESSION['msg'] ?>
                <?php unset($_SESSION['msg']); ?>
            </div>
        <?php } ?>

        <div class="row">
            <?php
            if (isset($view) && !empty($view)) {
                require_once PATH_VIEW . $view . '.php';
            }
            ?>
        </div>
    </div>

    <footer class="custom-footer">
        <div class="footer-top-bar">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6">SẢN PHẨM CHẤT LƯỢNG</div>
                    <div class="col-md-6 border-start border-secondary">GIAO HÀNG TIẾT KIỆM</div>
                </div>
            </div>
        </div>

        <div class="footer-social-bar">
            <a href="#"><i class="fab fa-facebook" style="color: #3b5998;"></i></a>
            <a href="#"><i class="fab fa-instagram" style="color: #e1306c;"></i></a>
            <a href="#"><i class="fab fa-youtube" style="color: #ff0000;"></i></a>
            <span class="mx-3 text-muted">|</span>
            <i class="fab fa-cc-visa fs-3 mx-2 text-primary"></i>
            <i class="fab fa-cc-mastercard fs-3 mx-2 text-danger"></i>
            <i class="fab fa-cc-paypal fs-3 mx-2 text-info"></i>
        </div>

        <div class="container footer-main">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-col mb-4">
                    <h6>HAIAN STORE</h6>
                    <p>Địa chỉ: Long Biên, Hà Nội</p>
                    <p>Điện thoại: <a href="tel:0928538410">0928 538 410</a></p>
                    <p>Số ĐKKD: 0107756180</p>
                    <p>Ngày cấp: 10/03/2026</p>
                    <p>Nơi cấp: Sở kế hoạch và đầu tư Hà Nội</p>
                    <p>Email: <a href="mailto:tymhaian@gmail.com">tymhaian@gmail.com</a></p>
                    <img src="https://thongbaobocongthuong.com/wp-content/uploads/2020/02/logo-da-thong-bao-bo-cong-thuong-mau-xanh.png"
                        alt="Bộ Công Thương" class="bct-logo">
                </div>

                <div class="col-lg-2 col-md-6 footer-col mb-4">
                    <h6>THƯƠNG HIỆU</h6>
                    <ul>
                        <li><a href="#">Chúng tôi là ai?</a></li>
                        <li><a href="#">Dự án cộng đồng</a></li>
                        <li><a href="#">Tin tức</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-col mb-4">
                    <h6>DỊCH VỤ KHÁCH HÀNG</h6>
                    <ul>
                        <li><a href="#">Chăm sóc khách hàng</a></li>
                        <li><a href="#">FAQs - Hỏi đáp</a></li>
                        <li><a href="#">Hướng dẫn mua hàng/ thanh toán</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách vận chuyển</a></li>
                        <li><a href="#">Chính sách bảo mật thông tin</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-col mb-4">
                    <h6>LIÊN HỆ</h6>
                    <ul>
                        <li><a href="#">Hệ thống cửa hàng</a></li>
                        <li><a href="#">Hotline: 0928 538 410</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center">
            <div class="container d-flex flex-wrap justify-content-between align-items-center">
                <span>&copy; 2026 HaiAn Store. All rights reserved.</span>
                <div>
                    <a href="#" class="text-muted text-decoration-none mx-2">Tìm kiếm</a> |
                    <a href="#" class="text-muted text-decoration-none mx-2">Chính sách đổi hàng</a> |
                    <a href="#" class="text-muted text-decoration-none mx-2">Chính sách bảo mật</a>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>