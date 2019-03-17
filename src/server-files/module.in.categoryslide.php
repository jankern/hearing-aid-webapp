<!-- *******************************************************
Kategorien-Slideshow (Medialink) - Input
******************************************************** -->

<fieldset class="form-horizontal">
    
    <script type="text/javascript">
            jQuery(function($){
                $(document).ready(function(){
                    
                    $('select#picturemode').change(function() {
                        console.log($(this).val());
                        if($(this).val() == '1'){
                            $('#placeholder').show();
                        }else{
                            $('#placeholder').hide(); 
                        }
                    });
                    
                    if($('select#picturemode').val() == '1'){
                        console.log($(this).val());
                        $('#placeholder').show();
                    }else{
                        $('#placeholder').hide();
                    }
                    
                });
            });
    </script>
    
    <legend>Kategorie-Slideshow</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Slide-Bilder</label>
		<div class="col-sm-10">
            REX_MEDIALIST[id="1" widget="1"]
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="picturemode">Bildmodus</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Als Navigation',
                '2'=>'Als Hintergrund'
            );
            ?>
            <select name="REX_INPUT_VALUE[1]" id="picturemode" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[1]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
    <div class="form-group" id="placeholder">
        <label class="col-sm-2 control-label" for="REX_MEDIA_1">Platzhalter</label>
		<div class="col-sm-10">
            REX_MEDIA[id="1" widget="1"]
        </div>
    </div>
    
    

</fieldset>