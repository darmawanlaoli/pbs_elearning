@extends('adminprimary.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="../../assets/images/profile/user-1.jpg" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back {{ session('name') }} </h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4 border-muted border-opacity-10">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">45<i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                    <p class="mb-0 text-dark">Today’s Visitors</p>
                                </div>
                                <div class="ps-4">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">95%<i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                    <p class="mb-0 text-dark">Overall Performance</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="welcome-bg-img mb-n7 text-end">
                                <img src="../../assets/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class=" ps-7 pt-7">
                <div class="border-bottom">
                    <div class="row">
                        <div class="col-4">
                            <div class="position-relative">
                                <a href="{{ route('admin_primary.weekly_lp') }}"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/certificate.png" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Lesson Plan</h6>
                                        <span class="fs-2 d-block text-dark">Manage Weekly Lesson Plan</span>
                                    </div>
                                </a>


                                <a href="{{ route('admin_primary.zoom') }}" class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/icon-dd-message-box.svg" alt=""
                                            class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">
                                            Zoom Meeting</h6>
                                        <span class="fs-2 d-block text-dark">Input Zoom Link</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative">
                                <a href="https://pay.peachblossomsschool.sch.id/"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">
                                            Invoice App</h6>
                                        <span class="fs-2 d-block text-dark">Get latest
                                            invoice</span>
                                    </div>
                                </a>
                                <a href="./app-calendar.html"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/icon-dd-date.svg" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">
                                            Calendar App</h6>
                                        <span class="fs-2 d-block text-dark">Get
                                            dates</span>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative">
                                <a href="https://elearning.peachblossomsschool.sch.id/"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/icon-briefcase.svg" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Elearing App</h6>
                                        <span class="fs-2 d-block text-dark">learn more
                                            information</span>
                                    </div>
                                </a>

                                <a href="./app-notes.html" class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/icon-dd-application.svg" alt=""
                                            class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Notes
                                            Application</h6>
                                        <span class="fs-2 d-block text-dark">To-do and Daily
                                            tasks</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

</div>

@endsection