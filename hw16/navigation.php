<section id="contact" class="wrapper style1 align-center">
    <div class="inner">
        <?php
            if ($_GET['page'] == 'content')
            {
                echo '<a href="index.php?page=content" class="button small" style="background-color: #E3E3E3;">Home</a>';
                echo '<a href="index.php?page=contact" class="button small">Contact</a>';
            }
            else
            {
                echo '<a href="index.php?page=content" class="button small">Home</a>';
                echo '<a href="index.php?page=contact" class="button small" style="background-color: #E3E3E3;">Contact</a>';
            }
        ?>
    </div>
</section>