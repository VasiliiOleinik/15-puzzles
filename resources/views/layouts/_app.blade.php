<!DOCTYPE html>
<html lang="ru"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="http://15-puzzle.dev-team.su/assets/img/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/libs.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/main.css') }}">
    @yield('news-css')
    @yield('personal_cabinet-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/css.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/css(1).css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;display=swap&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/all.css') }}" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>15-puzzle</title>
</head>
  <body>
    <!--include _preloader-->
    <div class="content-wrapper" id="contentWrapper">
      <div class="page-wrapper" id="pageWrapper">
        <header class="header">
          <div class="box">
            <div class="header__body">
              <div class="header__logo logo"><img src="/images/logo.svg"></div>
              <form class="header__search">
                <input class="header__search-input" placeholder="Search" type="text">
                <button class="header__search-btn"><i class="fas fa-search"></i></button>
              </form>
              <nav class="header__nav">
                <ul class="header__nav-list">
                  <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">Main</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">Member's cases</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">Factor diagram</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">About</a></li>
                  <li class="header__nav-li"><a class="header__nav-link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">News</a></li>
                </ul>
              </nav>
              <div class="header__langs"><a class="header__lang" href="http://15-puzzle.dev-team.su/home.html#">ENG</a><span class="header__lang-devider"></span><a class="header__lang" href="http://15-puzzle.dev-team.su/home.html#">RU</a></div>
              <form class="header__mobile_search">
                <button class="header__search-btn"><i class="fas fa-search"></i></button>
              </form>
            </div>
          </div>
        </header>
        <main class="main">
          <div class="box">
            <div class="main__left">
              <h2 class="main__left-title">Cancer reversal protocols<br>of holistic medicine</h2>
              <div class="main__left-subtitle">There are 15 known "pieces" of the cancer puzzle that are involved in known natural cancer treatment protocols.</div>
              <div class="main__left-text">
                This web site is your research base to find out how exactly your body got "confused" in the process of developing the cancer and try develop your own plan of reversing the cancerogenesis process 
                based on the best known practices in naturopathic cancer treatment.<br><br>
                This web site is your research base to find out how exactly your body got "confused" in the process of 
                developing the cancer and try develop your own plan of reversing the cancerogenesis process based on the best known practices in naturopathic cancer treatment.
              </div>
              <div class="main__tabs r-tabs" id="mainTabs">
                <ul class="main__tabs-nav r-tabs-nav">
                  <li class="r-tabs-tab r-tabs-state-active"><a href="http://15-puzzle.dev-team.su/home.html#tab-1" class="r-tabs-anchor"> Factors<span class="count">[200]</span></a></li>
                  <li class="r-tabs-tab r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-2" class="r-tabs-anchor"> Diseases<span class="count">[200]</span></a></li>
                  <li class="r-tabs-tab r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-3" class="r-tabs-anchor"> Protocols <span class="count">[200]</span></a></li>
                  <li class="r-tabs-tab r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-4" class="r-tabs-anchor"> Remedies<span class="count">[200]</span></a></li>
                  <li class="markers r-tabs-tab r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-5" class="r-tabs-anchor"> Markers<span class="count">[200]</span></a></li>
                </ul>
                <div class="tags">
                  <div class="tags__list">
                    <li class="tag-item"><a class="tag-name" href="javascript:void(0)">DNA Damage</a><img class="tag-remove" src="images/main/delete_item_ico.png" alt="Delete Item"></li>
                    <li class="tag-item"><a class="tag-name" href="javascript:void(0)">DNA Damage</a><img class="tag-remove" src="images/main/delete_item_ico.png" alt="Delete Item"></li>
                    <li class="tag-item"><a class="tag-name" href="javascript:void(0)">DNA Damage</a><img class="tag-remove" src="images/main/delete_item_ico.png" alt="Delete Item"></li>
                  </div>
                </div>
                <div class="r-tabs-accordion-title r-tabs-state-active"><a href="http://15-puzzle.dev-team.su/home.html#tab-1" class="r-tabs-anchor"> Factors<span class="count">[200]</span></a></div><div id="tab-1" class="r-tabs-panel r-tabs-state-active" style="display: block;">
                  <div class="tab-list main-scroll">
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Factor #1: Oxygen cell metabolism change as a cause of cancer</p>
                        </label>
                        <div class="arrow"><img src="images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Factor #2: Oxygen cell metabolism change as a cause of cancer</p>
                        </label>
                        <div class="arrow"><img src="images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>his way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Factor #3: Oxygen cell metabolism change as a cause of cancer</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Factor #4: Oxygen cell metabolism change as a cause of cancer</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Factor #5: Oxygen cell metabolism change as a cause of cancer</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="r-tabs-accordion-title r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-2" class="r-tabs-anchor"> Diseases<span class="count">[200]</span></a></div><div id="tab-2" class="r-tabs-panel r-tabs-state-default" style="display: none;"></div>
                <div class="r-tabs-accordion-title r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-3" class="r-tabs-anchor"> Protocols <span class="count">[200]</span></a></div><div id="tab-3" class="r-tabs-panel r-tabs-state-default" style="display: none;">
                  <div class="tab-list main-scroll">
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Andonevris protocol<span class="evidence proven"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle">Collagen barrier/antioxidant technique by dr. Rath and two-time Nobel Prize winner Dr. Linus Pauling </p>
                          <p>One of the key mechanisms that cancer cells use in order to expand and metastasise in the body involves enzymatic destruction of the surrounding connective tissue. Therapeutic approaches to control this process through specific drugs have not been successful and currently there are no means available to control cancer metastasis. Current treatments protocol with chemotherapy and radio-therapy focus on cancer cell destruction in the body, and they do not address metastasis. Moreover, these treatments are toxic, not specific and associated with severe side effects. Chemotherapy and radiotherapy carry a risk of the development of new cancers and through their destruction of connective tissue in the body can facilitate the invasion of cancer. Therefore, there is a need for safe and effective natural approaches that can be used to control the process of cancer expansion in the body.  It is possible to affect cancer cell matrix invasion by increasing the stability and strength of the connective tissue surrounding cancer cells, and contributing to the “encapsulation” of the tumor. This requires optimizing the synthesis and structure of collagen fibrils, for which the hydroxylation of hydroxyproline and hydroxylysine residues in collagen fibers is essential. It is well known that ascorbic acid is essential for hydroxylation of these amino acids. Ascorbic acid and L-lysine are not normally produced in the human body, therefore, suboptimal levels of these nutrients is possible in various pathological stages as well as through inadequate diets.   Production of both collagen and elastin requires vitamin C, lysine and proline.  Other sources state that cancer cell membranes are very low on Omega-3, therefore it's recommended that Omega-3 and Chlorella/Chlorophyl are taken simultaneously.</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link protocols" href="javascript:void(0)">http://www.drrathresearch.org/drrath-discoveries/cancer</a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Podduvka protocol<span class="evidence average"><span class="evidence__detail">Level of evidence:<span class="evidence__level average">average</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Rath protocol<span class="evidence proven"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Johanna Budwig protocol
