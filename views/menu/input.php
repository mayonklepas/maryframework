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
                            <a class="button-link float-right" href="<?php echo $baseUrl ?>/menu" class="float-right"><i class="fa fa-arrow-left"></i> Back</a>
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
                                    <form method="POST" action="<?php echo $baseUrl ?>/menu/save" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="0"><br>
                                        <label>Nama</label>
                                        <input type="text" name="menuName" value="<?php echo $detail->menu_name ?>"><br>
                                        <label>Deskripsi</label>
                                        <input type="text" name="menuDesc" value="<?php echo $detail->menu_desc ?>"><br>
                                        <label>Gambar / Video Banner</label>
                                        <input type="file" name="banner" ><br>
                                        <label>Jadilan Sub Menu</label>
                                        <select name="isSub" value="<?php echo $detail->is_sub ?>">
                                            <option value="0">Tidak</option>
                                            <option value="1">Ya</option>
                                        </select>
                                        <label>Main Menu</label>
                                        <select name="idRoot" value="<?php echo $detail->id_root ?>">
                                            <option value=""</option>
                                            <?php foreach ($menu as $value): ?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->menu_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button> Simpan </button>
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

