<!-- *******************************************************
Aktionseinbindung - Input
******************************************************** -->

<fieldset class="form-horizontal">
    
    <legend>Angebotseinbindung</legend>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="choices">Art der Einbindung</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Artikeleinbindung',
				'2'=>'Link zu Artikel'
			);
			?>
			<select name="REX_INPUT_VALUE[1]" id="choices" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[1]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Angebot</label>
        <div class="col-sm-10">
            REX_LINK[id="1" widget="1"]
        </div>
    </div>
    
</fieldset>