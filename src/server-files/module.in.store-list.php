<!-- *******************************************************
Store Teaser List - Input
******************************************************** -->

<fieldset class="form-horizontal">
    
    <legend>Filialen</legend>
    
    <div class="form-group">
        <div class="col-sm-2 control-label">
            Filiale der Domain
        </div>
        <div class="col-sm-10">
            <?php
                //
                $template = "";
                $artId = "";
                $currentCategory = rex_category::getCurrent();
                if(sizeof($currentCategory->getChildren()) > 0){
                    $children = $currentCategory->getChildren();
                    foreach ($children as $child) {
                        if(strtolower($child->getValue('art_type')) == 'store'){
                            $article = $child->getStartArticle($this->getClang());
                            $artId = $article->getId();
                            $template = $article->getValue('name').' (id: '.$article->getId().')';
                        }
                    }
                }else{
                    $currArticle = rex_article::getCurrent();
                    $template = $currArticle->getValue('name').' (id: '.$currArticle->getId().')';
                }
                echo '<span class="form-control">'.$template.'</span>';
            ?>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline-list">Überschrift</label>
        <div class="col-sm-10">
            <input class="form-control" id="headline-list" type="text" name="REX_INPUT_VALUE[2]" value="REX_VALUE[2]" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label" for="headline">Weitere Filialen</label>
        <div class="col-sm-10">
            REX_LINKLIST[id="1" widget="1"]
        </div>
        <input type="hidden" name="REX_INPUT_VALUE[1]" value="<?php echo $artId; ?>">
    </div>
    
</fieldset>