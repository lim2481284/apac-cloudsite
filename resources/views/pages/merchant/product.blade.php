@extends("pages.merchant.layout.index")

@section('head')

<title>Cloudsite - Product Management</title>
<link href="/css/prod/component/table.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<link href="/css/prod/merchant/product.min.css{{ config('app.link_version') }}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/prod/merchant/product.min.js{{ config('app.link_version') }}"></script>

@endsection

@section('content')
<div class='table-btn-section'>
    <button class='btn circle-btn ml-2 mr-3 under-development' data-title='Create Product' data-desc='This feature allows merchants to create online products with flexible settings and variations. '> 
            <i class='ti-plus'> </i>
        <span>Create</span>
    </button>

    <a href='#'>
        <button class='btn circle-btn secondary-circle-btn under-development' data-title='Product Category' data-desc='This feature allows merchants to create product categories to better group products'> 
                <i class='ti-layers-alt'> </i>
                <span>Category</span>
        </button>
    </a>
    
    <button class='btn circle-btn third-circle-btn ml-3 under-development' data-title='Product Import' data-desc='This feature allows merchants to quickly import bulk products into the system' > 
            <i class='ti-cloud-up'> </i>
            <span>Import</span>
    </button>

</div>

<div class='table-section'>
    <div class='inline-table-form-section'>
        @include('component.table_top_section',[
            'title'=> 'Product Management',
            'data'=>[
                ['type'=>'select', 'option'=> [''=>'All'] ,'name'=>'category','title'=> 'Category'],
                ['type'=>'select', 'option'=> [''=>'All'] ,'name'=>'status','title'=> 'Status'],
                ['type'=>'date','name'=>'startDate','title'=> 'Start Date'],
                ['type'=>'date','name'=>'endDate','title'=> 'End Date'],
            ]
        ])
    </div>
    <div class='no-data-section'>
        <img class='beat-animation' src='/img/picture/no_widget.png'/>
        <p> There is no Product yet. </p>
        <button class='btn btn-primary-light no-btn under-development' data-title='Create Product' data-desc='This feature allows merchants to create online products with flexible settings and variations. '> Create Now </button>
    </div>    
     
</div>

@stop