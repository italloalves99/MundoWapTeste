<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Store> $stores
 */
?>
<style>
    thead {
        background: black;
        color: blue;
        text-align: center;
    }

    thead a {
        color: blue;
        text-decoration: none;
        text-align: center;
    }

    tbody td {
        text-align: center;

    }
</style>
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
        <table class="table table-bordered table-hover table-striped">
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
                            <?= $this->Html->link(h($store->name), ['action' => 'view', $store->id], ['class' => 'btn btn-outline-secondary']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $store->id], ['class' => 'btn btn-outline-warning']) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $store->id],
                                ['class' => 'btn btn-outline-danger'],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
</div>