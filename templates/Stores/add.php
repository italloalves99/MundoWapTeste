<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="heading"><?= __('Cadastrar') ?></h4>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'btn btn-outline-info']) ?>
        </div>
        <hr class="mt-2">
    </div>
    <?= $this->Form->create($store) ?>
    <div class="row">
        <div class="col-md-2">
            <?= $this->Form->control('name', ['label' => 'Store Name', 'class' => 'form-control']); ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.postal_code', ['label' => 'Postal Code', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.state', ['label' => 'State', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.city', ['label' => 'City', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.sublocality', ['label' => 'Sublocality', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.street', ['label' => 'Street', 'class' => 'form-control']) ?>
        </div>

        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.street_number', ['label' => 'Street Number', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-2">
            <?= $this->Form->control('addresses.0.complement', ['label' => 'Complement', 'class' => 'form-control']) ?>
        </div>
        <div class="col-md-9 mt-2">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>