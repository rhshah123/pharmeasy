@extends('layouts.app')

@section('content')
    <p>
    <ul class="nav nav-tabs">
        <li {{$tab == 'add' ? 'class=active' : ''}}>
            <a href="{{Request::url()}}?tab=add">Add</a>
        </li>
        <li {{$tab == 'past' ? 'class=active' : ''}}>
            <a href="{{Request::url()}}?tab=past">Past Records</a>
        </li>
        <li {{$tab == 'req' ? 'class=active' : ''}}>
            <a href="{{Request::url()}}?tab=req">Requests</a>
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
    @if($alert != '')
        <p class="alert alert-info">{{ $alert }}</p>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        </div>
    @endif
    @if($tab == 'add')
        @include('patient.addRecords')
    @elseif($tab == 'past')
        @include('patient.pastRecords')
    @elseif($tab == 'req')
        @include('patient.requests')
    @endif
@endsection
