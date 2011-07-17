<p><?php echo $this->Html->image($photo['photo']['url']); ?></p>
<ul data-role="listview" data-inset="true">
    <li>
        <a href="<?php echo $photo['photo']['owner']['url']; ?>">
            <?php echo $this->Html->image($photo['photo']['owner']['buddy_icon'], array('alt' => $photo['photo']['owner']['username'], 'width' => 75, 'height' => 75, 'class' => 'thumbnail')); ?>
            <h4><?php echo sprintf(__('By %s'), $photo['photo']['owner']['username']); ?></h4>
            <p><?php echo sprintf(__('On %s'), date('r', strtotime($photo['photo']['dates']['taken']))); ?></p>
        </a>
    </li>
</ul>
<?php if (!empty($photo['photo']['tags']['tag'])): ?>
    <ul data-role="listview" data-inset="true">
        <li data-role="list-divider"><?php echo __('Tags'); ?></li>
        <?php foreach ($photo['photo']['tags']['tag'] as $tag): ?>
            <li><?php echo $this->Html->link($tag['_content'], $tag['url']); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>