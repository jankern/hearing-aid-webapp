<section class="rex-page-section">
    <div class="panel panel-default">

        <header class="panel-heading collapsed" >
			<div class="panel-title"><i class="rex-icon rex-icon-info"></i> Hinweis</div>
		</header>

        <div class="panel-collapse">

            <div class="panel-body" style="background: #f3f6fb;">
				<p>Das Modul listet alle Artikel einer angegeben Kategorien auf, die online sind.<br>
                    Unterkategorien werden nicht beachtet</p>
            </div>
        </div>
        
        <fieldset class="form-horizontal">
            <legend>Abstände</legend>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="distance">Abstand</label>
                <div class="col-sm-10">
                    <?php
                        $options = array(
                        ''=>'keiner',
                        'mt'=>'oberhalb',
                        'mb'=>'unterhalb',
                        'mtb'=>'ober- und unterhalb'
                    );
                    ?>
                    <select name="REX_INPUT_VALUE[19]" id="distance" class="form-control">
                    <?php foreach ($options as $k=>$v) : ?>
                    <option value="<?php echo $k; ?>"<?php if ($k == "REX_VALUE[19]") echo ' selected="selected"' ?>><?php echo $v; ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
        </fieldset>

        
    </div>
</section>