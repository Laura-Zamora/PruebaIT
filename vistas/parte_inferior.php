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

        function validarCampos() {
            let valorCedula = document.getElementById("txtCedulaC").value;
            let valorNombre = document.getElementById("txtNombreC").value;
            let valorClave= document.getElementById("txtContrasenaC").value;
            let boton = document.getElementById("btnGuardarC");

            if (valorCedula.length == 0) {
                    alert("Por favor digitar cedula");
                    boton.disabled = true;
            }

            if (valorNombre.length == 0) {
                alert("Por favor digitar nombre");
                boton.disabled = true;
            }
            if (valorClave.length == 0) {
                alert("Por favor digitar clave");
                boton.disabled = true;
            }

            if (valorCedula.length > 0 && valorNombre.length > 0 && valorClave.length > 0) {
                boton.disabled = false;
            }
        }
        

    </script>

</body>

</html>