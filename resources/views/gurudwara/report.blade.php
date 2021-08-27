@extends('admin.common.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Marrage Certificate</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->

              <style type="text/css">
body{font-family:Arial, Helvetica, sans-serif; font-size:13px; margin:0; padding:0;}
p{font-size:13px; line-height:25px; margin:0; padding:0;}
</style>

              <div style="max-width:650px; width:100%; margin:0 auto; background: #f7f7f7; border: #e3e3e3 solid 1px;">

<div style="padding:25px 15px; display:flex;">
	<div style="width:50%; display:inline-block; padding:0 20px;">
    <div style="width:100px; height:136px; margin:0 auto 15px auto; overflow:hidden; border:#ccc solid 1px;">
    <img src="images/thum.jpg" width="100" height="136" alt="">
    </div>
    <div style="width:100%; font-size:13px; line-height:20px; color:#333; text-align:center;">Signature / Thumb Impression<br>
Of Shri</div>
    </div>
    
    <div style="width:50%; display:inline-block; padding:0 20px;">
    <div style="width:100px; height:136px; margin:0 auto 15px auto; overflow:hidden; border:#ccc solid 1px;">
    <img src="images/thum2.jpg" width="100" height="136" alt="">
    </div>
    <div style="width:100%; font-size:13px; line-height:20px; color:#333; text-align:center;">Signature / Thumb Impression<br>
Of Shrimati</div>
    </div>
</div>

<div style="padding:15px 15px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle" style="padding-bottom:25px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" align="left" valign="middle"><p><strong>No: </strong></p></td>
        <td align="right" valign="middle"><p><strong>Date:</strong> 3, Mar, 2021</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Lorem Ipsum is simply dummy: </strong></p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Lorem Ipsum is simply dummy: </strong></p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Lorem Ipsum is simply dummy: </strong></p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Lorem Ipsum is simply dummy: </strong></p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Lorem Ipsum is simply dummy: </strong></p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Date:</strong> 21/02/21 <strong>Word:</strong></p></td>
  </tr>
  <tr>
    <td align="left" valign="middle" style="padding-top:25px; text-align:center;"><p>Lorem Ipsum is simply dummy text of the <br>
      printing:</p></td>
  </tr>
</table>

</div>



</div>




             
            </div>
            <!-- /.card -->

            <!-- general form elements -->
          
            <!-- /.card -->

            <!-- Input addon -->
           
            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')
<script>
    $(document).ready(function(){
        // alert("hii");
        $('#reject').click(function(){
            $('#gurudwara_id').removeAttr('required');
            $('#gurudwara_id').val('');
            $('#gurudwara_id').attr('disabled');

        })
        $('#css').click(function(){
            $('#gurudwara_id').attr('required','required');
            $('#gurudwara_id').removeAttr('disabled');
        })
    });
</script>

@endsection
