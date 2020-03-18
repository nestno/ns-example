<?php $this->layout('layout/layout', ['title' => 'User Profile']) ?>

<h1>User Profile</h1>
<p>Hello, <?=$this->e($name)?>!</p>

<?php $this->insert('home/sidebar') ?>

<?php $this->push('scripts') ?>
    <script>
        // Some JavaScript
        console.log(123)
    </script>
<?php $this->end() ?>