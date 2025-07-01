<x-app-layout title='careers'>

    <div class="ps-section ps-section--hotdeal-3 pt-80 pb-40">

        <div class="ps-container">

            <div class="ps-section__header mb-50">
                <h2 class="ps-section__title" data-mask="Ramallah Nuncipilty">- {{ __('app.careers') }}</h2>
            </div>
    <div class="container">
     <div class="row justify-center:center">
        <div class="col-md-6 content">

    <img src="{{ asset('image/hire.png') }}" alt="" style="width: 100%">
        </div>
     </div>
        <div class="row">
          <div class="col-md-9 content">
            <h2 class="title">
                @if(Session::get('locale')=='ar')
                {{$career->job_title_ar}}
                @else
                {{$career->job_title}}
                @endif
            </h2>
            <h3 class="alted">
              Job description
            </h3>
            <div class="description">
               <p>
                @if(Session::get('locale')=='ar')
                {{$career->job_description_ar}}
               @else
               {{$career->job_description}}
               @endif
               </p>
            </div>
            <h3 class="">
              {{__('job skils')}}
            </h3>
            <div class="description">
                @if(Session::get('locale')=='ar')
                {{$career->job_skills_ar}}
               @else
               {{$career->job_skills}}
               @endif

            </div>
            <div class="">
                <h5>Apply for this job via email</h5>
              <a>
                {{ $career->emai_careers }}
              </a>
            </div>
          </div>



            </div>
          </div>
        </div>
      </div>
        </div>
    </div>
</x-app-layout>
