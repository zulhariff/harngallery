<?php include "header.php"; ?>
<script>
	var category=['All','Painting','Photography','Drawing','Printmaking','Assemblage / Collage','Other'];
	var price=['Any Price','Under $99','$100 - $499','$500 - $999','$1,000 - $2,499', 'More than $5,000'];
	var medium=[
		['All'],
		['All','Acrylic','Aerosol Paint','Airbrush','Enamel','Encaustic Wax','Glaze','Gouache','Hot Wax','Household','Ink','Latex Paint','Magna Paint','Mixed Media','Oil','Oil Pastel','Tempera','Watercolor'],
		['All','Black & White','C-type','Color','Digital','Dye Transfer','E-type','Full-spectrum','Gelatin Silver Process','Giclee','Lenticular','Photogram','Pinhole','Polaroid','Ray Pint'],
		['All','Chalk','Charcoal','Colored Pencils','Conte','Crayon','Graphite','Oil Pastel','Pastel','Pen And Ink','Pencil','Silverpoint'],
		['All','Brushes','Collagraph','Copper Etching Plate','Digital Print','Drawing','Drypoint','Engraving','Etching','Foil Imaging','Giclee Print','Glass','Ink','Linocuts','Lithography','Monotype','Painting','Screen-printing','Stencils','Watercolor','Woodcut'],
		['All','Decoupage','Digital','Encaustic','Fabric','Found Objects','Metal','Other','Painting','Paper','Photomontage','Wax','Wood']		
	];	
	
	var style=['All','Abstract','Abstract Expressionism','Art Deco','Cubism','Dada','Expressionism','Impressionism','Pop Art','Realism','Street Art','Surrealism'];
	var subject=['All','Abstract','Animals','Architecture','Business','Cartoon','Children','Cuisine','Education','Erotic','Fantasy','Fashion','Figures & Nudes','Food & Drink','Health','Humor','Love','Nature','People','Places','Political','Celebrity','Religious','Science','Sports','Transportation','Travel'];
	var _location=['Any location','Africa','America','Asia','Australia/Ocenia','Europe','Other'];
	
	var orientation=['All','Landscape','Portrait','Square'];
	var size=['Any Size','Small','Medium','Large'];
	var color=['All','Beige','Black','Blue','Brown','Dark blue','Dark green','Dark red','Green','Grey','Orange','Pink','Purple','Red','Turquiose','Violet','White','Yellow'];
	var sortby=['Sort by','Most recent','Price: low to high','Price: hight to low','Size: small to large','Size: large to small'];
	
	$(document).ready(function(){
    	addArrToDDL($('#ctlCategory'),category);   
    	addArrToDDL($('#ctlPrice'),price);
    	addArrToDDL($('#ctlMedium'),medium[0]);
    	addArrToDDL($('#ctlOrientation'),orientation);
    	addArrToDDL($('#ctlStyle'),style);
    	addArrToDDL($('#ctlSubject'),subject);
    	addArrToDDL($('#ctlSize'),size);
    	addArrToDDL($('#ctlColor'),color);
    	addArrToDDL($('#ctlLocation'),_location);
    	
    	
    	$('#ctlCategory').change(function() {
    		addArrToDDL($('#ctlMedium'),medium[$(this).val()]);			
		});	
	});


	function addArrToDDL($obj,arr){
		$obj.empty();
		$.each(arr, function(val,key) {				
			$obj.append($('<option value='+val+'>'+key+'</option>'))
		});
	}
