@extends('layout')
@section('content')

<div class="col-md-12">

    <a href="{{route('home')}}" class="btn btn-info">HOME</a>
    <h3>File Exist in storage/app/public/textfiles : </h3>

    @if(!empty($files) && count($files) > 0)
        @foreach($files as $file)
            @php
            $fileName = str_replace('textfiles/', '', $file);
            @endphp
            <div class="col-md-12 mg-10">
                {{$fileName}} - <a class="btn btn-xs btn-success" href="{{route('home')}}?get_file={{$fileName}}"> Show</a>
            </div>
        @endforeach
    @endif

    <div class="col-md-12 second-content">
    @if(!empty($getResults) && count($getResults) > 0)
            <h3>Result : </h3>
            @foreach($getResults as $result)
                {{array_key_first($result)}} - {{$result[array_key_first($result)]}}
                </br>
            @endforeach
    @endif
    </div>

</div>
@endsection