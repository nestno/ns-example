<?php $this->layout('layout/layout', ['title' => 'User Profile', 'company' => $this->e($company)]) ?>

<h1>User Profile</h1>
<p>Hello, <?= $this->e($name) ?>!</p>

<?php $this->insert('home/tabbar', ['url' => $bbb]) ?>

<?php $this->push('scripts') ?>
<script>
    // Some JavaScript
    var a = 1999; {
        a = 2020

        function a() {}
        a = 2021
        console.log(a)

        function a() {}
        a = 2022
        console.log(a)
        a = 2024
    }
    console.log(a)
    a = 2025
</script>
<?php $this->end() ?>