</script>
<div  id="harn_content">
	<div class="row" id="browse-art-navi">

			<form class="form-horizontal">
				<div class="span2">				
					<div class="control-group">  
            		<label class="control-label">Category</label>
            		<div class="controls">  
              			<select id="ctlCategory">

              			</select>   			              			 
            		</div> 
          		</div>    
					<div class="control-group">  
            		<label class="control-label">Price</label>
            		<div class="controls">  
              			<select id="ctlPrice">
              			</select>         
            		</div> 
            				
          		</div>              		        
				</div>
				<div class="span2">				
					<div class="control-group">  
            		<label class="control-label">Medium</label>
            		<div class="controls">  
              			<select id="ctlMedium"></select>        
            		</div> 
          		</div>    
					<div class="control-group">  
            		<label class="control-label">Orientation</label>
            		<div class="controls">  
              			<select id="ctlOrientation"><</select>       
            		</div> 
          		</div>              		        
				</div>	
				<div class="span2">				
					<div class="control-group">  
            		<label class="control-label">Style</label>
            		<div class="controls">  
              			<select id="ctlStyle"></select>       
            		</div> 
          		</div>    
					<div class="control-group">  
            		<label class="control-label">Size</label>
            		<div class="controls">  
              			<select id="ctlSize"></select>        
            		</div> 
          		</div>              		        
				</div>	
				<div class="span2">				
					<div class="control-group">  
            		<label class="control-label">Subject</label>
            		<div class="controls">  
              			<select id="ctlSubject"></select>          
            		</div> 
          		</div>    
					<div class="control-group">  
            		<label class="control-label">Color</label>
            		<div class="controls">  
              			<select id="ctlColor"></select>         
            		</div> 
          		</div>              		        
				</div>	
				<div class="span2">				
					<div class="control-group">  
            		<label class="control-label">Location</label>
            		<div class="controls">  
              			<select id="ctlLocation"></select>       
            		</div> 
          		</div>               		        
				</div>	
				<div class="span2">				
          		  <button class="btn btn-inverse pull-right" type="button" id="btnSearchArt">SEARCH ART</button>      
				</div>																				
			</form>

	</div>	
