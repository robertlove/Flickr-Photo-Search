<ul data-role="listview" data-inset="true">
    <?php foreach ($photos['photos']['photo'] as $photo): ?>
        <li>
            <a href="<?php echo $this->Html->url(array('action' => 'view', $photo['id'])); ?>">
                <?php echo $this->Html->image($photo['url'], array('alt' => $photo['title'], 'width' => 75, 'height' => 75, 'class' => 'thumbnail')); ?>
                <h3><?php echo $photo['title']; ?></h3>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<?php if ($pages > 1): ?>
    <div data-role="controlgroup" data-type="horizontal">
        <?php if ($page > 1): ?>
            <a title="<?php echo __('First page'); ?>" href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'search', 'text' => urlencode($text), 'page' => 1)); ?>" data-role="button">&lt;&lt;</a>
            <a title="<?php echo __('Previous page'); ?>" href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'search', 'text' => urlencode($text), 'page' => $page - 1)); ?>" data-role="button">&lt;</a>
        <?php endif; ?>
        <?php foreach ($numbers as $number): ?>
            <a title="<?php echo sprintf(__('Page %s'), $number); ?>" href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'search', 'text' => urlencode($text), 'page' => $number)); ?>" data-role="button"<?php echo ($number == $page) ? ' class="active"' : ''; ?>><?php echo $number; ?></a>
        <?php endforeach; ?>
        <?php if ($page < $pages): ?>
            <a title="<?php echo __('Next page'); ?>" href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'search', 'text' => urlencode($text), 'page' => $page + 1)); ?>" data-role="button">&gt;</a>
            <a title="<?php echo __('Last page'); ?>" href="<?php echo $this->Html->url(array('controller' => 'photos', 'action' => 'search', 'text' => urlencode($text), 'page' => $pages)); ?>" data-role="button">&gt;&gt;</a>
        <?php endif; ?>
    </div>
<?php endif; ?>