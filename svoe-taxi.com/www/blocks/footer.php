	<div class="col_title"></div>
	<div class="footer">
			<div class="footer_menu">
				<ul>
				<?
				$i = 0;
				foreach($main_items as $key=>$value){
					$url = '"'.$value.'"';
					if($i++>0){ echo '<li>/</li>'; }
					echo "<li><a href=$url>$key</a></li>";
				}
				unset($i);
				?>
				</ul>
			 </div>
		<div class="footer_bottom">
			<div class="f_contacts">
					Мы находимся в городе Артемовск<br>
					  Донецкая область <br>
					Телефоны: (095)1111118
					<br>
					Электронная почта: <span class="red-str"><a href="mailto:info@svoe-taxi.com" >info@svoe-taxi.com</a></span>
			</div>
			<div class="f_copy">
				&copy; 2013 Copyright 
				<br />
				Своё Такси 
			</div>
		</div>
	</div>