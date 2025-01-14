<!DOCTYPE html>
<html lang="en">
<head>
  <title>Habib First Work</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="container ">
    <div class="row ">
       <div class="col-lg-12">
       <div class="">
       <h2 class="mt-4 mb-4">Manage News</h2>

       <div class="mt-4 mb-3">
      <a href="{{route('admin.news.create')}}" class="btn btn-warning">Create</a>
      </div>
    </div>
     
    <table class="table table-bordered">
    <thead>
    <tr>
      <th>No</th>
      <th>Category-name</th>
      <th>auther-name</th>
      <th> Title</th>
      <th> Image</th>
     
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   
    @foreach ($news as  $key=> $new)
        
   
    <tr>
      <th scope="row">{{++$key}}</th>
      <td>{{ $new->category->name}}</td>
      <td>{{ $new->author->name}}</td>

      <td>{{ $new->title}}</td>

      <td>
        <img src="{{ asset($new->image) }}" alt="" style="width: 100px; height: 50px;">

      </td>
      
      <td>
        @if($new->status ==1)
                        <a href="{{route('admin.news.status',$new->id)}}" style="width:77px" class="btn btn-success">Active</a>
                        @else
                        <a href="{{route('admin.news.status',$new->id)}}" class="btn btn-danger" style="width:77px; font-size:14px !important;">Inactive</a>

                        @endif
      </td>
      <td>
        <a href="{{route('admin.news.show',$new->id)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
        <a href="{{route('admin.news.destroy',$new->id)}}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
    </div>
</div>
</div> 


</body>
</html>