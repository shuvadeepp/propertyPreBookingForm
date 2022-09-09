@extends('layouts.console') 
@section('innercontent')
<?php 
   //echo'<pre>';print_R($propertyDropdown);exit; 
?>

@include('includes.navbar')

   <div class="row justify-content-center">
      <div class="col-md-11">
         <br>
         <br>
         <!-- <h4> Shuvadeep Podder </h4> -->
         <!-- <small style="color: white; float: right; font-weight: bold; background-color:#0d6efd;"> <?php //echo date("d-m-Y") ?></small> -->
      <small style="color: #0d6efd; float: right; font-weight: bold; " id="current-time"> </small>

<script>
   /* JS live date and time code */
function setCurrentTime() {
      var myDate = new Date();

      let daysList = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      let monthsList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Aug', 'Oct', 'Nov', 'Dec'];


      let date = myDate.getDate();
      let month = monthsList[myDate.getMonth()];
      let year = myDate.getFullYear();
      let day = daysList[myDate.getDay()];

      let today = `${date} ${month} ${year}, ${day}`;

      let amOrPm;
      let twelveHours = function() {
      if (myDate.getHours() > 12) {
         amOrPm = 'PM';
         let twentyFourHourTime = myDate.getHours();
         let conversion = twentyFourHourTime - 12;
         return `${conversion}`

      } else {
         amOrPm = 'AM';
         return `${myDate.getHours()}`
      }
      };
      let hours = twelveHours();
      let minutes = myDate.getMinutes();
      let seconds = myDate.getSeconds();

      let currentTime = `${hours}:${minutes}:${seconds} ${amOrPm}`;

      document.getElementById('current-time').innerText = today + ' ' + currentTime
      }

      setInterval(function() {
      setCurrentTime();
      }, 1000);
