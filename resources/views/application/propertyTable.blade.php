@extends('layouts.console') @section('innercontent') @include('includes.navbar')

  <div class="row justify-content-center">
    <div class="col-md-12">
      <br>
      <br>
      <!-- <h4> Shuvadeep Podder </h4> -->
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
      <h6 style="color: gray;"> <b> Property Pre-Booking Form </b> </h6>
      <hr>
      <form method="post">
         @csrf
      <fieldset class="rounded border border-secondary p-2">
        <legend class="float-none w-auto text-primary p-2">
            <h6> <b> Filter </b> </h6>
        </legend>
      <!-- dropdown -->
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <label for="housingProject" class="form-label"> Housing Project* </label>
            <select name="housingProject" id="housingProject" class="form-select" onchange="getdata(this.value)">
              <option value=""> --SELECT-- </option>
              @foreach($propertyDropdown as $dropdown)
                  <option {{(isset($housingProject) && $housingProject == $dropdown->housingProjectId) ? 'selected': '' }} value="{{ $dropdown->housingProjectId }}"> {{ $dropdown->housingProject }} </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-5">
            <label for="propertyType" class="form-label"> Housing Type* </label>
            <select name="propertyType" id="propertyType" class="form-select" data-type="{{$propertyType}}">
              <option value=""> --SELECT-- </option>
              
            </select>
          </div>
          
          <div class="col-md-2">
          <label for="" class="form-label" style="visibility: hidden;"> Search </label>
            <br>
            <button class="btn btn-primary" type="submit" id="buttSearch" > <i class="fa-solid fa-magnifying-glass"></i> </button>
          </div>
        </div>
      </div>
      <br>
      <br>
      <!-- dropdown -->
      </fieldset>
      </form>
      <!-- table -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            
            <br>
            <table id="dataTable" class="table table-striped table table-bordered" style="width:100%">
              <thead >
                  <tr class="table-primary">
                      <th> Sl </th>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Mobile No. </th>
                      <th> Age </th>
                      <th> Registion Date </th>
                      <th> Housing Project </th>
                      <th> Housing Type </th>
                      <th> Document </th>
                      <th> Download </th>
                  </tr>
              </thead>
              <tbody><?php //echo'<pre>';print_r($selectQuery);exit; ?>
              @php
                $count = 1;
              @endphp
              @foreach($selectQuery as $value)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $value->appName }}</td>
                  <td>{{ $value->appEmail }}</td>
                  <td>{{ $value->appMobile }}</td>
                  <td>{{ $value->age }}</td>
                  <td>{{ date('d-M-y',strtotime($value->created_On))}}</td>
                  <td>{{ $value->housingProject }}</td>
                  <td>{{ $value->propertyType }}</td>
                  <td>{{ $value->appIdProof }}</td>
                  <td>
                    <a class="btn btn-primary mt-2" href="{{url('PropertyForm/getfile/'.$value->appIdProof)}}"> <i class="fa fa-download"></i> </a>
                  </td>
                </tr> 
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- table -->
    </div>
  </div>

<script>
  /* Property Project */
  <?php if (isset($res) && $res != '') { ?>
      getdata('{{$housingProject}}','{{$propertyType}}');
    <?php } ?>
    function getdata(housingProject, propertyType=0) {
           $.ajax({
               url: "{{url('propertyForm/propertyType')}}",
               method: 'get',
               dataType : "json",
               data:{"_token": "{{ csrf_token() }}", housingProject: housingProject, propertyType: propertyType},
               success: function(result) {
                   $('#propertyType').html(result.res);
               }
           });
      }
</script> @endsection

