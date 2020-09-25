
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>Units List</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>

    <h2 class="text-center"> All Units List</h2>

    <table class="table mt-2">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Unit Name </th>
            <th scope="col">Floor Name </th>
            <th scope="col">Owner Name </th>

          </tr>
        </thead>
        <tbody>
            @foreach( $units as $unit )
            <tr>
                <td> {{$unit->id}}</td>
                <td> {{$unit->unitName}}</td>
                <td>{{$unit->floorName}}</td>
                <td>{{$unit->ownerName}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
   </body>
   </html>

