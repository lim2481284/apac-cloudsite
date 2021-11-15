<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    {{translate('create_goal',"Create Goal")}}
                </h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'system.goal.create', 'class'=>'row']) !!}
                    <div class='col-sm-12 form-group'>
                        <p>{{translate('target_amount_rm','Target Amount (RM)')}}</p>
                            <input type="number" id="target-amount" min="1000" max="5000" class="form-control target-amount" name="target_amount">
                            <div id="slider-target-amount"></div>
                    </div>
                    
                    <div class='col-sm-12 form-group'>
                        <p>{{translate('duration_day','Duration (Day)')}}</p>
                        <input type="number" id="duration" min="7" max="100" class="form-control" name="duration">
                            <div id="slider-duration"></div>
                    </div>
    
                    <div class='col-sm-12 form-group'>
                        <p>{{translate('total_reward','Total Reward')}}</p>
                        <input type="text" id="reward" class="form-control" disabled>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="submit" class='btn btn-primary'>{{translate('create','Create')}}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
           
        </div>
    </div>
</div>