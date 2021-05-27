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

    {{ Form::open(['id' => 'add-comment-form']) }}
    <div class="col-12 mt-3">
        <textarea name="comment" class="form-control"></textarea>
        <input type="submit" value="Add comment" class="btn btn-success">
    </div>
    {{ Form::close() }}

    <table class="table" id="comments-list">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Author</th>
            <th scope="col">Date</th>
            <th scope="col">Comment</th>
        </tr>
        </thead>
        <tbody>
        @foreach (\App\Models\Entities\CommentEntity::query()->with('author')->get() as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->author->name }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{ $comment->comment }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
