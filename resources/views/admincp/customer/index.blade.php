@extends('layouts.app')

@section('content')
<div class="modal-body">
        <div class="card">
          <div class="card-header"><h3>Quản Lý Customer</h3></div>
        </div>
</div>
<table class="table" id="tablephim">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">user</th>
        <th scope="col">fullname</th>
        <th scope="col">dob</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customer as $key => $cate)
      <tr>
        <th scope="row">{{$key}}</th>
        <td>{{$cate->user}}</td>
        <td>{{$cate->fullname}}</td>
        <td>{{$cate->dob}}</td>
        
       <td>
            {!! Form::open(['method'=>'DELETE','route'=>['customer.destroy',$cate->id_customer],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
              {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


@endsection