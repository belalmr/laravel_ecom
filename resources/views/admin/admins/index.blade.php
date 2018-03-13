@extends('admin.index')
@section('content')
    <div class="box">
        <div class="box-header">
            <h2 class="box-body">{{ $title }}</h2>
        </div>
        <div class="box-body">
            {{ $dataTable->table(['class' => 'dataTable table table-striped table-hover table-bordered']) }}
        </div>
    </div>

    @push('js')
        {{ $dataTable->scripts() }}
    @endpush

@endsection
