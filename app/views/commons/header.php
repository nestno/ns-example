<html>
<head>
  <title><?= $this->e($title) ?> | <?= $this->e($company) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=0.0">
</head>
123
<body>
<?php $this->push('abc')?>
<script>
  console.log(123444)
</script>
<?php $this->end()?>
<?php $this->insert('commons/tabbar',['data' => $data]) ?>
