@extends('theme.theme')
@section('body')
<body id="default_theme" class="home_1">

      <!-- inner page banner -->
      <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">A propos</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Accueil</a></li>
                              <li class="active">A propos</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end inner page banner -->
      <!-- section -->
      <!-- section -->
      <div class="section padding_layout_1 light_silver gross_layout">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="main_heading text_align_left">
                        <h2>Qui somme nous</h2>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 col-lg-8 text-align_left">
                  <div class="full large_cont_p">
                     <p>L’entreprise CARBONE GROUPE a été fondée en 2023, dynamique, née d'une véritable passion pour la réalisation des pensées architecturales et d‘installations et de maintenance en sécurité électrique, électronique et informatique ;Notre savoir-faire et nos compétences reposent sur une équipe jeune motivée et hautement qualifiée.
                     Quel que soit votre projet, l’entreprise CARBONE GROUPE vous accompagne, identifie l'ensemble de vos besoins et vous propose des solutions répondant à votre attente
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- end section -->
      <!-- section -->
      @include('components.why-shoose')
      <!-- end section -->
      <!-- section -->
      <div class="section padding_layout_1 section_information">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="full">
                     <h4>Faisons la différence
                  </div>
                  <div class="full">
                     <a class="read-btn" href="{{route('services')}}">Découvrez</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- section -->
      @include('components.service-list')
      <!-- end section -->
      <!-- Modal -->
      @include('components.serach')
      <!-- End Model search bar -->
@endsection
