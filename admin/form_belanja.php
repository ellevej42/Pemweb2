<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container mt-4">
        <h3>Form Belanja</h3>
        <hr>

        <?php
            $customer = "";
            $produk = "";
            $jumlah = "";
            $total = 0;
            $ar_prices = [
                "Televisi" => 4200000,
                "Kulkas" => 3100000,
                "Mesin Cuci" => 3800000
            ];
        ?>

        <form method="post" action="">
            <div class="form-group row">
                <label for="customer" class="col-4 col-form-label">Customer</label> 
                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-address-card"></i>
                            </div>
                        </div> 
                        <input id="customer" name="customer" type="text" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4">Produk Pilihan</label> 
                <div class="col-8">
                    <?php foreach ($ar_prices as $key => $value) { ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="produk" id="produk_<?php echo $key; ?>" type="radio" class="custom-control-input" value="<?php echo $key; ?>" required> 
                            <label for="produk_<?php echo $key; ?>" class="custom-control-label"><?php echo $key; ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
                <div class="col-8">
                    <input id="jumlah" name="jumlah" type="number" class="form-control" min="1" required>
                </div>
            </div> 

            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <hr>
        <h4>Hasil Input Data Pembelian Produk</h4>
        <br>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $customer = $_POST['customer'];
                $produk = $_POST['produk'];
                $jumlah = $_POST['jumlah'];

                if (isset($ar_prices[$produk]) && is_numeric($jumlah)) {
                    $total = $ar_prices[$produk] * $jumlah;
                }
        ?>
        <p>Nama Customer : <strong><?php echo htmlspecialchars($customer); ?></strong></p>
        <p>Produk Pilihan : <strong><?php echo htmlspecialchars($produk); ?></strong></p>
        <p>Jumlah Beli : <strong><?php echo htmlspecialchars($jumlah); ?></strong></p>
        <p>Total Belanja : <strong>Rp. <?php echo number_format($total, 0, ',', '.'); ?></strong></p>
        <?php } ?>
        <div class="col-md-4">
                <div class="card position-fixed" style="bottom: 300px; left: 950px; width: 18rem;">
                    <div class="card-header bg-primary text-white">Daftar Harga</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Televisi : Rp. 4.200.000</li>
                        <li class="list-group-item">Kulkas : Rp. 3.100.000</li>
                        <li class="list-group-item">Mesin Cuci : Rp. 3.800.000</li>
                        <li class="list-group-item bg-primary text-white">Harga Dapat Berubah Setiap Saat</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
