</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Confirma salir y cerrar Sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="http://localhost/PruebaIT/vendor/jquery/jquery.min.js"></script>

    <script src="http://localhost/PruebaIT/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://localhost/PruebaIT/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://localhost/PruebaIT/js/sb-admin-2.min.js"></script>


    <script>


        /*
        function validarCampos() {
            let valorCedula = document.getElementById("txtCedulaC").value;
            let valorNombre = document.getElementById("txtNombreC").value;
            let valorClave= document.getElementById("txtContrasenaC").value;
            let boton = document.getElementById("btnGuardarC");

            let val = 0;

            if (valorCedula.length == 0) {
                val++;
            }

            if (valorNombre.length == 0) {
                val++;
            }
            if (valorClave.length == 0) {
                val++;
            }

            if (val == 0) {
                document.getElementById("btnGuardarC").disabled = false;
            } else {
                document.getElementById("btnGuardarC").disabled = true;
            }
        }

        document.getElementById("txtCedulaC").addEventListener("keyup",validarCampos);
        document.getElementById("txtNombreC").addEventListener("keyup",validarCampos);
        document.getElementById("txtContrasenaC").addEventListener("keyup",validarCampos);
        */

    </script>


    <script>
        let editaModal = document.getElementById('editaModal');
        editaModal.addEventListener('shown.bs.modal',event => {
            let button = event.relatedTarget;
            let ID = button.getAttribute('data-bs-id')

            let inputId = editaModal.querySelector('.modal-body #ID');
            let inputNombre = editaModal.querySelector('.modal-body #NOMBRE');
            let inputClave = editaModal.querySelector('.modal-body #CLAVE');

            let url = "getCondutor.php";
            let formData = new FormData();
            formData.append('ID',ID)

            fetch (url, {
                method: "POST",
                body:formData

            }).then(response => response.json())
            .then(data => {
                inputId.value = data.ID
                inputNombre.value = data.NOMBRE
                inputClave.value = data.CLAVE

            }).catch(err => console.log(err))

        })
    </script>

    <script>
        /*
        let formulario = document.getElementById('formulito');
        let boton = document.getElementById("btnPrue");
        let inputNom = formulario.querySelector('#txtNombreC');

        boton.addEventListener("click", function(){
            inputNom.value = "HIII"
        });
        */

    </script>
</body>

</html>