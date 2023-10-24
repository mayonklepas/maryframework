<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="<?php echo $baseUrl . "/public/css/little-mary.css" ?>"/>
    </head>
    <body>

        <?php include_once "./views/decorator/navbar.php"; ?>

        <div class="side-nav-container">

            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-8 align-self-center">
                             <span class="tx-semi-large tx-bold"><i class="fa fa-table"></i> Menu</span>
                        </div>
                        <div class="col-4 align-self-center">
                            <a class="button-link float-right" href="./menu/input" class="float-right"><i class="fa fa-plus"></i> Add data</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="separator"></div>

            <div>
                <table class="table-bordered">
                    <thead>
                    <th>Title</th>
                    <th>Synopsis</th>
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

        </div>

    </body>
</html>

