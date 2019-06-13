<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Form Fitur</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Hasil Form Fitur</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:10%">No</th>
                    <th style="width:25%">Nama</th>
                    <th style="width:65%">Fitur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fitur as $row) : ?>
                    <tr>
                        <th><?= $i++ ?></th>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['fitur'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</body>

</html>