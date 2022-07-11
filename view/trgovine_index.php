<?php 
require_once __DIR__ . '/_header.php'; 
?>
<br>
<ul class="products">
    <?php
        $temp=[];
        if($sveTrgovine !== $temp)
        {
            foreach($sveTrgovine as $a)
            {                
                echo '<li class="products" >';
                echo '<a href="index.php?rt=trgovine/recenzije&ime_trgovine='.$a.'">';
                echo $a.'<br><br>';
                echo '</a>';   
            }
    }
    ?>
</ul>

<?php  require_once __DIR__ . '/_footer.php' ?>
