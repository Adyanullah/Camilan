<style>
    .footer {
        display: flex;
        justify-content: center;
        width: 100%;
        height: 375px;
        background-color: #000;
        box-sizing: border-box;
        text-align: left;
        padding: 50px 50px 60px 50px;
        /* margin-top: 80px; */
    }

    .footer h3 {
        color: #fff;
        margin: 0;
        font-weight: bold;
        padding-bottom: 50px;
        font-size: 28px;
    }

    .footer-kiri {
        width: 30%;
        margin-left: 10px;
        display: inline-block;
        vertical-align: top;
        margin: 0px;
    }

    .footer-kiri span {
        color: #E57C23;
    }

    .footer-tengah {
        width: 35%;
        display: inline-block;
        vertical-align: top;
        color: #ffffff;
        vertical-align: middle;
        margin: 0px;
    }

    .footer-tengah img {
        width: 38px;
        height: 38px;
        text-align: center;
        line-height: 42px;
        margin: 10px 15px;
        vertical-align: middle;
    }

    .footer-tengah p {
        display: inline-block;
        color: #ffffff;
        vertical-align: middle;
        margin: 0px;
    }

    .footer-tengah p span {
        display: block;
        font-weight: normal;
        font-size: 24px;
        line-height: 2;
    }

    .footer-kanan {
        width: 30%;
        display: inline-block;
        vertical-align: top;
    }

    .footer-kanan img {
        width: 38px;
        height: 38px;
        text-align: center;
        line-height: 42px;
        margin: 10px 15px;
        vertical-align: middle;
    }

    .tentang {
        font-size: 19px;
        font-weight: normal;
        line-height: 20px;
        color: #DDE6ED;
        padding: 10px;
        border-bottom: 1px solid #fff;
    }

    .tentang span {
        display: block;
        font-size: 21px;
        color: #fff;
        font-weight: bold;
        margin-bottom: 23px;
    }

    .copyright {
        width: 100%;
        height: 60px;
        background-color: #242323;
        text-align: center;
        justify-self: center;
    }

    .copyright .text-copyright {
        color: white;
        padding: 20px;
        font-weight: bold;
        text-align: center;
        margin: auto;
        font-size: 14px;
    }
</style>
</div>
</div>
</div>
<div class="footer" id="tentang">
    <div class="footer-kiri">
        <h3>Toko<span> Camilan</span></h3>
        <h3>RPL-IF4C</h3>
    </div>
    <div class="footer-tengah">
        <div>
            <p><span>Universitas Trunojoyo Madura</span></p>
        </div>
        <div>
            <p>RPL</p>
        </div>
    </div>
    <div class="footer-kanan">
        <p class="tentang">
            <span>Tentang Kami</span>
            Selamat datang di Toko Camilan, .
        </p>
        <form action="logout.php" method="post">
            <button class="btnLogout" name="logout">Logout</button>
        </form>
    </div>
</div>
<div class="copyright">
    <p class="text-copyright">
        ©2024 Toko Camilan. | All Rights Reserved
    </p>
</div>
</body>

</html>