<?php if (!isset($show) || $show==true) : ?>

<!-- Harn Footer -->
	<div class="row-fluid" id="harn_footer">
		<div class="span12">
		<img src="/assets/images/separator.png" alt="" >
			<div class="row-fluid">
				<div class="span2">					
					<strong>Harn Gallery</strong>
					<ul class="FooterLinks">
						<li>
							<a href="/about-us">About us</a>
						</li>
						<li>
							<a href="/privacy-policy">Privacy Policy</a>
						</li>
						<li>
							<a href="/copyright">Copyright</a>
						</li>
						<li>
							<a href="/terms-of-service">Terms of Service</a>
						</li>
					</ul>
				</div>
				<div class="span2">
					<strong>Support</strong>
					<ul class="FooterLinks">
						<li>
							<a href="/how-it-works">How it works?</a>
						</li>
						<li>
							<a href="/buyers-guide">Buyer's Guide</a>
						</li>
						<li>
							<a href="/artist-guide">Artist's Guide</a>
						</li>
						<li>
							<a href="/contact-us">Contact Us</a>
						</li>						
					</ul>
				</div>
				<div class="span2" id="footer_fb">
					<p><strong>Follow us</strong></p>
					<a href="https://www.facebook.com/harngallery">

<img src="/assets/images/facebook-icon.png" alt="" style="padding:3px 0 13px;"></a>
					<p><a href="/newsletter">Newsletter</a></p>					
				</div>
				<div class="span3" id="footer_FAQ">
					<strong>What we offer</strong>
					<ul class="FooterFAQs">
						<li>
							Expertly curated art for sale
						</li>
						<li>
							Free shipping worldwide
						</li>
						<li>
							Talented mid-career and emerging artists
						</li>
											
					</ul>
				</div>




				<div class="span3">
					<form method="get" action="/newsletter"><button class="btnGrey1">GET</button><br><button class="btnGrey2">$25<button class="btnGrey3">CREDIT</button></button></form></div>





			<div class="row-fluid">
				<div class="span12" style="font-size:8pt;padding-top:10px">
					&copy; 2013 - 2014 HarnGallery. All rights reserved
				</div>
			</div>
		</div>
	</div><br>
	<!-- Harn Footer -->
<?php endif; ?>

<div id="debug"></div>
<?php echo Assets::js(); ?>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
</body>
</html>