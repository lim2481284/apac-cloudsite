@extends("layout.layout")

@section('head')
  
@endsection

@section('content')

  <h1 data-h1="404">404</h1>
  <p data-p="NOT FOUND">{{translate('page_not_found','Page Not Found')}}</p>
  <small>{{translate('click_back','Click anywhere to bring you back.')}} </small>

@stop
