<!-- *******************************************************
Cards - Input
******************************************************** -->

<fieldset class="form-horizontal">
    <legend>Cards</legend>
    
    <input class="form-control" id="typecode" type="hidden" name="REX_INPUT_VALUE[1]" value="Card" />
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Titel</label>
        <div class="col-sm-10">
            <input class="form-control" id="headline" type="text" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Untertitel</label>
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
        <label class="col-sm-2 control-label" for="markitup_textile_1">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[4]">REX_VALUE[4]</textarea>
        </div>
    </div>
    

    <div class="form-group">
        <label class="col-sm-2 control-label" for="color">Schriftfarbe auf Bild</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Hell',
                '2'=>'Dunkel'
            );
            ?>
            <select name="REX_INPUT_VALUE[5]" id="color" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[5]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label" for="height">Card-Größe</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'1/3 Spalte',
                '2'=>'1/3 Spalte medium',
                '3'=>'1/3 Spalte lang',
                '4'=>'1/2 Spalte',
                '5'=>'1/2 Spalte medium',
                '6'=>'1/2 Spalte lang'
                );
            ?>
            <select name="REX_INPUT_VALUE[6]" id="height" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[6]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    
     <script type="text/javascript">
            jQuery(function($){
                $(document).ready(function(){
                    
                    var changeValue = function(mode){
                        
                        console.log('mode '+mode);
                        if(mode == '1'){
                            $('#articlereference-group').hide();
                            $('#articlereference-group').find('input').val('');
                            $('#externallink-group').hide();
                            $('#externallink-group').find('input').val('');
                        }else if(mode == '2'){
                            $('#articlereference-group').show();
                            $('#externallink-group').hide();
                            $('#externallink-group').find('input').val('');    
                        }else{
                            $('#articlereference-group').hide();
                            $('#articlereference-group').find('input').val('');
                            $('#externallink-group').show();
                        }
                    }
                    
                    $('select#linktype').change(function() {
                        console.log('mode val '+$(this).val());
                        changeValue($(this).val());
                    });
                    
                    
                    changeValue($('select#linktype').val());
                    
                });
            });
    </script>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="linktype">Link-Typ</label>
        <div class="col-sm-10">
            <?php
                $options = array(
                '1'=>'Kein Button-Link',
                '2'=>'Artikel-Referenz einfügen',
                '3'=>'Externen Link einfügen'
                );
            ?>
            <select name="REX_INPUT_VALUE[7]" id="linktype" class="form-control">
            <?php foreach ($options as $k=>$v) : ?>
            <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[7]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>

    <div class="form-group" id="articlereference-group">
        <label class="col-sm-2 control-label">Artikel-Referenz</label>
        <div class="col-sm-4">
            REX_LINK[id="1" widget="1"]
        </div>
        <label class="col-sm-2 control-label" for="referencedescription">Referenzbez.</label>
        <div class="col-sm-4">
            <input class="form-control" id="referencedescription" type="text" name="REX_INPUT_VALUE[8]" value="REX_VALUE[8]" />
        </div>
    </div>

    <div class="form-group" id="externallink-group">
        <label class="col-sm-2 control-label" for="externallink">Externer Link</label>
        <div class="col-sm-4">
            <input class="form-control" id="externallink" placeholder="http://www.domain.de" type="text" name="REX_INPUT_VALUE[9]" value="REX_VALUE[9]" />
        </div>
        <label class="col-sm-2 control-label" for="linkdescription">Linkbezeichnung</label>
        <div class="col-sm-4">
            <input class="form-control" id="linkdescription" type="text" name="REX_INPUT_VALUE[10]" value="REX_VALUE[10]" />
        </div>
    </div>


</fieldset>