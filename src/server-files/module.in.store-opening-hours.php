<!-- *******************************************************
Store Opening Hours - Input
******************************************************** -->

<fieldset class="form-horizontal">
    
    <legend>Store-Öffnungszeiten</legend>
    
    <input class="form-control" id="typecode" type="hidden" name="REX_INPUT_VALUE[1]" value="StoreOpeningHours" />
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Titel</label>
        <div class="col-sm-10">
             <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[10]" value="REX_VALUE[10]"/>
        </div>
    </div>
    
    <?php
        $options = array(
            '0'=>' ',
            '48'=>'00:00','1'=>'00:30',
            '2'=>'01:00','3'=>'01:30',
            '4'=>'02:00','5'=>'02:30',
            '6'=>'03:00','7'=>'03:30',
            '8'=>'04:00','9'=>'04:30',
            '10'=>'05:00','11'=>'05:30',
            '12'=>'06:00','13'=>'06:30',
            '14'=>'07:00','15'=>'07:30',
            '16'=>'08:00','17'=>'08:30',
            '18'=>'09:00','19'=>'09:30',
            '20'=>'10:00','21'=>'10:30',
            '22'=>'11:00','23'=>'11:30',
            '24'=>'12:00','25'=>'12:30',
            '26'=>'13:00','27'=>'13:30',
            '28'=>'14:00','29'=>'14:30',
            '30'=>'15:00','31'=>'15:30',
            '32'=>'16:00','33'=>'16:30',
            '34'=>'17:00','35'=>'17:30',
            '36'=>'18:00','37'=>'18:30',
            '38'=>'19:00','39'=>'19:30',
            '40'=>'20:00','41'=>'20:30',
            '42'=>'21:00','43'=>'21:30',
            '44'=>'22:00','45'=>'22:30',
            '46'=>'23:00','47'=>'23:30'
        );
    ?>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Mo-Fr</label>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[2]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[2]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[3]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[3]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            - 
        </div>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[4]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[4]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[5]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[5]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Sa</label>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[6]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[6]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[7]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[7]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            - 
        </div>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[8]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[8]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-sm-2">
            <select name="REX_INPUT_VALUE[9]" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[9]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    
    

</fieldset>