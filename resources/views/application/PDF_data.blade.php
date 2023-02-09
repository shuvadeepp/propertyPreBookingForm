<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- select2 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- bootstrap-datepicker CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap-icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- jquery.min.js CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jfont-awesome/6.1.1 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <!-- select2 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title> Property Form </title>
    <script>
        /* :::::::::::::: For Print :::::::::::::: */
        $(document).ready(function(){
            window.print();
        });
    </script>
</head>
<body>
    
</body>
</html>
<!-- table -->
<div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
                <h2 style="text-align: center;"> Property Pre-Booking - PDF File </h2>
            <br>
            <table class="table table-bordered border-primary">
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
                      <th> Image Name </th>
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
                </tr> 
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- table -->
      
    <footer>
        <p style="text-align: center;"> Copyright {{ date("Y") }} All Rights Reserved </p>
        <p style="text-align: center; color:gray;"> Design By : Shuvadeep Podder </p>
    </footer>