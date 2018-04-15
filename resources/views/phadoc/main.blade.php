@extends('layouts.app')

@section('content')
    <p>
    <ul class="nav nav-tabs">
        <li {{$tab == 'pat' ? 'class=active' : ''}}>
            <a href="{{Request::url()}}?tab=pat">Patients</a>
        </li>
        <li {{$tab == 'req' ? 'class=active' : ''}}>
            <a href="{{Request::url()}}?tab=req">Requests</a>
        </li>
        <li {{$tab == 'rec' ? 'class=active' : ''}}>
            <a href="{{Request::url()}}?tab=req">Record</a>
        </li>
    </ul>
    </p>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        </div>
    @endif
    @if($tab == 'pat')
        @include('phadoc.patients')
    @elseif($tab == 'req')
        @include('phadoc.requests')
    @elseif($tab == 'rec')
        @include('phadoc.records')
    @endif
@endsection

