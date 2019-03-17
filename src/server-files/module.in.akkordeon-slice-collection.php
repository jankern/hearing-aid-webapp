<!-- *******************************************************
TABS/AKKORDEON-Gruppierung - Eingabe
******************************************************** -->

<section class="rex-page-section">
    <div class="panel panel-default">

        <header class="panel-heading collapsed">
            <div class="panel-title"><i class="rex-icon rex-icon-info"></i> Hinweis</div>
        </header>

        <div class="panel-collapse">

            <div class="panel-body" style="background: #f3f6fb;">
                <ul>
                    <li>Das Modul listet Artikel-Slices auf, die als Tabs oder Akkordeons gebündelt werden können</li>
                    <li>Slices und Ausgabetyp auswählen, um sie auf der Webseite anzuzeigen.</li>
                </ul>
            </div>
        </div>
    </div>
    
    <fieldset class="form-horizontal">
        <legend>Akkordeon/Tab-Gruppierung</legend>
        <div class="form-group">
            <label class="col-sm-3 float-left" for="types">Typ</label>
            <div class="col-sm-9">
                <?php
                    $options = array(
                        '1'=>'Akkordeon',
                        '2'=>'Tab'
                     );
                ?>
                <select name="REX_INPUT_VALUE[1]" id="types" class="form-control">
                <?php foreach ($options as $k=>$v) : ?>
                 <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[1]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                <?php endforeach ?>
                </select>
            </div>
        </div>
        
    <?php
    
        $slices = rex_article_slice::getSlicesForArticle($this->getArticleId(), $this->getClang());
        $template = '';
        
        $count = 1;
        foreach($slices as $slice){
            if($slice->getId() != REX_SLICE_ID){
                $modulId = $slice->getModuleId();
                $sliceId = $slice->getId();

                $template .= '<div class="row form-group">
                    <label class="col-sm-3 float-left" for="'.$sliceId.'">Artikelabschn. '.$count.'</label>
                    <div class="col-sm-1">
                        <input type="checkbox" id="'.$sliceId.'" class="form-check-input slice-select" name="slice-select" value="'.$sliceId.'"/>
                    </div>
                    <label class="col-sm-2 float-left" for="text-'.$sliceId.'">Tab-Titel</label>
                    <div class="col-sm-6">
                        <input type="text" id="text-'.$sliceId.'" class="form-control slice-select-text" name="slice-select-text" value=""/>
                    </div>
                </div>';   
            }
            $count++;
        }

        $template .= '<input class="form-control" id="slice-select-input" type="hidden" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]" />';
        
        echo $template;
    
    ?>
    
        <script type="text/javascript">
            jQuery(function($){
                $(document).ready(function(){
                    
                    // Get changed value when clicked
                    $('input:checkbox.slice-select').change(function() {
                        var checkboxList = [];
                        var inputString = "";
                        var inputSubString = "";
                        $('input:checkbox.slice-select').each(function() {
                            if($(this).prop('checked')){
                                $('#text-'+$(this).attr('value')).prop( "disabled", false );
                                inputSubString = $(this).attr('value')+'::'+$('#text-'+$(this).attr('value')).val();
                                checkboxList.push(inputSubString);
                            }else{
                                $('#text-'+$(this).attr('value')).prop( "disabled", true );
                            }
                        });

                        if(checkboxList.length > 0){
                            var comma = '';
                            for(var i=0; i<checkboxList.length; i++){
                                comma = i < checkboxList.length-1?';;':'';
                                inputString += checkboxList[i]+comma;
                            }
                        }
                        $('#slice-select-input').attr('value',inputString)
                    });
                    
                    $("input:text.slice-select-text").blur(function(){
                        var checkboxList = [];
                        var inputString = "";
                        var inputSubString = "";
                        $('input:checkbox.slice-select').each(function() {
                            if($(this).prop('checked')){
                                inputSubString = $(this).attr('value')+'::'+$('#text-'+$(this).attr('value')).val();
                                checkboxList.push(inputSubString);
                            }
                        });

                        if(checkboxList.length > 0){
                            var comma = '';
                            for(var i=0; i<checkboxList.length; i++){
                                comma = i < checkboxList.length-1?';;':'';
                                inputString += checkboxList[i]+comma;
                            }
                        }
                        $('#slice-select-input').attr('value',inputString)
                    });

                    // Get server values and set checkboxes 'checked' 
                    var inputValueList = [];
                    var inputValueSubList = [];
                    if($('#slice-select-input').attr('value') !== ''){
                        inputValueList = $('#slice-select-input').attr('value').split(";;");
                    }
                    $('input:checkbox.slice-select').prop('checked', false);
                    $('input:text.slice-select-text').prop( "disabled", true );
                    if(inputValueList.length > 0){
                        $('input:checkbox.slice-select').each(function() {
                            for(var i=0; i<inputValueList.length; i++){
                                inputValueSubList = inputValueList[i].split('::');
                                if($(this).attr('value') === inputValueSubList[0]){
                                    $(this).prop('checked', true);
                                    $('#text-'+$(this).attr('value')).prop( "disabled", false );
                                    $('#text-'+$(this).attr('value')).val(inputValueSubList[1]);
                                }
                            }
                        });
                    }
                })
            });
        </script>
        </fieldset>
</section>