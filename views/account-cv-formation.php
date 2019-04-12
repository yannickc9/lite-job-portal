<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Ajouter une formation</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-sm-6 p-2">
        <form class="login-form">
            <div class="form-group">
                <label for="formation">Formation</label>
                <input type="text" id="formation" name="formation" class="form-control" placeholder="Nom de la formation">
            </div>
            <div class="form-group">
                <label for="type">Institution</label>
                <input type="text" id="institute" name="institute" class="form-control" placeholder="Ecole, université, académie...">
            </div>
            <div class="form-group">
                <label for="document">Document obtenu</label>
                <?php
                $diploma_manager = new DiplomaManager();
                $diplomas = $diploma_manager->getDiplomas();
                ?>
                <select name="document" id="document" class="form-control">
                    <?php
                    foreach ($diplomas as $diploma) {
                        ?>
                        <option value="<?php echo $diploma->getId(); ?>"><?php echo $diploma->getDesignation(); ?></option>
                    <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Lieu</label>
                <input type="text" id="location" name="location" class="form-control" placeholder="Lieu" />
            </div>
            <div class="form-group">
                <label for="start_date">Début *</label>
                <input type="text" id="start_date" name="start_date" class="form-control" placeholder="Date de début">
            </div>
            <div class="form-group">
                <label for="end_date">Fin</label>
                <input type="text" id="end_date" name="end_date" class="form-control" placeholder="Date de fin">
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ajouter</button>
        </form>
    </div>
</div>