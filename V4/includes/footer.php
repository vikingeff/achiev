		<footer>
			<p>A PROPOS</p>
			<p>FOIRE A QUESTIONS</p>
			<p>NOUS CONTACTER</p>
			<p>MENTION LEGALES</p>
		</footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58744824-2', 'auto');
  ga('send', 'pageview');
</script>
<script type="text/javascript">
				$(".modal_trigger").leanModal({top : 200, overlay : 0.8, closeButton: ".modal_close" });

				$(function(){
					// Calling Register Form
					$("#register_form").click(function(){
						$(".user_register").show();
						$(".company_register").hide();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription etudiant');
						return false;
					});

					// Calling Company Register Form 
					$("#cregister_form").click(function(){
						$(".company_register").show();
						$(".user_register").hide();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription entreprise');
						return false;
					});

					// Going back to Social Forms
					$(".back_btn").click(function(){
						$(".user_login").show();
						$(".user_reg").show();
						$(".company_register").hide();
						$(".user_register").hide();
						$(".header_title").text('Connexion');
						return false;
					});

					//Account creation ok
					$("#ok").click(function(){
						$("#co_ok").hide();
						$("#ok").hide();
						return false;
					});

					//Account creation nok
					$("#nok").click(function(){
						$("#co_nok").hide();
						$("#nok").hide();
						$(".user_register").show();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription etudiant');
						return false;
					});

					//Inscription etudiante
					$(".ins").click(function(){
						$(".user_register").show();
						$(".company_register").hide();
						$(".user_login").hide();
						$(".user_reg").hide();
						$(".header_title").text('Inscription etudiant');
						return false;
					})

					//validate login
					$("#validate").click(function(){

						location.reload();
						$(".user_login").hide();
						$(".user_register").hide();
						$(".company_register").hide();
						$(".social_login").hide();
						$.post('includes/signin.php', {login:$("#login").val(), passwd:$("#passwd").val()});
						$("#modal").hide();
						$("#lean_overlay").fadeOut(200);
			                $(modal_id).css({
			                    "display": "none"
			                })
						return false;
					});
				})
			</script>
	</body>
</html>
