@extends('layouts.main')

@section('content')

    {!! LiqPayService::pay(100, 'UAH', 'test order', '123-33-22') !!}

@stop
