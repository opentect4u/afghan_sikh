@extends('admin.common.master')
@section('content')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Manage</h1>
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
                <h3 class="card-title">All Users</h3>
              </div>
              <div class="card-header">
                <!-- <h3 class="card-title">All Users</h3> -->
                <input type="radio" id="pending" name="click_status" value="I" <?php if(isset($status_details) && $status_details=="I"){ echo "checked";}?>>
                <label for="html"> Pending</label>&nbsp;&nbsp;
                <input type="radio" id="active" name="click_status" value="A" <?php if(isset($status_details) && $status_details=="A"){ echo "checked";}?>>
                <label for="html"> Approved</label>&nbsp;&nbsp;<input type="radio" id="reject" name="click_status" value="R" <?php if(isset($status_details) && $status_details=="R"){ echo "checked";}?>>
                <label for="css">Rejected</label>
                <!-- </br>
                <label for="css">Date :</label>
                <input type="text" id="dateFilter" class="form-control col-md-4"/>
                <input type="button" id="ApplyFilter" class="btn btn-outline-primary" value="Apply" /> -->
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Application Date</th>
                    <th>Type of Application</th>
                    <th>Self or Family</th>
                    <th>Name</th>
                    <!-- <th>Gurdwara</th> -->
                    <!-- <th>Application Date</th> -->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;?>
                    @foreach($gurudwara as $gurudwaras)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{Carbon\Carbon::parse($gurudwaras->application_date)->format('d M Y')}}</td>
                      <td>{{$gurudwaras->service_type}}</td>
                      <td>{{$gurudwaras->self_or_family}}</td>
                      <td>
                        @if($gurudwaras->self_or_family=='Self')
                        {{$gurudwaras->surname.' '.$gurudwaras->givenname}}
                        @else
                        {{$gurudwaras->first_name.' '.$gurudwaras->middle_name.' '.$gurudwaras->last_name}}
                        @endif
                      </td>
                      <!-- <td>@if($gurudwaras->gurudwaras_name!=''){{$gurudwaras->gurudwaras_name}} @else {{'--'}} @endif</td> -->
                      <!-- <td>{{ Carbon\Carbon::parse($gurudwaras->created_at)->format('d M Y')}}</td> -->
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
                        @endif</td>
                      <td id="actionTd{{$gurudwaras->id}}">
                        <a href="{{route('admin.servicesedit',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="accept" ><i class="fas fa-edit"></i></a>
                       
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
      var url=("{{route('admin.services')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
    $('#active').click(function(){
      var val_pending=$('#active').val();
      // alert(val_pending);
      var url=("{{route('admin.services')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
    $('#reject').click(function(){
      var val_pending=$('#reject').val();
      // alert(val_pending);
      var url=("{{route('admin.services')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })


    $('#dateFilter').daterangepicker({
      opens: 'left',
      // endDate: new Date();
      autoApply: true,
    }, function(start, end, label) {
      // picker.start.format('YYYY-MM-DD');
      // dateFilter
      // $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    


    // ApplyFilter
    $('#ApplyFilter').click(function(){
      var val_pending=$('#dateFilter').val();
      // alert(val_pending);
      var url=("{{route('admin.services')}}")+"?date="+val_pending;
      // alert(url);
      window.location.assign(url);
    })


  });
  // actionTd 
  
</script>
@endsection

