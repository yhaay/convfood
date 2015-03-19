<div class="container">

	<div class="btn-group">
		<a class="btn <?php if ($order_by == 'best') :?>btn-primary<?php else:?>btn-default<?php endif;?>" href="/listed/food/best?company=<?=$company?>">추천순</a>
		<a class="btn <?php if ($order_by == 'new') :?>btn-primary<?php else:?>btn-default<?php endif;?>" href="/listed/food/new?company=<?=$company?>">최신순</a>
	</div>
	
	<div class="btn-group">
		<a class="btn <?php if ($company == '1') :?>btn-primary<?php else:?>btn-default<?php endif;?>" href="?company=1">CU</a>
		<a class="btn <?php if ($company == '2') :?>btn-primary<?php else:?>btn-default<?php endif;?>" href="?company=2">GS25</a>
		<a class="btn <?php if ($company == '3') :?>btn-primary<?php else:?>btn-default<?php endif;?>" href="?company=3">세븐일레븐</a>
		<a class="btn <?php if ($company == '4') :?>btn-primary<?php else:?>btn-default<?php endif;?>" href="?company=4">미니스톱</a>
		</div>
	<hr/>
</div>

<div class="infinite-scroll" data-ui="jscroll-default">
	<a class="jscroll-next" href="/only/food/<?=$order_by?>?num=0&company=<?=$company?>"></a>
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
<script src="/static/js/jquery.jscroll.min.js"></script>
<script>
	$('.infinite-scroll').jscroll({
		loadingHtml: '<div style="width:100%; text-align:center;"><img src="/static/img/loading.gif" alt="Loading" /> Loading...</div>',
		nextSelector: 'a.jscroll-next:last'
	});
</script>
