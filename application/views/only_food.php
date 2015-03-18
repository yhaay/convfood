<div class="container">

	<div class="row">
	<?php foreach ($list_food as $row) :?>
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
	
</div>
<?php if (count($list_food) > 0): ?>
<div class="infinite-scroll" data-ui="jscroll-default">
	<a class="jscroll-next" href="/only/food/<?=$order_by?>?num=<?=$num+1?><?php if ($keyword != ''):?>&keyword=<?=$keyword?><?php endif; ?>"></a>
</div>
<?php endif; ?>


<style>
	.table {
		margin-bottom: 0;
		margin-top: 0;
	}		
</style>