<!--	
			<div class="row" >
				<div class="span2 ba-span">
				<div class="browse-art-selection">
				<span class="btn-label">Category</span>
					<div class="btn-group">					
						 <button class="btn btn-default btn-sm dropdown-toggle">All</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">Painting</a></li>
							<li><a href="#">Photography</a></li>
							<li><a href="#">Drawing</a></li>
							<li><a href="#">Printmaking</a></li>
							<li><a href="#">Assemblage / Collage</a></li>
							<li><a href="#">Other</a></li>							
						</ul>
					</div>
					</div>
					<div class="browse-art-selection">
					<span class="btn-label">Price</span>
					<div class="btn-group">
						 <button class="btn">Any Price</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">Any Price</a></li>
							<li><a href="#">Under $99</a></li>
							<li><a href="#">$100 - $499</a></li>
							<li><a href="#">$500 - $999</a></li>
							<li><a href="#">$1,000 - $2,499</a></li>
							<li><a href="#">$2,500 - $4,999</a></li>
							<li><a href="#">More than $5,000</a></li>							
						</ul>
					</div>
					</div>
				</div>
				<div class="span2 ba-span">
				<div class="browse-art-selection">
				<span class="btn-label">Medium</span>
					<div class="btn-group">
						<button class="btn">All</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">Acrylic</a></li>
							<li><a href="#">Aerosol Paint</a></li>
							<li><a href="#">Airbrush</a></li>
							<li><a href="#">Enabmel</a></li>
							<li><a href="#">Encaustic Wax</a></li>
							<li><a href="#">Glaze</a></li>
							<li><a href="#">Gouache</a></li>
							<li><a href="#">Hot Wax</a></li>
							<li><a href="#">Household</a></li>
							<li><a href="#">Ink</a></li>
							<li><a href="#">Latex Paint</a></li>
							<li><a href="#">Magna Paint</a></li>
							<li><a href="#">Mixed Media</a></li>
							<li><a href="#">Oil</a></li>
							<li><a href="#">Oil Pastel</a></li>
							<li><a href="#">Tempera</a></li>
							<li><a href="#">Watercolor</a></li>							
						</ul>
					</div>
					</div>
					<div class="browse-art-selection">
					<span class="btn-label">Orientation</span>
					<div class="btn-group">
						<button class="btn">All</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">Landscape</a></li>
							<li><a href="#">Potrait</a></li>
							<li><a href="#">Square</a></li>							
						</ul>
					</div>
					</div>
				</div>
				<div class="span2 ba-span">
				<div class="browse-art-selection">
				<span class="btn-label">Style</span>
					<div class="btn-group">
						<button class="btn">All</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">Abstract</a></li>
							<li><a href="#">Abstract Expressionism</a></li>
							<li><a href="#">Art Deco</a></li>
							<li><a href="#">Cubism</a></li>
							<li><a href="#">Dada</a></li>
							<li><a href="#">Expressionism</a></li>
							<li><a href="#">Impressionism</a></li>
							<li><a href="#">Pop Art</a></li>
							<li><a href="#">Realism</a></li>
							<li><a href="#">Street Art</a></li>
							<li><a href="#">Surrealism</a></li>							
						</ul>
					</div>
					</div>
					<div class="browse-art-selection">
					<span class="btn-label">Size</span>
					<div class="btn-group">
						<button class="btn">Any Size</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">Any Size</a></li>
							<li><a href="#">Small</a></li>
							<li><a href="#">Medium</a></li>
							<li><a href="#">Large</a></li>							
						</ul>
					</div>
					</div>					
				</div>
				<div class="span2 ba-span">
				<div class="browse-art-selection">
				<span class="btn-label">Subject</span>
					<div class="btn-group">
						<button class="btn">All</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">Abstract</a></li>
							<li><a href="#">Animals</a></li>
							<li><a href="#">Architecture</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Cartoon</a></li>
							<li><a href="#">Children</a></li>
							<li><a href="#">Cuisine</a></li>
							<li><a href="#">Education</a></li>
							<li><a href="#">Erotic</a></li>
							<li><a href="#">Fantasy</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Figures & Nudes</a></li>
							<li><a href="#">Food & Drink</a></li>
							<li><a href="#">Health</a></li>
							<li><a href="#">Humor</a></li>
							<li><a href="#">Love</a></li>
							<li><a href="#">Nature</a></li>
							<li><a href="#">People</a></li>
							<li><a href="#">Places</a></li>
							<li><a href="#">Political</a></li>
							<li><a href="#">Celebrity</a></li>
							<li><a href="#">Religious</a></li>
							<li><a href="#">Science</a></li>
							<li><a href="#">Sports</a></li>
							<li><a href="#">Transportation</a></li>
							<li><a href="#">Travel</a></li>							
						</ul>
					</div>
					</div>
					<div class="browse-art-selection">
					<span class="btn-label">Color</span>
					<div class="btn-group">
						<button class="btn">All</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">All</a></li>
							<li><a href="#">Beige</a></li>
							<li><a href="#">Black</a></li>
							<li><a href="#">Blue</a></li>
							<li><a href="#">Brown</a></li>
							<li><a href="#">Dark blue</a></li>
							<li><a href="#">Dark green</a></li>
							<li><a href="#">Dark red</a></li>
							<li><a href="#">Green</a></li>
							<li><a href="#">Grey</a></li>
							<li><a href="#">Orange</a></li>
							<li><a href="#">Pink</a></li>
							<li><a href="#">Purple</a></li>
							<li><a href="#">Red</a></li>
							<li><a href="#">Turquoise</a></li>
							<li><a href="#">Violet</a></li>
							<li><a href="#">White</a></li>
							<li><a href="#">Yellow</a></li>							
						</ul>
					</div>
					</div>
				</div>
				<div class="span2 ba-span">
				<div class="browse-art-selection">
				<span class="btn-label">Location</span>
					<div class="btn-group">
						<button class="btn">Any Location</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">Any Location</a></li>
							<li><a href="#">Africa</a></li>
							<li><a href="#">America</a></li>
							<li><a href="#">Asia</a></li>
							<li><a href="#">Autralia/Oceania</a></li>
							<li><a href="#">Europe</a></li>
							<li><a href="#">Other</a></li>							
						</ul>
					</div>
					</div>

				</div>
				<div class="span2 ba-span">
					 <button class="btn btn-inverse pull-right" type="button" style="padding:0;text-align:center;width:120px;font-style:italic;height:40px;font-size:13pt">SEARCH ART</button>
				</div>
			</div>
