
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
            <th scope="col">#</th>
                        <th scope="col">Complain by</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach( $complains as $complain )
            <tr>
                <td>{{$complain->id}}</td>
                <td>{{$complain->complainBy}}</td>
                <td>{{$complain->unitName}}</td>
                <td>{{$complain->description}}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
   </body>
   </html>