</script>
         
         <h6 style="color: gray;"> <b> Property Pre-Booking Form </b>   </h6>
         <hr>
         <!-- FORM -->
         <!-- <div class="alert alert-danger" style="display:none"></div> -->
         <span id="field_error"></span>
         <div class="alert alert-danger" style="display:none"></div>
         <form method="POST" id="formId" enctype='multipart/form-data'>
            @csrf 
            <input type="hidden" name="hdnAge" id="hdnAge">
            <div class="row g-3">
               <!-- dropdown -->
               <div class="container">
                  <div class="row">
                     <div class="col">
                        <label for="housingProject" class="form-label"> Property Project* </label>
                        <select name="housingProject" id="housingProject" class="form-select"> 
                           <option value=""> --Select Property Project-- </option>
                           @foreach($propertyDropdown as $dropdown)
                           <option value="{{ $dropdown->housingProjectId }}" > {{ $dropdown->housingProject }} </option>
                           @endforeach
                        </select>
                        <span class="errMsg_housingProject errDiv" style="color: red;"></span>
                     </div>
                     <div class="col">
                        <label for="propertyType" class="form-label"> Property Type* </label>
                        <select name="propertyType" id="propertyType" class="form-select">
                           <option value=""> --Select Property Type-- </option>
                        </select>
                        <span class="errMsg_propertyType errDiv" style="color: red;"></span>
                     </div>
                     <div class="col">
                        <div class="col-sm-6">
                           <label for="propertyCost" class="form-label">  <b> Property Cost </b>  </label>
                           <input type="text" name="propertyCost" id="propertyCost" class="form-control" placeholder="&#xe1bc; Cost" style="font-family:Arial, FontAwesome" value="" readonly>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <br>
               <!-- dropdown -->
                <fieldset class="rounded border border-secondary p-2">
                <legend class="float-none w-auto text-primary p-2">
                    <h6> <b> Application Details </b> </h6>
                </legend>
                <div class="row">
               <div class="col-sm-4">
                  <label for="appName" class="form-label"> Applicant Name </label>
                  <input type="text" class="form-control" name="appName" id="appName" value="" onkeydown="return /[a-z]/i.test(event.key)" placeholder="&#xf007; Applicant Name" style="font-family:Arial, FontAwesome">
                  <span class="errMsg_appName errDiv" style="color: red;"></span>
               </div>
               <div class="col-sm-4">
                  <label for="appEmail" class="form-label"> Email </label>
                  <input type="text" class="form-control" name="appEmail" id="appEmail" placeholder="&#x40;Gmail.com" style="font-family:Arial, FontAwesome" value="">
                  
                  <span class="errMsg_appEmail errDiv" style="color: red;"></span>
               </div>
               <div class="col-sm-4">
                  <label for="appMobile" class="form-label"> Mobile </label>
                  <input type="text" class="form-control" name="appMobile" id="appMobile" placeholder="&#xf3cd; Mobile" style="font-family:Arial, FontAwesome" value=""  maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                  <span class="errMsg_appMobile errDiv" style="color: red;"></span>
               </div>
               </div><br>
               <div class="row">
               <div class="col-sm-4">
                  <label for="appdob" class="form-label"> Date Of Birth </label>
                  <input type="text" class="form-control" name="appdob" id="appdob" max="<?php echo date('Y-m-d');?>" placeholder="&#xf073; DD/MM/YYYY" style="font-family:Arial, FontAwesome" value=""  onchange="dateValidate(this.value)" onfocus="(this.type='date')">
                  <span class="errMsg_appdob errDiv" style="color: red;"></span>
               </div>

               
               <div class="col-sm-4">
                  <label for="gender" class="form-label"> Gender </label>
                  <br>
                    <input class="form-check-input" type="radio" name="gender" id="M_gender" value="Male" checked id="defaultCheck1">
                    <label class="form-check-label" for="M_gender"> <i class="fa-solid fa-person"></i> MALE </label> &nbsp &nbsp
                    <span class="errMsg_M_gender errDiv" style="color: red;"></span>

                    <input class="form-check-input" type="radio" name="gender" id="F_gender" value="Female">
                    <label class="form-check-label" for="F_gender"> <i class="fa-solid fa-person-dress"></i> FEMALE </label> &nbsp &nbsp
                    <span class="errMsg_F_gender errDiv" style="color: red;"></span>

                    <input class="form-check-input" type="radio" name="gender" id="O_gender" value="Other">
                    <label class="form-check-label" for="O_gender"> <i class="fa-solid fa-person-half-dress"></i> OTHER </label>
                    <span class="errMsg_O_gender errDiv" style="color: red;"></span>
                  
               </div>

            
               <div class="col-sm-4">
                  <label for="appIdproof" class="form-label"> Upload ID-Proof </label>
                  <input type="file" class="form-control" name="appIdproof" id="appIdproof" placeholder="" value="">
                  <span class="errMsg_appIdproof errDiv" style="color: red;"></span>
               </div>
               </div>
               <div class="d-grid gap-2 d-md-block text-center mb-2">
                  <br>
                  <button class="btn btn-success" type="submit" id="buttSubmit" > Submit <i class="fa-solid fa-circle-check"></i> </button>
                  <button type="reset" class="btn btn-outline-dark" value="Reset"> Reset <i class="fa-solid fa-rotate"></i></button>
               </div>
            </fieldset>
               
            </div>
         </form>
         <!-- FORM -->
      </div>
   </div>
