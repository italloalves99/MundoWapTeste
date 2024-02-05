<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([  'fonts']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="top-nav mb-4">
        <div style="background:blue; color: blue; height:10px;">.</div>
        <div class="top-nav-title">
        <?= $this->Html->image('logo-mundo-wap.webp', ['alt' => 'logo', 'style' => 'width: 3%;']); ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>

<style>

/* Flash messages */
.message {
    padding: 1rem;

    background: #eff8ff;
    color: #2779bd;

    border-color: #6cb2eb;
    border-width: 1px;
    border-style: solid;
    border-radius: 4px;
    margin-bottom: 2rem;
}
.message.hidden {
    display: none;
}
.message.success {
    background: #e3fcec;
    color: #1f9d55;
    border-color: #51d88a;
}
.message.warning {
    background: #fffabc;
    color: #8d7b00;
    border-color: #d3b800;
}
.message.error {
    background: #fcebea;
    color: #cc1f1a;
    border-color: #ef5753;
}
</style>    
