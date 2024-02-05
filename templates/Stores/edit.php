<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $store->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Stores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="stores form content">
            <?= $this->Form->create($store) ?>
            <fieldset>
                <legend><?= __('Edit Store') ?></legend>
                <?= $this->Form->control('name', ['label' => 'Store Name']) ?>
                <?= $this->Form->control('addresses.0.postal_code', ['label' => 'Postal Code']) ?>
                <?= $this->Form->control('addresses.0.state', ['label' => 'State']) ?>
                <?= $this->Form->control('addresses.0.city', ['label' => 'City']) ?>
                <?= $this->Form->control('addresses.0.sublocality', ['label' => 'Sublocality']) ?>
                <?= $this->Form->control('addresses.0.street', ['label' => 'Street']) ?>
                <?= $this->Form->control('addresses.0.street_number', ['label' => 'Street Number']) ?>
                <?= $this->Form->control('addresses.0.complement', ['label' => 'Complement']) ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
