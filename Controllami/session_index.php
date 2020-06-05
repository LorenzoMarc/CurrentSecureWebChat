

                <!-- MENU -->
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="../../index.php">Home</a></li>
                        <li><a href="../../risorse-utili.php">Risorse utili</a></li>
                        <li><a href="../../contact.php">Contatti</a></li>
                    </ul>
                </div>
                <!-- end MENU -->

                
            </div>
        </div>
	</header>
	<!-- end header -->


	<!-- CONTENT start -->
	<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->
	<section id="content">
	<div class="container">
		<h1>Sessions</h1>
		<h2>Pagina di Login</h2>

		<div id="myContent" style="text-align:center;">
			<form action="session_getlogged.php" name='loginform' method="POST">
				<p align="center">Inserisci il tuo username</p> <input type='text' name="username" /><br/><br/>
				<p align="center">Inserisci la tua password</p> <input type='password' name="password" /><br/><br/>
				<p><input type="hidden" name="login" value="login"/>
				<p align="center"><input type='submit' name = "login" value='Invia dati' class="btn btn-theme"/><br><br><br><br>
					<p><input type="hidden" name="login" value="login"/> 
				</p>
				
			</form>
		</div>

	</section>
	</div> <!-- /.container -->
	</section>
	<!-- CONTENT end -->
	<!-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% -->


	<!-- THE FOOTER -->
	<?php
		include('../../footer.php');
	?>



</body>
</html>