<div class="field">

  <div class="dashboard-box">
    <?php if(empty($history)): ?>
    <div class="text"><?php _l('dashboard.index.history.text') ?></div>
    <?php else: ?>
    <ul>
      <?php foreach($history as $item): ?>
      <li>
        <a title="<?php __($item->title()) ?>" href="<?php __($item->url()) ?>">
          <?php echo $item->icon() ?><?php __($item->title()) ?>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>

</div>