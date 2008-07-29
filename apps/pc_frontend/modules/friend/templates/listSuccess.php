<?php if ($pager->haveToPaginate()) : ?>
<?php echo link_to('< 前', 'friend/list?page=' . $pager->getPreviousPage()) ?>&nbsp;
<?php echo link_to('次 >', 'friend/list?page=' . $pager->getNextPage()) ?>
<?php endif; ?>

<ul>
<?php foreach ($pager->getResults() as $member) : ?>
<li><?php echo link_to($member->getProfile('nickname'), 'friend/home?id=' . $member->getId()); ?></li>
<?php endforeach; ?>
</ul>