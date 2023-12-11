
    <!-- footer -->
    <footer class="footer_style_2 footer_blog">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="main-heading left_text">
                     <h2>SCI</h2>
                  </div>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit volu ptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi.</p>
                  <ul class="social_icons">
                     <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                     <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                     <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
               <div class="col-md-8">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="main-heading left_text">
                           <h2>Additional links</h2>
                        </div>
                        <ul class="footer-menu">
                           <li><a href="{{route('about')}}"><i class="fa fa-angle-right"></i> A propos de nous</a></li>
                           <li><a href="{{route('services')}}"><i class="fa fa-angle-right"></i> Services</a></li>
                           <li><a href="{{route('contact')}}"><i class="fa fa-angle-right"></i> Contactez-nous</a></li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <div class="main-heading left_text">
                           <h2>Services</h2>
                        </div>
                        <ul class="footer-menu">
                           <li><a href="#"><i class="fa fa-angle-right"></i> Lighting</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Interior Design</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Floor Planning</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Decoration</a></li>
                           <li><a href="#"><i class="fa fa-angle-right"></i> Furniture</a></li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <div class="main-heading left_text">
                           <h2>Contact us</h2>
                        </div>
                        <p>123 Second Street Fifth Avenue,<br>
                           abidjan, Cote d'ivoire<br>
                           <span style="font-size:18px;"><a href="tel:+9876543210">+225 000000</a></span>
                        </p>
                        <div class="footer_mail-section">
                           <form action="{{route('suscriber')}}" method="POST">
                           @csrf
                              <fieldset>
                                 <div class="field">


                                    <input placeholder="Email" type="text" name="adresse_mail">
                                    @if(isset($errors) && $errors->has('adresse_mail'))
                                        <span class="text-danger">{{ $errors->first('adresse_mail') }}</span>
                                    @endif

                                    <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="cprt">
                  <p>Furnish by <a href="#">sneezy.</a> All rights reserved.</p>
               </div>
            </div>
         </div>
      </footer>
      </body>
      <!-- end footer -->
<!-- JAVASCRIPT FILES -->
 <!-- js section -->
 <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- menu js -->
      <script src="{{asset('js/menumaker.js')}}"></script>
      <!-- wow animation -->
      <script src="{{asset('js/wow.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('js/custom.js')}}"></script>
      <!-- revolution js files -->
      <script src="{{asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
      <script src="{{asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
      <script src="{{asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
      <!-- map js -->
      <script>
         // This example adds a marker to indicate the position of Bondi Beach in Sydney,
         // Australia.
         function initMap() {
           var map = new google.maps.Map(document.getElementById('map'), {
             zoom: 11,
             center: {lat: 40.645037, lng: -73.880224},
         styles: [
                  {
                    elementType: 'geometry',
                    stylers: [{color: '#fefefe'}]
                  },
                  {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                  },
                  {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                  },
                  {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                  },
                  {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#3d3523'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                  },
                  {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                  },
                  {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                  },
                  {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                  },
                  {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#000'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c8d7d4'}]
                  },
                  {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#b1a481'}]
                  }
                ]
         });

           var image = 'images/layout_img/location_icon_map_cont.png';
           var beachMarker = new google.maps.Marker({
             position: {lat: 40.645037, lng: -73.880224},
             map: map,
             icon: image
           });
         }

         
      </script>
       <!-- zoom effect -->
       <script src="{{asset('js/hizoom.js')}}"></script>
      <script>
         $('.hi1').hiZoom({
             width: 500,
             position: 'right'
         });
         $('.hi2').hiZoom({
             width: 550,
             position: 'right'
         });
      <!-- google map js -->
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&amp;callback=initMap"></script>
      <!-- end google map js -->
</body>
</html>
