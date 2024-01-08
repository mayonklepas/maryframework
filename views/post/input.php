<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="<?php echo $baseUrl . "/public/css/little-mary.css" ?>"/>
    </head>
    <body>

        <?php include_once "./views/decorator/navbar.php"; ?>

        <div class="side-nav-container">

            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-8 align-self-center">
                                    <span class="tx-semi-large tx-bold"><i class="fa fa-edit"></i> Input Post</span>
                                </div>
                                <div class="col-4 align-self-center">
                                    <a class="button-link float-right" href="<?php echo $baseUrl ?>/post" class="float-right">
                                        <i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator"></div>            
            <div class="row">
                <div class="col-12">
                    <div class="box-material">
                        <div class="box-body">
                            <form method="POST" action="<?php echo $baseUrl ?>/post/save" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo ($detail == null) ? 0 : $detail->rowid ?>"><br>
                                <label>Judul</label>
                                <input type="text" name="postTitle" value="<?php echo ($detail == null) ? "" : $detail->post_title ?>"><br>
                                <label>Gambar / Video Banner</label>
                                <input type="file" name="banner" ><br>
                                <textarea style="height: 700px" name="postContent"><?php echo ($detail == null) ? "" : $detail->post_content ?></textarea><br>

                                <button> Simpan </button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</body>
</html>

