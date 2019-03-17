<!-- *******************************************************
VORTEILE BANNER - Input
******************************************************** -->

<script type="text/javascript">
jQuery(function($){
	$(document).ready(function(){
        
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

<fieldset class="form-horizontal" id="benefits">
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="title">Titel</label>
        <div class="col-sm-10">
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[20]" value="REX_VALUE[20]"/>
        </div>
    </div>
    
    <!-- 1. Vorteil -->
    <legend>Vorteil 1</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-1">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-1" class="icon form-control" name="REX_INPUT_VALUE[1]" value="REX_VALUE[1]"/>
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
                                  <label><input type="radio" name="col1" value="thumb_up">thumb_up</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="hearing">hearing</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="sentiment_very_satisfied">sentiment_very_satisfied</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="settings">settings</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="star">star</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="build">build</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col1" value="beenhere">beenhere</label>
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
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_1">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_1" name="REX_INPUT_VALUE[3]">REX_VALUE[3]</textarea>
        </div>
    </div>
    
    <!-- 2. Vorteil -->
    <legend>Vorteil 2</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-2">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-2" class="icon form-control" name="REX_INPUT_VALUE[4]" value="REX_VALUE[4]"/>
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
                                  <label><input type="radio" name="col2" value="thumb_up">thumb_up</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="hearing">hearing</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="sentiment_very_satisfied">sentiment_very_satisfied</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="settings">settings</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="star">star</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="build">build</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col2" value="beenhere">beenhere</label>
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
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[5]" value="REX_VALUE[5]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_2">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_2" name="REX_INPUT_VALUE[6]">REX_VALUE[6]</textarea>
        </div>
    </div>
    
    <!-- 3. Vorteil -->
    <legend>Vorteil 3</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-3">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-3" class="icon form-control" name="REX_INPUT_VALUE[7]" value="REX_VALUE[7]"/>
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
                                  <label><input type="radio" name="col3" value="thumb_up">thumb_up</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="hearing">hearing</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="sentiment_very_satisfied">sentiment_very_satisfied</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="settings">settings</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="star">star</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="build">build</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col3" value="beenhere">beenhere</label>
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
        <label class="col-sm-2 control-label" for="markitup_textile_3">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_3" name="REX_INPUT_VALUE[9]">REX_VALUE[9]</textarea>
        </div>
    </div>
    
    <!-- 4. Vorteil -->
    <legend>Vorteil 4</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-4">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-4" class="icon form-control" name="REX_INPUT_VALUE[10]" value="REX_VALUE[10]"/>
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
                                  <label><input type="radio" name="col4" value="thumb_up">thumb_up</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="hearing">hearing</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="sentiment_very_satisfied">sentiment_very_satisfied</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="settings">settings</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="star">star</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="build">build</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col4" value="beenhere">beenhere</label>
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
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[11]" value="REX_VALUE[11]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_4">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_4" name="REX_INPUT_VALUE[12]">REX_VALUE[12]</textarea>
        </div>
    </div>
    
    <!-- 5. Vorteil -->
    <legend>Vorteil 5</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-5">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-5" class="icon form-control" name="REX_INPUT_VALUE[13]" value="REX_VALUE[13]"/>
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
                                  <label><input type="radio" name="col5" value="thumb_up">thumb_up</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="hearing">hearing</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="sentiment_very_satisfied">sentiment_very_satisfied</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="settings">settings</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="star">star</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="build">build</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col5" value="beenhere">beenhere</label>
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
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[14]" value="REX_VALUE[14]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_5">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_5" name="REX_INPUT_VALUE[15]">REX_VALUE[15]</textarea>
        </div>
    </div>
    
    <!-- 6. Vorteil -->
    <legend>Vorteil 6</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="icon-6">Icon</label>
        <div class="col-sm-10">
            <input type="text" id="icon-6" class="icon form-control" name="REX_INPUT_VALUE[16]" value="REX_VALUE[16]"/>
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
                                  <label><input type="radio" name="col6" value="thumb_up">thumb_up</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="child_friendly">child_friendly</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="hearing">hearing</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="sentiment_very_satisfied">sentiment_very_satisfied</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="settings">settings</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="star">star</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="build">build</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="col6" value="beenhere">beenhere</label>
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
            <input type="text" id="" class="form-control" name="REX_INPUT_VALUE[17]" value="REX_VALUE[17]"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="markitup_textile_6">Text</label>
        <div class="col-sm-10">
            <textarea cols="1" rows="6" class="form-control markitupEditor-textile_full" id="markitup_textile_6" name="REX_INPUT_VALUE[18]">REX_VALUE[18]</textarea>
        </div>
    </div>
    
</fieldset>

<fieldset class="form-horizontal" id="stepper-animation-list">
    <legend>Stepper-Animationslogos</legend>

    <!-- Logo selection für Stepper-Animation -->
    <div class="form-group">
        <label class="col-sm-2 control-label">Logos</label>
        <div class="col-sm-10">
            REX_MEDIALIST[id="1" widget="1"]
        </div>
    </div>
    
</fieldset>
