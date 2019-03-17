<!-- *******************************************************
Aktion - Input
******************************************************** -->

<fieldset class="form-horizontal">
    
    <legend>Angebot</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Titel</label>
        <div class="col-sm-10">
            <input class="form-control" id="headline" type="text" name="REX_INPUT_VALUE[1]" value="REX_VALUE[1]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="subtitle">Subtitel</label>
        <div class="col-sm-10">
            <input class="form-control" id="subtitle" type="text" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="picturemode">Ausrichtung Titel</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Links',
                '2'=>'Mitte'
            );
            ?>
            <select name="REX_INPUT_VALUE[3]" id="picturemode" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[3]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_1">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[4]">REX_VALUE[4]</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Bild</label>
        <div class="col-sm-10">
            REX_MEDIA[id="1" widget="1"]
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="picturemode">Ausrichtung Text</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Links',
                '2'=>'Mitte'
            );
            ?>
            <select name="REX_INPUT_VALUE[5]" id="picturemode" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[5]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="campaigntype">Formular-Typ</label>
        
        <?php 
    
            // establish data base connection
            $dbTable = rex_sql::factory();
            $campaignTypes = array();
                
            // get the campaign name
            try {
                $campaignTypes = $dbTable->getArray("SELECT * FROM rex_concam_campaign"); 
                
            } catch (rex_sql_exception $e) {
                $error = $e->getMessage();
            }
               
            $campaignTypesOptions = array();
            foreach($campaignTypes as $key => $value){
                $campaignTypesOptions[$value['id']] = $value['name'];
            }
        ?>
        
        <div class="col-sm-10">
            <select name="REX_INPUT_VALUE[6]" id="campaigntype" class="form-control">
            <?php foreach ($campaignTypesOptions as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[6]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="assignment">Formular-Zuordnung</label>
        <div class="col-sm-10">
            <input class="form-control" id="assignment" type="text" name="REX_INPUT_VALUE[7]" value="REX_VALUE[7]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="bottom-space">Abstand unten</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'ja',
                '2'=>'nein'
            );
            ?>
            <select name="REX_INPUT_VALUE[8]" id="bottom-space" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[8]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
</fieldset>