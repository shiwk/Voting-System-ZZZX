@extends('back_end.template')

@section('content')

			<!-- BEGIN PAGE CONTAINER-->

			<div class="container-fluid">

				
				<!-- BEGIN PAGE HEADER-->   

				<div class="row-fluid">

					<div class="span12">

						<h3 class="page-title">

							新建活动

							 <small>输入活动及选手信息</small>

						</h3>
						
					</div>
					
				</div>
				
				<!-- END PAGE HEADER-->

			</div>
			
			<!-- BEGIN PAGE CONTENT-->

			<div class="row-fluid">

				<div class="span12">
					
					<div class="portlet box blue tabbable">

						<div class="portlet-title">

							<div class="caption">

								<i class="icon-reorder"></i>输入活动信息

							</div>

						</div>

						<div class="portlet-body form">

							<div class="tabbable portlet-tabs">

								<div class="tab-content">

									<div class="tab-pane active">

										</br>

										</br>

										</br>

										<!-- BEGIN FORM-->

										<form action="activity" method='post' class="form-horizontal">

											<div class="control-group">

												<label class="control-label">活动名称</label>

												<div class="controls">

													<input type="text" name="act_name" class="m-wrap small" />

													<span class="help-inline">提示</span>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">选手人数</label>

												<div class="controls">

													<input type="text" name="act_candidate_num" class="m-wrap small" />

													<span class="help-inline">提示</span>

												</div>

											</div>	
											
											<div class="control-group">

												<label class="control-label">投票上限</label>

												<div class="controls">

													<input type="text" name="act_vote_upto" class="m-wrap small" />
													
													<span class="help-inline">上下限可相同</span>
													
												</div>

											</div>	

											<div class="control-group">

												<label class="control-label">投票下限</label>

												<div class="controls">

													<input type="text" name="act_vote_atleast" class="m-wrap small" />
													
													<span class="help-inline">提示</span>
													
												</div>

											</div>	

											<div class="control-group">

												<label class="control-label">开始日期</label>
												
												<div class="controls">
													
													<input name="act_start_time" type="date" value=""/>
												
												</div>
											
											</div>
											
											<div class="control-group">

												<label class="control-label">结束日期</label>
												
												<div class="controls">
													
													<input name="act_stop_time" type="date" value=""/>
												
												</div>
											
											</div>

											<div class="control-group">

												<label class="control-label">活动介绍</label>

												<div class="controls">

													<textarea name="act_discription" class="large m-wrap" rows="4"></textarea>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">活动规则</label>

												<div class="controls">

													<textarea name="act_rule" class="large m-wrap" rows="4"></textarea>

												</div>

											</div>
											
											<div class="control-group">

												<label class="control-label">活动奖品</label>

												<div class="controls">

													<textarea name="act_prizes" class="large m-wrap" rows="4"></textarea>

												</div>

											</div>

											<input type="hidden" name="_token"  value="{{ csrf_token() }}"/>
											
											<div class="form-actions">

												<button type="submit" class="btn blue"><i class="icon-arrow-right"></i> 下一页</button>

												<button type="button" class="btn"><i class="icon-remove"></i> 取消</button>

											</div>

										</form>

											<!-- END FORM-->  

									</div>

								</div>

							</div>

						</div>

					</div>
						
				</div>

			</div>

			<!-- END PAGE CONTENT--> 

			</div>

			<!-- END CONTAINER -->


	<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

@stop