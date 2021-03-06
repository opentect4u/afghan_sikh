@extends('admin.common.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ucfirst($service_type)}} Services</h1>
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
                <h3 class="card-title">{{ucfirst($service_type)}} Services</h3>
                <a href="<?php 
                  if($service_type=='FINANCE'){
                    echo route('user.servicesregisterfinance');
                  }elseif($service_type=='FAMILY DISPUTES'){
                    echo route('user.servicesregisterfamily');
                  }elseif($service_type=='MARRIAGES ISSUES'){
                    echo route('user.servicesregistermarriages');
                  }elseif($service_type=='RELIGIOUS ISSUE'){
                    echo route('user.servicesregisterreligious');
                  }elseif($service_type=='REUNION FAMILY'){
                    echo route('user.servicesregisterreunion');
                  }elseif($service_type=='PROPERTY DISPUTE'){
                    echo route('user.servicesregisterproperty');
                  }elseif($service_type=='DIVORCE DISPUTE'){
                    echo route('user.servicesregisterdivorce');
                  }elseif($service_type=='OTHER'){
                    echo route('user.servicesregisterother');
                  }
                ?>" float="right" class="btn btn-outline-primary float-right">Apply Service</a>
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
                    <th>Self or Family</th>
                    <th>Help Information</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Assign Gurdwara</th>
                    <th>Action</th>
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;?>
                    @foreach($data as $gurudwaras)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$gurudwaras->self_or_family}} </td>
                      <td>{{substr($gurudwaras->other_info,0,100)}}</td>
                      <td>{{Carbon\Carbon::parse($gurudwaras->application_date)->format('d M Y')}}</td>
                      <td>@if($gurudwaras->active=="I")
                        <b >{{"Pending for approval"}}</b>
                        @elseif($gurudwaras->active=="OH")
                        <b >{{'On Hold'}}</b>
                        @elseif($gurudwaras->active=="AD")
                        <b >{{'Awaiting document upload'}}</b>
                        @elseif($gurudwaras->active=="AR")
                        <b >{{'Awaiting Rectifications'}}</b>
                        @elseif($gurudwaras->active=="A")
                        <b style="color:#28a745;">{{"Approved"}}</b>
                        @elseif($gurudwaras->active=="R")
                        <b style="color:#dc3545;">{{"Rejected"}}</b>
                        @endif
                       
                      </td>
                      <td>
                        @if($gurudwaras->gurudwara_id!='')
                        <i class="fas fa-check-circle" style="color:#28a745;"></i>
                        @else
                        <i class="far fa-times-circle" style="color:red;"></i>
                        @endif
                      </td>
                      <td id="actionTd{{$gurudwaras->id}}">
                      @if($gurudwaras->active=="A")
                      <a href="#" id="" ><i class="fas fa-edit"></i></a>
                      <a href="#" id="" ><i class="fas fa-delete"></i></a>
                      @else
                      <a href="{{route('user.editservice',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="" ><i class="fas fa-edit"></i></a>
                      &nbsp;
                      <a href="{{route('user.deleteservice',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="" ><i class="fas fa-trash-alt"></i></a>
                      @endif
                      &nbsp;
                      <a href="{{route('user.viewservice',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="accept" ><i class="fas fa-eye"></i></a>
                       
                      </td>
                    </tr>
                    @endforeach
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

