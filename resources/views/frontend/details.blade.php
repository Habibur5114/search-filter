<!DOCTYPE html>
<html lang="en">
<head>
  <title>Habib First Work</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
     

       <h2 class="mt-3 ">{{$details->title}}</h2>

       <div >
        <img class="mt-2" src="{{ asset($details->image) }}" alt="" style="width:1000px; height:450px">
      </div>

      <div class="mt-3">
        <p style="margin: 0; padding: 0;">Category-Name : {{$details->category->name}}</p>
      </div>
      <div class="">
        <p style="margin: 0; padding: 0;">Author-Name : {{$details->author->name}}</p>
      </div>
      <div class="">
        <p style="margin: 0; padding: 0;">Author-Bio : {{$details->author->bio}}</p>
      </div>
    
      <div class="" style="width:1000px">

        <p>{!!$details->content!!}</p>
      </div>
    
    </div>
 </div>

</body>
</html>


