@extends('layouts.app')
@section('content')
        <main class="main">
          <div class="box">
            <div class="personal-left">
              <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link" href="home.html">Main</a></li>
                  <li class="breadcrumbs__element divider"><img src="img/svg/arrow.svg" alt="Bredcrumb arrow"></li>
                  <li class="breadcrumbs__element"><a class="breadcrumbs__link current" href="javascript:void(0);">News</a></li>
                </ul>
              </div>
              <div class="main-content">
                <h1 class="title">Personal cabinet</h1>
                <form class="personal-main-info">
                  <div class="profile-img">
                    <div class="imageWrapper"><img class="image" src="img/upload_big.png"></div>
                    <button class="file-upload">
                      <input class="file-input" type="file" placeholder="Choose File">
                    </button>
                  </div>
                  <div class="profile-labels">
                    <div class="label">
                      <input name="nickname" type="text">
                      <label for="nickname">Nickname</label>
                    </div>
                    <div class="label required">
                      <input name="email" type="text">
                      <label for="email">Email<span>*</span></label>
                    </div>
                    <div class="label required">
                      <input name="name" type="text">
                      <label for="name">Name<span>*</span></label>
                    </div>
                    <div class="label required">
                      <input name="last_name" type="text">
                      <label for="last_name">Last Name<span>*</span></label>
                    </div>
                    <div class="label required">
                      <input name="middle_name" type="text">
                      <label for="middle_name">Middle Name<span>*</span></label>
                    </div>
                    <div class="label required">
                      <input class="date-inp" id="personal-dob" name="dob" type="text">
                      <label for="dob">Date Of Birth<span>*</span></label>
                    </div>
                    <div class="label">
                      <input name="password" type="password">
                      <label for="nickname">Password</label>
                    </div>
                    <div class="message">
                      <p><span>*</span>Non-public information for administration only</p>
                    </div>
                  </div>
                </form>
                <div class="save-change">
                  <button class="save_change_btn" type="submit">Save changes</button>
                </div>
                <div class="personal-history">
                  <h3 class="personal-history__title">History of analyzes</h3>
                  <p class="personal-history__message">You can add file formats: PDF and Office files</p>
                  <form class="upload-label">
                    <div class="upload-file">
                      <div class="fileImg"><img class="file" src="img/file.png"></div>
                      <button class="file-upload">
                        <input class="file-input" type="file" placeholder="Choose File">
                      </button>
                    </div>
                    <div class="upload-info">
                      <input id="personal_file_name" type="text" value="File name">
                      <input class="add-file" type="submit" value="ADD">
                    </div>
                  </form>
                </div>
                <div class="search-byHistory">
                  <h3 class="search-byHistory__title">Search by analysis history</h3>
                  <form class="search-byHistory__labels">
                    <div class="label-search">
                      <input type="text" placeholder="Search by name">
                      <button class="search-byName" type="submit"><img src="img/svg/history-search.svg" alt=""></button>
                    </div>
                    <div class="label-date">
                      <input class="date-inp" type="text" placeholder="02.03.2019">
                      <input class="date-inp" type="text" placeholder="03.03.2019">
                      <button class="search-btn" type="submit">Search by date</button>
                    </div>
                  </form>
                  <div class="search-byHistory__result">
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/pdf.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/xls.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/doc.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/txt.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/xls.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/doc.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/txt.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/xls.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                    <div class="result-item">
                      <div class="result-item__img"><img src="img/svg/doc.svg"></div>
                      <div class="result-item__text"><a class="name" href="javascript:void(0)">Analysis from the laboratory</a><a class="date" href="javascript:void(0)">19.10.2019</a></div>
                    </div>
                  </div>
                  <div class="search-byHistory__more"><a class="show-more" href="javascript:void(0)">Show more</a></div>
                </div>
              </div>
            </div>
            <div class="personal-right">
              <div class="med-history">
                <h3 class="med-history__name">The name of my medical history</h3><img class="med-history__img" src="img/med-history.png" alt=""><a class="med-history__date" href="javascript:void(0)">19.10.2019</a>
                <p class="med-history__info">
                  We take the position of looking at cancer not as a tumor that has to be removed, but ratheas a consequence of number of individual systemic imbalances in different organs leading to formation of a malignant tumor. (see "holistic approach to cancer").</p>
                <div class="med-history__settings"><a class="edit-artile" href="javascript:void(0)">Edit article</a><a class="add-note" href="javascript:void(0)">Add a note</a></div>
              </div>
            </div>
          </div>
        </main>
@endsection
