<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

 

    <title>Report</title>
</head>
<body>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Id</th> 
            <th scope="col">Descrption</th>
            <th scope="col">Cost</th>
            <th scope="col">Month</th>
            <th scope="col">Year</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
                
            
          <tr>
            <td>{{$bill->id}}</td>           
            <td>{{$bill->description}}</td>
            <td>{{$bill->cost}}</td>
            <td>{{$bill->month    }}</td>
            <td>{{$bill->year    }}</td>
            
          </tr>
          @endforeach
          
        </tbody>
      </table>
    
</body>

 

</html>