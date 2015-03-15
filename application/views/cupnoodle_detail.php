<div class="container">

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<img class="img-responsive" src="/static/img/test.jpg">
		</div>
		<div class="col-md-8 col-xs-12">
			<h3>참깨라면</h3>
			<p>★★★★★ 4.7점</p>
			<p>2050개 평가</p>
			<p>570개 코멘트</p>
			<button class="btn btn-info" data-toggle="modal" data-target="#rateModal">평가하기</button>
			<button class="btn btn-info" data-toggle="modal" data-target="#commentModal">코멘트쓰기</button>
		</div>
	</div>

	<p>  </p>
	
	<table class="table table-hover">
		<colgroup>
			<col span="1" style="width:70px;">
			<col span="1" style="width:100%;">
		</colgroup>
		<tbody>
			<tr>
				<td><img data-src="holder.js/64x64" class="img-circle" alt="test"></td>
				<td>
					<p>★★★★★</p>
					<p><b>아무개</b></p>
					<p>마이 훼이보릿</p>
				</td>
			</tr>
			<tr>
				<td><img data-src="holder.js/64x64" class="img-circle" alt="test"></td>
				<td>
					<p>★★★★★</p>
					<p><b>아무개</b></p>
					<p>마이 훼이보릿</p>
				</td>
			</tr>
			<tr>
				<td><img data-src="holder.js/64x64" class="img-circle" alt="test"></td>
				<td>
					<p>★★★★★</p>
					<p><b>아무개</b></p>
					<p>마이 훼이보릿</p>
				</td>
			</tr>
			</tbody>
	</table>
	
</div>

<div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="rateModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">평가하기</h4>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-2 col-xs-4">
					<select class="form-control" name="rateSelect" id="rateSelect">
						<option>F</option>
						<option>D0</option>
						<option>D+</option>
						<option>C0</option>
						<option>C+</option>																				
						<option>B0</option>
						<option>B+</option>
						<option>A0</option>					
						<option>A+</option>					
					</select>
				</div>
				<div class="col-md-2 col-xs-4" id="rateText">맛있어요</div>
				<div class="col-md-5 col-xs-10" id="rateSlider"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
				<button type="button" class="btn btn-primary">저장</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">코멘트쓰기</h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" rows="4" placeholder="코멘트를 남겨주세요."></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
				<button type="button" class="btn btn-primary">저장</button>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

	var rateText = ['최악', '맛없', '맛없음', '그냥', '저냥', '먹을 만', '합니다', '맛있어!', '핵꿀맛'];

	$("#rateSlider").slider({
		min: 0,
		max: 8,
		range: 'min',
		animate: 'fast',
		slide: function(event, ui) {
			$("#rateSelect")[0].selectedIndex = ui.value;
			$("#rateText").html(rateText[ui.value]);
		}
	});
	
	$("#rateSelect").change(function() {
		$("#rateSlider").slider("value", this.selectedIndex);
		$("#rateText").html(rateText[this.selectedIndex]);
	});
</script>
<style>
	#rateSlider {
		margin-top: 8px;
		margin-left: 20px;
	}
	#rateText {
		margin-top: 6px;
	}
</style>
<script src="/static/js/holder.js"></script>