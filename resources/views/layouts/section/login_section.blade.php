<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body logInSection">
             
                <div class="float-end mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-x-lg fw-bold" data-bs-dismiss="modal" aria-label="Close" viewBox="0 0 16 16" style="cursor: pointer">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                      </svg>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 py-4">
                        <div class="card py-2 adminLogIn">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="white" class="bi bi-person-badge" viewBox="0 0 16 16">
                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                  </svg>
                            </div>
    
                            <div class="card-body text-center py-2">
                                <span class="card-text">
                                   
                                    @if (Route::has('admin.login'))
                                    <div class="">
                                        @auth('admin')
                                            <a class="text-white text-decoration-none fs-5 text-dark"
                                                href="{{ route('admin.dashboard') }}">Admin
                                                Login</a>
                                        @else
                                            <a href="{{ route('admin.login') }}"
                                                class="text-decoration-none text-white fs-5 fw-bold text-dark">Admin
                                                Log in</a>
                                        @endauth
                                    </div>
                                @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 py-4">
                        <div class="card py-2  studentLogin">
                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="white" class="bi bi-person-badge" viewBox="0 0 16 16">
                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                  </svg>
                            </div>
                            <div class="card-body text-center py-2">
                                <span class="card-text">
                                    @if (Route::has('student.login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                        @auth('student')
                                            <a href="{{ route('student.dashboard') }}"
                                                class=" text-decoration-none text-white text-dark fs-5">Student
                                                Login</a>
                                        @else
                                            <a href="{{ route('student.login') }}"
                                                class="text-decoration-none text-white text-dark fw-bold fs-5">Student
                                                Log in</a>
                                        @endauth
                                    </div>
                                @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
