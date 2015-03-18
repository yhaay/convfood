<div class="container">

	<a class="btn btn-link" href="/listed/food/best">추천순</a>
	<a class="btn btn-link" href="/listed/food/new">최신순</a>
	<hr/>
</div>

<div class="infinite-scroll" data-ui="jscroll-default">
	<a class="jscroll-next" href="/only/food/<?=$order_by?>?num=0"></a>
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
