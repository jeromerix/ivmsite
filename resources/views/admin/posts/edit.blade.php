@extends('admin.layouts.dashboard')

@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Invoice edit</h2>
    </div>
</div>

<!---DataTables----->
<div class= "card mb-3">
  <div class="card-header">
      Data Table Example</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>orderdate</th>
                <th>pdf</th>
                <th>Requested date</th>
                <th>confirmed date</th>
                <th>status</th>
                <th>ready</th>
                <th>send</th>
                <th>comment Santexo</th>
                <th>comment Supplier</th>
            </thead>
            <tfoot>
              <tr>
                <th>
                <a href="/posts" class="btn btn-primary btn-lg " role="button" aria-pressed="true">back</a>
                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <input class="btn btn-primary" type="submit" value="Update">
              </th>
              </tr>
            </tfoot>
            <tbody>
                <tr>
                  <form method="POST" action="/posts" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <td>
                  <div class="form-group">
                    <input type="date" name="OrderDate" class="form-control" id="OrderDate" placeholder="{{ $post['OrderDate'] }}" value="{{ old('OrderDate') }}" required>
                  </div>
                </td>
                <td>    <div class="form-group">
                        <input type="file" name ="pdf" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" id="pdf">
                          <small id="fileHelp" class="form-text text-muted">upload new</small>
                      </div></td>
                <td>
                  <div class="form-group">
                        <input class="form-control" type="date" name="DeliveryDate" value="{{ old('DeliveryDate') }}" id="DeliveryDate">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                        <input class="form-control" type="date" name="DeliveryDate" value="{{ old('DeliveryDate') }}" id="DeliveryDate">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <select class="custom-select" id="InProductionCategory">
                        <option name="test4" value="test4">Not in production</option>
                        <option name="test5" value="test5">in production</option>
                    </select>
                  <div>
                </td>
                <td>
                  <div class="form-group">
                    <select class="custom-select" id="Ready">
                        <option name="test4" value="test4">No</option>
                        <option name="test5" value="test5">Yes</option>
                    </select>
                  <div>
                </td>
                <td>
                  <div class="form-group">
                    <select class="custom-select" id="Ready">
                        <option name="test4" value="test4">No</option>
                        <option name="test5" value="test5">send</option>
                    </select>
                </td>
                <td>
                  <div class="form-group">
                <textarea rows="1" class="form-control" type="text"name="CommentarySantexo" id="CommentarySantexo"></textarea>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                      <textarea rows="1" class="form-control" type="text"name="CommentarySantexo" id="CommentarySantexo">{{ old('CommentarySantexo')}}</textarea>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer small text-muted">Updated .....</div>
    @endsection
