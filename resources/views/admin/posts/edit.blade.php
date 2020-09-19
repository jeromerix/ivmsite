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
                <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                    @method('PATCH')
                    {{ csrf_field() }}
                  <input class="btn btn-primary" type="submit" value="Update">
              </th>
              </tr>
            </tfoot>
            <tbody>
                <tr>
                <td>
                  <div class="form-group">
                    <input type="date" name="OrderDate" class="form-control" id="OrderDate" value="{{ old('OrderDate', $post->OrderDate) }}" required>
                  </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="file" name ="pdf" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" id="pdf">
                          <small id="fileHelp" class="form-text text-muted">upload new</small>
                      </div>
                    </td>
                <td>
                  <div class="form-group">
                        <input class="form-control" type="date" name="DeliveryDate" value="{{ old('DeliveryDate', $post->DeliveryDate) }}" id="DeliveryDate">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                        <input class="form-control" type="date" name="ConfirmedDelivery" value="{{ old('ConfirmedDelivery', $post->ConfirmedDelivery) }}" id="ConfirmedDelivery">
                  </div>
                </td>
                <td>
                  <div class="form-group">
                    <select class="custom-select" id="InProduction" name="InProduction">
                        <option name="Not in production" value="Not in production">Not in production</option>
                        <option name="in production" value="in production">in production</option>
                  </div>
                    </select>

                </td>
                <td>
                  <div class="form-group">
                    <select class="custom-select" id="ready"  name="ready">
                        <option name="No" value="No">No</option>
                        <option name="Yes" value="Yes">Yes</option>
                    </select>
                  <div>
                </td>
                <td>
                  <div class="form-group">
                    <select class="custom-select" id="send" name="send">
                        <option name="No" value="No">No</option>
                        <option name="send" value="send">send</option>
                    </select>
                </td>
                <td>
                  <div class="form-group">
                <textarea rows="1" class="form-control" type="text"name="CommentarySantexo" id="CommentarySantexo">{{ old('CommentarySantexo', $post->CommentarySantexo) }}</textarea>
                  </div>
                </td>
                <td>
                  <div class="form-group">
                      <textarea rows="1" class="form-control" type="text"name="CommentarySupplier" id="CommentarySupplier">{{ old('CommentarySantexo', $post->CommentarySupplier) }}</textarea>
                  </div>
                </td>
              </tr>
            </form>
            </tbody>
          </table>
        </div>
        <div class="card-footer small text-muted">Updated .....</div>
    @endsection
