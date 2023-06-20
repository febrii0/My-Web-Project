<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 11</title>
</head>
<body>
    <h1>Data Genre</h1>
    <table border="1" cellspacing="10" cellpadding="5">
        <tr>
            <th>NO</th>
            <th>Nama Genre</th>
            <th>Created at</th>
            <th>Update at</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($v_genre as $genre) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?php echo $genre['nama_genre'] ?></td>
                <td><?= $genre['created_at'] ?></td>
                <td><?= $genre['updated_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table> 
</body>
</html>