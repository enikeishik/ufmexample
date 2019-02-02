<?php
/**
 * @var string $module
 * @var string $name
 * @var string $title
 * @var string $text
 * @var \Ufo\Modules\View $this
 * @var array $items
 */

?>
<div class="widget">
<span><?=$title?></span>
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
</div>
