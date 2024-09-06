@extends('theme.theme')
@section('body')
<body id="default_theme" class="home_1">

         <!-- bannière de la page interne -->
         <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Services</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Accueil</a></li>
                              <li class="active">Services</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- fin bannière de la page interne -->
      <!-- section -->
        @include('components.service-list')
      <!-- fin section -->
      <!-- section -->
      <div class="section padding_layout_1 light_silver">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_center">
                        <h2>Étapes des Services</h2>
                        <p class="large">Une façon simple et efficace de faire réparer vos Camera.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si1.png" alt="#"></div>
                              <h4 class="Services-heading">Services rapides</h4>
                              <p>Nous offrons des services rapides et efficaces pour répondre à vos besoins en un rien de temps.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si2.png" alt="#"></div>
                              <h4 class="Services-heading">Paiements sécurisés</h4>
                              <p>Avec des options de paiement sécurisées, vous pouvez régler en toute tranquillité.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si3.png" alt="#"></div>
                              <h4 class="Services-heading">Équipe d'experts</h4>
                              <p>Notre équipe d'experts est à votre disposition pour assurer des résultats impeccables.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si4.png" alt="#"></div>
                              <h4 class="Services-heading">Services abordables</h4>
                              <p>Nous proposons des services à des prix compétitifs sans compromettre la qualité.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si5.png" alt="#"></div>
                              <h4 class="Services-heading">Garantie 90 jours</h4>
                              <p>Nous garantissons nos services pendant 90 jours pour vous offrir une tranquillité d'esprit.</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="full">
                           <div class="Services_blog_inner">
                              <div class="icon text_align_center"><img src="images/layout_img/si6.png" alt="#"></div>
                              <h4 class="Services-heading">Primé</h4>
                              <p>Nos services ont été récompensés pour leur qualité et leur excellence.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- fin section -->
      <!-- Modal -->
      @include('components.serach')
      <!-- Fin Modèle barre de recherche -->
@endsection
