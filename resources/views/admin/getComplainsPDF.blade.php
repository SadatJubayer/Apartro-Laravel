
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

    <h2 class="text-center text-danger mb-4"> All un-resolved Complains</h2>

    @foreach( $complains as $complain )

    <div class="text-danger ml-4 h3">#{{$complain->id}}</div>
    <div class="card py-2 px-4">
        <div class="card-body border border-danger">
            <li class="list-group-item">Complain by - <strong>{{$complain->complainBy}}</strong> </li>
            <li class="list-group-item">Unit - <strong>{{$complain->unitName}}</strong></li>
            <li class="list-group-item">Description - <strong>{{$complain->description}}</strong></li>
        </div>
    </div>

    @endforeach

   </body>
   </html>

