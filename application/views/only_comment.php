<div class="container">

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
<?php if (count($list_comment) > 0): ?>
<div class="infinite-scroll" data-ui="jscroll-default">
	<a class="jscroll-next" href="/only/comment/<?=$list_comment[count($list_comment)-1]->commentidx?>"></a>
</div>
<?php endif; ?>


<style>
	.table {
		margin-bottom: 0;
		margin-top: 0;
	}		
</style>

