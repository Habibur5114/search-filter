<!DOCTYPE html>
<html lang="en">
<head>
  <title>Habib First Work</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>


<div class="container">
    <div class="row">
      <h2>@isset($news)Edit News @else Add News
        
      @endisset</h2>
            
       
     <div class="col-lg-12">
        <form action="@isset($news){{route('admin.news.update')}}@else {{route('admin.news.store')}}@endisset" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="m-2">title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter name" value="@isset($news){{$news->title}}@endisset">
                <input type="hidden" name="id"  value="@isset($news){{$news->id}} @endisset" > 
              </div>  
           
                  
              <div class="form-group">
                <label for="" class="m-2">Image</label>
              <input type="file" name="image" class="form-control" >

            </div>
            

             <div class="form-group">
                <label for="" class="m-2">Content</label>
                <textarea name="content" id="editor">{{isset($news) ? $news->content : '' }}</textarea>

            </div>

             <div class="form-group">
                <label for="" class="m-2">Category</label>
             <select class="form-select" name="category_id">
          
              @foreach ($categories as $categorie)
              <option value="{{$categorie->id}}">{{$categorie->name}}</option>
              @endforeach
            </select>
            </div>


            <div class="form-group">
              <label for="" class="m-2">Author</label>
           <select class="form-select" name="author_id">
           

             @foreach ($authors as $author)
              <option value="{{$author->id}}">{{$author->name}}</option>
              @endforeach
    
          </select>
          </div>



           
                    <div class="form-group mt-2">
                            <label for="status" class="d-block">Status</label>
                            <label class="switch">
                              <input type="checkbox" value="1" name="status" @isset($news){{$news->status == 1 ? "checked":""}}@else checked @endisset>
                              <span class="slider round"></span>
                            </label>
                            
                    </div>
                    
                </div>
                </div>

                <div class="form-group mt-3">
               
                <input type="submit" class="btn btn-success" value="submit">
            </div>

        </form>
    </div>
 </div>

</body>
</html>

<script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .catch(error => {
          console.error(error);
      });
  </script>
  