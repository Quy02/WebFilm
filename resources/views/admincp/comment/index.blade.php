@extends('layouts.app')

@section('content')
<div class="modal-body">
        <div class="card">
          <div class="card-header"><h3>Quản Lý Comment</h3></div>
        </div>
</div>
<table class="table" id="tablephim">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên phim</th>
        <th scope="col">Tên người Comment</th>
        <th scope="col">Comment</th>
        <th scope="col">Quản lý</th>
      </tr>
    </thead>
    <tbody>
      @foreach($comments as $key => $cate)
      <tr>
        <th scope="row">{{$key}}</th>
        <td>{{$cate->movie->title}}</td>
        <td>{{$cate->name_customer}}</td>
        <td>{{$cate->comment}}</td>
        
       <td>
            {!! Form::open(['method'=>'DELETE','route'=>['comment.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
              {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection