<div class="container">

	<div id="carousel-example-generic" class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
	        <div class="item active">
    	        <img src="data:image/png;base64," data-src="holder.js/1140x400/auto/#777:#555/text:First slide" alt="First slide">
          	</div>
          	<div class="item">
            	<img src="data:image/png;base64," data-src="holder.js/1140x400/auto/#666:#444/text:Second slide" alt="Second slide">
          	</div>
          	<div class="item">
            	<img src="data:image/png;base64," data-src="holder.js/1140x400/auto/#555:#333/text:Third slide" alt="Third slide">
          	</div>
		</div>
	 	<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="icon-next"></span>
		</a> 
	</div>
	
	<h3>BEST <a class="btn btn-info btn-xs" href="/listed/food/best">MORE</a></h3>
	<div class="row">
	<?php foreach ($list_best as $row) :?>
		<div class="col-md-3 col-xs-6">
			<div class="imageContainer">
				<a href="/food/detail/<?=$row->foodidx?>">
					<div style="background:url(<?=$row->filepath?>) no-repeat center 50% / cover"></div>
				</a>
			</div>
			<div class="caption">
				<h4><?=$row->name?></h4>
				<p><span class="star"></span>  <span><?=$row->rate?></span> <small>(<?=$row->ratecount?>명)</small></p>
				<p><?=$row->commentcount?>개 코멘트</p>
			</div>
		</div>
	<?php endforeach; ?>
	</div>

	<hr>
	
	<h3>NEW <a class="btn btn-info btn-xs" href="/listed/food/new">MORE</a></h3>
	<div class="row">
	<?php foreach ($list_new as $row) :?>
		<div class="col-md-3 col-xs-6">
			<div class="imageContainer">
				<a href="/food/detail/<?=$row->foodidx?>">
					<div style="background:url(<?=$row->filepath?>) no-repeat center 50% / cover"></div>
				</a>
			</div>
			<div class="caption">
				<h4><?=$row->name?></h4>
				<p><span class="star"></span>  <span><?=$row->rate?></span> <small>(<?=$row->ratecount?>명)</small></p>
				<p><?=$row->commentcount?>개 코멘트</p>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
	
	<hr>
	
	<h3>RECENT COMMENTS <a class="btn btn-info btn-xs" href="/listed/comment">MORE</a></h3>
	<table class="table table-hover">
		<colgroup>
			<col span="1" style="width:70px;">
			<col span="1" style="width:100%;">
		</colgroup>
		<tbody>
		<?php foreach ($list_comment as $row) :?>
			<tr>
				<td><img data-src="holder.js/64x64" class="img-circle" alt="test"></td>
				<td>
					<p>
						<a href="/food/detail/<?=$row->foodidx?>"><?=$row->foodname?></a>
						<?php if ($row->rate == '-1'):?>
						미평가
						<?php else:?>
						<?=$row->rate?>점
						<?php endif; ?>
					</p>
					<p><b><?= $row->name ?></b> <small>(<?=$row->writedate?>)</small></p>
					<p><?= $row->description ?></p>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	
</div>

<style>
.imageContainer {
	position: relative;
	height: 1em;
	padding-bottom: 72%;
	max-width: 100%;
}

.imageContainer div {
	position: absolute;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	
	overflow: hidden;
	border: 1px solid #ddd;
	border-radius: 4px;
}
</style>
<script type="text/javascript" src="/static/js/jquery.raty.js"></script>
<script>
$(function() {
	$('.star').raty({
		score: function() { return parseFloat($(this).next().html())/2 },
		readOnly: true,
		half: true,
		path: '/static/img/star',
	});
});
</script>
<script src="/static/js/holder.js"></script>