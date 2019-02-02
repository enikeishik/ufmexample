<?php
/**
 * @var \Ufo\Modules\View $this
 * @var array $items
 */

?>
<?php if (!empty($items) && is_array($items) && count($items) > 0): ?>
    <?php foreach ($items as $item): ?>
        <p>
        <b><?=$item['title']?></b><br>
        <?=$item['content']?>
        </p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Content not present for this widget.</p>
<?php endif; ?>
