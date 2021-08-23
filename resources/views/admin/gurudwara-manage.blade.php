@extends('admin.common.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gurudwara Manage</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All gurudwaras</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;?>
                    @foreach($gurudwara as $gurudwaras)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$gurudwaras->user_id}}</td>
                      <td>{{$gurudwaras->name}}</td>
                      <td>{{$gurudwaras->created_at}}</td>
                      <td>{{$gurudwaras->updated_at}}</td>
                      <td id="actionTd{{$gurudwaras->id}}">
                        @if($gurudwaras->active=="I")
                        <button type="button" id="accept" onclick="acceptBtn({{$gurudwaras->id}},'{{$gurudwaras->user_id}}');" class="btn btn-block btn-outline-success">Accept</button>
                        <button type="button" id="reject" onclick="rejectBtn({{$gurudwaras->id}},'{{$gurudwaras->user_id}}');" class="btn btn-block btn-outline-danger">Reject</button>
                        @elseif($gurudwaras->active=="A")
                        <b style="color:#28a745;">{{"Acepted"}}</b>
                        @elseif($gurudwaras->active=="R")
                        <b style="color:#dc3545;">{{"Rejected"}}</b>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  <!-- <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.5
                    </td>
                    <td>Win 95+</td>
                    <td>5.5</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 6
                    </td>
                    <td>Win 98+</td>
                    <td>6</td>
                    <td>A</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet Explorer 7</td>
                    <td>Win XP SP2+</td>
                    <td>7</td>
                    <td>A</td>
                  </tr> -->
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection


@section('script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
  });
  // actionTd 
  function acceptBtn(id, user_id){
    // alert(id);
    $.ajax({
      type: "POST",
      url: "{{ route('admin.gurudwaraAccept') }}",
      data:{
        "_token": "{{ csrf_token() }}",
        id:id,
        user_id:user_id
      },
      success: function(data){
          alert(data);
          var obj = JSON.parse ( data );
          var msg=obj.msg;
          $("#accept").hide();
          $("#reject").hide();
          $('#actionTd'+id).empty();
          $('#actionTd'+id).append('<b style="color:#28a745;">Acepted</b>');
        }
    });
  } 
  function rejectBtn(id, user_id){
    // alert(id);
    $.ajax({
      type: "POST",
      url: "{{ route('admin.gurudwaraReject') }}",
      data:{
        "_token": "{{ csrf_token() }}",
        id:id,
        user_id:user_id
      },
      success: function(data){
          alert(data);
          var obj = JSON.parse ( data );
          var msg=obj.msg;
          $("#accept").hide();
          $("#reject").hide();
          $('#actionTd'+id).empty();
          $('#actionTd'+id).append('<b style="color:#dc3545;">Rejected</b>');
        }
    });
  } 
</script>
@endsection

