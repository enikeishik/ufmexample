<?php
/**
 * @var \Ufo\Modules\Enikeishik\Stub\View $this
 * @var array $items
 * @var stdClass $item
 */

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?=$item['title']?></title>
</head>
<body>
<h2><?=$section->title?></h2>
<h1><?=$item['title']?></h1>
<p><?=$item['content']?></p>
<?php if ($item['marked']): ?>
<p>Item was marked at <?=$item['marked_at']?></a></p>
<?php else: ?>
<p><a href="<?=$section->path?>/<?=$item['id']?>/setmark">Mark item</a></p>
<?php endif; ?>
<?=$this->renderWidgets('left col top')?>
</body>
</html>
