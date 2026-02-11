<div>
    <form wire:submit.prevent="crearFut">
        <div class="container-fluid  mb-5 card p-4">
            <h1>FORMULARIO ÚNICO DE TRAMITES (FUT)</h1>
            <hr>
            <x-partials.inputs.fut.input label="I. RESUMEN DE SOLICITUD (sumilla)" wire:model.live.blur="formFut.resumen_solicitud" />
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <label for="">II. RESUMEN O AUTORIDAD A QUIEN SE DIRIGE: </label>
                </div>
                <div class="col-sm-9 text-end">
                    <strong class="h6">Director(a) General IESTP "Manuel Seoane Corrales"</strong>
                </div>
            </div>
            <hr>
            <x-partials.inputs.fut.input label="III. DATOS DEL SOLICITANTE" wire:model.live.blur="formFut.datos_del_solicitante" />
            <hr>
            <label for="">Persona Natural</label>
            <x-partials.inputs.fut.input label="NOMBRES Y APELLIDOS" wire:model.live.blur="formFut.nombres_apellidos" />
            <x-partials.inputs.fut.input label="DOCUEMENTO DE IDENTIDAD" wire:model.live.blur="formFut.documento_identidad" />
            <br>
            <label for="">Persoan Juridica</label>
            <x-partials.inputs.fut.input label="RAZON SOCIAL" wire:model.live.blur="formFut.razon_social" />
            <x-partials.inputs.fut.input label="RUC" wire:model.live.blur="formFut.ruc" />
            <x-partials.inputs.fut.input label="TELEFONOS" wire:model.live.blur="formFut.telefonos" />
            <x-partials.inputs.fut.input label="CORREO" wire:model.live.blur="formFut.correo" />
            <x-partials.inputs.fut.input label="DOMICILIO" wire:model.live.blur="formFut.domicilio" />
            <br>
            <label for="" class="mb-3">Cargo Actual</label>
            <div class="row justify-content-center text-center">
                <div class="col-sm-4 d-flex justify-content-center">
                    <x-partials.inputs.fut.radio radio="cargo" label="ESTUDIANTE" value="estudiante" wire:model.live="formFut.cargo_actual" />
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <x-partials.inputs.fut.radio radio="cargo" label="EGRESADO" value="egresado" wire:model.live="formFut.cargo_actual" />
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <x-partials.inputs.fut.radio radio="cargo" label="OTROS" value="otros" wire:model.live="formFut.cargo_actual" />
                </div>
            </div>          
            @if ($formFut->cargo_actual === 'estudiante')
            <div class="row justify-content-center">
                <label for="" class="mt-5 mb-3">Si marco (x) en ESTUDIANTE llenar los siguientes datos</label>
                <div class="col-sm-4 d-flex justify-content-center">
                    <x-partials.inputs.fut.select label="CARRERA PROFESIONAL" wire:model.live.blur="formFut.carrera_profesional">
                        <option value="Desarrollo de Sistemas">Desarrollo de Sistemas</option>
                        <option value="Enfermeria">Enfermeria</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Electrotecnia">Electrotecnia</option>
                        <option value="Mecatronica Automotriz">Mecatronica Automotriz</option>
                        <option value="Mecanica de Produccion">Mecanica de Produccion</option>
                        <option value="Quimica Industrial">Quimica Industrial</option>
                    </x-partials.inputs.fut.select>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <x-partials.inputs.fut.select label="TURNO" wire:model.live.blur="formFut.turno">
                        <option value="mañana">Mañana</option>
                        <option value="noche">Noche</option>
                    </x-partials.inputs.fut.select>
                </div>
                <div class="col-sm-4 d-flex justify-content-center">
                    <x-partials.inputs.fut.select label="CICLO" wire:model.live.blur="formFut.ciclo">
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                    </x-partials.inputs.fut.select>
                </div>
            </div>
            @endif

            @if($formFut->cargo_actual === 'egresado')
            <label for="" class="mt-5 mb-3">Si marco (x) en EGRESADO llenar los siguientes datos</label>
            <div class="row justify-content-center text-center">
                <div class="col-sm-6 ">
                    <x-partials.inputs.fut.input label="AÑO DE EGRESO" wire:model.live.blur="formFut.anio_egresado" />
                </div>
                <div class="col-sm-6 d-flex justify-content-center">
                    <x-partials.inputs.fut.select label="CARRERA PROFESIONAL" wire:model.live.blur="formFut.carrera_profesional">
                        <option value="Desarrollo de Sistemas">Desarrollo de Sistemas</option>
                        <option value="Enfermeria">Enfermeria</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Electrotecnia">Electrotecnia</option>
                        <option value="Mecatronica Automotriz">Mecatronica Automotriz</option>
                        <option value="Mecanica de Produccion">Mecanica de Produccion</option>
                        <option value="Quimica Industrial">Quimica Industrial</option>
                    </x-partials.inputs.fut.select>
                </div>
            </div>
            @endif
            <br>
            <hr>
            <x-partials.inputs.fut.text-area label="FUNDAMENTACION DEL PEDIDO" wire:model.live.blur="formFut.fundamentacion_pedido" />
            <hr>
            <x-partials.inputs.fut.text-area label="DOCUMENTOS QUE SE ADJUNTAN" wire:model.live.blur="formFut.documentos_adjuntados" />
            <div class="container-fluid d-flex justify-content-end">
                <button class="btn btn-success" type="submit">Crear Fut</button>
            </div>
        </div>
    </form>
    @script
    <script>
        Livewire.on('create-fut', (e) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Fut Creado Exitosamente",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
    @endscript
</div>