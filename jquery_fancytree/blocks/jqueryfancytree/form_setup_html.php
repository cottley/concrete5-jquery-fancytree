<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 

<div style="margin-top:8px;"> 
<label for="divId"><?php echo t('ID of the DIV element holding the tree location')?></label>
<input name="divId" type="text" value="<?php echo $bObj->divId?>" maxlength="255" /><br/>
</div>
<br/>
<div style="margin-top:8px;"> 
<label for="jsonURL"><?php echo t('URL of the JSON data used to populate the tree')?></label>
<input name="jsonURL" type="text" value="<?php echo $bObj->jsonURL?>" maxlength="255" size="50"/><br/>
</div>
<br/>
<div style="margin-top:8px;">
</div>
<div class="ccm-spacer" style="margin-bottom:16px;"></div>