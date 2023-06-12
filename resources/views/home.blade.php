@extends('layouts.app')

@section('content')
<div class="row p-3 w-75 d-flex justify-content-center">
    
    <!-- Excel file upload form -->
    <div class="col-md-12" id="excel_import">
        <form class="row g-3" action="{{route('store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-auto">
                <label for="fileInput" class="visually-hidden">File</label>
                <input type="file" class="form-control" name="file" id="fileInput" />
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
            </div>
        </form>
    </div>

    <!-- Data list table --> 
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>12</td>
      <td>Denim</td>
      <td>22.01.2023</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>16</td>
      <td>Denim</td>
      <td>27.01.2023</td>
    </tr>
  </tbody>
</table>
</div>

@endsection