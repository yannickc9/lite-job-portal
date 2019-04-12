<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Ajouter une connaissance en informatique</h1>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="col-sm-6 p-2">
        <form class="login-form">
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control">
                <?php
                $types = ComputerKnowledge::TYPES;
                foreach ($types as $type => $designation) {
                    ?>
                    <option value="<?php echo $type; ?>"><?php echo $designation; ?></option>
                    <?php
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="skill">Connaissance</label>
                <input type="text" id="skill" name="skill" class="form-control" placeholder="Connaissance">
            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Ajouter</button>
        </form>
    </div>
</div>