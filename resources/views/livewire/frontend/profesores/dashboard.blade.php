<div>
    <div>
        <h1 class="mb-4">BIENVENIDO PROFESOR</h1>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Carpetas Revisadas</h6>
                                            <h6 class="font-extrabold mb-0">{{$revisadas}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Carpetas Pendientes</h6>
                                            <h6 class="font-extrabold mb-0">{{$pendientes}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  rounded">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Profile Visit</h4>
                                </div>
                                <div class="card-body">
                                    <div id="chart-profile-visit"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row  rounded">
                        <div class="col-12 col-xl-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Profile Visit</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-xl-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Latest Comments</h4>
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
                                    <h6 class="text-muted mb-1">{{auth()->user()->email}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                         <div class="card-header">
                            <h4>Breve Info</h4>
                        </div>
                        <div class="card-content pb-4">                            
                                <div class="container mt-2 d-flex justify-content-center">
                                    <label for="" class="me-4 text-center">NOMBRES: </label> <strong>{{auth()->user()->name}}</strong>
                                </div>                                
                                <div class="container mt-2 d-flex justify-content-center">
                                    <label for="" class="me-4 text-center">ROL: </label> <strong>{{auth()->user()->rol}}</strong>
                                </div>                                
                                <div class="container mt-2 d-flex justify-content-center">
                                    <label for="" class="me-4 text-center">DNI: </label><strong>{{auth()->user()->dni}}</strong>
                                </div>                                
                            </div>                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/dashboard.js') }}"></script>
</div>