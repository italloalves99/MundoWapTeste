<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 * @var string[]|\Cake\Collection\CollectionInterface $stores
 */
?>
<div class="row">
    <div class="row">
        <div class="col-md-6">
            <h4 class="heading"><?= __('Editar Endereço') ?></h4>
        </div>
        <div class="col-md-6" style="text-align: right;">
            <?= $this->Html->link(__('Voltar'), ['controller' => 'Stores', 'action' => 'index'], ['class' => 'btn btn-outline-info']) ?>
        </div>
        <hr class="mt-2">
    </div>


    <div class="column-responsive column-80">
        <div class="stores form content">
            <?= $this->Form->create($address) ?>
            <div class="row">
                <div class="col-md-2">
                    <?= $this->Form->control('store_id', ['class' => 'form-control', 'disabled' => true]); ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('postal_code', ['class' => 'form-control']); ?>
                </div>

                <div class="col-md-2">
                    <?= $this->Form->control('street_number', ['class' => 'form-control']); ?>
                </div>
                <div class="col-md-2">
                    <?= $this->Form->control('complement', ['class' => 'form-control']); ?>
                </div>
                <div class="col-md-9 mt-4">
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-outline-primary']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>