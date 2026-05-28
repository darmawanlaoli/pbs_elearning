@extends('primary_student.layout')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }

    .chat-container {
        max-width: 700px;
        margin: 40px auto;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        height: 80vh;
        overflow: hidden;
    }

    .chat-body {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
    }

    .chat-footer {
        padding: 15px 20px;
        border-top: 1px solid #dee2e6;
        background-color: #f8f9fa;
    }

    .chat-bubble {
        padding: 10px 15px;
        border-radius: 20px;
        margin-bottom: 5px;
        max-width: 70%;
        font-size: 15px;
        line-height: 1.4;
    }

    .chat-bubble-left {
        background-color: #e9ecef;
        align-self: flex-start;
        border-bottom-left-radius: 0;
    }

    .chat-bubble-right {
        background-color: #0d6efd;
        color: white;
        align-self: flex-end;
        border-bottom-right-radius: 0;
    }

    .chat-meta {
        font-size: 10px;
        color: #6c757d;
        margin-bottom: 3px;
    }

    .chat-meta-right {
        text-align: right;
    }

    select.form-select.border-bottom {
        padding-left: 0;
        padding-right: 0;
        background-color: transparent;
    }

    select:focus {
        box-shadow: none !important;
        border-color: #0d6efd;
    }
</style>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-4 mb-5 mx-auto text-center">
            
            <h2 class="mt-5 mb-3 text-center text-primary">Join Zoom Meeting</h2>
            
            <a target="_blank" href="{{ $zoom->link }}" class="btn btn-primary mx-auto mb-3">Join Now</a>
            
            <table class="table">
                <tr>
                    <th>Zoom Id</th>
                    <th>: {{ $zoom->zoom_id }}</th>
                </tr>
                
                <tr>
                    <th>Passcode</th>
                    <th>: {{ $zoom->passcode }}</th>
                </tr>
            </table>
            
            <div class="alert alert-info">
                <small>Please join the Zoom meeting by clicking 'Join Now'. If the 'Join Now' button does not work, you can manually enter the Zoom Meeting ID and Passcode in the Zoom application.</small>
            </div>

        </div>
        
        <div class="col-lg-8">
            <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex align-items-center mb-7">
                                <div class="rounded-circle overflow-hidden me-6">
                                    <img src="../../assets/images/profile/user-1.jpg" alt="" width="40" height="40">
                                </div>
                                <h5 class="fw-semibold mb-0 fs-5">Welcome back {{ session('name') }} </h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="border-end pe-4">
                                    <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center"><div id="clock">00:00:00</div><i
                                            class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                    <p class="mb-0 text-dark"><div id="date">Tanggal</div></p>
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

            <div class=" ps-7 pt-7">
                <div class="border-bottom">
                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative">
                                
                                <a href="{{ route('primary_student.lesson_material') }}"
                                    class="d-flex align-items-center pb-9 position-relative">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/online-learning.png" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">
                                            Lesson Matterial</h6>
                                        <span class="fs-2 d-block text-dark">Manage Lesson Matterial</span>
                                    </div>
                                </a>

                                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative">
                                
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" href=""
                                    class="d-flex align-items-center pb-9 position-relative    ">
                                    <div
                                        class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <img src="../../assets/images/svgs/curriculum.png" alt="" class="img-fluid"
                                            width="24" height="24">
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold bg-hover-primary">
                                            Assignment</h6>
                                        <span class="fs-2 d-block text-dark">Manage Assignment</span>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Coming soon! This feature is still being developed.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('chatForm');
  const input = document.getElementById('chatInput');
  const kelasSelect = document.getElementById('kelasSelect');
  const chatBody = document.getElementById('chatBody');

  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const message = input.value.trim();

    const kelasId = kelasSelect.value;

    if (!kelasId || !message) return;

    const kelasLabel = kelasId;
    const now = new Date();
    const jam = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    const tanggal = now.toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });

    try {
      const res = await fetch("{{ route('chat_student.kirim') }}", {
        method: "POST",
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message, kelas_id: kelasId })
      });

      const result = await res.json();
      if (result.success) {
        // tampilkan pesan ke UI
        const messageHTML = `
          <div class="d-flex flex-column align-items-end">
            <div class="chat-meta chat-meta-right">Saya • ${tanggal}, ${jam} • ${kelasLabel}</div>
            <div class="chat-bubble chat-bubble-right">${message}</div>
          </div>
        `;
        chatBody.insertAdjacentHTML('beforeend', messageHTML);
        chatBody.scrollTop = chatBody.scrollHeight;

        input.value = '';
        kelasSelect.value = '';
      }

    } catch (error) {
      alert('Gagal mengirim pesan.');
      console.error(error);
    }
  });
</script>

@endsection