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
<div class="container mt-5">
    <div class="row">

      <div>
         <input type="text" id="search-bar" placeholder="Search by title or category" style="width: 300px;">
     </div>
     <div class="row" id="results" style="margin-top: 20px;">
      @foreach ($fronts as $front)
      
          <div class="col-lg-4 shadow m-2">
            
            
                  <img src="{{ asset($front->image) }}" alt="Image of {{ $front->title }}" style="width: 100%; height: auto;">
                  <h6 class="mt-3">{{ $front->title }}</h6>
                 <p style="margin: 0; padding: 0;">{{$front->category->name}}</p>
                 <p style="margin: 0; padding: 0;">{{$front->author->name}}</p>

                  <p>{!! Str::limit($front->content, 150) !!} 
                      <a href="{{route('frontend.details',$front->slug)}}" style="color: red; text-decoration: none;">Read more</a>
                  </p>
              
            </div>
        
      @endforeach
   </div>
  
    </div>
 </div>

</body>
</html>


 <script>
   $(document).ready(function () {
       $('#search-bar').on('keyup', function () {
           let query = $(this).val();

           // AJAX request
           $.ajax({
               url: "{{ route('search') }}",
               type: "GET",
               data: { query: query },
               success: function (data) {
                   let results = $('#results');
                   results.empty();

                   if (data.length > 0) {
                    console.log(data);
                     let img_path="{{asset('/')}}";
                       data.forEach(item => {
                           let html=`
                           <div class="col-lg-4 shadow m-2">
                              <div class=" p-3">
                                 <img src="${img_path}${item.image}" alt="" style="width:100%">
                                 <h6 class="mt-3"> ${item.title}</h6>
                                <p style="margin: 0; padding: 0;">${item.category.name}</p>
                             <p style="margin: 0; padding: 0;">${item.author.name}</p>
                            
                               <p>${item.content.substring(0, 150)} <a href="#" style="color: red; text-decoration: none;">Read more</a></p>
                                 

                              </div>
                           </div>
                           `;
                           results.append(html);
                       });
                   } else {
                       results.append('<div>No results found.</div>');
                   }
               },
               error: function () {
                   console.error('Error fetching data');
               }
           });
       });
   });
</script> 