-->		
	
		<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a><span class="divider">></span>
				</li>
				<li class="active">
					Browse Art
				</li>				
			</ul>	


<!-- Browse Art -->

			<div class="row-fluid">
			<div class="span8">
			<strong>All:</strong>	
			</div>
			<div class="span3 pull-right">
				<div class="pull-right">
						<!--	
					<div class="control-group">  
            		<label class="control-label">Sort By</label>
            		<div class="controls">  
              			<select id="ctlSortyBy">
              				<option>Most Recent</option>
              				<option>Price: low to high</option>
              				<option>Price: high to low</option>
              				<option>Size: small to large</option>
              				<option>Size: large to small</option>                          			
              			</select>
              			1657 items       
            		</div> 
          		</div>   
          		-->		
				<div class="btn-group">
						<button class="btn">Sort By</button> <button data-toggle="dropdown" class="btn dropdown-toggle">
						 <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#">Most Recent</a></li>
							<li><a href="#">Price: low to high</a></li>
							<li><a href="#">Price: high to low</a></li>
							<li><a href="#">Size: small to large</a></li>
							<li><a href="#">Size: large to small</a></li>												
						</ul>
				</div>
				1657 items
				
				
				</div>
			</div>
			</div>		
			<div class="row-fluid">
            <div id="content" >
                <div class="box">                		
                    <a href="item.php"><img src="http://placehold.it/240x250"></a>
                    <p class="art-title">RECOSTADOS</p>
                    <p class="art-price">$2,800</p>
                    <p class="artist-name">Lilia Sapien</p>
						  <p class="artist-country">Mexico</p>
                </div>
                <div class="box">
                    <a href="item.php"><img src="http://placehold.it/250x280"></a>
                    <p class="art-title">Litiasis biliar</p>
                    <p class="art-price">$350</p>
                    <p class="artist-name">Marcle Montemayor</p>
						  <p class="artist-country">Mexico</p>                    
                </div>
                <div class="box">
                    <a href="item.php"><img src="http://placehold.it/300x350"></a>
                    <p class="art-title">(98.) Phlebia</p>
                    <p class="art-price">$110</p>
                    <p class="artist-name">Christina Weisz</p>
						  <p class="artist-country">Germany</p>                    
                </div>      
                <div class="box">
                    <a href="item.php"><img src="http://placehold.it/280x450"></a>
                    <p class="art-title">nature morte1</p>
                    <p class="art-price">$300</p>
                    <p class="artist-name">Nicolas Choye</p>
						  <p class="artist-country">Germany</p>                    
                </div>
                <div class="box">
                    <a href="item.php"><img src="http://placehold.it/280x300"></a>
                    <p class="art-title">Yellow</p>
                    <p class="art-price">$1,900</p>
                    <p class="artist-name">Thomas Kausel</p>
						  <p class="artist-country">Germany</p>                    
                </div>
                <div class="box">
                    <a href="item.php"><img src="http://placehold.it/280x350"></a>
                    <p class="art-title">Sighing Forest</p>
                    <p class="art-price">$110</p>
                    <p class="artist-name">Mira Cedar</p>
						  <p class="artist-country">Israel</p>                    
                </div>                                           
            </div>
				

			<div class="pagination pull-right">
				<ul>
					<li>
						<a href="#">Prev</a>
					</li>
					<li>
						<a href="#">1</a>
					</li>
					<li>
						<a href="#">2</a>
					</li>
					<li>
						<a href="#">3</a>
					</li>
					<li>
						<a href="#">4</a>
					</li>
					<li>
						<a href="#">5</a>
					</li>
					<li>
						<a href="#">Next</a>
					</li>
				</ul>	
			</div>
			</div>
	</div>				
	<script>
	$(document).ready(function(){
    init_masonry(40);
	});
	</script>
<?php include "footer.php"; ?>	