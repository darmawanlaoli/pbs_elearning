@extends('primaryteacher.layout')

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
                                <div class="border-end pe-4">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">
                                        <div id="clock">00:00:00</div><i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                    </h3>
                                    <p class="mb-0 text-dark">
                                    <div id="date">Tanggal</div>
                                    </p>
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
                                <a href="{{ route('primary_teacher.lesson_plan') }}"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/lesson.png" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Lesson Plan</h6>
                                        <span class="fs-2 d-block text-dark">Manage Weekly Lesson Plan</span>
                                    </div>
                                </a>


                                <a href="{{ route('primary_teacher.lesson_material') }}"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/icon-dd-message-box.svg" alt=""
                                            class="img-fluid" width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Lesson Material</h6>
                                        <span class="fs-2 d-block text-dark">Manage Lesson Material</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative">
                                <a href="{{ route('primary_teacher.uts') }}"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/online-learning.png" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">
                                            Unit to Study</h6>
                                        <span class="fs-2 d-block text-dark">Manage Unit to Study</span>
                                    </div>
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
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
                                <a href="{{ route('primary_teacher.assesment_record') }}"
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/curriculum.png" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">Assesment Record</h6>
                                        <span class="fs-2 d-block text-dark">Input assesment record</span>
                                    </div>
                                </a>

                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
                                    class="d-flex align-items-center pb-9 position-relative    ">
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Fitur ini sedang dalam perbaikan, silahkan coba lagi nanti.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    function updateTime() {
      const now = new Date();

      // Ambil waktu
      let hours = now.getHours().toString().padStart(2, '0');
      let minutes = now.getMinutes().toString().padStart(2, '0');
      let seconds = now.getSeconds().toString().padStart(2, '0');

      // Format jam
      const timeString = `${hours}:${minutes}:${seconds}`;
      document.getElementById("clock").textContent = timeString;

      // Ambil tanggal
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      const dateString = now.toLocaleDateString('id-ID', options);
      document.getElementById("date").textContent = dateString;
    }

    // Update setiap detik
    setInterval(updateTime, 1000);

    // Panggil pertama kali
    updateTime();
</script>

@endsection
