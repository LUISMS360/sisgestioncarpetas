<div>
    <div class="page-content">        
        <section class="row">
            <div class="container mb-3">
                <h1 class="">Bienvenido administrador</h1>
            </div>
            <div class="col-12 col-lg-9">
                <h4>Usuarios registrados</h4>
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Estudiantes</h6>
                                        <h6 class="font-extrabold mb-0"><h4>{{$this->estudiantes()}}</h4></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Egresados</h6>
                                        <h6 class="font-extrabold mb-0"><h4>{{$this->egresados()}}</h4></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="bi bi-person-square mb-4 me-2"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Profesores</h6>
                                        <h6 class="font-extrabold mb-0"><h4>{{$this->profesores()}}</h4></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                        
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Tramites Gestionados</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <span>{{ auth()->user()->initials }}</span>
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">{{auth()->user()->name}}</h5>
                                <h6 class="text-muted mb-0">{{auth()->user()->email}}</h6>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Principales Colaboradores</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <div class="avatar bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <span>KC</span>
                            </div>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Karen Corilla</h5>
                                <h6 class="text-muted mb-0">@karencorilla</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                             <div class="avatar bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <span>NA</span>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Niels Arias</h5>
                                <h6 class="text-muted mb-0">@nielsareas</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                 <div class="avatar bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                <span>JA</span>
                            </div>
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">Jose Anculle</h5>
                                <h6 class="text-muted mb-0">@joseanculle </h6>
                            </div>
                        </div>
                        <div class="px-4">
                            <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>Start Conversation</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Principales Vistas</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script>
</div>