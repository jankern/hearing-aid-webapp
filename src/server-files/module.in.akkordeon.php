<!-- *******************************************************
TABS/AKKORDEON-BEREICH - EINGABE
******************************************************** -->

<fieldset class="form-horizontal">
    <legend>Akkordeon/Tabs-Bereich (Eingabe)</legend>
    
    <input class="form-control" id="typecode" type="hidden" name="REX_INPUT_VALUE[1]" value="AkkordeonTab" />
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="types">Typ</label>
        <div class="col-sm-10">
			<?php
				$options = array(
                    '1'=>'Akkordeon',
                    '2'=>'Tab'
			     );
			?>
			<select name="REX_INPUT_VALUE[2]" id="types" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			 <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[2]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Überschrift</label>
        <div class="col-sm-10">
            <input class="form-control" id="headline" type="text" name="REX_INPUT_VALUE[3]" value="REX_VALUE[3]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Bild</label>
        <div class="col-sm-10">
            REX_MEDIA[id="1" widget="1"]
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[4]">REX_VALUE[4]</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Ausgewählt</label>
        <div class="col-sm-10">
			<?php
				$options = array(
                    '1'=>'Nein',
                    '2'=>'Ja'
			     );
			?>
			<select name="REX_INPUT_VALUE[5]" id="types" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			 <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[5]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>

</fieldset>