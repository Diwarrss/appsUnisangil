<template>
    <div class="container py-5 mt-5">
        <section class="py-5">
            <header class="section-header mt-5 mb-5 text-center">
                <h3>Licencias de software</h3>
            </header>
            <div class="text_header">
                <h5>Responsable del servicio</h5>
                <div class="mb-5">
                    <span>
                        Funcionario de Departamento de Sistemas y TIC de UNISANGIL. Dirección Departamento de Sistemas y TIC
                    </span>
                </div>
                <div class="row">
                    <div class="content_contact col-md-6">
                        <h5>Objetivo</h5>
                        <p>
                            Contar con una gestión centralizada para la selección, compra, instalación y renovación de licencias de software  de uso académico y administrativo.
                        </p>
                    </div>
                    <div class="content_suport col-md-6">
                        <h5>Necesidad que Satisface</h5>
                        <p>
                            Extensión y proyección social <br>
                            Desarrollo de la gestión académica y administrativa <br>
                            Desarrollo de la gestión de la investigación  y la extensión
                        </p>
                    </div>
                    <div class="content_contact col-md-6">
                        <h5>Descripción</h5>
                        <p>
                            Apoyo a los programas académicos y áreas administrativas en procesos de adquisición, mantenimiento, soporte y versiona miento de las licencias de software. <br>
                            Gestión centralizada de las mismas
                        </p>
                    </div>
                    <div class="content_suport col-md-6">
                        <h5>Contacto de Soporte</h5>
                        <p>
                            Ticket a través de la Mesa de TI, plataforma GLPI y Llamada <br>
                            •	Dirección departamento de sistemas sede San Gil, Administrador de servidores <br>
                            •	Teléfono 7245757  Extensión  231 <br>
                            •	Correo: <a href="mailto:dirtics@unisangil.edu.co">dirtics@unisangil.edu.co</a>
                        </p>
                    </div>
                    <div class="content_contact col-md-6">
                        <h5>Horario de soporte</h5>
                        <p>
                            •	Lunes a viernes de 8:00 – 12:00 y  2:00 – 7:00 p.m. <br>
                            •	Sábado de 9:00 – 12:00 p.m.
                        </p>
                    </div>
                    <div class="content_suport text-center col-md-6">
                        <img src="storage/img/services/licencias.jpg" alt="" class="img-fluid" width="250">
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
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
    border-bottom: 1px solid;
    h5{
        color: #696592;
        font-weight: 400;
        font-size: 16px;
        font-style: italic;
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
</style>
