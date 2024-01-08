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
                            <span class="tx-semi-large tx-bold"><i class="fa fa-table"></i> Post</span>
                        </div>
                        <div class="col-4 align-self-center">
                            <a class="button-link float-right" href="./post/input" class="float-right"><i class="fa fa-plus"></i> Add data</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="separator"></div>

            <div>
                <table class="table-bordered">
                    <thead>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($post as $value): ?>
                            <tr>
                                <td><?php echo $value->rowid ?></td>
                                <td><?php echo $value->post_title ?></td>
                                <td>
                                    <a class="button-link" href="<?php echo $baseUrl?>/post/input?id=<?php echo $value->rowid ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                   <a class="button-link" href="<?php echo $baseUrl?>/post/delete?id=<?php echo $value->rowid ?>">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a> 
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

    </body>
</html>

