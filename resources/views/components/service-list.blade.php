<div class="section padding_layout_1">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2><span>Nos prestations</span></h2>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
                @foreach ($services as $service  )

               <div class="col-md-4">
                  <div class="Services_blog">
                     <div class="Services_img">
                        <img class="img-responsive" src="{{asset('storage/image/'.$service->image)}}" alt="#">
                     </div>
                     <div class="Services_head">
                        <h5><a href="{{route('service.detail',['id'=>$service->id])}}">{{$service->name}}</a></h5>
                     </div>
                  </div>

               </div>

               @endforeach
            </div>
         </div>
                         <!-- Ajouter la pagination -->
    <div class="d-flex justify-content-center">
        {!! $services->links() !!}
    </div>
      </div>

