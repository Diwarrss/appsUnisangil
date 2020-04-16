<template>
    <div class="container py-5 mt-5">
        <section class="py-5">
            <header class="section-header mt-5 mb-5 text-center">
                <h3>Directorio Activo</h3>
            </header>
            <div class="text_header">
                <h5>Responsable del servicio</h5>
                <div class="mb-5">
                    <span>
                        Funcionario de Departamento de Sistemas y TIC de UNISANGIL.
                        Dirección Departamento de Sistemas y TIC.
                        Administrador de servidores.
                    </span>
                </div>
                <div class="row">
                    <div class="content_contact col-md-6">
                        <h5>Objetivo</h5>
                        <p>
                            Contar con un sistema de control de acceso basado en la identidad de los funcionarios.
                        </p>
                    </div>
                    <div class="content_suport col-md-6">
                        <h5>Necesidad que Satisface</h5>
                        <p>
                            Seguridad informática <br>
                            Desarrollo de la gestión académica y administrativa <br>
                            Desarrollo de la gestión de la investigación  y la extensión
                        </p>
                    </div>
                    <div class="content_contact col-md-6">
                        <h5>Descripción</h5>
                        <p>
                            Este esquema, de autenticación a través de un dominio de red, pretende facilitar la gestión del hardware y del software que se usa en la institución, además de permitir desarrollar estrategias dirigidas a mejorar la integridad, confidencialidad y disponibilidad de los recursos. <br>

                            Se realiza cambio de la forma de administración de red, pasando de un esquema en grupo de trabajo a un dominio de red. Con esto se centralizará el control de los usuarios y recursos, optimizando las labores de administración.
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
                        <img src="storage/img/services/directorio.png" alt="" class="img-fluid" width="250">
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
