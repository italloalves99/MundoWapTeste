<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Store> $stores
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
<?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css') ?>
<?= $this->Html->script('https://code.jquery.com/jquery-3.2.1.slim.min.js') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') ?>
<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3><?= __('Stores') ?></h3>
        </div>
        <hr class="mt-1">
        <div class="col-md-12" style="text-align:right;">
            <?= $this->Html->link(__('New Store'), ['action' => 'add'], ['class' => 'btn btn btn-outline-primary']) ?>
        </div>
    </div>
    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stores as $store) : ?>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#viewModal<?= $store->id ?>">
                                <?= h($store->name) ?>
                            </button>
                        </td>
                        <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Stores', 'action' => 'edit', $store->id], ['class' => 'btn btn-outline-warning']) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $store->id],
                                ['class' => 'btn btn-outline-danger'],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Modal -->
    <?php foreach ($stores as $store) : ?>
        <div class="modal fade" id="viewModal<?= $store->id ?>" tabindex="4" role="dialog" aria-labelledby="viewModalLabel<?= $store->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel<?= $store->id ?>">View Stores: <?= h($store->name) ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php if (!empty($store->addresses)) : ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?= __('Postal Code') ?></th>
                                            <th><?= __('State') ?></th>
                                            <th><?= __('City') ?></th>
                                            <th><?= __('Sublocality') ?></th>
                                            <th><?= __('Street') ?></th>
                                            <th><?= __('Street Number') ?></th>
                                            <th class="actions"><?= __('Actions') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($store->addresses as $addresses) : ?>
                                            <tr>
                                                <td><?= h($addresses->postal_code) ?></td>
                                                <td><?= h($addresses->state) ?></td>
                                                <td><?= h($addresses->city) ?></td>
                                                <td><?= h($addresses->sublocality) ?></td>
                                                <td><?= h($addresses->street) ?></td>
                                                <td><?= h($addresses->street_number) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id], ['class' => 'btn btn-outline-warning']) ?>
                                                    <!-- <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['class' => 'btn btn-outline-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?> -->
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
    <nav aria-label="Page navigation example" class="mt-1">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>