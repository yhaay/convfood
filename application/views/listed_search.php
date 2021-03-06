<div class="container">

	<div class="jumbotron">
		<div class="container">
			<p>찾으시는 컵라면이 없나요? 알려 주세요!</p>
			<p><a class="btn btn-default btn-lg">새로운 컵라면 제보하기</a></p>
		</div>
	</div>
	<hr/>
	'<?=$keyword?>' 검색 결과입니다.
	<hr/>
</div>

<div class="infinite-scroll" data-ui="jscroll-default">
	<a class="jscroll-next" href="/only/food/all?num=0&keyword=<?=$keyword?>"></a>
</div>

<script>
	$('#keyword').val("<?=$keyword?>");
</script>
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
