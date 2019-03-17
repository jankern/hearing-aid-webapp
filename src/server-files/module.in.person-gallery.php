<!-- *******************************************************
Store Personen-Galerie - Input
******************************************************** -->

<fieldset class="form-horizontal">
    <legend>Personen-Galerie</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="title">Titel</label>
		<div class="col-sm-10">
            <input class="form-control" type="text" name="REX_INPUT_VALUE[1]" value="REX_VALUE[1]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Gallerie-Bilder</label>
		<div class="col-sm-10">
            REX_MEDIALIST[id="1" widget="1"]
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="slidenav">Rahmenform</label>
        <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>'Rund',
                '2'=>'Eckig'
            );
            ?>
            <select name="REX_INPUT_VALUE[2]" id="slidenav" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[2]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
        <label class="col-sm-2 control-label" for="slidelink">Ausrichtung</label>
        <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>'Links',
                '2'=>'Mitte',
                '3'=>'Rechts'
            );
            ?>
            <select name="REX_INPUT_VALUE[3]" id="slidelink" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[3]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>

</fieldset>