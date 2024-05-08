<section id="contact" class="wrapper style1 align-center">
    <div class="inner">
        <?php
            $valid_pages = array("content", "contact", "results", "login", "register");

            foreach($valid_pages as $p)
            {
                if ($_GET['page'] == $p)
                {
                    echo '<a href="index.php?page='.$p.'" class="button small" style="background-color: #E3E3E3;">'.$p.'</a>';
                }
                else
                {
                    echo '<a href="index.php?page='.$p.'" class="button small">'.$p.'</a>';
                }
            }

            unset($p);
            
            // if ($_GET['page'] == 'content')
            // {
            //     echo '<a href="index.php?page=content" class="button small" style="background-color: #E3E3E3;">Home</a>';
            //     echo '<a href="index.php?page=contact" class="button small">Contact</a>';
            //     echo '<a href="index.php?page=results" class="button small">Results</a>';
            // }
            // else if ($_GET['page'] == 'contact')
            // {
            //     echo '<a href="index.php?page=content" class="button small">Home</a>';
            //     echo '<a href="index.php?page=contact" class="button small" style="background-color: #E3E3E3;">Contact</a>';
            //     echo '<a href="index.php?page=results" class="button small">Results</a>';
            // }
            // else if ($_GET['page'] == 'results')
            // {
            //     echo '<a href="index.php?page=content" class="button small">Home</a>';
            //     echo '<a href="index.php?page=contact" class="button small">Contact</a>';
            //     echo '<a href="index.php?page=results" class="button small" style="background-color: #E3E3E3;">Results</a>';
            // }
        ?>
    </div>
</section>