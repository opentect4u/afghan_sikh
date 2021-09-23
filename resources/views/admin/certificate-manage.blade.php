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
            <h1>Certificate Management</h1>
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
                <h3 class="card-title">All Certificates</h3>
              </div>
              <div class="card-header">
              <div class="card-body">
                    <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control" >
                        <option value=""> -- Select Status -- </option>
                        <option value="I" <?php if($status_details=='I'){echo "selected";}?>>Pending for approval</option>
                        <option value="OH" <?php if($status_details=='OH'){echo "selected";}?>>On Hold</option>
                        <option value="AD" <?php if($status_details=='AD'){echo "selected";}?>>Awaiting document upload</option>
                        <option value="AR" <?php if($status_details=='AR'){echo "selected";}?>>Awaiting Rectifications</option>
                        <option value="R" <?php if($status_details=='R'){echo "selected";}?>>Reject</option>
                        <option value="A" <?php if($status_details=='A'){echo "selected";}?>>Approved</option>
                        <!-- <option value=""></option> -->
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Search by date</label>
                    <!-- <input type="text" class="form-control" id="date" name="date" value="{{isset($startDate)?$startDate.' - '.$endDate:''}}"/><i class="fas fa-calendar-alt"></i> -->
                    <div class="input-group mb-3 dateclass">
                      <input type="text" class="form-control dateclass" id="date" name="date" value="{{isset($startDate)?$startDate.' - '.$endDate:''}}"/>
                      <div class="input-group-append dateclass">
                        <span class="input-group-text dateclass"><i class="fas fa-calendar-alt dateclass"></i></span>
                      </div>
                    </div>
                  </div>
                  
                </div>

                </div>
                </div>
                
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
                      <td>{{$gurudwaras->name}}</td>
                      <td>
                        @if($gurudwaras->family_details_id!='')
                        {{'Family'}}
                        @else
                        {{'Self'}}
                        @endif
                      </td>
                      <td>
                        @if($gurudwaras->family_details_id=='')
                        {{$gurudwaras->surname.' '.$gurudwaras->givenname}}
                        @else
                        {{$gurudwaras->first_name.' '.$gurudwaras->middle_name.' '.$gurudwaras->last_name}}
                        @endif
                      </td>
                      <td>@if($gurudwaras->approved=="I")
                        <b >{{"Pending for approval"}}</b>
                        @elseif($gurudwaras->approved=="OH")
                        <b >{{'On Hold'}}</b>
                        @elseif($gurudwaras->approved=="AD")
                        <b >{{'Awaiting document upload'}}</b>
                        @elseif($gurudwaras->approved=="AR")
                        <b >{{'Awaiting Rectifications'}}</b>
                        @elseif($gurudwaras->approved=="A")
                        <b style="color:#28a745;">{{"Approved"}}</b>
                        @elseif($gurudwaras->approved=="R")
                        <b style="color:#dc3545;">{{"Rejected"}}</b>
                        @endif</td>
                      <td id="actionTd{{$gurudwaras->id}}">
                        <a href="{{route('admin.certificateedit',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="accept" ><i class="fas fa-edit"></i></a>
                       
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

    $(".dateclass").daterangepicker({
        autoUpdateInput: false,
        minYear: 1901,
        // maxDate: new Date(),
        // autoApply:true,
        showDropdowns: true,
        // singleDatePicker: true,
        timePicker: false,
        timePicker24Hour: false,
        timePickerIncrement: 05,
        drops: "down",
        locale: {
            format: 'DD-MM-YYYY'
        }
    }).on("apply.daterangepicker", function (e, picker) {
      // alert(picker.startDate+' '+picker.endDate)
      picker.element.val(picker.startDate.format(picker.locale.format) +' - '+ picker.endDate.format(picker.locale.format));
      var startDate=picker.startDate.format(picker.locale.format);
      var endDate=picker.endDate.format(picker.locale.format);
      var val_pending=$('#status').val();
      // alert(val_pending);
      var url=("{{route('admin.certificate')}}")+"?status="+val_pending+'&startDate='+startDate+'&endDate='+endDate;
      // alert(url);
      window.location.assign(url);
    });

    $('#status').on('change',function(){
    // $('#status').click(function(){
      var val_pending=$('#status').val();
      // alert(val_pending);
      var url=("{{route('admin.certificate')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })

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

