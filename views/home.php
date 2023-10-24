<html>
    <head>
        <title>Little Mary Framework</title>
        <link rel="stylesheet" href="<?php echo $baseUrl . "/public/css/little-mary.css" ?>"/>
    </head>
    <body>
        <?php include_once "./views/decorator/navbar.php"; ?>
        <div class="side-nav-container">
            <label id="text"></label>
            <table class="table-minimal" border="1">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mulyadi</td>
                        <td>Pondok prasi</td>
                    </tr>
                    <tr>
                        <td>iwan</td>
                        <td>ragunan</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
