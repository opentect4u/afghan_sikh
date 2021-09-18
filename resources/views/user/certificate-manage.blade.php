@extends('admin.common.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Services</h1>
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
                <h3 class="card-title">Apply Certificate</h3>
                <a href="{{route('user.addcertificate')}}" float="right" class="btn btn-outline-primary float-right">Apply Service</a>
              </div>
              <!-- <div class="card-header">
                <input type="radio" id="pending" name="click_status" value="I" <?php if(isset($status_details) && $status_details=="I"){ echo "checked";}?>>
                <label for="html"> Pending</label>&nbsp;&nbsp;
                <input type="radio" id="active" name="click_status" value="A" <?php if(isset($status_details) && $status_details=="A"){ echo "checked";}?>>
                <label for="html"> Approved</label>&nbsp;&nbsp;<input type="radio" id="reject" name="click_status" value="R" <?php if(isset($status_details) && $status_details=="R"){ echo "checked";}?>>
                <label for="css">Rejected</label>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Certificate Type</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>View</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;?>
                    @foreach($data as $gurudwaras)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$gurudwaras->name}} </td>
                      <td>{{Carbon\Carbon::parse($gurudwaras->application_date)->format('d M Y')}}</td>
                      <td>
                        @if($gurudwaras->approved=='I')
                        {{"Pending"}}
                        @elseif($gurudwaras->approved=='A')
                        {{"Approved"}}
                        @elseif($gurudwaras->approved=='R')
                        {{"Reject"}}
                        @endif
                      </td>
                      <td id="actionTd{{$gurudwaras->id}}">
                        @if($gurudwaras->approved=='A')
                        <a href="javascript:void(0)" id="accept" ><i class="fas fa-edit"></i></a>
                        @else
                        <a href="{{route('user.certificateedit',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="accept" title="Edit"><i class="fas fa-edit"></i></a>
                        @endif
                      </td>
                      
                      <td id="actionTd{{$gurudwaras->id}}">
                      @if($gurudwaras->approved=='A')
                      <a href="#" id="accept" ><i class="fas fa-eye"></i></a>
                      @else
                      {{'---'}}
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

    $('#pending').click(function(){
      var val_pending=$('#pending').val();
      // alert(val_pending);
      var url=("{{route('admin.gurudwara')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
    $('#active').click(function(){
      var val_pending=$('#active').val();
      // alert(val_pending);
      var url=("{{route('admin.gurudwara')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
    $('#reject').click(function(){
      var val_pending=$('#reject').val();
      // alert(val_pending);
      var url=("{{route('admin.gurudwara')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
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

