
<table>
	<tr>
		<th>
			Brewery Name
		</th>
		<td>
			<img src="<?php echo $brewery_label; ?>">
			<?php echo $brewery_name; ?>
		</td>
	</tr>
	<tr>
		<th>
			Beer Name
		</th>
		<td>
			<img src="<?php echo $beer_label; ?>">
			<?php echo $beer_name; ?>
		</td>
	</tr>
	<tr>
		<th>
			Beer Style
		</th>
		<td>
			<?php echo $beer_style; ?>
		</td>
	</tr>
	<tr>
		<th>
			Alcohol Content
		</th>
		<td>
			<?php echo $beer_abv; ?>
		</td>
	</tr>
	<tr>
		<th>
			IBU (Bitterness)
		</th>
		<td>
			<?php echo $beer_ibu; ?>
		</td>
	</tr>
	<tr>
		<th>
			Average Rating
		</th>
		<td>
			<?php echo $rating_score; ?>
		</td>
	</tr>
</table>

<h3>User Reviews</h3>
<div class="review-list">
<?php
	foreach ( $beer_reviews as $review ) {

		$rev_first_name = $review->user->first_name;
		$rev_last_name = $review->user->last_name;
		$rev_created_date = $review->created_at;
		$rev_rating_score = $review->rating_score;
		?>
		<div class="review-item">
			<table border="0">
				<tr>
					<th>
						Name
					</th>
					<td>
						<?php echo $rev_first_name . " " . $rev_last_name; ?>
					</td>
				</tr>
				<tr>
					<th>
						Date
					</th>
					<td>
						<?php echo $rev_created_date; ?>
					</td>
				</tr>
				<tr>
					<th>
						Rating
					</th>
					<td>
						<?php echo $rev_rating_score; ?>
					</td>
				</tr>
			</table>
		</div>
		<?php
	}
?>
</div>