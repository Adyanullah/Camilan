<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebsiteCamilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASEURL . 'css/style.css' ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<style>
    nav {
        width: 80%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100px;
    }

    nav ul {
        list-style: none;
        display: flex;
        padding-left: 20px;
        gap: 20px;
        margin: 0;
    }

    nav a {
        text-decoration: none;
        color: whitesmoke;
        font-size: 18px;
        transition: color 0.5s;
        padding: 10px 20px;
    }

    nav a:hover {
        color: whitesmoke;
        border-bottom: 4px solid whitesmoke;
        transition: 0.2s;
    }

    .logo {
        margin-right: 40px;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bold;
        font-size: 24px;
        color: whitesmoke;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .navbar {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: center;
        top: 0;
        position: sticky;
        background-color: #000000;
    }
</style>
<script>
    <?php if (isset($_SESSION['status'])) : ?>
        alert("<?= $_SESSION['status'] ?>");
    <?php
        unset($_SESSION['status']);
    endif;
    ?>
</script>

<body>
    <div class="navbar" style="z-index: 1000;">
        <nav>
            <div>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <a href="<?= BASEURL . 'login.php' ?>">Sign In</a>
                <?php else : ?>
                    <a href="<?= BASEURL ?>./autentikasi/logout.php">Sign Out</a>
                <?php endif; ?>
            </div>
            <div>
                <ul>
                    <li><a href="<?= BASEURL . 'index.php' ?>">Home</a></li>
                    <li><a href="<?= BASEURL . 'menu.php' ?>">Menu</a></li>
                    <li><a href="<?= BASEURL . 'contact.php' ?>">Contact</a></li>
                    <li><a href="<?= BASEURL . 'keranjang.php' ?>">Keranjang</a></li>
                    <li><a>About Us</a></li>
                    <li><a href="<?= BASEURL . 'admin/index.php' ?>">Halaman Admin</a></li>
                </ul>
            </div>
            <div class="logo" id="balik">
                <div class="d-flex justify-content-end align-items-center" style="width: 10vw;">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <a href="<?= BASEURL . 'profile' ?>"><img class="mx-2" style="width: 52px; height: 52px; border-radius: 9999px" src="<?= BASEURL . 'gambar/profile/' . $_SESSION['user']['FOTO'] ?>" /></a>
                    <?php endif; ?>
                    <img class="mx-2" style="width: 52px; height: 72px;" src="<?= BASEURL . 'gambar/Logo.png' ?>" />
                </div>
            </div>
        </nav>
    </div>