@extends('admin.layouts.dashboard')

@section('content')
<h1>Create New Invoice</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/posts" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="example-date-input" class="col-2 col-form-label">OrderDate</label>
      <div class="col-10">
        <input class="form-control" type="date" value="{{ old('OrderDate') }}" id="OrderDate" name="OrderDate">
      </div>
  </div>
    <div class="form-group">
      <div class="col-10">
      <label for="exampleInputFile">File input</label>
        <input type="file" name ="pdf" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" id="pdf">
          <small id="fileHelp" class="form-text text-muted">max kbs</small>
        </div>
      </div>
      <div class="form-group">
        <label for="example-date-input" class="col-2 col-form-label">desired delivery date</label>
          <div class="col-10">
            <input class="form-control" type="date" name="DeliveryDate" value="{{ old('DeliveryDate') }}" id="DeliveryDate">
          </div>
      </div>
      <div class="form-group">
        <div class="col-10">
  <label for="example-text-input" class="col-2 col-form-label">Comment Santexo:</label>
    <textarea rows="3" class="form-control" type="text"name="CommentarySantexo" id="CommentarySantexo">{{ old('CommentarySantexo')}}</textarea>
        </div>
      </div>
      <div class="form-group pt-2">
          <input class="btn btn-primary" type="submit" value="Submit">
      </div>
</form>
@endsection
