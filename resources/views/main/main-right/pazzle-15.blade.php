              <div class="puzzle-15">
                <div class="puzzle-15__category resons"><span></span>resons</div>
                <div class="puzzle-15__category conditions"><span></span>conditions</div>
                <div class="puzzle-15__category defence"><span></span>defence</div>
                <div class="puzzle-15__category dangers"><span></span>dangers</div>
                <div class="puzzle-15__category dangers"><span></span>dangers</div>
                <div class="puzzle-15__category dangers"><span></span>dangers</div>
                @foreach($pieces as $piece) 
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item {{$piece->category->name}}"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="{{$piece->img}}">
                    <h6 class="puzzle-15__item-title">{{$piece->name}}</h6>
                  </div>
                </div>
                @endforeach
                <!--
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item reasons"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/dna.svg">
                    <h6 class="puzzle-15__item-title">DNA <br> damage</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item reasons"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/etiology.svg">
                    <h6 class="puzzle-15__item-title">Etiology</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/hand.svg">
                    <h6 class="puzzle-15__item-title">Looking up</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/detox.svg">
                    <h6 class="puzzle-15__item-title">Detox</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/voltage.svg">
                    <h6 class="puzzle-15__item-title">Cell <br> voltage</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/ph.svg">
                    <h6 class="puzzle-15__item-title">pH</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/cellular.svg">
                    <h6 class="puzzle-15__item-title">Cellular <br> metabolism</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/cancer_cell_recognation.svg">
                    <h6 class="puzzle-15__item-title">Cancer cell recognition by immune system</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/reactivation.svg">
                    <h6 class="puzzle-15__item-title">Reactivation <br> of immune system</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/connective.svg">
                    <h6 class="puzzle-15__item-title">Connective <br> tissue recovery</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/cancer_cell_elimination.svg">
                    <h6 class="puzzle-15__item-title">Cancer <br> cell elimination</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/free_radical.svg">
                    <h6 class="puzzle-15__item-title">Free Radical <br> stress</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/cancer_cell_division.svg">
                    <h6 class="puzzle-15__item-title">Cancer <br> cell division</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="img/svg/factors-check.svg" alt=""><img src="img/svg/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
              </div>
              -->
