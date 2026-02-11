<div>
    <div>
        <div class="page-content">
            <h1 class="mb-4">BIENVENIDO ESTUDIANTE</h1>
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Tramites revisados</h6>
                                            <h6 class="font-extrabold mb-0">{{$this->documentosRevisados()}}</h6>
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
                                            <div class="stats-icon blue mb-2">
                                                <i class="bi bi-archive-fill mb-4 me-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Carpetas</h6>
                                            <h6 class="font-extrabold mb-0">{{$this->carpetas()}}</h6>
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
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Futs</h6>
                                            <h6 class="font-extrabold mb-0">{{$this->futs()}}</h6>
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
                                    <h4>Acciones Rapidas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="" class="">Carpetas Pendientes</label>
                                            <br>
                                            <br>
                                            <button class="btn btn-light-primary"><i class="bi bi-eye-fill"></i> Revisar</button>
                                        </div>                                        
                                        <div class="col-sm-3">
                                            <label for="" class="">Futs Pendientes</label>
                                            <br>
                                            <br>
                                            <button class="btn btn-light-success"><i class="bi bi-eye-fill"></i> Revisar</button>
                                        </div>                                        
                                        <div class="col-sm-3">
                                            <label for="" class="">Crear Fut</label>
                                            <br>
                                            <br>
                                            <button class="btn btn-outiline-dark btn-dark"><i class="bi bi-plus"></i> Crear</button>
                                        </div>
                                    </div>                                    
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

</div>