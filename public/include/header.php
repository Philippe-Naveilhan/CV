<nav id='navbar' class="navbar">
    <ul>
        <a href="#burger_open"><li id="burger_close">≡</li></a>
        <a href="#burger_close"><li id="burger_open">≡</li></a>
<?php
foreach($parts as $part=>$partname)
    {
?>
        <li alt="<?= $partname ?>"><a href="#<?= $part ?>"><?= $partname ?></a></li>
<?php
    }
?>
    </ul>
</nav>