</div>
<script>
   /* Property Project */
   jQuery(document).ready(function() {
      
      jQuery('#housingProject').change(function() {
          
          let housingProject = jQuery(this).val();
          let propertyType = 0;
          jQuery.ajax({
              url: "{{url('propertyForm/propertyType')}}",
              method: 'get',
              dataType : "json",
              data:{"_token": "{{ csrf_token() }}", housingProject: housingProject, propertyType: propertyType},
              success: function(result) {
                  $('#propertyType').html(result.res);
              }
          })
      })
  });
   
   /* Property Type */
   jQuery('#propertyType').change(function() {
       
       let propertyType = jQuery(this).val();
       
       jQuery.ajax({
           url: "{{url('propertyForm/propertyCost')}}",
           type: 'post',
           data: 'propertyType=' + propertyType + '&_token= {{csrf_token()}}',
           success: function(result) {
               // console.log(result);
               jQuery('#propertyCost').val(result);
           }
       })
   });
   
       /* Ajax Insert */

           $("#buttSubmit").click(function(e) {

            /* jQuery Validation */
            $('.errDiv').hide();
            $('.error-input').removeClass('error-input');

            if (!blankCheck('housingProject', 'Please select housing project'))
               return false;
            if (!blankCheck('propertyType', 'Please select property Type'))
               return false;

            if (!blankCheck('appName', 'Please enter your name'))
                return false;
            if (!blankCheck('appEmail', 'Please enter your email'))
                return false;
            
            if (!blankCheck('appMobile', 'Please enter your mobile no.'))
                return false;
            
            if (!blankCheck('appdob', 'Please Select DOB'))
               return false;
            if (!blankCheck('appIdproof', 'Please Upload ID Proof'))
               return false;

               event.preventDefault();
               appData();
           });

       function appData () {
           let data = new FormData();
           let formData = $('#formId').serializeArray();
           $.each(formData, function(key, input) {
               data.append(input.name,input.value);
           });
   
           data.append('appIdproof', $('#appIdproof')[0].files[0]);
   
           jQuery.ajax({
           url: "{{url('propertyForm/applicationForm')}}",
           type: 'post',
           data:  '&_token= {{csrf_token()}}', data,
           processData: false,
           contentType: false,
           success: function(data) {
               if (data.statusCode == 200) {
                     // console.log(data.statusCode); 
                    // alert("Saveed");
                   /* $("#myElem").show();
                   setTimeout(function() { $("#myElem").hide(); }, 5000); */
                   successAlerts("SUCCESS!","Property Booked Successfully","success").then(OK => {
                        if (OK) {
                           window.location.href = "/PersonalAssessment/PropertyPreBookingForm/PropertyForm/PropertyTable";
                        // console.log("hi");
                        }
                     });
                }

                else  {
                    // console.log("hi");
                  //   console.log(data.msg,"==========");

                  //   if(data.statusCode == 422){
                  //    successAlerts("ERROR!",data.msg,"error")
                  //   }
                  //   else{
                     var values = [];
                     // console.log(data.msg.length);
                     jQuery.each(data.msg, function(key, value){
                           // console.log(data.msg);
                           values.push(value);
                     });
                    var errorMsg = values.toString().split(',').join('</br>');
                  //   console.log(values.toString());
                    successAlerts("ERROR!",errorMsg,"error")
                }
               // }
           },
           error: function(xhr, status, error) {
                
           }
       });
   }
       
    
      
         

   /* Sweet Alert */
   $("#appName").on('blur',function() {    
      paitentName = $(this).val(); 
      var exp=/^[ a-zA-Z]+$/; 
      var minLength = '4'; 
      if(paitentName.match(exp)){
         if(paitentName.length>=minLength){
            return true;
         }else{
            // alert("Name atleast 4 character long");
            successAlerts("Not Valid!","Name atleast 4 character long","error");
            $('#appName').val('');
            return false;
         }
      }else{
         // alert("Name must be Alphabets");
         successAlerts("Not Valid!","Name must be Alphabets","error");
         $('#appName').val('');
         return false;
      }
   });

   $("#appEmail").on('blur',function() {    
      emailId = $(this).val();
      var exp=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(!(emailId.match(exp)))
      {
         // alert("Invalid Email Address");
         successAlerts("Not Valid!","Invalid Email Address","error");
         $('#appEmail').val('');
         return false;
      }
         return true;
   });

   $("#appMobile").on('blur',function() {    
         mobile = $(this).val();
         var exp = /^\d{10}$/;    
         if(!(mobile.match(exp)))
         {
            // alert("Invalid Mobile Number");
            successAlerts("Not Valid!","Invalid Mobile Number","error");
            $('#appMobile').val('');
            return false;
         }
            return true;
   });


   function dateValidate(date){
      
         var appDate = date;
         var appliedDate = new Date(appDate);
         

         var currentDate = new Date();
         var cdate = new Date((currentDate.getMonth() + 1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear());
         var adate = new Date((appliedDate.getMonth() + 1) + '/' + appliedDate.getDate() + '/' + appliedDate.getFullYear());
      //  alert(adate);
      //    alert(cdate); 
         const diffTime = currentDate.getFullYear() - appliedDate.getFullYear(); 
         // console.log(diffTime);
      
      $('#hdnAge').val(diffTime);

         if (diffTime < 18) {
            successAlerts("Not Valid!","Appointment cant be apply for this date","error");
            $('#appdate').val('');
         }
   } 

</script> @endsection