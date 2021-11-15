<h3 class='title'>
    {{$title}}.
    <div class='table-icon'>
        @include('component.search_bar',['simple'=>true])         
        <div class="table-item">
            <div class='table-icon-item filter-box'>
                <i class='ti ti-filter'></i><small>Filter</small>
            </div>
        </div>
    </div>
</h3>

<div class="filter-form">
    <h5 class="filter-title">Filter Criteria</h5>
    {{ Form::open(array('method' =>'GET')) }}
        <div class="form-group row " >
            @foreach($data as $input)
                    
                <div class="form-group col-md-6">
                    <div class="row">
                        <label class="col-12 col-sm-2 col-form-label">{{$input['title']}}</label>
                        <div class="col-12 col-sm-10">
                            @if($input['type']=='select')
                                {{Form::select($input['name'], $input['option'], requestInput($input['name']),['class'=>'form-control'])}}
                            @else 
                                <input class="form-control {{($input['type']=='date')?'datepicker':''}}" type="{{$input['type']}}" name="{{$input['name']}}" placeholder="" value="{{requestInput($input['name'])}}">
                            @endif
                        </div>
                    </div>
                </div>        
            
            @endforeach
        </div>
        <button class='btn btn-primary-light under-development' data-title='Smart Filter' data-desc='This feature allows merchants to filter data based on multiple flexible options' type='button' > Filter </button>
    {{ Form::close() }}
</div>