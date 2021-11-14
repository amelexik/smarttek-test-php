<?php if (isset($data['error'])) { ?>
    <p><?php dump($data['error']); ?></p>
<?php } ?>


<?php if (isset($data['result'])) { ?>
    <p><?php dump($data['result']); ?></p>
<?php } ?>


<div class="container">
    <h1>Simple app</h1>
    <form action="/" method="post" enctype="multipart/form-data">
        <input name="csv" type="file"><br>
        <button type="submit">upload</button>
    </form>
</div>