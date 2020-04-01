<nav id='navbar' class="navbar">
    <div class="burger">
        <a href="#links">≡</a>
    </div>
    <div id="links">
<?php
foreach($parts as $part=>$partname)
    {
?>
       <a href="#<?= $part ?>"><?= $partname ?></a>
<?php
    }
?>
    </div>
</nav>
