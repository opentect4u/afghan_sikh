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
/* body{font-family:Arial, Helvetica, sans-serif; font-size:13px; margin:0; padding:0;} */
/* p{font-size:13px; line-height:25px; margin:0; padding:0;} */
</style>
@foreach($data as $datas)
<div style="max-width:650px; width:100%; margin:0 auto; background: #f7f7f7; border: #e3e3e3 solid 1px;" id="sectionDiv">
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
    <td align="center" valign="top" style="background:#d3d3d3; border-bottom:#999999 solid 1px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top" style="padding:10px 15px;"><img src="{{asset('public/gurudwara-image')}}/{{$datas->gurudwara_photo}}" width="52" height="50"></td>
        </tr>
        <tr>
          <td align="center" valign="top" style="padding:5px 15px;"><h1 style="color:#635551; margin:0; padding:0; font-size:30px;">{{$datas->gurudwara_name}}</h1></td>
        </tr>
        <tr>
          <td align="center" valign="top" style="padding:10px 15px; font-size:14px; color:#000;">
          {{$datas->gurudwara_address}}, {{$datas->city}}, {{$datas->post_code}},{{$datas->gurdwara_country}}</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left" valign="top"><div style="padding:25px 15px; display:flex;">
	<div style="width:50%; display:inline-block; padding:0 20px;">
    <div style="width:100px; height:136px; margin:0 auto 15px auto; overflow:hidden; border:#ccc solid 1px;">
    <img src="{{asset('public/certificate-doc/')}}/{{$datas->doc_1}}" width="100" height="136" alt="">
    </div>
    <div style="width:100%; font-size:13px; line-height:20px; color:#333; text-align:center;">Signature / Thumb Impression<br>
Of Shri</div>
    </div>
    
    <div style="width:50%; display:inline-block; padding:0 20px;">
    <div style="width:100px; height:136px; margin:0 auto 15px auto; overflow:hidden; border:#ccc solid 1px;">
    <img src="{{asset('public/certificate-doc/')}}/{{$datas->doc_2}}" width="100" height="136" alt="">
    </div>
    <div style="width:100%; font-size:13px; line-height:20px; color:#333; text-align:center;">Signature / Thumb Impression<br>
Of Shrimati</div>
    </div>
</div></td>
  </tr>
  <tr>
    <td align="left" valign="top"><div style="padding:15px 15px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle" style="padding-bottom:25px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="50%" align="left" valign="middle"><p><strong>No: </strong>{{$datas->generate_number}}</p></td>
        <td align="right" valign="middle"><p><strong>Date of Issue:</strong> {{Carbon\Carbon::parse($datas->date_of_issue)->format('d M Y')}}</p></td>
      </tr>
    </table></td>
  </tr>
 

  <tr>
    <td align="left" valign="middle"><p><strong>Marriage Ceremony of Shri: </strong>{{$datas->ceremony_of_shri}}</p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Son of Shri: </strong>{{$datas->son_of_shri}}</p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>With Shrimati: </strong>{{$datas->with_shrimati}}</p></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Daughter of Shri: </strong>{{$datas->daughter_of_shri}}</p></td>
  </tr>
  <tr>
    <!-- <td align="left" valign="middle"><p><strong>Date of Marriage: </strong></p></td> -->
  </tr>
  <tr>
    <td align="left" valign="middle"><p><strong>Date of Marriage:</strong> {{Carbon\Carbon::parse($datas->date_of_marriage)->format('d M Y')}} 
      <!-- <strong>Word:</strong> -->
      </p>
    </td>
  </tr>
  @if(isset($duplicate))
  <tr>
    <td align="left" valign="middle" style="padding-top:25px; text-align:center;"><p style="color:black;">DUPLICATE COPY</p></td>
  </tr>
  @endif
  <!-- <tr>
    <td align="left" valign="middle" style="padding-top:25px; text-align:center;"><p>Lorem Ipsum is simply dummy text of the <br>
      printing:</p></td>
  </tr> -->
</table>

</div></td>
  </tr>
</table>







</div>

@endforeach

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary center" onclick="printContent('sectionDiv');">Print</button>
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
    function printContent(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

@endsection
