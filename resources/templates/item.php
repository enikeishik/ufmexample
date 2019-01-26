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
<title><?=$item->title?></title>
</head>
<body>
<h2><?=$section->title?></h2>
<h1><?=$item->title?></h1>
<p><?=$item->text?></p>
<?=$this->renderWidgets('left col top')?>
</body>
</html>
