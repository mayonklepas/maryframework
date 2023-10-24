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
                            <span class="tx-semi-large tx-bold"><i class="fa fa-edit"></i> Input Menu</span>
                        </div>
                        <div class="col-4 align-self-center">
                            <a class="button-link float-right" href="./menu/input" class="float-right"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator"></div>

            <div class="row">
                <div class="col-6">
                    <div class="box-material">
                        <div class="box-body">
                            <div class="tx-semi-large tx-bold"><i class="fa fa-edit"></i> Input Menu<div>
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

                            </div>

                        </div>
                    </div>

                </div>
                
                <div class="col-6">
                    <div class="box-material">
                        <div class="box-body">
                            <div class="tx-semi-large tx-bold"><i class="fa fa-asterisk"></i> Input Note<div>
                                   
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
    </body>
</html>

