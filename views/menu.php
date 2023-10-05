<html>
    <head>
        <title>title</title>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div>
            <form method="POST" action="menu-save" enctype="application/x-www-form-urlencoded">
                <input type="hidden" name="id" value="0"><br>
                <label>Title</label>
                <input type="text" name="title"><br>
                <label>Synopsis</label>
                <input type="text" name="synopsis"><br>
                <label>Content</label>
                <input type="text" name="content"><br>
                <label>banner</label>
                <input type="text" name="banner"><br>
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

