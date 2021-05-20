@extends('layouts.main')

@section('content')
    <a href="{{ route('export.excel') }}" class="btn btn-info mt-3">Export to Excel</a>

    {{ Form::open([
        'url' => route('import.excel'),
        'method' => 'post',
        'enctype' => 'multipart/form-data',
    ]) }}
        <div class="col-12 mt-3">
            <input type="file" name="file" multiple>
            <input type="submit" value="Import from Excel" class="btn btn-success">
        </div>
    {{ Form::close() }}
@stop
