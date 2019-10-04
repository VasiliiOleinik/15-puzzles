@extends('layouts.app')
@section('title')
    <title>{{ config('puzzles.factor_diagram.title_'.app()->getLocale()) }}</title>
@endsection
@section('description')
    <meta content="{{ config('puzzles.factor_diagram._description_'.app()->getLocale()) }}" name="description">
@endsection
@section('content')
        <main class="main">
          <div class="box diagram">
            <div class="diagram__container">
              <div class="diagram__left">
                <div class="diagram__group">
                  <label class="group_title"><img src="/img/diagram_ico/Cancerogenesis.svg" alt="Cancerogenesis">
                    <input class="group_title_checkbox" type="checkbox"><span class="checkbox-custom"></span><span class="label">Cancerogenesis (1-3)</span>
                  </label>
                  <div class="group_content">
                    <div class="group_item js-item mutagenesis" data-start="0,80" data-finish="750,80" data-changeFinish="160" data-radius="4">
                      <p>DNA mutagenesis</p>
                    </div>
                    <div class="group_item js-item infections">
                      <p>Infections / Viruses / helmints /inflammation spiritual & psychoemotional</p>
                    </div>
                    <div class="group_item js-item oxygen">
                      <p>Lack of oxygen</p>
                    </div>
                  </div>
                </div>
                <div class="diagram__group">
                  <label class="group_title"><img src="/img/diagram_ico/Cell_nutrition.svg" alt="Cell_nutrition">
                    <input class="group_title_checkbox" type="checkbox"><span class="checkbox-custom"></span><span class="label">Cell "nutrition" (4-7)</span>
                  </label>
                  <div class="group_content">
                    <div class="group_item js-item supply">
                      <p>Supply (type of glycolysis)</p>
                    </div>
                    <div class="group_item js-item ph_status">
                      <p>PH status of cell surrounding</p>
                    </div>
                    <div class="group_item js-item rversal">
                      <p>Reversal to aerobic breathing</p>
                    </div>
                    <div class="group_item js-item lectronic">
                      <p>Electronic status of cell surrounding</p>
                    </div>
                  </div>
                </div>
                <div class="diagram__group">
                  <label class="group_title"><img src="/img/diagram_ico/Spreading_of_cancer.svg" alt="Spreading_of_cancer">
                    <input class="group_title_checkbox" type="checkbox"><span class="checkbox-custom"></span><span class="label">Spreading of cancer (8-10)</span>
                  </label>
                  <div class="group_content">
                    <div class="group_item js-item">
                      <p>Malignant cell division</p>
                    </div>
                    <div class="group_item js-item">
                      <p>Free radical (enzyme) emission (intoxication)</p>
                    </div>
                    <div class="group_item js-item">
                      <p>Surrounding connective tissue recovery, ECM and cellular adhesion</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="diagram__center">
                <h2 class="diagram__center-title">Reasons of cancer development</h2>
                <canvas class="diagram__center-circle-container" id="diagram" width="900" height="725">
                </canvas>
                </div>
                <div class="diagram__right">
                <div class="diagram__group">
                  <label class="group_title"><img src="/img/diagram_ico/Elimination.svg" alt="Elimination">
                    <input class="group_title_checkbox" type="checkbox"><span class="checkbox-custom"></span><span class="label">Elimination of alignant cells (apoptosis) (12-14)</span>
                  </label>
                  <div class="group_content">
                    <div class="group_item js-item reverse">
                      <p>Malignant Cell apoptosis</p>
                    </div>
                    <div class="group_item js-item reverse">
                      <p>Reactivation of "police cells" (Immunomodulation: macrofages, neutrofils, etc)</p>
                    </div>
                    <div class="group_item js-item reverse">
                      <p>Malignant cell recognition by immune system cells (NK-cell, T-cytotoxic cells, macrophages and neutrophils)</p>
                    </div>
                  </div>
                </div>
                <div class="diagram__group">
                  <label class="group_title"><img src="/img/diagram_ico/Drainage.svg" alt="Drainage">
                    <input class="group_title_checkbox" type="checkbox"><span class="checkbox-custom"></span><span class="label">Drainage (11)</span>
                  </label>
                  <div class="group_content">
                    <div class="group_item js-item reverse">
                      <p>Intracellular Drainage malfunction</p>
                    </div>
                  </div>
                </div>
                <div class="diagram__group">
                  <label class="group_title"><img src="/img/diagram_ico/Cancer_blood.svg" alt="Cancer_blood">
                    <input class="group_title_checkbox" type="checkbox"><span class="checkbox-custom"></span><span class="label">Cancer blood vessel development (Angiogenesis) (15)</span>
                  </label>
                  <div class="group_content">
                    <div class="group_item js-item reverse">
                      <p>Neovascularisation</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="diagram__info">
              <div class="diagram__info-title">Processes in which factors are involved</div>
              <div class="diagram__info-selected">
                <div class="diagram__info-selected-title">Selected factors:</div>
                <div class="diagram__info-selected-list"></div>
              </div>
              <div class="diagram__info-table">
                <div class="table_row head">
                  <div class="table-column first">
                    <p class="table-text">Norm</p>
                  </div>
                  <div class="table-column second">
                    <p class="table-text">Groups of related factors</p>
                  </div>
                  <div class="table-column third">
                    <p class="table-text">Patalogy</p>
                  </div>
                  <div class="table-column fourth">
                    <p class="table-text">Pathology correction methods</p>
                  </div>
                  <div class="table-column fifth">
                    <p class="table-text">Testing</p>
                  </div>
                </div>
                <div class="table_row">
                  <div class="table-column first">
                    <p class="table-text">Aerobic glycolisis </p>
                  </div>
                  <div class="table-column second">
                    <div class="table_image"><img src="/img/diagram_ico/Cancerogenesis_table.svg" alt="Cancerogenesis_table" title="Cancerogenesis"></div>
                    <div class="table_image"><img src="/img/diagram_ico/Cell_nutrition_table.svg" alt="Cell_nutrition_table" title="Cell_nutrition"></div>
                  </div>
                  <div class="table-column third">
                    <p class="table-text">Anaerobic glycolisis (5-50%  of oxygen intake of normal cells</p>
                  </div>
                  <div class="table-column fourth">
                    <div class="table-method">O2 supply</div>
                    <div class="table-method">HMDetox</div>
                    <p class="table-text">Betaine (red beetroot), Chlorophyl, etc ormobaric oxygenation (or other oxigenation techniques) Lineseed oil, cysteine, ethionine (Budwig Diet)Normobaric oxygenation  (or other oxigenation techniques) Lineseed oil, cysteine, methionine (Budwig Diet)</p>
                  </div>
                  <div class="table-column fifth">
                    <p class="table-text">Test description Lorem Ipsum dolor sit amet #1</p><a class="table-link" href="javascript:void(0);">Test link</a>
                  </div>
                </div>
                <div class="table_row">
                  <div class="table-column first">
                    <p class="table-text">Helmints, protozoa, viruses candida removed, inflamma tion reduced</p>
                  </div>
                  <div class="table-column second">
                    <div class="table_image"><img src="/img/diagram_ico/Cancerogenesis_table.svg" alt="Cancerogenesis_table" title="Cancerogenesis"></div>
                  </div>
                  <div class="table-column third">
                    <p class="table-text">Helmints, Protozoa, Viruses are causing hypoxy and inflammation in target organ</p>
                  </div>
                  <div class="table-column fourth">
                    <p class="table-text">Rife's technology, Zapper, Bioresonance Bioadditives, MMS drops Dieting</p>
                  </div>
                  <div class="table-column fifth">
                    <p class="table-text">Test description Lorem Ipsum dolor sit amet #1</p><a class="table-link" href="javascript:void(0);">Test link</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
@endsection
