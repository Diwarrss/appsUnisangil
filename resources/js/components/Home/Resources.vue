<template>
    <div class="container py-5 mt-5">
        <section class="py-5">
            <header class="section-header mt-5 mb-5 text-center">
                <h3>Recursos</h3>
            </header>
            <div class="text_header">
                <div class="row">
                    <div class="content_contact col-md-6">
                        <h5>Contacto de Soporte</h5>
                        <p>
                            Ticket a través de la Mesa de TI, plataforma GLPI, Llamada
                        </p>
                        <p>
                            •	Teléfono 037 7245757  Extensión  231
                        </p>
                        <p>
                            •	Correos: <br>
                            <a href="mailto:taller@unisangil.edu.co">taller@unisangil.edu.co</a> <br>
                            <a href="mailto:auxtaller@unisangil.edu.co">auxtaller@unisangil.edu.co</a>
                        </p>
                    </div>
                    <div class="content_suport col-md-6">
                        <h5>Horario de soporte</h5>
                        <p>
                            •	Lunes a viernes de 8:00 – 12:00 y  2:00 – 7:00 p.m. <br>
                            •	Sábado de 9:00 – 12:00 p.m.
                        </p>
                        <div class="text-center">
                            <img src="storage/img/services/resources.jpg" alt="" class="img-fluid" width="250">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-0">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseSix" id="headingOne">
                            <h2 class="btn btn-link mb-0">
                                •	Acceso Remoto <i class="fas fa-wifi"></i>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-6 col-md-6 text-center">
                                        <a href="https://download.anydesk.com/AnyDesk.exe?_ga=2.56820200.390938370.1585577290-228752194.1585577290" target="_blank" rel="noopener noreferrer">
                                            <img src="storage/img/services/anydesk_logo.jpg" alt="" class="img-fluid" width="250">
                                            <h5>
                                                <i class="fas fa-cloud-download-alt"></i> Descargar ahora
                                            </h5>
                                        </a>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 text-center">
                                        <a href="https://download.teamviewer.com/full" target="_blank" rel="noopener noreferrer">
                                            <img src="storage/img/services/teamviewer.jpg" alt="" class="img-fluid" width="250">
                                            <h5>
                                                <i class="fas fa-cloud-download-alt"></i> Descargar ahora
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseSix" id="headingTwo">
                            <h2 class="btn btn-link mb-0">
                                •	Manuales y guías <i class="fas fa-chalkboard-teacher"></i>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="content_body row mb-2">
                                    <div class="col-12 col-sm-6 col-md-4 text-center my-auto">
                                        <h5>
                                            <strong>¿Comó habilitar ventanas emergentes?</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <button class="btn btn-outline-primary" @click="downloadFile('chrome', null)"> <i class="fab fa-chrome"></i> Chrome</button>
                                        <button class="btn btn-outline-warning" @click="downloadFile('firefox', null)"> <i class="fab fa-firefox"></i> Firefox</button>
                                        <button class="btn btn-outline-danger" @click="downloadFile('opera', null)"> <i class="fab fa-opera"></i> Opera</button>
                                        <button class="btn btn-outline-info" @click="downloadFile('safari', null)"> <i class="fab fa-safari"></i> Safari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseSix" id="headingThree">
                            <h2 class="btn btn-link mb-0">
                                •	Impresoras y Scaners <i class="fas fa-print"></i>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="content_body products row" v-for="(product, index) in products" :key="index">
                                    <div class="col-12 col-sm-6 col-md-3 text-center my-auto">
                                        <h5>
                                            <strong>{{product.name}}</strong>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-9">
                                        <button
                                            class="btn btn-outline-danger m-2"
                                            title="Descargar"
                                            v-for="(manual, key) in product.manuals"
                                            :key="key"
                                            @click="downloadFile(null, manual)"
                                            >
                                            <i class="fas fa-cloud-download-alt"></i> {{manual.name}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            products: [
                {
                    name: 'CANON MF 244DW',
                    manuals: [
                        {
                            name: 'Cambio de Tóner',
                            file_url: 'storage/formatos/canon-MF-244DW/canon-MF-244dw-Cambio-de-Tóner.pdf',
                            slug_file: 'canon-MF-244dw-Cambio-de-Tóner.pdf'
                        },
                        {
                            name: 'Conexión básica',
                            file_url: 'storage/formatos/canon-MF-244DW/canon-MF-244dw-conexión-basica.pdf',
                            slug_file: 'canon-MF-244dw-conexión-basica.pdf'
                        },
                        {
                            name: 'Escáner',
                            file_url: 'storage/formatos/canon-MF-244DW/CANON-MF-244dw-Escáner.pdf',
                            slug_file: 'CANON-MF-244dw-Escáner.pdf'
                        },
                        {
                            name: 'Extracción de papel atascado',
                            file_url: 'storage/formatos/canon-MF-244DW/canon-MF-244dw-Extraccion-de-papel-atascado.pdf',
                            slug_file: 'canon-MF-244dw-Extraccion-de-papel-atascado.pdf'
                        }
                    ]
                },
                {
                    name: 'EPSON L575',
                    manuals: [
                        {
                            name: 'Recargar tintas',
                            file_url: 'storage/formatos/epson-l575/epson-l575-recargar-tintas.pdf',
                            slug_file: 'epson-l575-recargar-tintas.pdf'
                        },
                        {
                            name: 'Conexión básica',
                            file_url: 'storage/formatos/epson-l575/epson-l575-conexión-basica.pdf',
                            slug_file: 'epson-l575-conexión-basica.pdf'
                        },
                        {
                            name: 'Escáner',
                            file_url: 'storage/formatos/epson-l575/epson-l575-scanear.pdf',
                            slug_file: 'epson-l575-scanear.pdf'
                        },
                        {
                            name: 'Extracción de papel atascado',
                            file_url: 'storage/formatos/epson-l575/epson-l575-Extracción-de-papel-atascado.pdf',
                            slug_file: 'epson-l575-Extracción-de-papel-atascado.pdf'
                        },
                        {
                            name: 'Reinico niveles de tinta',
                            file_url: 'storage/formatos/epson-l575/epson-l575-reinico-niveles-de-tinta.pdf',
                            slug_file: 'epson-l575-reinico-niveles-de-tinta.pdf'
                        }
                    ]
                },
                {
                    name: 'HP M1102W',
                    manuals: [
                        {
                            name: 'Cambio de Tóner',
                            file_url: 'storage/formatos/HP-M1102W/HP-LaserJet-P1102w-Cambio-de-toner.pdf',
                            slug_file: 'HP-LaserJet-P1102w-Cambio-de-toner.pdf'
                        },
                        {
                            name: 'Conexión básica',
                            file_url: 'storage/formatos/HP-M1102W/HP-LaserJet-P1102w-conexion-basica-.pdf',
                            slug_file: 'HP-LaserJet-P1102w-conexion-basica-.pdf'
                        },
                        {
                            name: 'Extracción de papel atascado',
                            file_url: 'storage/formatos/HP-M1102W/HP-LaserJet-P1102w-Extraccion-de-papel-atascado.pdf',
                            slug_file: 'HP-LaserJet-P1102w-Extraccion-de-papel-atascado.pdf'
                        }
                    ]
                },
                {
                    name: 'HP P2035',
                    manuals: [
                        {
                            name: 'Cambio de Tóner',
                            file_url: 'storage/formatos/HP-P2035/HP-LaserJet-P2035-cambio-de-toner.pdf',
                            slug_file: 'HP-LaserJet-P2035-cambio-de-toner.pdf'
                        },
                        {
                            name: 'Conexión básica',
                            file_url: 'storage/formatos/HP-P2035/HP-LaserJet-P2035-conexion-basica.pdf',
                            slug_file: 'HP-LaserJet-P2035-conexion-basica.pdf'
                        },
                        {
                            name: 'Extracción de papel atascado',
                            file_url: 'storage/formatos/HP-P2035/HP-LaserJet-P2035-Extracion-de-papel.pdf',
                            slug_file: 'HP-LaserJet-P2035-Extracion-de-papel.pdf'
                        }
                    ]
                },
                {
                    name: 'HP LASERJET M124NF',
                    manuals: [
                        {
                            name: 'Cambio de Tóner',
                            file_url: 'storage/formatos/HP-P2035/HP-LASERJET-M124NF-CAMBIO-DE-TONER.pdf',
                            slug_file: 'HP-LASERJET-M124NF-CAMBIO-DE-TONER.pdf'
                        },
                        {
                            name: 'Conexión básica',
                            file_url: 'storage/formatos/HP-P2035/HP-LASERJET-M124NF-USO-BASICO.pdf',
                            slug_file: 'HP-LASERJET-M124NF-USO-BASICO.pdf'
                        },
                        {
                            name: 'Extracción de papel atascado',
                            file_url: 'storage/formatos/HP-P2035/HP-LASERJET-M124NF-EXTRACCION-DE-ATASCO.pdf',
                            slug_file: 'HP-LASERJET-M124NF-EXTRACCION-DE-ATASCO.pdf'
                        }
                    ]
                }
            ]
        }
    },
    methods: {
        downloadFile(type, manual){
            let url
            let name
            if (manual) {
                name = manual.slug_file
                url = manual.file_url
            }
            if (type) {
                if (type == 'chrome') {
                    url = 'storage/formatos/Como_habilitar_ventanas_emergentes_Chrome.pdf'
                    name = 'Como_habilitar_ventanas_emergentes_Chrome.pdf'
                }
                if (type == 'firefox') {
                    url = 'storage/formatos/Como_habilitar_ventanas_emergentes_Firefox.pdf'
                    name = 'Como_habilitar_ventanas_emergentes_Firefox.pdf'
                }
                if (type == 'opera') {
                    url = 'storage/formatos/Como_habilitar_ventanas_emergentes_Opera.pdf'
                    name = 'Como_habilitar_ventanas_emergentes_Opera.pdf'
                }
                if (type == 'safari') {
                    url = 'storage/formatos/Como_habilitar_ventanas_emergentes_Safari.pdf'
                    name = 'Como_habilitar_ventanas_emergentes_Safari.pdf'
                }
            }

            axios({
                method: 'get',
                url: url,
                responseType: 'arraybuffer'
            })
            .then(response => {
                this.forceFileDownload(response, name)
                this.$swal({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: "Descarga exitosa!",
                    showConfirmButton: false,
                    timer: 2000
                })
            })
            .catch(() =>
                this.$swal({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: "Error al descargar!",
                    showConfirmButton: false,
                    timer: 2000
                })
            )
        },
        forceFileDownload(response, name){
            const url = window.URL.createObjectURL(new Blob([response.data]))
            const link = document.createElement('a')
            link.href = url
            link.setAttribute('download', name) //or any other extension
            document.body.appendChild(link)
            link.click()
        }
    },
}
</script>
<style lang="scss" scoped>
.btn-link{
    font-size: 18px;
    font-weight: 600;
    &:hover {
        color: #413e66;
        text-decoration: none;
    }
}
.card-header{
    &:hover {
        background-color: #cac9dd;
        text-decoration: none;
    }
}
.content_body{
    h5{
        color: #696592;
        font-weight: 400;
        font-size: 16px;
        font-style: italic;
        &:hover{
            color: red;
        }
    }
    &.products{
        border-bottom: 1px solid;
    }
}
.text_header{
    margin-bottom: 50px;
    h5{
        color: #696592;
        font-weight: 600;
        font-size: 22px;
        font-style: italic;
    }
    p{
        margin: 0 0 10px 0;
    }
    .content_contact{
        border-left: 1px solid;
        border-right: 1px solid;
    }
    .content_suport{
        border-right: 1px solid;
    }
}
.section-header{
    text-transform: uppercase;
}
.btn-outline-warning{
    color: #f27014;
    border-color: #f27014;
    &:hover{
        background-color: #f27014;
        color: #000000;
    }
}
</style>
