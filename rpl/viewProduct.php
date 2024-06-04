<?php
require_once('Database/base.php');
require_once('Database/database.php');
?>

<?php
$c = 0;
$produk = getDataAllWhere('barang', 'ID_BARANG', $_GET['product']);
$weight = getDataAllWhereIN('ukuran_barang', 'ID_UKURAN', $produk[0]['Ukuran']);
$category = getDataAllWhereIN('kategori', 'ID_KATEGORI', $produk[0]['VARIAN']);
$comment_section = getDataAllJoinWhere('komentar', 'customer', 'ID_CUSTOMER', 'komentar.ID_BARANG', $_GET['product']);
?>
<?php include("templates/navbar.php"); ?>
<style>
    .titleproduk {
        font-family: InterV;
        font-size: 100%;
        font-weight: 600;
        line-height: 24.2px;
        text-align: center;
        height: 50px;
        overflow: hidden;
        padding: 10px;
        text-size-adjust: initial;

        white-space: nowrap;
        text-overflow: ellipsis;
    }


    .produkimg {
        width: 178px;
        height: 144px;
        top: 155px;
        left: 760px;
        gap: 0px;
        border: 1px 0px 0px 0px;
        opacity: 0px;
        border: 1px solid #FFFFFF
    }

    .keranjangstyle-detailproduk {
        display: flex;
        width: 21.4vw;
        height: 7.2889vh;
        justify-content: center;
        align-items: center;
        border: 1px solid #FFFFFF;
        color: #FFF;
        text-align: center;
        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-decoration: none;
    }

    .keranjangstyle-detailproduk:hover {
        color: #FFF;
    }

    .hover-none {
        background-color: transparent;
    }

    .hover-none:hover {
        background-color: transparent;
    }

    select option {
        border-radius: 0;
        background-color: #2F2F2F;
        color: #FFF;
    }

    .description-title-detail-produk {
        display: flex;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
        color: #FFF;
        font-family: Inter;
        font-size: 40px;
        font-style: normal;
        font-weight: 600;
        line-height: normal;
    }

    .description-text-detail-produk {
        flex-shrink: 0;
        color: #FFF;
        font-family: Inter;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .button-comment {
        background-color: transparent;
        width: 8vw;
        height: 5vh;
    }

    .button-submit {
        background-color: transparent;
    }

    .button-submit:hover {
        background-color: #FFF;
        color: #2F2F2F;
    }

    .button-comment:hover {
        background-color: #FFF;
        color: #2F2F2F;
    }
</style>

<div class="image-container">
    <p>the reason you crave camilan</p>
    <div class="pesan">
        <a href="pesan.php">Pesan sekarang</a>
    </div>
</div>
<div class="box_menudesign" style="
    width: 1041px;
    top: 809px;
    left: 199px;
    border: 1px solid #FFFFFF;
    background: #2F2F2F;
    gap: 0px;
    opacity: 0px;
    margin-top:-10vh;
    ">
    <h1 style="margin: 4vh 0 1vh 0; color: white; font-family: 'La Belle Aurore';
        font-size: 70px;
        font-weight: 400;
        line-height: 118.56px;
        text-align: center;
        text-shadow: 4px 7px 4px rgba(0, 0, 0, 0.7);
        margin-top:-7.5vh;
    ">Detail Produk</h1>





    <section>
        <form class="container py-5" action="<?= BASEURL . 'controller/transaksi/insertcart.php'; ?>" method="post">
            <div class="d-flex justify-content-between px-5">
                <div class="d-flex flex-column justify-content-center" style="width: 50%;">
                    <img style="width: 21.4vw; height: 266px; border: 1px white solid" src="<?= BASEURL . 'gambar/produk/' . $produk[0]['FOTO_BARANG']; ?>" />
                    <button class="keranjangstyle-detailproduk mt-5 button-submit" type="submit">
                        Tambah Ke Keranjang
                    </button>
                    <input type="hidden" name="idbarang" value="<?= $produk[0]['ID_BARANG']; ?>">
                    <div class="d-flex keranjangstyle-detailproduk mt-3 me-2" style="border: none;">
                        <select class="keranjangstyle-detailproduk" style="background-color: transparent; height:4.2889vh; width:50%;" name="idukuran">
                            <?php foreach ($weight as $w) : ?>
                                <?php if ($c == 0) : ?>
                                    <option value="<?= $w['ID_UKURAN']; ?>" selected><?= $w['BERAT']; ?>g</option>
                                <?php else : ?>
                                    <option value="<?= $w['ID_UKURAN']; ?>"><?= $w['BERAT']; ?>g</option>
                                <?php endif; ?>
                            <?php $c += 1;
                            endforeach;
                            $c = 0;
                            ?>
                        </select>
                        <select class="keranjangstyle-detailproduk ms-2" style="background-color: transparent; height:4.2889vh; width:50%;" name="idvarian">
                            <?php foreach ($category as $category_item) : ?>
                                <?php if ($c == 0) : ?>
                                    <option value="<?= $category_item['ID_KATEGORI']; ?>" selected><?= $category_item['NAMA_KATEGORI']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $category_item['ID_KATEGORI']; ?>"><?= $category_item['NAMA_KATEGORI']; ?></option>
                                <?php endif; ?>
                            <?php $c += 1;
                            endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-column text-start mx-2" style="width: 50%;">
                    <div class="description-title-detail-produk"><?= $produk[0]['NAMA_BARANG']; ?></div>
                    <div class="description-text-detail-produk mt-4" id="produkdeskripsi"></div>
                </div>
            </div>
        </form>
        <div class="container py-5">
            <div class="px-5 mt-5 pt-4 mb-5">
                <div class="mb-5" style="color: white; font-size: 24px; font-family: Inter; font-weight: 600; word-wrap: break-word">Komentar (<?= count($comment_section); ?>)</div>
                <div class="ms-5 ps-5" style="width: 95%; height: 0px; border: 2px white solid"></div>
            </div>
            <?php if (isset($comment_section)) : ?>
                <?php foreach ($comment_section as $cs) : ?>
                    <div class="d-flex ms-5 ps-5 text-light">
                        <img class="me-3" style="width: 42px; height: 46px; border-radius: 9999px" src="<?= BASEURL . 'gambar/profile/' . $cs['FOTO']; ?>" />
                        <div class="comment-text">
                            <div class="c-title fw-bold"><?= $cs['NAMA_CUSTOMER']; ?></div>
                            <div class="c-text"><?= $cs['ISI_KOMENTAR']; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form action="<?= BASEURL . 'controller/function/comment.php' ?>" method="post" class="pt-5 ps-5 ms-5 text-light">
                <label class="pb-3" for="sesi-komentar">Beri Komentar : </label>
                <?php if (isset($_SESSION['user'])) : ?>
                    <input type="hidden" name="iduser" value="<?= $_SESSION['user']['ID_CUSTOMER']; ?>">
                <?php endif; ?>
                <input type="hidden" name="idbarang" value="<?= $produk[0]['ID_BARANG']; ?>">
                <input type="text-area" name="komentar" style="width: 95%; min-height:10vh;" id="sesi-komentar">
                <div class="d-flex justify-content-end" style="padding-right: 2.8vw;">
                    <?php if (isset($_SESSION['user'])) : ?>
                        <button type=" submit" class="keranjangstyle-detailproduk mt-3 button-comment">Submit</button>
                    <?php else : ?>
                        <a href="<?= BASEURL . 'login.php'; ?>" class="keranjangstyle-detailproduk mt-3 button-comment">Log-in First</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </section>
</div>

<?php include("templates/footer.php") ?>

<script>
    function textToHtml(text) {
        const container = document.createElement('div');

        const paragraphs = text.split('\n');
        paragraphs.forEach(paragraph => {
            const p = document.createElement('p');
            p.textContent = paragraph.trim();
            container.appendChild(p);
        });

        return container.innerHTML;
    }

    const text = `
    <?php echo $produk[0]['Deskripsi']; ?>
        `;

    const htmlOutput = textToHtml(text);
    document.getElementById('produkdeskripsi').innerHTML = htmlOutput;
</script>