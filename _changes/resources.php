<?php include("page-components/header.php"); ?>
<section class="page-section page-header" style='background-image: url("img/photos/headers/header-resources.jpg")'>
	<div class="inside">
		<h1 class="page-title">Resources</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit vorgular.</p>
		<p>Curabitur dapibus dolor a viverra convallis.</p>
	</div>
</section>
<section class="page-section resources-section">
	<div class="inside">
		<div class="cols separated tight controls">
			<ul class="filters tabs col col2" data-target="resourceList">
				<li class="tab"><a href="#" class="filter active" data-criteria="">All</a></li>
				<li class="tab"><a href="#" class="filter" data-criteria="furniture">Furniture</a></li>
				<li class="tab"><a href="#" class="filter" data-criteria="it-solutions">IT solutions</a></li>
				<li class="tab"><a href="#" class="filter" data-criteria="education">Education</a></li>
			</ul>
			<form class="content-search col col2" method="get" action="">
				<span class="field select">
					<span class="select-val">Document type</span>
					<select name="doc-type">
						<option value="1">Document Type 1</option>
						<option value="2">Document Type 2</option>
						<option value="3">Document Type 3</option>
						<option value="4">Document Type 4</option>
						<option value="5">Document Type 5</option>
					</select>
				</span>
				<label class="field searchbox">
					<input type="text" name="phrase" placeholder="Search..."> <button type="submit" name="search" value="1">Search</button></span>
				</label>
			</form>
		</div>
		<ul class="res-list cols" id="resourceList">
			<li class="resource col col2 furniture">
				<img src="img/temp/photos/res01.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Eguide</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 furniture">
				<img src="img/temp/photos/res02.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title"><a href="#">Ultimate Tool Kit: How to build out your personas</a></h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 it-solutions">
				<img src="img/temp/photos/res08.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 education">
				<img src="img/temp/photos/res04.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 it-solutions">
				<img src="img/temp/photos/res05.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 education">
				<img src="img/temp/photos/res06.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 education">
				<img src="img/temp/photos/res07.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
			<li class="resource col col2 it-solutions">
				<img src="img/temp/photos/res02.jpg" alt="" class="resource-thumbnail">
				<h3 class="resource-title">Ultimate Tool Kit: How to build out your personas</h3>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
				<p class="resource-category"><a href="#">Article</a></p>
				<p class="more"><a href="#">More info</a></p>
			</li>
		</ul>
		<a href="ajax/resources.json" class="load-more" data-target="resourceList">Load more resources</a>
	</div>
</section>
<?php include("page-components/footer.php"); ?>