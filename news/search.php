<?php include"inc/header.php"?>

<section id="third-part">
	<div class="news-container">
		<div class="area-content">
			<?php
			    if ( isset($_POST['searchbtn']) ){
			        $searchContent = $_POST['search'];

			        $sql = "SELECT * FROM newstable WHERE title LIKE '%$searchContent%' OR news LIKE '%$searchContent%' ORDER BY id DESC";
			        $searchPost = mysqli_query($db, $sql);

			        $searchCount = mysqli_num_rows($searchPost);

			        if ( $searchCount == 0 ){ ?>
			            <h3>Your Search Result for - <strong> <?php echo $searchContent; ?> </strong> - Total Post Found - <?php echo $searchCount; ?></h3>
			            <div class="alert alert-warning">Opps!! No Post Found according your search result...</div>
			        <?php }
			        else{
			            while ( $row = mysqli_fetch_assoc($searchPost) ){
				          $id            =$row['id'];
				          $image         =$row['image'];
				          $title         =$row['title'];
				          $author        =$row['author'];
				          $category      =$row['category'];
				          $tag           =$row['tag'];
				          $news          =$row['news'];
				          $status        =$row['status'];
				          $publish_date  =$row['publish_date'];
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

			                <?php    }

			                

			       }

			    }

			     
			?>
    </div>
    <div >  <h3 style="color: darkblue;
    font-family: sans-serif;
    font-weight: 600;">Your Search Result for <strong style="color: orangered;
    font-style: oblique;"> <?php echo $searchContent; ?> </strong> Total Post Found <strong style="color: orangered;
    font-style: oblique;"><?php echo $searchCount; ?></strong> </h3></div>
</section>	
<?php include"inc/footer.php"?>