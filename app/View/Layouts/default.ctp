<?php $isHome = ($this->params['controller'] == 'pages') ? true : false; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="<?php echo Configure::read('App.encoding'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?php echo (!$isHome) ? $title_for_layout . ' - ' : null; ?><?php echo __('Flickr Photo Search'); ?></title>
<?php echo $this->Html->meta('icon'); ?>
<?php echo $this->Html->css(array('http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.css', 'screen')); ?>
</head>
<body>
<div data-role="page">
    <div data-role="header" data-add-back-btn="true">
        <?php if ($isHome): ?>
            <h1><?php echo __('Flickr Photo Search'); ?></h1>
        <?php else: ?>
            <a href="<?php echo $this->Html->url('/'); ?>" data-rel="back" data-icon="back" data-iconpos="notext" data-direction="reverse"><?php echo __('Back'); ?></a>
            <h1><?php echo $title_for_layout; ?></h1>
            <a href="<?php echo $this->Html->url('/'); ?>" data-icon="home" data-iconpos="notext"><?php echo __('Home'); ?></a>
        <?php endif; ?>
    </div>
    <div data-role="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
        <?php echo $this->element('sql_dump'); ?>
    </div>
</div>
<?php echo $this->Html->script(array('http://code.jquery.com/jquery-1.6.1.min.js', 'script', 'http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.js')); ?>
</body>
</html>