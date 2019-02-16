<?php 
	include 'includes/includes.php';

?>

<div class="playlist_cnt">

	<div class="entity_info artist_info bdrbtm">
		<div class="col-sm-4 col-sm-offset-4">
			<h1>Playlists</h1>
			<div class="btn_items">
				<button class="btn bdr_btn artist_btn" data-toggle="modal" data-target="#playlist_modal">New Playlist</button>
			</div>
		</div>
	</div>

	<?php 
			$username = $userLoggedIn->get_username();
		    $sql = "SELECT * FROM playlists WHERE owner = ?";
		    $stmt = $pdo->prepare($sql);
		    $stmt->execute([$username]);
		    $playlist_query = $stmt->fetchAll();

		    if(empty($playlist_query)){
		    	echo '<span class="no_results">You dont have any playlists yet</span>';
		    }

		    $i=0; $j=4;
		    foreach ($playlist_query as $pl) {

		    	$playlist = new Playlist($pl);

		        if($i % 4 == 0 || $i == 0){echo '<div class="playlist_row">';}
		        echo "<div class='col-sm-3 col-xs-6 playlist_col' onclick='open_page(\"playlist.php?id=".$playlist->get_id()."\")'> <div class='playlist'><i class='fas fa-3x fa-music'></i>";
		        echo '<p>'.$playlist->get_name().'</p>';
		        echo '</div>';
		        echo '</div>';

		        if($j - 1 == $i && $i !=0){echo '</div>'; $j+=4;}
		        $i++;
		    }
		?>
</div>

<!-- Modal -->
    <div class="modal fade" id="playlist_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Playlist</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    	<input type="text" class="form-control" name="new_playlist" id="new_playlist" placeholder="Name your playlist...">
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary create_pl_btn" onclick="create_playlist()">Create</button>
            </div>
        </div>
        </div>
    </div>