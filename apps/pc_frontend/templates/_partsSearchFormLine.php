<?php $options->setDefault('single', true) ?>

<form action="default/search">
<ul>
<li><?php echo image_tag('icon_search.gif', array('alt' => 'search')) ?></li>
<li>
<input type="hidden" value="action" name="search" />
<input type="text" class="input_text" size="30" value="" name="search_query" />
</li>
<li>
<select name="search_module">
<?php include_customizes($id, 'itemFirst') ?>
<?php foreach($options['items'] as $key => $value) : ?>
<option value="<?php echo $key ?>"><?php echo $value ?></option>
<?php endforeach; ?>
<?php include_customizes($id, 'itemLast') ?>
</select>
</li>
<li>
<input type="submit" class="input_submit" value="<?php echo $options['button'] ?>" />
</li>
</ul>
</form>
