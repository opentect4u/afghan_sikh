@extends('admin.common.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marriage Manage</h1>
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
                <h3 class="card-title">All Members</h3>
                <a href="{{route('gurudwara.marriageadd')}}" float="right" class="btn btn-outline-primary float-right">Add Marriage Certificate</a>
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
                    <th>Number</th>
                    <th>Name Shri</th>
                    <th>Name Shrimati</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $count=1;?>
                    @foreach($gurudwara as $gurudwaras)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$gurudwaras->generate_number}}</td>
                      <!-- <td><img src="{{asset('public/gurudwara-member-image/')}}/{{$gurudwaras->photo}}" width="50px" height="50px" /></td> -->
                      <td>{{$gurudwaras->ceremony_of_shri}}</td>
                      <td>{{$gurudwaras->with_shrimati}}</td>
                      <td>{{$gurudwaras->created_date}}</td>
                      <td id="actionTd{{$gurudwaras->id}}">
                        <a href="{{route('gurudwara.marriageedit',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="accept" ><i class="fas fa-edit"></i></a>
                        &nbsp;&nbsp;<a href="{{route('gurudwara.marriagereport',['id' => Crypt::encryptString($gurudwaras->id)])}}" id="accept" ><i class="fas fa-print" title="Print"></i></a>
                        &nbsp;&nbsp;<a href="{{route('gurudwara.marriagereport',['id' => Crypt::encryptString($gurudwaras->id)])}}?duplicate=duplicate" id="accept" title="Duplicate Print"><i class="fas fa-clone"></i></a>
                        
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
      var url=("{{route('admin.user')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
    $('#active').click(function(){
      var val_pending=$('#active').val();
      // alert(val_pending);
      var url=("{{route('admin.user')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })
    $('#reject').click(function(){
      var val_pending=$('#reject').val();
      // alert(val_pending);
      var url=("{{route('admin.user')}}")+"?status="+val_pending;
      // alert(url);
      window.location.assign(url);
    })



  });
  // actionTd 
  
</script>
@endsection
