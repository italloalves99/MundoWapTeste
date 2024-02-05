<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<div class="row">
    <div class="col-md-6">
        <h4 class="heading"><?= __('Editar') ?></h4>
    </div>
    <div class="col-md-6" style="text-align:right;">
        <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'btn btn-outline-info mb-2']) ?></div>
    <hr>
    <!-- <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $store->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'side-nav-item']
            ) ?>-->

</div>
<div class="column-responsive column-80">
    <div class="stores form content">
        <?= $this->Form->create($store) ?>
        <div class="row">
            <div class="col-md-2">
                <?= $this->Form->control('name', ['label' => 'Store Name', 'class' => 'form-control']); ?>
            </div>
            
            <div class="col-md-9 mt-4">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline-primary']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
</div>