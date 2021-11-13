@extends("layout.layout")

@section('head')

@endsection

@section('content')

	<h1>{{translate('oops','oops!')}} </h1>
	<h2>{{translate('error_code','Error Code')}} Error Code</h2>
	<h3 class="code">{{$report_id}}</h3>
	<p>
		{{translate('click_for_assistance','Please click the send report button for futher assistance.')}}
	</p>
	<a href="mailto:{{env('MAIL_SUPPORT')}}">{{translate('send_report','Send Report')}} </a>
	<a class="back" href="javascript:history.back()">{{translate('go_back','Go Back')}} </a>

@stop
