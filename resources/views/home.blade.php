@extends('layouts.app')

@section('content')
<div class="row p-3 w-75 d-flex justify-content-center">
    <!-- Import link -->
    <div class="col-md-12 head">
        <div class="float-end">
            <a href="javascript:void(0);" class="btn btn-success mb-1" onclick=""><i class="plus"></i> Import Excel</a>
        </div>
    </div>
    <!-- Excel file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form class="row g-3" action="importData.php" method="post" enctype="multipart/form-data">
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
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Denim</td>
                <td>21.01.2023</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Denim</td>
                <td>22.01.2023</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection