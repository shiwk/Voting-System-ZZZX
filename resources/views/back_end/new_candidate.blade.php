@extends('back_end.template')@section('content')			<!-- BEGIN PAGE CONTAINER-->			<div class="container-fluid">								<!-- BEGIN PAGE HEADER-->   				<div class="row-fluid">					<div class="span12">						<h3 class="page-title">							新建活动							 <small>输入活动及选手信息</small>						</h3>											</div>									</div>								<!-- END PAGE HEADER-->			</div>						<!-- BEGIN PAGE CONTENT-->			<div class="row-fluid">				<div class="span12">										<div class="portlet box blue tabbable">						<div class="portlet-title">							<div class="caption">								<i class="icon-reorder"></i>输入选手信息							</div>						</div>						<div class="portlet-body form">							<div class="tabbable portlet-tabs">								<div class="tab-content">									<div class="tab-pane  active">										</br>										</br>										</br>										<form action="show_activity" method='post' class="form-horizontal">											<input type="hidden" name="act_name"  value="{{ $activity['act_name']}}"/>											<input type="hidden" name="act_candidate_num"  value="{{ $activity['act_candidate_num']}}"/>											<input type="hidden" name="act_vote_upto"  value="{{ $activity['act_vote_upto']}}"/>											<input type="hidden" name="act_vote_atleast"  value="{{ $activity['act_vote_atleast']}}"/>											<input type="hidden" name="act_start_time"  value="{{ $activity['act_start_time']}}"/>											<input type="hidden" name="act_stop_time"  value="{{ $activity['act_stop_time']}}"/>											<input type="hidden" name="act_discription"  value="{{ $activity['act_discription']}}"/>											<input type="hidden" name="act_rule"  value="{{ $activity['act_rule']}}"/>											<input type="hidden" name="act_prizes"  value="{{ $activity['act_prizes']}}"/>											@for($i = 0; $i < $activity['act_candidate_num']; $i++)												<h4>候选人{{$i+1}}</h4>																									<div class="control-group">													<label class="control-label">姓名</label>													<div class="controls">														<input type="text" name="can_name_{{ $i }}" class="m-wrap small" />														<span class="help-inline">提示</span>													</div>												</div>																									<div class="control-group">													<label class="control-label">学号</label>													<div class="controls">														<input type="text" name="can_student_id_{{ $i }}" class="m-wrap small" />														<span class="help-inline">提示</span>													</div>												</div>																									<div class="control-group">																<label class="control-label">学院</label>														<div class="controls">														<input type="text" name="can_school_{{ $i }}" class="m-wrap small" />														<span class="help-inline">提示</span>													</div>												</div>												<div class="control-group">													<label class="control-label">介绍</label>													<div class="controls">														<textarea name="can_discription_{{ $i }}" class="large m-wrap" rows="4"></textarea>													</div>												</div>																								@if($i != $activity['act_candidate_num'] - 1)													<hr style="height:1px;border:none;border-top:1px solid #7fff00;" />												@endif											@endfor											<input type="hidden" name="_token"  value="{{ csrf_token() }}"/>											<div class="form-actions">																								<button type="submit" class="btn blue"><i class="icon-ok"></i> 保存</button>																																			</div>																						</form>									</div>								</div>							</div>						</div>					</div>										</div>			</div>			<!-- END PAGE CONTENT--> 			</div>			<!-- END CONTAINER --><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body><!-- END BODY -->@stop