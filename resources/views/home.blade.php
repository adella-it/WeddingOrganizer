@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($wedding as $wedd)
        <div class="card w-25 m-3 ">
            <div class="card m-3">
               <img style="height:200px" src="Storage/{{$wedd->image}}" alt="">   
           </div> 
           
           <div class="card-body">
            <h5 class="card-title text-primary">{{$wedd->name}}</h5>
            <p class="card-text">{{$wedd->description}}</p>

            <form action="{{route('deletewedding', ['id'=> $wedd->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">
                  Delete Wedding
                </button>
                </form>
          </div>

        </div>
        @endforeach
@endsection