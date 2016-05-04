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

								<i class="icon-reorder"></i>show activity

							</div>

						</div>

						<div class="portlet-body form">

							<div class="tabbable portlet-tabs">

								<ul class="nav nav-tabs">

									<li><a href="#portlet_tab2" data-toggle="tab">选手</a></li>

									<li class="active"><a href="#portlet_tab1" data-toggle="tab">活动</a></li>

								</ul>

								<div class="tab-content">

									<div class="tab-pane active" id="portlet_tab1">

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

												<label class="control-label">投票限制</label>

												<div class="controls">

													<input type="text" name="act_vote_upto" class="m-wrap small" />

													<input type="text" name="act_vote_atleast" class="m-wrap small" />
													
													<span class="help-inline">上限在前，下限在后，可相同</span>
													
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

													<textarea name="act_prizes" class="large m-wrap" rows="4">奖品是否设置为点击按钮增加一个奖品，单独为奖品创建一个表？</textarea>

												</div>

											</div>

											<input type="hidden" name="_token"  value="{{ csrf_token() }}"/>
											
											<div class="form-actions">

												<button type="submit" class="btn blue"><i class="icon-ok"></i> 保存</button>

												<button type="button" class="btn"><i class="icon-remove"></i> 取消</button>

											</div>

										</form>

											<!-- END FORM-->  

										</div>

										<div class="tab-pane " id="portlet_tab2">

											<form action="activity" method='post' class="form-horizontal">
												
												<div id="can_area">
												
													<div class="control-group">

														<label class="control-label">姓名</label>

														<div class="controls">

															<input type="text" name="can_name_0" class="m-wrap small" />

															<span class="help-inline">提示</span>

														</div>

													</div>
												
													<div class="control-group">

														<label class="control-label">学号</label>

														<div class="controls">

															<input type="text" name="can_student_id_0" class="m-wrap small" />

															<span class="help-inline">提示</span>

														</div>

													</div>
												
													<div class="control-group">
		
														<label class="control-label">学院</label>
	
														<div class="controls">

															<input type="text" name="can_school_0" class="m-wrap small" />

															<span class="help-inline">提示</span>

														</div>

													</div>

													<div class="control-group">

														<label class="control-label">介绍</label>

														<div class="controls">

															<textarea name="act_discription_0" class="large m-wrap" rows="4"></textarea>

														</div>

													</div>
													
												</div>
												
												<div class="form-actions">
												
													<button type="button" id="add" class="btn blue"><i class="icon-plus"></i> 添加</button>													
													
												</div>
												
											</form>

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



	<script>

	function save(){

	}

        x = 0;

		i = 1;
		
		document.getElementById("add").onclick=function(){
		    


			document.getElementById("can_area").innerHTML+='<div id="div_'+i+'">'+
			
																'<hr style="height:1px;border:none;border-top:1px solid #7fff00;" />'+
																
																'<div class="control-group">'+

																	'<label class="control-label">姓名</label>'+

																	'<div class="controls">'+

																		'<input type="text" name="can_name_'+i+'" class="m-wrap small" />'+

																		'<span class="help-inline">提示</span>'+
																							
																		'<button type="button" class="btn red" style="margin-left:50px;" onclick="del('+i+')"><i class="icon-remove"></i> 删除</button>'+

																	'</div>'+

																'</div>'+
																
																'<div class="control-group">'+

																	'<label class="control-label">学号</label>'+

																	'<div class="controls">'+

																		'<input type="text" name="can_student_id_'+i+'" class="m-wrap small" />'+

																		'<span class="help-inline">提示</span>'+

																	'</div>'+

																'</div>'+
																
																'<div class="control-group">'+

																	'<label class="control-label">姓名</label>'+

																	'<div class="controls">'+

																		'<input type="text" name="can_school_'+i+'" class="m-wrap small" />'+

																		'<span class="help-inline">提示</span>'+

																	'</div>'+

																'</div>'+
														

																'<div class="control-group">'+

																	'<label class="control-label">介绍</label>'+

																	'<div class="controls">'+

																		'<textarea name="act_discription_'+i+'" class="large m-wrap" rows="4"></textarea>'+

																	'</div>'+

																'</div>'+
															
															'</div>';
															
			i = i + 1;

			x = x + 1;
		}

		function del(o){

			document.getElementById("can_area").removeChild(document.getElementById("div_"+o));

			i = i - 1;

		}

	</script>

	<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

@stop