@extends('admin.layouts.dashboard')

@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
        <h2>Invoice preview</h2>
    </div>
    @cannot('isManager')
    <div class="col-md-5">
        <a href="/posts/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Upload new invoice</a>
    </div>
    @endcannot
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
                <th>order</th>
                <th>desired delivery date</th>
                <th>confirmed delivery date</th>
                <th>in production</th>
                <th>ready</th>
                <th>send</th>
                <th>commentary Santexo</th>
                <th>commentary Supplier</th>
                <th>Tools</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>orderdate</th>
                <th>order</th>
                <th>desired delivery date</th>
                <th>confirmed delivery date</th>
                <th>in production</th>
                <th>ready</th>
                <th>send</th>
                <th>commentary Santexo</th>
                <th>commentarySupplier</th>
                <th>Tools</th>
              </tr>
            </tfoot>
            <tbody>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="#"><i class ="fa fa-eye"></i></a>
                <a href="#"><i class ="fa fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="#"><i class="fas fa-trash-alt"></i></a>
              </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="card-footer small text-muted">Updated .....</div>
        <!-- delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "delete" If you realy want to delete this user.</div>
              <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <form method="POST" action="">
                  @method('DELETE')
                  @csrf
                  {{-- <input type="hidden" id="post_id" name="post_id" value=""> --}}
                  <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Delete</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    @section('js_user_page')

    <script>
       $('#deleteModal').on('show.bs.modal', function (event) {
           var button = $(event.relatedTarget)
           var post_id = button.data('postid')

           var modal = $(this)
           // modal.find('.modal-footer #user_id').val(user_id)
           modal.find('form').attr('action','/post/' + post_id);
       })
   </script>
    @endsection
@endsection
