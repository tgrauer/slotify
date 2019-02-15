<?php 
    include 'includes/includes.php'; 
?>

    <h2 class="pg_heading_lg">You might also like</h2>

    <div class="grid_view">
        <?php 

            $sql = "SELECT * FROM albums ORDER BY RAND() LIMIT 8";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $albums = $stmt->fetchAll();

            $i=0; $j=4;
            foreach ($albums as $album) {
                if($i % 4 == 0 || $i == 0){echo '<div class="row">';}
                echo '<div class="col-sm-3 col-xs-6">';
                echo "<span onclick='open_page(\"album.php?album_id=".$album['id']."\")'>
                    <img class='img-responsive album_cover' src='".$album['artwork_path']."' alt='".$album['title']."' />
                    </span>";
                echo "<p class='album_title'><span onclick='open_page(\"album.php?album_id=".$album['id']."\")'>".$album['title']."</span></p>";
                echo '</div>';

                if($j - 1 == $i && $i !=0){echo '</div>'; $j+=4;}
                $i++;
            }
        ?>
    </div>
</div>
                    
                
