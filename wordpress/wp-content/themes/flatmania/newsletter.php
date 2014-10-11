<?php
/**
 * Template Name: Newsletter
 */
?>

<?php
	get_header();
	the_post();
?>

<div class="newsletter">
	<h2><?php the_title() ?></h2>
	<div class="newsletter-content">
	  <div class="row">
	    <div class="col col-md-8">
				<?php the_content() ?>
				<br />

	    	<div class="jnl2">
		    	<table class="index">
					<tbody>
					<tr class="line_color0">
						<td class="data">2014-06-04</td>
						<td><a href="/archive.php?do=show_posting&amp;num=282&amp;ml_id=00&amp;language=&amp;ftype=" class="cert">20 czerwca - Kancelaria nieczynna / 20th of June - Office is closed</a></td>
					</tr>
						<tr class="line_color1">
							<td class="data">2014-04-22</td>
							<td><a href="/archive.php?do=show_posting&amp;num=281&amp;ml_id=00&amp;language=&amp;ftype=" class="cert">2 maja - Kancelaria nieczynna / 2nd of May - Office is closed</a></td>
					</tr>
					<tr class="line_color0">
						<td class="data" colspan="2">...</td>
					</tr>
					</tbody>
					</table>
				</div>

			</div>
	    <div class="col col-md-4 padd-left autoBox">
	      <div class="box box-md br-purple animated animation fadeInUp">
	        <div class="box-content box-default slide-up">
	          <h2>Rejestracja</h2>
	          <br />

	          <div class="jnl2">
	            <div class="mini_sign_form">
	              <form name="jnl2_sign_form">
	                <label for="email">E-mail</label>
	                <input type="text" class="form-control" maxlength="48" name="email" id="email">
	                <div class="view-button">
	                	<input type="button" class="btn btn-info" onclick="send_data(this.name)" name="sign_in" value="Zapisz">
	                	<input type="button" class="btn btn-info" onclick="send_data(this.name)" name="sign_out" value="Wypisz">
	                </div>
	              </form>
	            </div>
	          </div>

	        </div>
	      </div>
	    </div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function chkform() {
		var email = document.jnl2_sign_form.email.value;
		pattern = new RegExp('^([a-zA-Z0-9\-\.\_]+)(\@)([a-zA-Z0-9\-\.]+)([\.])([a-zA-Z]{2,4})$');

		if (!pattern.test(email)) {
			alert("Podaj adres e-mail");
			document.jnl2_sign_form.email.focus();
			return false;
		}
		return true;
  }

	function send_data(selection) {
		if (chkform()) {
   		document.jnl2_sign_form.method = "post";

			if (selection == "sign_in") {
	  		document.jnl2_sign_form.action = "sign_in.php?do=sign_in&language=&ml_id=00";
	  	}
			if (selection == "sign_out") {
				document.jnl2_sign_form.action = "sign_out.php?do=sign_out&language=&ml_id=00";
			}
			document.jnl2_sign_form.submit();
		}
	}
</script>


<?php get_footer(); ?>
