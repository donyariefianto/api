<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-2">

    <div class="row">

        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Stok Barang</h2>
        </div>
        <div class="col-md-12 mt-1 mb-2"><button type="button" id="add" class="btn btn-success">Add</button></div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Item</th>
                  <th scope="col">Size</th>
                  <th scope="col">Price</th>
                  <th scope="col">Stock</th>
                  <th scope="col">All Price</th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($product as $prdk)
                <tr>
                    <td>{{ $prdk->id }}</td>
                    <td>{{ $prdk->item }}</td>
                    <td>{{ $prdk->size }}</td>
                    <td>{{ $prdk->price }}</td>
                    <td>{{ $prdk->stock }}</td>
                    <td>{{ $prdk->allPrice }}</td>
                    <td>
                       <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $prdk->id }}">Edit</a>
                      <a href="javascript:void(0)" class="btn btn-primary delete" data-id="{{ $prdk->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
             {!! $product->links() !!}
        </div>
    </div>        
</div>

<!-- boostrap model -->
    <div class="modal fade" id="addModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="Model"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="formuli" name="formulir" class="form-horizontal" method="POST">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Item Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="item" name="item" placeholder="Enter Item Name" value="" maxlength="50" required="">
                </div>
              </div>  

              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Size</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="size" name="size" placeholder="Enter Book Code" value="" maxlength="50" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Price</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Stock</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter Stock" value="" required="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">All Price</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="allPrice" name="allPrice" placeholder="Enter All price" value="" required="">
                </div>
              </div>

              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" id="btn-save" value="add">Save
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
<script type="text/javascript">
 $(document).ready(function($){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add').click(function () {
       $('#formulir').trigger("reset");
       $('#Model').html("Add Stok");
       $('#addModal').modal('show');
    });
 
    $('body').on('click', '.edit', function () {

        var id = $(this).data('id');
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#Model').html("Edit Stok");
              $('#addModal').modal('show');
              $('#id').val(res.id);
              $('#item').val(res.item);
              $('#size').val(res.size);
              $('#price').val(res.price);
              $('#stock').val(res.stock);
              $('#allPrice').val(res.allPrice);
           }
        });

    });

    $('body').on('click', '.delete', function () {

       if (confirm("Delete Record?") == true) {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('delete') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){

              window.location.reload();
           }
        });
       }

    });

    $('body').on('click', '#btn-save', function (event) {
          var id = $('#id').val();
          var item = $("#item").val();
          var size = $("#size").val();
          var price = $("#price").val();
          var stock = $("#stock").val();
          var allPrice = $("#allPrice").val();

          $("#btn-save").html('Please Wait...');
          $("#btn-save"). attr("disabled", true);
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ url('add') }}",
            data: {
              id:id,
              item:item,
              size:size,
              price:price,
              stock:stock,
              allPrice:allPrice,
            },
            dataType: 'json',
            success: function(res){
             window.location.reload();
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
           }
        });

    });

});
</script>
</body>
</html>