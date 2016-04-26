<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxium-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone-no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="author" content="天津大学资助管理中心"/>
    <title>天津大学资助管理中心</title>
    <script src="<?php echo asset('js/jquery-migrate.min.js') ?>"></script>
    <script src="<?php echo asset('js/jquery.min.js') ?>"></script>
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>">
    <script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo asset('js/jquery.validate.min.js') ?>"></script>
    <script src="<?php echo asset('js/additional-methods.min.js') ?>"></script>
    <style type="text/css">
        .row-margin-top20 {
            margin-top: 20px;
        }

        .w100 {
            width: 100%;
        }

        .h100 {
            height: 100%;
        }

        .checkbox40 {
            width: 40px;
            height: 40px;
        }

        .tableWidth{
            width: 50%;
        }
    </style>
    <script>
    var upto = <?php echo json_encode($data['act_info']->act_vote_upto); ?>;
    var atleast = <?php echo json_encode($data['act_info']->act_vote_atleast); ?>;
        $(document).ready(function () {
            $('#voteForm').validate({
                onsubmit: true,
                onfocusout: false,
                onkeyup: false,
                onclick: false,                
                rules: {
                    'candidate[]': {
                        required: true,
                        minlength: atleast,
                        maxlength: upto
                    }
                },
                messages: {
                    'candidate[]': {
                        required: "您还未选择任何一项！",
                        minlength: "请至少选择{0}项！",
                        maxlength: "请勿选择超过{0}项！"
                    }
                },
                showErrors: function(errorMap, errorList) {  
                    var msg = "";  
                    $.each( errorList, function(i,v){  
                      msg += (v.message+"\r\n");  
                    });  
                    if(msg!="") alert(msg);  
                },  
                submitHandler: function (form) {
                    form.submit();
                    return true;
                }
            });

        });
    </script>
</head>
<body>
<img src="<?php echo asset('images/tjuzzglzx.jpg') ?>" width="100%"/>

<div class="text-center ">
    <h2>{{ $data['act_info']->act_name }}</h2>
</div>

<div class="row row-margin-top20">
    <div class="col-xs-6">
        <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#regulations">
            投票规则
        </button>
    </div>
    <div class="col-xs-6">
        <button type="button" class="btn btn-primary center-block" data-toggle="modal" data-target="#prizes">
            奖品展示
        </button>
    </div>
</div>

<div id="regulations" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">投票规则</h4>
            </div>
            <div class="modal-body">
                <p> {{ $data['act_info']->act_rule }} </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<div id="prizes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">奖品展示</h4>
            </div>
            <div class="modal-body">
                <p> {{ $data['act_info']->act_prizes }} </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<div class="row-margin-top20">
    <form method="POST" action="voteProcessing/{{{ $data['act_info']->act_id }}}" name="voteForm" id="voteForm">
        @foreach ($data['can_info'] as $candidate)
            <div style="width: 80%; margin-left: 10%; ">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <table class="w100"><tr>
                            <td class="tableWidth" align="center">
                                <div class="checkbox">
                                    <label><input name="candidate[]" type="checkbox" id="candidate" value="{{ $candidate->can_id }}"/>{{ $candidate->can_name }}</label>
                                </div>
                                <p style="margin-top: 1rem;">已获得票数：{{ $candidate->can_voting_number }}</p>
                            </td>
                            <td class="tableWidth" data-toggle="modal" data-target="#introduction{{ $candidate->can_id }}">
                                <img src="<?php echo asset('images/back.jpg') ?>" class="img-circle" alt="HeadImage" width="100" height="100">                            
                            </td>
                        </tr></table>
                    </div>               
                </div>
                <div id="introduction{{ $candidate->can_id }}" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">{{ $candidate->can_name }}</h4>
                            </div>
                            <div class="modal-body">
                                <p> {{ $candidate->can_discription }} </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        @endforeach
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />  
        <input type="submit" class="btn btn-primary center-block" value="确认"/>
    </form>
</div>



<img style="margin-top: 2rem" src="<?php echo asset('images/tjuzzglzx.jpg') ?>" width="100%" alt="image"/>
</body>
</html>
