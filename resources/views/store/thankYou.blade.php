@extends('theme.theme')

@section('body')

      <!-- inner page banner -->
      <div id="inner_banner" class="section inner_banner_section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <div class="title-holder">
                        <div class="title-holder-cell text-left">
                           <h1 class="page-title">Thank You</h1>
                           <ol class="breadcrumb">
                              <li><a href="/">Home</a></li>
                              <li class="active">ThankYou</li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end inner page banner -->

		
		<div class="container pb-60">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="text-success">Merci pour votre commande</h2>
                    <p>Un message de confirmation vous serra envoyé</p>
                    <a href="/" class="btn  text-info">Cliquer pour continuer</a>
				</div>
			</div>
		</div><!--end container-->

	</main>
	<!--main area-->

    @endsection