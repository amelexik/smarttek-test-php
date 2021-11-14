<?php if (isset($data['error'])) { ?>
    <p><?php dump($data['error']); ?></p>
<?php } ?>


<h1>Statistic</h1>
<?php if (isset($data['result']) && !empty($data['result'])) { ?>
    <table style="width: 100%">
        <thead>
        <th>1</th>
        <th>1</th>
        <th>1</th>
        <th>1</th>
        <th>1</th>
        </thead>
        <tbody>
        <?php foreach ($data['result'] as $row) { ?>
            <tr>
                <?php foreach ($row as $cell) { ?>
                    <td><?php echo $cell; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <p>There are not available statistic. Please upload File using form bellow</p>
<?php } ?>


<div class="container">
    <h1>Upload call history</h1>
    <form action="/" method="post" enctype="multipart/form-data">
        <input name="csv" type="file"><br>
        <button type="submit">upload</button>
    </form>
</div>