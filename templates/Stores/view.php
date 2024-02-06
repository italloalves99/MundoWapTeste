<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<style>
    thead {
        background: black;
        color: white;
        text-align: center;
    }

    thead a {
        color: white;
        text-decoration: none;
        text-align: center;
    }

    tbody td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<div class="row">

<div class="col-md-6">
        <h4 class="heading"><?= __('View') ?></h4>
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

    <div class="">
        <div class="stores view content">
            <h3><?= h($store->name) ?></h3>

            <div class="related">
                <?php if (!empty($store->addresses)) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-resposive">
                            <thead>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Store Id') ?></th>
                                <th><?= __('Postal Code') ?></th>
                                <th><?= __('State') ?></th>
                                <th><?= __('City') ?></th>
                                <th><?= __('Sublocality') ?></th>
                                <th><?= __('Street') ?></th>
                                <th><?= __('Street Number') ?></th>
                                <th><?= __('Complement') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <?php foreach ($store->addresses as $addresses) : ?>
                                <tr>
                                    <td><?= h($addresses->id) ?></td>
                                    <td><?= h($addresses->store_id) ?></td>
                                    <td><?= h($addresses->postal_code) ?></td>
                                    <td><?= h($addresses->state) ?></td>
                                    <td><?= h($addresses->city) ?></td>
                                    <td><?= h($addresses->sublocality) ?></td>
                                    <td><?= h($addresses->street) ?></td>
                                    <td><?= h($addresses->street_number) ?></td>
                                    <td><?= h($addresses->complement) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id], ['class' => 'btn btn-outline-warning']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['class' => 'btn btn-outline-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>