<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Dokopalenko protocol<span class="evidence average"><span class="evidence__detail">Level of evidence:<span class="evidence__level average">average</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Dr. Shiitake protocol<span class="evidence proven"><span class="evidence__detail">Level of evidence:<span class="evidence__level proven">proven</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chinese medicine protocols<span class="evidence low"><span class="evidence__detail">Level of evidence:<span class="evidence__level low">low</span></span></span></p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p class="subtitle"></p>
                          <p></p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)"></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="r-tabs-accordion-title r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-4" class="r-tabs-anchor"> Remedies<span class="count">[200]</span></a></div><div id="tab-4" class="r-tabs-panel r-tabs-state-default" style="display: none;">
                  <div class="tab-list main-scroll">
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Muracol protect, Bulgaria</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">GcMAF</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>his way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Chondroitine Sulphate</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">GA-40, Georgia</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Hydrogen water</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Cesium Chloride</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                    <div class="tab-item">
                      <div class="tab-item__head">
                        <label class="tab_head_check">
                          <input class="checkbox" type="checkbox"><span class="checkbox-custom"></span>
                          <p class="title">Sulphoraphane</p>
                        </label>
                        <div class="arrow"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content">
                        <div class="text">
                          <p>The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 The information provided in this book is fully dedicated to new immunotherapeutic and anti-cancer drug GA-40 (plant origin peptide complex). The book is composed of two major parts. The first part of the book (GA-40 in Brief) is targeted for a wide audience. In this part of a book author provide the information about GA-40’s pre-clinical and clinical research results in short and easy to understand conclusions. Author utilized hypothetical schemes to help explain research results and the mechanisms of GA-40 action. This way, the presented material should be easier to understand, interesting, and available to even the readers that have no special scientific background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific. background. The second part of the book (Review of GA-40 Scientific Investigation) is strictly scientific.This part of the book describes the results</p>
                        </div><a class="show-more" href="javascript:void(0)">Show more</a><a class="link" href="javascript:void(0)">GA-40 A New Immunotherapeutic &amp; Anti-Cancer Drug </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="r-tabs-accordion-title r-tabs-state-default"><a href="http://15-puzzle.dev-team.su/home.html#tab-5" class="r-tabs-anchor"> Markers<span class="count">[200]</span></a></div><div id="tab-5" class="r-tabs-panel r-tabs-state-default" style="display: none;">
                  <div class="tab-list main-scroll markers">
                    <div class="tab-item markers">
                      <div class="tab-head-markers">
                        <p class="title">Theoretical DNA mutagenic factor rate</p>
                        <div class="arrow markers"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content markers">
                        <h3 class="content-markers-title">How to check to what extent the cells are under dna mutagenic influence</h3><span class="methods">Methods</span>
                        <div class="method-list">
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 1</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 2</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-item markers">
                      <div class="tab-head-markers">
                        <p class="title">Indirect: Antioxidant status of body</p>
                        <div class="arrow markers"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content markers">
                        <h3 class="content-markers-title">How to check to what extent the cells are under dna mutagenic influence</h3><span class="methods">Methods</span>
                        <div class="method-list">
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 1</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 2</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-item markers">
                      <div class="tab-head-markers">
                        <p class="title">increased anabolism with a decreased catabolism</p>
                        <div class="arrow markers"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content markers">
                        <h3 class="content-markers-title">How to check to what extent the cells are under dna mutagenic influence</h3><span class="methods">Methods</span>
                        <div class="method-list">
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 1</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 2</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-item markers">
                      <div class="tab-head-markers">
                        <p class="title">Oxidative glukosis / fermentative energy rate</p>
                        <div class="arrow markers"><img src="/images/main/dropdown-ico.svg" alt=""></div>
                      </div>
                      <div class="tab-item__content markers">
                        <h3 class="content-markers-title">How to check to what extent the cells are under dna mutagenic influence</h3><span class="methods">Methods</span>
                        <div class="method-list">
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 1</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                          <div class="method-item">
                            <label class="method-item__head">
                              <input class="checkbox" type="radio" name="method"><span class="checkbox-custom"></span>
                              <p class="title">Method 2</p>
                            </label>
                            <div class="method-item__content">
                              <div class="text markers">
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="methods-laboratories" style="display: none;">
                <h3 class="methods-laboratories__title">Find nearest laboratories to check this marker</h3><span class="methods-laboratories__intruction">Enter your country name and your zip code</span>
                <div class="methods-laboratories__inputs">
                  <div class="methods-select" id="select-method" name="method"><span class="current-value" data-value="">Select method</span>
                    <ul class="methods-select-list">
                      <li data-value="method-1">Method 1</li>
                      <li data-value="method-2">Method 2</li>
                    </ul>
                  </div>
                  <div class="methods-select" id="select-country" name="country"><span class="current-value country">You country</span>
                    <ul class="methods-select-list">Select method
                      <li data-value="ru">Russia</li>
                      <li data-value="ua">Ukraine</li>
                      <li data-value="usa">USA</li>
                    </ul>
                  </div>
                  <input class="methods-input" type="text" placeholder="Your ZIP code">
                  <button class="methods-btn">Find lab </button>
                </div>
                <div class="methods-laboratories__map"><img src="/images/main/map.png" alt=""></div>
              </div>
              <div class="home-news">
                <h3 class="home-news__title">News</h3>
                <div class="home-news__list">
                  <div class="home-news__item"><img class="news-image" src="/images/main/new1.png" alt="">
                    <div class="news-detail"><a class="news-name" href="javascript:void(0)">The journal recently featured a miraculous story called</a><a class="news-date" href="javascript:void(0)">19.10.2019</a><a class="news-text " href="javascrtip:void(0)">The Wall Street Journal. The journal recently featured a miraculous story called, “Cancer's Super Survivors: How the Promise of Immunotherapy is Transforming Oncology,”<span class="news-arrow">   </span></a></div>
                  </div>
                  <div class="home-news__item"><img class="news-image" src="/images/main/new2.png" alt="">
                    <div class="news-detail"><a class="news-name" href="javascript:void(0)">The journal recently featured a miraculous story called</a><a class="news-date" href="javascript:void(0)">19.10.2019</a><a class="news-text " href="javascrtip:void(0)">The Wall Street Journal. The journal recently featured a miraculous story called, “Cancer's Super Survivors: How the Promise of Immunotherapy is Transforming Oncology,”<span class="news-arrow">   </span></a></div>
                  </div>
                  <div class="home-news__item"><img class="news-image" src="/images/main/new3.png" alt="">
                    <div class="news-detail"><a class="news-name" href="javascript:void(0)">The journal recently featured a miraculous story called</a><a class="news-date" href="javascript:void(0)">19.10.2019</a><a class="news-text " href="javascrtip:void(0)">The Wall Street Journal. The journal recently featured a miraculous story called, “Cancer's Super Survivors: How the Promise of Immunotherapy is Transforming Oncology,”<span class="news-arrow">   </span></a></div>
                  </div>
                </div><a class="all-news" href="javascript:void(0)">All news</a>
              </div>
            </div>
            <div class="main__right">
              <div class="main__video">
                <div class="main__video-overlay"><img class="main__video-logo" src="/images/main/logo.svg"></div>
                <video>
                  <source src="https://quirksmode.org/html5/videos/big_buck_bunny.mp4" type="video/mp4">
                  <source src="https://quirksmode.org/html5/videos/big_buck_bunny.ogv" type="video/ogg">
                </video>
              </div>
              <div class="puzzle-15">
                <div class="puzzle-15__category resons" style="top: 87px;"><span></span>resons</div>
                <div class="puzzle-15__category conditions" style="top: 184px;"><span></span>conditions</div>
                <div class="puzzle-15__category defence" style="top: 281px;"><span></span>defence</div>
                <div class="puzzle-15__category dangers" style="top: 378px;"><span></span>dangers</div>
                <div class="puzzle-15__category dangers" style="top: 475px;"><span></span>dangers</div>
                <div class="puzzle-15__category dangers" style="top: 572px;"><span></span>dangers</div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item reasons"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/oxygen_metabolism.svg">
                    <h6 class="puzzle-15__item-title">Oxygen <br> metabolism change</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item reasons"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/dna.svg">
                    <h6 class="puzzle-15__item-title">DNA <br> damage</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item reasons"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/etiology.svg">
                    <h6 class="puzzle-15__item-title">Etiology</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/hand.svg">
                    <h6 class="puzzle-15__item-title">Looking up</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/detox.svg">
                    <h6 class="puzzle-15__item-title">Detox</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/voltage.svg">
                    <h6 class="puzzle-15__item-title">Cell <br> voltage</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/ph.svg">
                    <h6 class="puzzle-15__item-title">pH</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item conditions"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/cellular.svg">
                    <h6 class="puzzle-15__item-title">Cellular <br> metabolism</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/cancer_cell_recognation.svg">
                    <h6 class="puzzle-15__item-title">Cancer cell recognition by immune system</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/reactivation.svg">
                    <h6 class="puzzle-15__item-title">Reactivation <br> of immune system</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/connective.svg">
                    <h6 class="puzzle-15__item-title">Connective <br> tissue recovery</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item defence"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/cancer_cell_elimination.svg">
                    <h6 class="puzzle-15__item-title">Cancer <br> cell elimination</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/free_radical.svg">
                    <h6 class="puzzle-15__item-title">Free Radical <br> stress</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/cancer_cell_division.svg">
                    <h6 class="puzzle-15__item-title">Cancer <br> cell division</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
                <div class="puzzle-15__item-outer">
                  <div class="puzzle-15__item dangers"><img class="factors-check" src="/images/main/factors-check.svg" alt=""><img src="/images/main/angiogenesis.svg">
                    <h6 class="puzzle-15__item-title">Angiogenesis</h6>
                  </div>
                </div>
              </div>
              <div class="main__right-note">The 15 pieces of the cancer process may look confusing at a first glance. But keep in mind that there are evidences of 
                <completing>the riddle in 1-2 moves only. It might be necessary to move as much as 4 or 6 pieces to fix your body, feel free to explore the puzzle and sort it out!</completing>
              </div>
              <ul class="main__books">
                <li><img src="/images/main/book.svg">Detoxifying for cancer (by dr. George Andonevris)
                </li>
                <li><img src="/images/main/book.svg">Using bioresonance for cancer (by dr. George Andonevris)
                </li>
                <li><img src="/images/main/book.svg">Spiritual and psychoemotional causes of cancer (by dr. George Andonevris)
                </li>
                <li><img src="/images/main/book.svg">Holistic model of cancer (by dr. George Andonevris)
                </li>
                <li><img src="/images/main/book.svg">Be healthy (by dr. Pokrywka)
                </li>
                <li><img src="/images/main/book.svg">Antioxidant curing of cancer (by dr. Garbuzov)
                </li>
              </ul><a class="arrow-link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">Literature</a>
            </div>
            <div class="tabs-modal">
              <div class="tabs-modal__container"><a class="close-tabs-modal-ico" href="javascript:void(0)">
                  <svg width="30" height="30" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <rect fill="#364458" height="40" width="2" y="2.8" x="-1" rx="2" ry="2" style="transform: rotate(-45deg)"></rect>
                      <rect fill="#364458" height="40" width="2" y="-20" x="20" rx="2" ry="2" style="transform: rotate(45deg);"></rect>
                    </g>
                  </svg></a>
                <div class="tabs-modal-text"></div><a class="close-tabs-modal-btn" href="javascript:void(0)">Закрыть</a>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div class="footer-wrapper" id="footerWrapper">
        <footer class="footer">
          <div class="box">
            <div class="footer__items">
              <div class="footer__left footer__item">
                <div class="footer__logo logo"><img src="/images/main/logo.svg"></div>
                <ul class="footer__list">
                  <li class="footer__li"><a class="footer__link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">letter to the editor</a></li>
                  <li class="footer__li"><a class="footer__link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">Privacy Policy</a></li>
                  <li class="footer__li"><a class="footer__link" href="http://15-puzzle.dev-team.su/home.html#" target="_blank">terms of service</a></li>
                </ul>
              </div>
              <div class="footer__middle footer__item">
                <h6 class="footer__h6">Disclaimer:</h6>
                <p class="footer__disclaimer">None of the above-stated protocols o r supplements have been evaluated or approved by FDA to diagnose or treat cancer. The website collects and presents information "as-is" about protocols used and developed by third-party individual doctors or scientific organizations worldwide, who did not undergo formal 1-2-3 stage clinical trials required to formally prove the efficacy of methods, drugs and supplements used. All efficacy information is given based on proprietary evidence data presented by the relevant authors of the protocols and individual patients website members.</p>
              </div>
              <div class="footer__right footer__item">
                <h6 class="footer__h6">Take latest news from 15-Puzzle:</h6>
                <form class="footer__subscribe">
                  <input type="email" placeholder="Your Email Address">
                  <button type="button">Subscribe</button>
                </form>
                <h6 class="footer__h6 evidence-title">Levels of evidence:</h6>
                <ul class="footer__evidence">
                  <li class="proven">Proven</li>
                  <li class="average">Average</li>
                  <li class="low">Low</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="footer__copirate">Copyright © 2019 15Puzzle Company. All rights reserved.
              <div class="footer__socs"><a class="footer__soc" href="http://15-puzzle.dev-team.su/home.html#" target="_blank"><img src="/images/main/youtube.svg"></a><a class="footer__soc" href="http://15-puzzle.dev-team.su/home.html#" target="_blank"><img src="/images/main/facebook.svg"></a><a class="footer__soc" href="http://15-puzzle.dev-team.su/home.html#" target="_blank"><img src="/images/main/insta.svg"></a></div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{ asset('js/frontend/libs.min.js') }}"></script>
    <script src="{{ asset('js/frontend/common.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/frontend/jquery-ui.min.js') }}"></script>
  
</body></html>