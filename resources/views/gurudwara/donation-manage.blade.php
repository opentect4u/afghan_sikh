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
            <h1> Donation</h1>
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
                <h3 class="card-title">Donation</h3>
                <a href="{{route('gurudwara.donationadd')}}" float="right" class="btn btn-outline-primary float-right">Add Donation</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Family Member Name</th>
                    <th>Type of Amount</th>
                    <th>Amount</th>
                    <!-- <th>Gurdwara</th> -->
                    <!-- <th>Application Date</th> -->
                    <th>Date of Payment</th>
                    <th>View</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;?>
                    @foreach($gurudwara as $gurudwaras)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>@if($gurudwaras->name!=''){{$gurudwaras->name}}@else {{'---'}}@endif</td>
                      <td>@if($gurudwaras->family_name!=''){{$gurudwaras->family_name}}@else {{'---'}}@endif</td>
                      <td>{{$gurudwaras->type_of_amount}}</td>
                      <td>{{$gurudwaras->amount}}</td>
                      <td>{{$gurudwaras->date_of_payment}}</td>
                      <td><a href="{{route('gurudwara.donationview',['id' => Crypt::encryptString($gurudwaras->id)])}}"><i class="fas fa-eye"></i></a></td>
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

    $("#date").daterangepicker({
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

    $('#status').click(function(){
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

