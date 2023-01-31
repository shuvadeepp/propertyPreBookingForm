@extends('layouts.console') @section('innercontent') @include('includes.navbar')

  <div class="row justify-content-center">
    <div class="col-md-12">
      <br>
      <br>
      <h4 style="color: gray;"> <b> Property Pre-Booking Form </b> </h4>
      <div class="text-end">
        <small><a class="btn btn-outline-info" title="Excel" href="{{url('PropertyForm/getExportExcel/')}}"> <i class="fa fa-file-excel"></i> </a></small>  
      <small><a class="btn btn-outline-info" title="PDF" href="">  <i class="fa-solid fa-file-pdf"></i> </a></small>
      </div>
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
                      <th> Excel Download </th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody><?php //echo'<pre>';print_r($selectQuery[0]->intId);exit; ?>
              @php
                $count = 1;
              @endphp
              @foreach($selectQuery as $value)
                <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ !empty($value->appName) ? $value->appName : '--' }}</td>
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
                  <td>
                    <a class="btn btn-primary mt-2" href="{{url('PropertyForm/getExportExcel/' . $value->intId)}}"> <i class="fa fa-file-excel"></i> </a>
                  </td>
                  <td>
                    <a class="btn btn-primary mt-2" href=""> Edit </a>
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

