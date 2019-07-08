@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box about">
            <div class="main__left">
              <div class="title-container"><img src="/img/about_bg.jpg" alt="About BG">
                <h2 class="main__left-title">About 15-PUZZLE<br>Project <span class="title-line"></span><span class="title-text">Cancerogenesis reversal hypothesis</span></h2>
              </div>
              <div class="main__left-subtitle">
                Theory behind this project is that there are total of 15 "pieces" (systemic factors) of the cancer "puzzle" that are parts of different conventional medical science cancer treatment protocols and ones known in naturopathic or holistic medicine.</div>
              <div class="main__left-text">
                We take the position of looking at cancer not as a tumor that has to be removed, but rather as a consequence of number of individual systemic imbalances in different organs leading to formation of a malignant tumor. (see "holistic approach to cancer").<br><br>
                The international team of doctors, researchers and medical students who keep their names and accreditations private, are working on
                this web site, trying to systematize existing knowledge and medical expertise to understand, how exactly one's body gets "confused" in the process
                of developing the cancer and look at different diagnostic and treatment approaches related to every of these 15 systemic factors.<br><br>
                We are gladly accepting scientific input from web site audience who can contribute their expertise to understanding cancer pathogenesis
                or approaches to treating it's influential factors, or treatment results.<br><br><span>Mind that the information is given for research purposes only, evaluating this theory or drawing the conclusions about it's practical implementation is one's own responsibility. This is not a replacement of a conventional oncology treatment or a visit to a skilled naturopathic doctor.
              </div>
            </div>
            <div class="main__right">
              <div class="main__video">
                <div class="main__video-overlay"></div>
                <video poster="/img/Video.png">
                  <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
                  <source src="http://techslides.com/demos/sample-videos/small.ogv" type="video/ogg">
                </video>
              </div>
              <div class="puzzle-15">
                <div class="puzzle-15__category resons"><span></span>resons</div>
                <div class="puzzle-15__category conditions"><span></span>conditions</div>
                <div class="puzzle-15__category defence"><span></span>defence</div>
                <div class="puzzle-15__category dangers"><span></span>dangers</div>
                <div class="puzzle-15__category dangers"><span></span>dangers</div>
                <div class="puzzle-15__category dangers"><span></span>dangers</div>
                @foreach($factors as $factor)
                  <div class="puzzle-15__item-outer" obj-id="{{$factor->id}}">
                    <div class="puzzle-15__item {{$factor->type->name}}"><img class="factors-check"
                                                                                  src="img/svg/factors-check.svg" alt=""><img
                              src="{{$factor->img}}">
                      <h6 class="puzzle-15__item-title">{{$factor->name}}</h6>
                    </div>
                  </div>
                @endforeach
              </div>                  
              <div class="main__right-note">The 15 pieces of the cancer process may look confusing at a first glance. But keep in mind that there are evidences of completing the riddle in 1-2 moves only. It might be necessary to move as much as 4 or 6 pieces to fix your body, feel free to explore the puzzle and sort it out!</div>
              <ul class="main__books">
                <li><img src="img/svg/book.svg">Detoxifying for cancer (by dr. George Andonevris)
                </li>
                <li><img src="img/svg/book.svg">Using bioresonance for cancer (by dr. George Andonevris)
                </li>
                <li><img src="img/svg/book.svg">Spiritual and psychoemotional causes of cancer (by dr. George Andonevris)
                </li>
                <li><img src="img/svg/book.svg">Holistic model of cancer (by dr. George Andonevris)
                </li>
                <li><img src="img/svg/book.svg">Be healthy (by dr. Pokrywka)
                </li>
                <li><img src="img/svg/book.svg">Antioxidant curing of cancer (by dr. Garbuzov)
                </li>
              </ul><a class="arrow-link" href="#" target="_blank">Literature</a>
            </div>
          </div>
        </main>      
@endsection
