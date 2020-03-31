<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style type="text/css">
        table {
            border: 1px solid #e3e3e3;
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
            margin: 0 auto;
            width: 100%;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <center>
    <h3>Transaction Data</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tenant Name</th>
                    <th>Room Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($transaksi as $trn) :
                    $tglSewa = $trn->tgl_sewa;
                    $tgl_sewa = date("d-m-Y", strtotime($tglSewa));
                    $tanggalKembaliPinjam = $trn->tgl_checkout;
                    $tgl_checkout = date("d-m-Y", strtotime($tanggalKembaliPinjam));
                    // if ($trn->$tgl_checkout == 'None') {
                    //     $tgl_checkoutnya = $trn->$tgl_checkout;
                    // } else {
                    //     $tanggalDikembalikann = $trn->$tgl_checkout;
                    //     $tanggal_dikembalikannya = date("d-m-Y", strtotime($tanggalDikembalikann));
                    // }
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $trn->nama_penyewa; ?></td>
                        <td><?= $trn->nama_kamar; ?></td>
                        <td><?= $tgl_sewa; ?></td>
                        <td><?= $tgl_checkout; ?></td>
                        <td><?= $trn->status; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>
</html>