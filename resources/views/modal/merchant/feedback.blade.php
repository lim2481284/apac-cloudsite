

<div id="feedbackModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="btn modal-close-btn" data-dismiss="modal"><i class='ti-close'></i></button>     
            </div>
            <div class="modal-body">            
                <div class='container'>
                    {!! Form::open(['route' => 'feedback.submit']) !!}
                    <input type='hidden' value="{{getConfig('feedback.type.feedback')}}" name="type"/>
                    <div class='feedback-form'>
                        <h1> {{translate('we_love_feedback','We Love Feedback')}}. </h1>
                        <div class='feedback-message'>
                            <p> {{translate('feedback_msg','Feedback Message')}} </p>
                            <textarea name='message' class='form-control' rows='5'></textarea>
                        </div>
                        <div class='emoji-section'>
                            <p> {{translate('how_you_feel','How do you feel')}} </p>
                            <ul class="feedback">
                                <li class="angry">
                                    <input type='radio' class='hide' name='emotion' value='angry'/>
                                    <div>
                                        <svg class="eye left">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="eye right">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="mouth">
                                            <use xlink:href="#mouth">
                                        </svg>
                                    </div>
                                </li>
                                <li class="sad">
                                    <input type='radio' class='hide' name='emotion' value='sad'/>
                                    <div>
                                        <svg class="eye left">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="eye right">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="mouth">
                                            <use xlink:href="#mouth">
                                        </svg>
                                    </div>
                                </li>
                                <li class="ok">
                                    <input type='radio' class='hide' name='emotion' value='ok'/>
                                    <div></div>
                                </li>
                                <li class="good ">
                                    <input type='radio' class='hide' name='emotion' value='good'/>
                                    <div>
                                        <svg class="eye left">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="eye right">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="mouth">
                                            <use xlink:href="#mouth">
                                        </svg>
                                    </div>
                                </li>
                                <li class="happy active">
                                    <input type='radio' class='hide' name='emotion' value='happy' checked/>
                                    <div>
                                        <svg class="eye left">
                                            <use xlink:href="#eye">
                                        </svg>
                                        <svg class="eye right">
                                            <use xlink:href="#eye">
                                        </svg>
                                    </div>
                                </li>
                            </ul>
                                    
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
                                    <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
                                </symbol>
                                <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
                                    <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
                                </symbol>
                            </svg>
                        </div>
                        <div class='submit-section'>
                            <button class='btn btn-primary'> {{translate('submit','Submit')}} </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>         
        </div>
    </div>
</div>