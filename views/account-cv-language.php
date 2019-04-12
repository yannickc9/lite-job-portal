<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Ajouter une langue</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-sm-6 p-2">
        <form class="login-form">
            <div class="form-group">
                <label for="type">Langue</label>
                <select name="type" id="type" class="form-control">
                    <?php
                    $languages = Language::ISO_CODE;
                    foreach ($languages as $iso_code => $label) {
                        ?>
                        <option value="<?php echo $iso_code; ?>"><?php echo $label; ?></option>
                    <?php
                }
                ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ajouter</button>
        </form>
    </div>
</div>