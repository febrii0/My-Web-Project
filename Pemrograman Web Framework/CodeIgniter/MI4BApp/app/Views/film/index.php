<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <h1>Data Film</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama Film</th>
            <th>Genre</th>
            <th>Durasi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($data_film as $row) : ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['nama_film'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td><?= $row['duration']?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>