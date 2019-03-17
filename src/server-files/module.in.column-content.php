<!-- *******************************************************
Text und Bild (1-3 Spalten) - Input
******************************************************** -->

<script type="text/javascript">
jQuery(function($){
	$(document).ready(function(){
        
		// Select behavior
        
        $('select#choices').change(function() {
			$('.off').hide();

			for(var i = 1; i <= parseInt($(this).val()); i++) {
				$('#col' + i).show();
			}
		});

		$('select#choices').change();
        
        // Radio behavior
        
        var setText = function(id, value){
            $('#icon-'+id).val(value);
        }
        
        var setRadioChecked = function(id, value){
             $('input[name=col'+id+']').each(function(){
                 $(this).prop('checked', false); 
                 if ($(this).attr('value') === value){
                    $(this).prop('checked', true); 
                 }
             });
        }
        
        var inputId = '';
        var inputValue = '';
        var radioId = '';
        
        $('input:text.icon').each(function(){
            inputId = $(this).attr('id').substr(5, 1);
            inputValue = $(this).attr('value');
            setRadioChecked(inputId, inputValue);
            
            $('input[name=col'+inputId+']').change(function(){
                radioId = $(this).attr('name').substr(3, 1);
                setText(radioId, $(this).attr('value'));
            });
            
        });

	})
});
</script>

<legend>Inhalte in Spalten (1-3)</legend>

<fieldset class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="choices">Spalten</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'volle Breite',
				'2'=>'zwei Spalten',
				'3'=>'drei Spalten'
			);
			?>
			<select name="REX_INPUT_VALUE[1]" id="choices" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[1]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>
</fieldset>

<!-- Spalte 1 -->

<fieldset class="form-horizontal" id="col1">
    <legend>1. Spalte</legend>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-1">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-1" class="icon form-control" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]"/>
            <br>
            
            <div class="panel panel-default">  
                <header class="panel-heading collapsed">
                    <div class="panel-title"><i class="rex-icon rex-icon-info"></i> Icon-Codes</div>
                </header>      
                <div class="panel-collapse">
                    <div class="panel-body" style="background: #f3f6fb;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="center_focus_strong">center_focus_strong</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="cloud_queue">cloud_queue</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="credit_card">credit_card</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="devices_other">devices_other</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="directions">directions</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="explore">explore</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="flip">flip</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p>Weitere Icon-Codes können dieser <a href="http://materializecss.com/icons.html" target="_blank">Quelle</a> entnommen werden.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="">Überschrift</label>
        <div class="col-sm-10">
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[3]" value="REX_VALUE[3]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Bild</label>
        <div class="col-sm-10">
            REX_MEDIA[id="1" widget="1"]
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="bordershape1">Rahmenform</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Eckig',
				'2'=>'Rund'
			);
			?>
			<select name="REX_INPUT_VALUE[4]" id="bordershape1" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[4]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_1">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[5]">REX_VALUE[5]</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="alignment1">Ausrichtung</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Links',
				'2'=>'Mitte',
                '3'=>'Rechts'
			);
			?>
			<select name="REX_INPUT_VALUE[6]" id="alignment1" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[6]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>
    
</fieldset>


<fieldset class="form-horizontal off" id="col2">
    <legend>2. Spalte</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-2">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-2" class="icon form-control" name="REX_INPUT_VALUE[7]" value="REX_VALUE[7]"/>
            <br>
            
            <div class="panel panel-default">  
                <header class="panel-heading collapsed">
                    <div class="panel-title"><i class="rex-icon rex-icon-info"></i> Icon-Codes</div>
                </header>      
                <div class="panel-collapse">
                    <div class="panel-body" style="background: #f3f6fb;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="center_focus_strong">center_focus_strong</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="cloud_queue">cloud_queue</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="credit_card">credit_card</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="devices_other">devices_other</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="directions">directions</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="explore">explore</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="flip">flip</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p>Weitere Icon-Codes können dieser <a href="http://materializecss.com/icons.html" target="_blank">Quelle</a> entnommen werden.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="">Überschrift</label>
        <div class="col-sm-10">
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[8]" value="REX_VALUE[8]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Bild</label>
        <div class="col-sm-10">
            REX_MEDIA[id="2" widget="1"]
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="bordershape2">Rahmenform</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Eckig',
				'2'=>'Rund'
			);
			?>
			<select name="REX_INPUT_VALUE[9]" id="bordershape2" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[9]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_1">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[10]">REX_VALUE[10]</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="alignment2">Ausrichtung</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Links',
				'2'=>'Mitte',
                '3'=>'Rechts'
			);
			?>
			<select name="REX_INPUT_VALUE[11]" id="alignment2" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[11]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>
</fieldset>


<fieldset class="form-horizontal off" id="col3">
    <legend>3. Spalte</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-3">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-3" class="icon form-control" name="REX_INPUT_VALUE[12]" value="REX_VALUE[12]"/>
            <br>
            
            <div class="panel panel-default">  
                <header class="panel-heading collapsed">
                    <div class="panel-title"><i class="rex-icon rex-icon-info"></i> Icon-Codes</div>
                </header>      
                <div class="panel-collapse">
                    <div class="panel-body" style="background: #f3f6fb;">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="center_focus_strong">center_focus_strong</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="cloud_queue">cloud_queue</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="credit_card">credit_card</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="devices_other">devices_other</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="directions">directions</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="explore">explore</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="flip">flip</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p>Weitere Icon-Codes können dieser <a href="http://materializecss.com/icons.html" target="_blank">Quelle</a> entnommen werden.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="">Überschrift</label>
        <div class="col-sm-10">
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[13]" value="REX_VALUE[13]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Bild</label>
        <div class="col-sm-10">
            REX_MEDIA[id="3" widget="1"]
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="bordershape3">Rahmenform</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Eckig',
				'2'=>'Rund'
			);
			?>
			<select name="REX_INPUT_VALUE[14]" id="bordershape3" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[14]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_1">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[15]">REX_VALUE[15]</textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="alignment3">Ausrichtung</label>
        <div class="col-sm-10">
			<?php
				$options = array(
				'1'=>'Links',
				'2'=>'Mitte',
                '3'=>'Rechts'
			);
			?>
			<select name="REX_INPUT_VALUE[16]" id="alignment3" class="form-control">
			<?php foreach ($options as $k=>$v) : ?>
			<option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[16]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
			<?php endforeach ?>
			</select>
        </div>
    </div>
</fieldset>