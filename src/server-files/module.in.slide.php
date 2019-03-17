<!-- *******************************************************
SLIDESHOW MIT PANORAMA-MODAL - Input
******************************************************** -->

<fieldset class="form-horizontal">
    <legend>Slideshow mit Ponorama-Modal</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Slide-Bilder</label>
		<div class="col-sm-10">
            REX_MEDIALIST[id="1" widget="1"]
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="slidenav">Slide-Navigation zeigen?</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Ja',
                '2'=>'Nein'
            );
            ?>
            <select name="REX_INPUT_VALUE[1]" id="slidenav" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[1]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="slidelink">Panorama-Link zeigen?</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Ja',
                '2'=>'Nein'
            );
            ?>
            <select name="REX_INPUT_VALUE[2]" id="slidelink" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[2]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <script type="text/javascript">
        jQuery(function($){
            $(document).ready(function(){
                $('select#slidelink').change(function() {
                    if($(this).val() == '2'){
                        $('input#modallink').prop( "disabled", true );
                    }else{
                        $('input#modallink').prop( "disabled", false );
                    }

                });
            })
        });
    </script>

	<div class="form-group">
        <label class="col-sm-2 control-label" for="modallink">Panorama-Link</label>
        <div class="col-sm-10">
            <input class="form-control" id="modallink" type="text" name="REX_INPUT_VALUE[3]" value="REX_VALUE[3]" />
        </div>
    </div>

</fieldset>