<div class="container">

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<img class="img-responsive" src="<?=$food->filepath?>">
		</div>
		<div class="col-md-8 col-xs-12">
			<h3><?=$food->name?></h3>
			<p><span class="star"></span> <span id="rateSpan" name="rateSpan"><?=$food->rate?></span>점 <small>(<?=$food->ratecount?>명)</small></p>
			<p><?=$food->price?>원</p>
			<p><?=$food->company?></p>
			<p><?=$food->commentcount?>개 코멘트</p>
			<input type="hidden" name="foodidx" id="foodidx" value="<?=$food->foodidx?>">
			<div id="ButtonBeforeDiv" name="ButtonBeforeDiv" style="display:inline-block;">
				<button class="btn btn-info" data-toggle="modal" id="rateButtonBefore" name="rateButtonBefore" data-target="#rateModal">평가하기</button>
				<button class="btn btn-info" data-toggle="modal" id="commentButtonBefore" name="commentButtonBefore" data-target="#commentModal">코멘트쓰기</button>
			</div>
		</div>
	</div>

	<p>  </p>
	
	<table class="table table-hover" id="commentTable" name="commentTable">
		<colgroup>
			<col span="1" style="width:70px;">
			<col span="1" style="width:100%;">
		</colgroup>
		<tbody>
		<?php foreach ($comment as $row) :?>
			<tr>
				<td><img data-src="holder.js/64x64" class="img-circle" alt="test"></td>
				<td>
					<p>
						<?php if ($row->rate == '-1'):?>
						미평가
						<?php else:?>
						<span class="star"></span>
						<span><?=$row->rate?></span>점
						<?php endif; ?>
					</p>
					<p><b><?=$row->name?></b> <small>(<?=$row->writedate?>)</small></p>
					<p><?=$row->description?></p>
				</td>
			</tr>
		<?php endforeach; ?>
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
				<div class="col-md-5 col-xs-8" id="star"></div>
				<div class="col-md-3 col-xs-2"><span id="starText" name="starText"><?=$rate?></span>점 맛있어요</div>
			</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
				<button type="button" class="btn btn-primary" id="rateButton">저장</button>
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
				<textarea class="form-control" rows="4" id="description" name="description" placeholder="평가 후 코멘트를 남겨주세요."></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
				<button type="button" class="btn btn-primary" id="commentButton">저장</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/static/js/jquery.raty.js"></script>
<script>

	$(function() {
		if ("<?=!($this->session->userdata('is_login'))?>" == 1) {
			$("#rateButtonBefore").addClass("disabled");
			$("#commentButtonBefore").addClass("disabled");
			
			$("#ButtonBeforeDiv").tooltip({
				title: "로그인이 필요합니다.",
				placement: "right"
			});
		}

		$('.star').raty({
			score: function() { return parseFloat($(this).next().html())/2 },
			readOnly: true,
			half: true,
			path: '/static/img/star',
		});

		$('#star').raty({
			score: parseInt($("#starText").html()) / 2,
			half: true,
			path: '/static/img/star',
			click: function(score, evt) {
				score = Math.round(score * 2);
				$("#starText").html(score);
			}
		});

	});

	$('#commentButton').click(function() {
		var post_data = {
				'description' : $('#description').val(),
				'foodidx' : $('#foodidx').val()
		};
		$.ajax({
			type: "POST",
			url: "/food/insert_comment",
			data: post_data,
			success: function(message) {
				if (message == "success") {
					alert("코멘트를 등록하였습니다.");
					$('#commentModal').modal('hide');
					$('#commentTable').load(window.location.href + " #commentTable");
				}
				else if (message == "fail") {
					alert("로그인이 필요합니다.");
				}
			},
			error: function(xhr, status, error) {
				alert("에러발생");
			}
		});
	});	

	$('#rateButton').click(function() {
		var post_data = {
				'rate' : $("#starText").html(),
				'foodidx' : $('#foodidx').val()
		};
		$.ajax({
			type: "POST",
			url: "/food/insert_rate",
			data: post_data,
			success: function(message) {
				if (message == "success") {
					alert("평가를 등록하였습니다.");
					$('#rateModal').modal('hide');
					$('#rateSpan').load(window.location.href + " #rateSpan");
				}
				else if (message == "fail") {
					alert("로그인이 필요합니다.");
				}
			},
			error: function(xhr, status, error) {
				alert("에러발생");
			}
		});
	});

</script>
<script src="/static/js/holder.js"></script>