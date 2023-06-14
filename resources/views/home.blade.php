@extends('layouts.app')

@section('content')
<div class="row p-3 w-75 d-flex justify-content-center ">
    
    <!-- Excel file upload form -->
    <div class="col-md-12">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
    </div>
    <div class="col-md-12" id="excel_import">
        
        <form class="row g-3" action="{{route('store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-auto">
                <label for="excel_file" class="visually-hidden">File</label>
                <input type="file" class="form-control" name="excel_file" id="excel_file" />
                @error('excel_file')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
            </div>
        </form>
    </div>

    <!-- Data list table --> 
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <td>{{$product->id}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->date}}</td>
    </tr> 
    @endforeach
  </tbody>
</table>
<div class="d-flex">
    {!! $products->links() !!}
</div>
</div>

@endsection