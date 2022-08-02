@extends('layouts.admin')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card mini-stats-wid">
                    @php
                        $user = App\Models\Staff::where('status',0)->count();
                    @endphp
                    <a href="{{ route('restoreuser') }}">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Total Banned User</p>
                                    <h5 class="mb-0">{{ $user }}</h5> </div>
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bxs-group"></i> </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card blog-stats-wid">
                    <a href="#">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Deleted Category</p>
                                    <h5 class="mb-0">65165</h5> </div>
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bx-sitemap"></i> </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card blog-stats-wid">
                    <a href="#">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Deleted News</p>
                                    <h5 class="mb-0">5456</h5> </div>
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bx-news"></i> </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card blog-stats-wid">
                        <div class="card-body">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2">Comments</p>
                                    <h5 class="mb-0">4,235</h5> </div>
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20"> <i class="bx bxs-message-square-dots"></i> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end page title -->



</div>
@endsection
