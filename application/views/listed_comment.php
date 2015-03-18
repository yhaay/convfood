<div class="container">
	<h3>RECENT COMMENTS</h3>
</div>

<div class="infinite-scroll" data-ui="jscroll-default">
	<a class="jscroll-next" href="/only/comment/<?= $lastidx+1 ?>"></a>
</div>

<style>
	.table {
		margin-bottom: 0;
	}		
</style>
<script src="/static/js/jquery.jscroll.min.js"></script>
<script>
	$('.infinite-scroll').jscroll({
		loadingHtml: '<div style="width:100%; text-align:center;"><img src="/static/img/loading.gif" alt="Loading" /> Loading...</div>',
		nextSelector: 'a.jscroll-next:last'
	});
</script>
<script src="/static/js/holder.js"></script>