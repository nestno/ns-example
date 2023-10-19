<?php $this->insert('commons/header', ['title' => $title, 'company' => $company, 'data' => $tData]) ?>
<?= $this->section('abc') ?>
<?php
var_dump($this->sections);
?>
<?= $this->section('content') ?>
<?= $this->section('scripts') ?>
<?php $this->insert('commons/footer') ?>

