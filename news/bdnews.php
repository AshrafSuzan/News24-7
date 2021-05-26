<?php include"inc/header.php"; ?>

<section id="third-part">
	<div class="news-container">
		<div class="area-content">
	<?php 

        $sql= "SELECT id,image,title,author,publish_date,news FROM newstable WHERE status = 1 AND category = 1 ORDER BY id DESC";
        $allNews= mysqli_query($db,$sql);
        $i = 0;
        while ($row = mysqli_fetch_assoc($allNews)) {
        	  $id            =$row['id'];
              $image         =$row['image'];
              $title         =$row['title'];
              $author        =$row['author'];
              $news          =$row['news'];
              $publish_date  =$row['publish_date'];
              $i++;
?>
 	<div class="news-content">
				<div class="pic"><img src="images/picfnews/<?php echo $image; ?>"></div>
			<div class="news-desc"><p><?php echo $publish_date; ?> <br><?php echo $author; ?></p></div>
				<div class="title"><p><?php echo $title; ?></p></div>
			<div class="news"><p><?php  echo substr($news, 0, 300) . "....." ; ?></p>
			</div>
			<div class="more">
            <a href="fullviewnews.php?id=<?php echo $id; ?>">Read More</a>
           </div>
		</div>

<?php
}
?>
</div>
</section>	


<?php include"inc/footer.php"; ?>