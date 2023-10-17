<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="<?php echo $baseUrl."/public/css/little-mary.css"?>"/>
    </head>
    <body>
        <div>
            <table border="1">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Synopsis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu as $value): ?>
                        <tr>
                            <td><?php echo $value->title ?></td>
                            <td><?php echo $value->synopsis ?></td>
                            <td><img class="img-round" src="<?php echo $baseUrl."/public/image/".$value->banner ?>" alt="alt"/></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div>
            <form method="POST" action="menu-save" enctype="multipart/form-data">
                <input type="hidden" name="id" value="0"><br>
                <label>Title</label>
                <input type="text" name="title" value="title"><br>
                <label>Synopsis</label>
                <input type="text" name="synopsis" value="synopsis"><br>
                <label>Content</label>
                <input type="text" name="content" value="content"><br>
                <label>banner</label>
                <input type="file" name="banner"><br>
                <label>isRoot</label>
                <input type="text" name="isRoot" value="1"><br>
                <label>isSub</label>
                <input type="text" name="isSub" value="1"><br>
                <label>idRoot</label>
                <input type="text" name="idRoot" value="1"><br>
                <button type="submit" >Simpan</button>
            </form>
        </div>
    </body>
</html>

