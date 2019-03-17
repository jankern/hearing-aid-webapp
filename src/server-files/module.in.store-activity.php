<!-- *******************************************************
Store Activity - Input
******************************************************** -->

<fieldset class="form-horizontal">
    
    <legend>Store Tätigkeit</legend>
    
    <input class="form-control" id="typecode" type="hidden" name="REX_INPUT_VALUE[1]" value="StoreActivity" />
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="activity">Tätigkeit</label>
        <div class="col-sm-10">
            <input type="text" id="activity" class="form-control" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="img">Bild</label>
        <div class="col-sm-10">
            REX_MEDIA[id="1" widget="1"]
        </div>
    </div>
    
    <legend>Unterthemen</legend>
    
    <!-- Thema 1 -->  
    
     <div class="form-group">
        <label class="col-sm-2 control-label" for="subject-1">Thema 1</label>
        <div class="col-sm-10">
            <input type="text" id="subject-1" class="form-control" name="REX_INPUT_VALUE[3]" value="REX_VALUE[3]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="link-1">Kategorie-Link</label>
        <div class="col-sm-4">
            REX_LINK[id="1" widget="1"]
        </div>
         <label class="col-sm-2 control-label" for="status-1">Status</label>
         <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>' ',
                '2'=>'Neu'    
            );
            ?>
            <select name="REX_INPUT_VALUE[4]" id="status-1" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[4]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <!-- Thema 2 -->  
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="subject-2">Thema 2</label>
        <div class="col-sm-10">
            <input type="text" id="subject-2" class="form-control" name="REX_INPUT_VALUE[5]" value="REX_VALUE[5]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="link-2">Kategorie-Link</label>
        <div class="col-sm-4">
            REX_LINK[id="2" widget="1"]
        </div>
         <label class="col-sm-2 control-label" for="status-2">Status</label>
         <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>' ',
                '2'=>'Neu'    
            );
            ?>
            <select name="REX_INPUT_VALUE[6]" id="status-2" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[6]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <!-- Thema 3 -->  
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="subject-3">Thema 3</label>
        <div class="col-sm-10">
            <input type="text" id="subject-3" class="form-control" name="REX_INPUT_VALUE[7]" value="REX_VALUE[7]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="link-3">Kategorie-Link</label>
        <div class="col-sm-4">
            REX_LINK[id="3" widget="1"]
        </div>
         <label class="col-sm-2 control-label" for="status-3">Status</label>
         <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>' ',
                '2'=>'Neu'    
            );
            ?>
            <select name="REX_INPUT_VALUE[8]" id="status-3" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[8]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <!-- Thema 4 -->  
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="subject-4">Thema 4</label>
        <div class="col-sm-10">
            <input type="text" id="subject-4" class="form-control" name="REX_INPUT_VALUE[9]" value="REX_VALUE[9]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="link-4">Kategorie-Link</label>
        <div class="col-sm-4">
            REX_LINK[id="4" widget="1"]
        </div>
         <label class="col-sm-2 control-label" for="status-4">Status</label>
         <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>' ',
                '2'=>'Neu'    
            );
            ?>
            <select name="REX_INPUT_VALUE[10]" id="status-4" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[10]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <!-- Thema 5 -->  
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="subject-5">Thema 5</label>
        <div class="col-sm-10">
            <input type="text" id="subject-5" class="form-control" name="REX_INPUT_VALUE[11]" value="REX_VALUE[11]"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="link-5">Kategorie-Link</label>
        <div class="col-sm-4">
            REX_LINK[id="5" widget="1"]
        </div>
         <label class="col-sm-2 control-label" for="status-5">Status</label>
         <div class="col-sm-4">
            <?php
                $options = array(
                '1'=>' ',
                '2'=>'Neu'    
            );
            ?>
            <select name="REX_INPUT_VALUE[12]" id="status-5" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[12]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
</fieldset>