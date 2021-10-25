@extends('admin.common.master')
@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Add</h1>
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
              <form name="myform" method="Post" action="{{route('gurudwara.donationadd')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Enter User Id/Email/Phone to get Details:  </label>
                                <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Enter ..."/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> </label>
                                <a href="javascript:void(0)" onclick="GetDetails();" class="btn btn-outline-primary" style="margin-top:30px;">Get Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="ajaxDiv">
                        <div class="col-sm-6" id="nameDiv">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" name="name" value="" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6" id="familyDiv">
                            <div class="form-group">
                              <label>Family Name </label>
                              <select name="family_name" id="family_name" class="form-control">
                                <option value="">--select Family Name--</option>
                                <option value="">gg</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Type of Amount</label>
                                <select id="type_of_amount" name="type_of_amount" required class="form-control">
                                  <option value="">--Select Type--</option>
                                  <option value="$">$</option>
                                  <option value="£">£</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" required name="amount" value="" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Date of Payment</label>
                                <input type="text" required name="date_of_payment" id="date_of_payment" value="" class="form-control" placeholder="DD/MM/YYYY">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Remark/Other Information</label>
                                <textarea name="remark" id="remark" class="form-control"></textarea>
                                <!-- <input type="text" name="phone" value="" class="form-control" placeholder="Enter ..."> -->
                            </div>
                        </div>
                    </div>
                    
                    

                  <!-- <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                   -->
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
  // familyDiv
  $('#familyDiv').hide();
  $('#name').attr('required','required');

  function GetDetails(){
    // alert('hii');
    var user_id=$('#user_id').val();
    if(user_id==''){
      alert('Enter User Id/Email/Phone');
      return false;
    }else{
      $.ajax({
        type: "POST",
        url: "{{ route('gurudwara.getdetailsDonation') }}",
        data:{
          "_token": "{{ csrf_token() }}",
          "user_id":user_id
        },
        success: function(data){
          // alert(data);
          var obj = JSON.parse ( data );
          var name=obj.name;
          var family=obj.family;
          if(name=='' && family.length==0){
            alert("No data found");
          }else{
            if(name!=''){
              $('#family_name').removeAttr('required');
              $('#familyDiv').hide();
              
              // alert('name');
              $('#name').val();
              $('#name').val(name);
              $('#name').attr('required','required');
              $('#nameDiv').show();
            }else{
              // alert('family');
              $('#name').removeAttr('required');
              $('#nameDiv').hide();

              var all='';
              all+='<option value="">--Select Family Name--</option>';
              for (let index = 0; index < family.length; index++) {
                var element1 = family[index];
                all+='<option value="'+element1+'">'+element1+'</option>';
              }
              $('#family_name').empty();
              $('#family_name').append(all);
              $('#family_name').attr('required','required');

              $('#familyDiv').show();
            }
          }
           
        }
      });
    }
  }
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
      $("#date_of_payment").daterangepicker({
          autoUpdateInput: false,
          minYear: 1901,
          maxDate: new Date(),
          autoApply:true,
          showDropdowns: true,
          singleDatePicker: true,
          timePicker: false,
          timePicker24Hour: false,
          timePickerIncrement: 05,
          drops: "up",
          locale: {
              format: 'DD/MM/YYYY'
          }
      }).on("apply.daterangepicker", function (e, picker) {
          picker.element.val(picker.startDate.format(picker.locale.format));
      });
      // submit
      $('#submit').click(function(){
        var name=$('#name').val();   
        var name=$('#name').val();   
      })
    });
</script>

@endsection
