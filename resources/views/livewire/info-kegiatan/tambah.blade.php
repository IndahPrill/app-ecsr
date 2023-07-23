<title>E-CSR - {{ $title }}</title>
<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
    @if (auth()->user()->user_level == '1' || auth()->user()->user_level == '2')
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">{{ $title }}</h1>
        </div>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="col-12 mt-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus qui mollitia perspiciatis dolorem quidem ullam voluptatem sequi in officiis vitae quam esse alias inventore nihil voluptatum ut, voluptates fugit! Aliquam!
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="col-12 mt-4">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo nulla animi at impedit ipsa aut quam praesentium perspiciatis, a tempore tempora in dolore deserunt? Doloribus dignissimos incidunt facere vitae natus!
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="col-12 mt-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dolor repellendus vitae beatae aliquam voluptas unde, recusandae porro, ad et omnis alias ullam quos dolorem libero illo magni nobis consequatur.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
